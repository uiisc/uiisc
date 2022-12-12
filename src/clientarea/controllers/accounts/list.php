<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

require_once __DIR__ . '/../../application.php';

$PageInfo['title'] = $lang->I18N('Hosting Accounts');

$total_count = $DB->count('account', array('account_client_id' => $ClientInfo['client_id']));
$active_count = $DB->count('account', array('account_client_id' => $ClientInfo['client_id'], 'account_status' => '1'));

$rows = $DB->findAll('account', '*', array('account_client_id' => $ClientInfo['client_id']), "`account_id` DESC");
