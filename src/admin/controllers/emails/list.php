<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$count = $DB->count('emails');
if ($count > 0) {
    $rows = $DB->findAll('emails', '*', array(), "`email_id` DESC");
}

$status_types = array(
    "未查看",
    "已查看",
);

$PageInfo['title'] = $lang->I18N('Emails List');