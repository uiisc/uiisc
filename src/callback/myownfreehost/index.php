<?php

require_once __DIR__ . '/../../core/application.php';
$path_array = explode('/', trim($path_info, '/'));

if (!$path_array || count($path_array) < 2) {
    header("status: 401");
    exit('401 Unauthorized');
}

$api_key = $path_array[0];
$token = $path_array[1];

$AccountApi = $DB->find('account_api', '*', array('api_key' => $api_key), null, 1);

if (!$AccountApi) {
    exit('Not Found');
}

if ($token != $AccountApi['api_callback_token']) {
    exit('Unauthorized');
}

file_put_contents('./log.txt', json_encode($_POST), FILE_APPEND);
file_put_contents('./log.txt', "\n", FILE_APPEND);

require_once __DIR__ . '/app.php';
