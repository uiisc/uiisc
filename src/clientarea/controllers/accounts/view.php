<?php

require_once __DIR__ . '/../../application.php';

$account_id = get('account_id', 0);

if (empty($account_id)) {
    redirect('clientarea/accounts');
}

$_where = array(
    'account_id' => $account_id,
    'account_client_id' => $ClientInfo['hosting_client_id'],
);
$AccountInfo = $DB->find('account', '*', $_where, null, 1);

if (empty($AccountInfo)) {
    setMessage('not found', 'danger');
    redirect('clientarea/accounts');
}

// require_once ROOT . '/core/library/userinfo.class.php';
// TODO: Change to an asynchronous request
require_once ROOT . '/core/handler/HostingHandler.php';
require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

$PageInfo['title'] = 'View Account (#' . $account_id . ')';

if ($AccountInfo['account_status'] == 1) {
    $data = array_merge(array(), $HostingApi, $AccountInfo, array(
        'user_ip' => UserInfo::get_ip(),
        'ftp_host' => str_replace('cpanel', 'ftp', $HostingApi['api_cpanel_url']),
        'ftp_port' => 21,
        'mysql_host' => str_replace('cpanel', 'sqlxxx', $HostingApi['api_cpanel_url']),
        'mysql_port' => 3306,
    ));

    $client = Client::create($HostingApiConfig);
    $request = $client->getUserDomains(array('username' => $AccountInfo['account_username']));
    $response = $request->send();
    $DomainList = $response->getDomains();
} else {
    // inactive
    $DomainList = array();
    $data = array_merge(array(), $HostingApi, $AccountInfo, array(
        'user_ip' => UserInfo::get_ip(),
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
