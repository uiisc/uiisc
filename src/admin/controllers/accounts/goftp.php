<?php

require_once __DIR__ . '/../../application.php';

$account_id = get('id');

if (empty($account_id)) {
    redirect('admin/accounts');
}

$data = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($data)) {
    redirect('admin/accounts');
}

require_once ROOT . '/core/handler/HostingHandler.php';

$filemanager_url = get_filemanager_url($HostingApi['api_cpanel_url'], $data['account_username'], $data['account_password']);
header("Location: " . $filemanager_url);
