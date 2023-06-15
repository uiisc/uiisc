<?php

$PageInfo['title'] = 'Dashboard';
$count_client = $DB->count('clients', array('client_status' => 1));
$count_clients = $DB->count('clients');
$count_account = $DB->count('account', array('account_status' => 1));
$count_accounts = $DB->count('account');
$count_ssl = $DB->count('ssl');
$count_ssls = $DB->count('ssl');
$count_ticket = $DB->count('tickets', "`ticket_status`=0 OR `ticket_status`=2");
$count_tickets = $DB->count('tickets');

$date = date("Y-m-d H:i:s");
$mysqlversion = $DB->getColumn("select VERSION()");
