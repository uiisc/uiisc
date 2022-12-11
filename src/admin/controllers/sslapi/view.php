<?php

$PageInfo['title'] = 'SSL API Settings';

$where = array(
    'api_key' => 'FREESSL'
);

$SSLApi = $DB->find('ssl_api', '*', $where, null, 1);
