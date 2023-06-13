<?php

require_once __DIR__ . '/../../application.php';

$account_id = get('account_id', 0);

if (empty($account_id)) {
    redirect('clientarea/accounts');
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($AccountInfo)) {
    setMessage('not found', 'danger');
    redirect('clientarea/accounts');
}

// TODO: Change to an asynchronous request
require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

if ($AccountInfo['account_status'] == 1) {
    $AccountApi = $DB->find('account_api', '*', array('api_key' => $AccountInfo['account_api_key']), null, 1);
    $AccountApiConfig = array(
        'apiUsername' => $AccountApi['api_username'],
        'apiPassword' => $AccountApi['api_password'],
        // 'apiUrl' => 'https://panel.myownfreehost.net/xml-api/',
        'plan' => $AccountApi['api_package'],
    );
    $client = Client::create($AccountApiConfig);
    $request = $client->getUserDomains(array('username' => $AccountInfo['account_username']));
    $response = $request->send();
    $DomainList = $response->getDomains();
} else {
    // inactive
    $DomainList = array();
}
if (count($DomainList) > 0) {
    foreach($DomainList as &$item) {
        // 格式 ("abc.com",1234)
        $item = '("' . $item . '",' .$account_id . ')';
    }
    // 清理
    $result = $DB->delete('account_domain', array('domain_account_id' => $account_id));
    // 同步到本地
    // $result = $DB->insert('account_domain', $DomainList);
    $sql = "INSERT INTO `hosting_account_domain` (domain_name,domain_account_id) VALUES " . implode(',', $DomainList);
    $result = $DB->query($sql);
}
redirect('admin/accounts', '', array('action' => 'view', 'account_id' => $account_id));
