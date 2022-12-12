<?php

$PageInfo['title'] = 'Dashboard';
$count_clients = $DB->count('clients', null);
$count_account = $DB->count('account', array('account_status' => 1));
$count_ssl = $DB->count('ssl');
$count_tickets = $DB->count('tickets', "`ticket_status`=0 OR `ticket_status`=2");
