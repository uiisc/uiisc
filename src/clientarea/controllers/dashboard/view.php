<?php

$count_acc = $DB->count('account', array('account_client_id' => $ClientInfo['client_id'], 'account_status' => 1));
$count_ssl = $DB->count('ssl', array('ssl_client_id' => $ClientInfo['client_id']));

// $count_tic1 = $DB->count('tickets', array('ticket_client_id' => $ClientInfo['client_id'], 'ticket_status' => 0));
// $count_tic2 = $DB->count('tickets', array('ticket_client_id' => $ClientInfo['client_id'], 'ticket_status' => 1));
// $count_tic = $count_tic1 + $count_tic2;

$count_tic = $DB->getColumn("SELECT COUNT(*) FROM `pre_tickets` WHERE `ticket_client_id`='" . $ClientInfo['client_id'] . "' AND `ticket_status`=0 OR `ticket_client_id`='" . $ClientInfo['client_id'] . "' AND `ticket_status`=1");

$PageInfo['title'] = 'Dashboard';
