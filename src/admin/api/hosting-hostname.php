<?php

require 'application.php';

@header('Content-Type: application/json; charset=UTF-8');
if (!checkRefererHost()) exit('{"code":403}');

$act = get('act');

switch ($act) {
    case 'list':
        $count = $DB->count('account_hostname');
        $list = array();
        if ($count > 0) {
            $list = $DB->findAll('account_hostname', '*', array(), '`host_id` ASC');
        }
        exit(json_encode(['code' => 0, 'total' => $total, 'list' => $list]));
        break;
    case 'add':
        $hostname = post('hostname');
        if (!$hostname) {
            exit(json_encode(['code' => -1, 'msg' => '主机名不能为空 ！']));
        }
        $api_id = post('api_id');
        if (!$api_id) {
            exit(json_encode(['code' => -1, 'msg' => '托管服务提供商不能为空 ！']));
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
            exit(json_encode(['code' => -1, 'msg' => 'Hostname aleady exsist ！']));
        } else {
            $result = $DB->insert('account_hostname', $data);
            if ($result) {
                exit(json_encode(['code' => 0, 'msg' => 'Hostname added successfully ！']));
            } else {
                exit(json_encode(['code' => -1, 'msg' => 'Something went wrong ！']));
            }
        }
        break;
    case 'delete':
        $host_id = post('host_id');
        if (!$host_id) {
            exit(json_encode(['code' => -1, 'msg' => '主机ID不能为空 ！']));
        }
        $data = array(
            'host_id' => $host_id
        );

        $has = $DB->count('account_hostname', $data);
        if (!$has > 0) {
            exit(json_encode(['code' => -1, 'msg' => 'Hostname not found ！']));
        } else {
            $result = $DB->delete('account_hostname', $data);
            if ($result) {
                exit(json_encode(['code' => 0, 'msg' => 'Hostname deleted successfully ！']));
            } else {
                exit(json_encode(['code' => -1, 'msg' => 'Something went wrong ！']));
            }
        }
    default:
        exit('{"code":-4,"msg":"No Act"}');
        break;
}
