<?php

require 'application.php';

@header('Content-Type: application/json; charset=UTF-8');
if (!checkRefererHost()) exit('{"code":403}');

$act = get('act');

switch ($act) {
    case 'add':
        $form_data = array(
            'client_fname'   => post('client_fname'),
            'client_lname'   => post('client_lname'),
            'client_email'   => post('client_email'),
            'client_phone'   => post('client_phone'),
            'client_company' => post('client_company'),
            'client_address' => post('client_address'),
            'client_country' => post('client_country'),
            'client_city'    => post('client_city'),
            'client_pcode'   => post('client_pcode'),
            'client_state'   => post('client_state'),
            'client_password'=> hash('sha256', post('client_password', '123456')),
            // 'client_key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
            'client_key'     => randstr(8),
            'client_status'  => post('client_status', 0),
            'client_signup_ip' => get_client_ip(),
            'client_addtime'    => date('Y-m-d H:i:s'),
        );

        $client_id = $DB->insert('clients', $form_data);

        if ($client_id) {
            send_response(200, array('client_id' => $client_id), 'success');
        } else {
            send_response(-1, $msg = 'error');
        }
    case 'edit':
        $client_id = post('client_id');
        $client_password = post('client_password', '');
        $form_data = array(
            'client_fname'   => post('client_fname'),
            'client_lname'   => post('client_lname'),
            'client_email'   => post('client_email'),
            'client_phone'   => post('client_phone'),
            'client_company' => post('client_company'),
            'client_address' => post('client_address'),
            'client_country' => post('client_country'),
            'client_city'    => post('client_city'),
            'client_pcode'   => post('client_pcode'),
            'client_state'   => post('client_state'),
            // 'client_key'     => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
            'client_status'  => post('client_status', 0),
            'client_updatetime' => date('Y-m-d H:i:s'),
        );

        if ($client_password) {
            $form_data['client_password'] = hash('sha256', $client_password);
        }

        $result = $DB->update('clients', $form_data, array('client_id' => $client_id));

        if ($result) {
            send_response(200, array('client_id' => $client_id), 'success');
        } else {
            send_response(-1, $msg = 'error');
        }
    default:
        send_response(-4, $msg = 'No Act');
        break;
}
