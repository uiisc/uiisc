<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$PageInfo['title'] = $lang->I18N('SSL Certificates');

$count = $DB->count('ssl');
if ($count > 0) {
    $rows = $DB->findAll('ssl', '*', array(), "`ssl_id` DESC");
}
