<?php

$PageInfo['title'] = 'SitePro Settings';

$where = array(
    'builder_id' => 'SITEPRO',
);

$SitePro = $DB->find('builder_api', '*', $where, null, 1);
