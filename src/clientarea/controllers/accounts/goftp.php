<?php

require_once __DIR__ . '/../../application.php';

$account_id = get('account_id');
$domain = get('domain', '');

if (empty($account_id)) {
    redirect('clientarea/accounts');
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id, 'account_client_id' => $ClientInfo['hosting_client_id']), null, 1);

if (empty($AccountInfo)) {
    setMessage('Account not found', 'danger');
    redirect('clientarea/accounts');
}

if ($AccountInfo['account_status'] != 1) {
    setMessage('Hosting Account is deactivated', 'danger');
    redirect('clientarea/accounts', '', array('action' => 'view', 'account_id' => $account_id));
}

require_once ROOT . '/core/handler/HostingHandler.php';

$filemanager_url = get_filemanager_url($HostingApi['api_cpanel_url'], $AccountInfo['account_username'], $AccountInfo['account_password'], $domain);
header("Location: " . $filemanager_url);
