<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$api_id = get('id');

if ($api_id > 0) {
    // $PageInfo = ['title' => 'View Hosting Provider #' . $api_id, 'rel' => ''];
    $data = $DB->find('account_api', '*', array('api_id' => $api_id), null, 1);
} else {
    $PageInfo = ['title' => 'Unathorized Access', 'rel' => ''];
    $data = null;
}
