<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$PageInfo['title'] = 'SSL Certificates';

$count = $DB->count('ssl');
if ($count > 0) {
    $rows = $DB->findAll('ssl', '*', array(), "`ssl_id` DESC");

    require_once ROOT . '/core/handler/SSLHandler.php';
    require_once ROOT . '/modules/GoGetSSL/GoGetSSLApi.php';

    $apiClient = new GoGetSSLApi();
    $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
}
