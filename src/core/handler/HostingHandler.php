<?php

$AccountApi = $DB->find('account_api', '*', array('api_key' => 'myownfreehost'), null, 1);

$AccountApiConfig = array(
    'apiUsername' => $AccountApi['api_username'],
    'apiPassword' => $AccountApi['api_password'],
    // 'apiUrl' => 'https://panel.myownfreehost.net/xml-api/',
    'plan' => $AccountApi['api_package'],
);
