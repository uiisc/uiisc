<?php

$count = $DB->count('ssl', array('ssl_client_id' => $ClientInfo['client_id']));

if ($count > 0) {
    $rows = $DB->findAll('ssl', '*', array('ssl_client_id' => $ClientInfo['client_id']), "`ssl_id` DESC");
    $SSLApi = $DB->find('ssl_api', '*', array('api_key' => 'GOGETSSL'), null, 1);

    require_once ROOT . '/modules/GoGetSSL/GoGetSSLApi.php';
    $apiClient = new GoGetSSLApi();
    $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
}

$PageInfo['title'] = 'My SSL';
