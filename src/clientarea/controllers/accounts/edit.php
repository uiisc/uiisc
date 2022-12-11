<?php

require_once __DIR__ . '/../../application.php';

$account_id = get('account_id');

if (empty($account_id)) {
    setMessage('need field: account_id', 'danger');
    redirect('clientarea/accounts');
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id, 'account_client_id' => $ClientInfo['hosting_client_id']), null, 1);

if (empty($AccountInfo)) {
    setMessage('not found', 'danger');
    redirect('clientarea/accounts');
}

if ($AccountInfo['account_status'] !== '1') {
    redirect('clientarea/accounts', array('action' => 'view', 'account_id' => $account_id));
}

$PageInfo['title'] = 'Edit Account (#' . $account_id . ')';
