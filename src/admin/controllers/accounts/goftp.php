<?php

require_once __DIR__ . '/../../application.php';

$account_id = get('id');

if (empty($account_id)) {
    redirect('admin/accounts');
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($AccountInfo)) {
    redirect('admin/accounts');
}

$AccountApi = $DB->find('account_api', '*', array('api_key' => $AccountInfo['account_api_key']), null, 1);

$filemanager_url = get_filemanager_url($AccountApi['api_server_ftp_domain'], $AccountInfo['account_username'], $AccountInfo['account_password']);
header("Location: " . $filemanager_url);
