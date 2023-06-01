<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$api_id = get('id');
$api_key = get('api_key');

if ($api_id > 0) {
    $data = $DB->find('account_api', '*', array('api_id' => $api_id), null, 1);
    $api_callback_url = "{$site_url}/callback/{$data['api_key']}/{$data['api_callback_token']}";
    $PageInfo = ['title' => 'View Hosting Provider', 'rel' => ''];
} else if (!empty($api_key)) {
    $data = $DB->find('account_api', '*', array('api_key' => $api_key), null, 1);
    $api_callback_url = "{$site_url}/callback/{$data['api_key']}/{$data['api_callback_token']}";
    $PageInfo = ['title' => 'View Hosting Provider', 'rel' => ''];
} else {
    $PageInfo = ['title' => 'Unathorized Access', 'rel' => ''];
    $data = null;
}
