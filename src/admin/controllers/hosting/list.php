<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$count = $DB->count('account_api');
if ($count > 0) {
    $rows = $DB->findAll('account_api', '*', array(), "`api_id` DESC");
}
