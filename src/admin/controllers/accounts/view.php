<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$account_id = get('account_id');

if (empty($account_id)) {
    redirect('admin/accounts');
}

require_once ROOT . '/core/handler/HostingHandler.php';

$PageInfo['title'] = 'View Account (#' . $account_id . ')';

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($AccountInfo)) {
    setMessage('not found', 'danger');
    redirect('admin/accounts');
}
