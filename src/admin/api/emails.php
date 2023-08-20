<?php

require 'application.php';

// if (!defined('IN_CRONLITE')) {
//     exit('Access Denied');
// }

@header('Content-Type: application/json; charset=UTF-8');
// if (!checkRefererHost()) exit('{"code":403}');

$act = get('act');

switch ($act) {
    case 'info':
        $email_id = intval(get('email_id'));

        if ($email_id > 0) {
            $row = $DB->find('emails', '*', array('email_id' => $email_id), null, 1);
        } else {
            $row = null;
        }

        if (!$row) send_response(-1, null, '记录不存在');
        send_response(0, $row);
        break;
    case 'list':
        $where = " 1=1";
        $email_id = intval(post('email_id'));
        $email_client_id = post('email_client_id');
        $email_subject = post('email_subject');
        $email_to = post('email_to');

        if (!empty($email_id)) {
            $where .= " AND `email_id`='{$email_id}'";
        }
        if (!empty($email_client_id)) {
            $where .= " AND `email_client_id`='{$email_client_id}'";
        }
        if (!empty($email_subject)) {
            $where .= " AND `email_subject` like '%{$email_subject}%'";
        }
        if (!empty($email_to)) {
            $where .= " AND `email_to` like '%{$email_to}%'";
        }

        $offset = intval(post('offset', 0));
        $limit = intval(post('limit', 10));
        $total = $DB->count('emails', $where);

        if ($total > 0) {
            $rows = $DB->findAll('emails', 'email_id,email_client_id,email_subject,email_date,email_to,email_read', $where, "`email_id` DESC", "$offset,$limit");
        } else {
            $rows = array();
        }

        // send_response(0, array('total' => $total, 'rows' => $rows));
        exit(json_encode(array('code' => 0, 'rows' => $rows, 'total' => $total)));
        break;
    default:
        send_response(-4, null, 'No Act');
        break;
}
