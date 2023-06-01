<?php

require_once __DIR__ . '/../../application.php';

$account_id = get('account_id', 0);

if (empty($account_id)) {
    redirect('clientarea/accounts');
}

$_where = array(
    'account_id' => $account_id,
    'account_client_id' => $ClientInfo['client_id'],
);
$AccountInfo = $DB->find('account', '*', $_where, null, 1);

if (empty($AccountInfo)) {
    setMessage('not found', 'danger');
    redirect('clientarea/accounts');
}

// TODO: Change to an asynchronous request
require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

$PageInfo['title'] = 'View Account (#' . $account_id . ')';

$AccountApi = $DB->find('account_api', '*', array('api_key' => $AccountInfo['account_api_key']), null, 1);
$AccountApiConfig = array(
    'apiUsername' => $AccountApi['api_username'],
    'apiPassword' => $AccountApi['api_password'],
    // 'apiUrl' => 'https://panel.myownfreehost.net/xml-api/',
    'plan' => $AccountApi['api_package'],
);

if ($AccountInfo['account_status'] == 1) {
    $data = array_merge(array(), $AccountApi, $AccountInfo, array(
        'user_ip' => get_client_ip(),
        'ftp_host' => $AccountApi['api_server_ftp_domain'],
        'ftp_port' => 21,
        'mysql_host' => $AccountApi['api_server_sql_domain'],
        'mysql_port' => 3306,
    ));

    $client = Client::create($AccountApiConfig);
    $request = $client->getUserDomains(array('username' => $AccountInfo['account_username']));
    $response = $request->send();
    $DomainList = $response->getDomains();
} else {
    // inactive
    $DomainList = array();
    $data = array_merge(array(), $AccountApi, $AccountInfo, array(
        'user_ip' => get_client_ip(),
        'account_username' => '-',
        'account_password' => '-',
        'account_domain' => '-',
        'api_cpanel_url' => '-',
        'api_server_ip' => '-',
        'api_ns_1' => '-',
        'api_ns_2' => '-',
        'ftp_host' => '-',
        'ftp_port' => '-',
        'mysql_host' => '-',
        'mysql_port' => '-',
    ));
}
