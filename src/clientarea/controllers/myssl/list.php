<?php

require ROOT . '/core/library/userinfo.class.php';

$count = $DB->count('ssl', array('ssl_for' => $ClientInfo['client_id']));

if ($count > 0) {
    $rows = $DB->findAll('ssl', '*', array('ssl_for' => $ClientInfo['client_id']), "`ssl_id` DESC");

    require_once ROOT . '/core/handler/SSLHandler.php';
    require_once ROOT . '/modules/GoGetSSL/GoGetSSLApi.php';
    $apiClient = new GoGetSSLApi();
    $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
}

$PageInfo['title'] = 'My SSL';
