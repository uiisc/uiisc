<?php

$HostingApi = $DB->find('account_api', '*', array('api_key' => 'myownfreehost'), null, 1);

$HostingApiConfig = array(
    'apiUsername' => $HostingApi['api_username'],
    'apiPassword' => $HostingApi['api_password'],
    // 'apiUrl' => 'https://panel.myownfreehost.net/xml-api/',
    'plan' => $HostingApi['api_package'],
);
