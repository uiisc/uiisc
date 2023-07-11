<?php

require 'application.php';

@header('Content-Type: application/json; charset=UTF-8');
if (!checkRefererHost()) exit('{"code":403}');

$act = get('act');

switch ($act) {
    case 'list':
        $total = $DB->count('account_hostname');
        $list = array();
        $total = intval($total);
        if ($total > 0) {
            $list = $DB->findAll('account_hostname', '*', array(), '`host_id` ASC');
        }
        send_response(200, array('total' => $total, 'list' => $list));
        break;
    case 'options':
        $api_id = get('api_id');
        if (!$api_id) {
            send_response(-1, array());
        }

        $where = array(
            'api_id' => $api_id
        );
        $list = $DB->findAll('account_hostname', 'api_id,host_id,host_name', $where, '`host_id` ASC');
        send_response(200, $list);
        break;
    case 'add':
        $hostname = post('hostname');
        if (!$hostname) {
            send_response(-1, null, '主机名不能为空 ！');
        }
        $api_id = post('api_id');
        if (!$api_id) {
            send_response(-1, null, '托管服务提供商不能为空 ！');
        }

        $domain = strtolower($hostname);

        if (substr($domain, 0, 1) != '.') {
            $domain = '.' . $domain;
        }

        $data = array(
            'api_id' => $api_id,
            'host_name' => $domain,
        );

        $has = $DB->count('account_hostname', $data);
        if ($has && $has > 0) {
            send_response(-1, null, 'Hostname aleady exsist ！');
        } else {
            $result = $DB->insert('account_hostname', $data);
            if ($result) {
                send_response(0, null, 'Hostname added successfully ！');
            } else {
                send_response(-1, null, 'Something went wrong ！');
            }
        }
        break;
    case 'delete':
        $host_id = post('host_id');
        if (!$host_id) {
            send_response(-1, null, '主机ID不能为空 ！');
        }
        $data = array(
            'host_id' => $host_id
        );

        $has = $DB->count('account_hostname', $data);
        if (!$has > 0) {
            send_response(-1, null, 'Hostname not found ！');
        } else {
            $result = $DB->delete('account_hostname', $data);
            if ($result) {
                send_response(0, null, 'Hostname deleted successfully ！');
            } else {
                send_response(-1, null, 'Something went wrong ！');
            }
        }
    default:
        send_response(-4, NULL, 'No Act');
        break;
}
