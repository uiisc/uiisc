<?php


$account_id = get('account_id');

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);
$ClientInfo = $DB->find('clients', '*', array('client_id' => $AccountInfo['account_client_id']), null, 1);

$PageInfo['title'] = 'Account Edit';
