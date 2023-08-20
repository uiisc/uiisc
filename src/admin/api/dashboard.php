<?php

require 'application.php';

@header('Content-Type: application/json; charset=UTF-8');
if (!checkRefererHost()) exit('{"code":403}');

$act = get('act');

switch ($act) {
    case 'stat':
        $count_client = $DB->count('clients', array('client_status' => 1));
        $count_clients = $DB->count('clients');
        $count_account = $DB->count('account', array('account_status' => 1));
        $count_accounts = $DB->count('account');
        $count_ssl = $DB->count('ssl');
        $count_ssls = $DB->count('ssl');
        $count_ticket = $DB->count('tickets', "`ticket_status`=0 OR `ticket_status`=2");
        $count_tickets = $DB->count('tickets');

        $result = [
            "count_client" => $count_client,
            "count_clients" => $count_clients,
            "count_account" => $count_account,
            "count_accounts" => $count_accounts,
            "count_ssl" => $count_ssl,
            "count_ssls" => $count_ssls,
            "count_ticket" => $count_ticket,
            "count_tickets" => $count_tickets
        ];
        send_response(0, $result);
        break;
    default:
        send_response(-4, null, 'No Act');
        break;
}
