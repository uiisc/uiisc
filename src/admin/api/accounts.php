<?php

require 'application.php';

@header('Content-Type: application/json; charset=UTF-8');
if (!checkRefererHost()) exit('{"code":403}');

$act = get('act');

switch ($act) {
    case 'add':
        break;
    case 'primary-domain':
        $account_id = post('account_id', 0);
        if (empty($account_id)) {
            send_response(-1, $msg = 'need account_id');
        }
        $domain = post('domain', null);
        if (empty($domain)) {
            send_response(-1, $msg = 'need domain');
        }
        $AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);
        if (empty($AccountInfo)) {
            send_response(-1, $msg = 'account not found');
        }
        $DomainInfo = $DB->find('account_domain', 'domain_id', array('domain_account_id' => $account_id, 'domain_name' => $domain), null, 1);
        if (empty($DomainInfo)) {
            send_response(-1, $msg = 'domain not found');
        }
        // set the primary domain
        $result = $DB->update('account', array('account_domain' => $domain), array('account_id' => $account_id));
        if ($result) {
            send_response(200, array('account_domain' => $domain), 'success');
        } else {
            send_response(-1, $msg = 'error');
        }
        break;
    default:
        send_response(-4, $msg = 'No Act');
        break;
}
