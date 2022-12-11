<?php

header("X-Powered-By: UIISC");
header("Server: UIISC");
header("Content-Type: text/html; charset=UTF-8");

if (!isset($_GET['token']) || empty($_GET['token'])) {
    header("status: 401");
    exit('401 Unauthorized');
}

if (!isset($_GET['key']) || empty($_GET['key'])) {
    header("status: 401");
    exit('401 Unauthorized');
}

require_once __DIR__ . '/../core/application.php';

$token = get('token');
$key = get('key');

$HostingApi = $DB->find('account_api', '*', array('api_key' => $key), null, 1);

if (!$HostingApi) {
    header("status: 404");
    exit('404 Not Found');
}

if ($token != $HostingApi['api_callback_token']) {
    header("status: 404");
    exit('404 Not Found');
}

require_once __DIR__ . '/' . $key . '/app.php';
