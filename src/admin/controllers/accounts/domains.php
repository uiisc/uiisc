<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$account_id = get('account_id');

if (empty($account_id)) {
    redirect('admin/accounts');
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($AccountInfo)) {
    setMessage('not found', 'danger');
    redirect('admin/accounts');
}

$PageInfo['title'] = 'Account Domains';

$AccountDomainList = $DB->findAll('account_domain', '*', array('domain_account_id' => $account_id));
