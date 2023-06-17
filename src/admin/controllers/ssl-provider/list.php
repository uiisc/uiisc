<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$count = $DB->count('ssl_api');
if ($count > 0) {
    $rows = $DB->findAll('ssl_api', '*', array(), "`id` DESC");
}
