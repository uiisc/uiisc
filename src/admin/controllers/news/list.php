<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$count = $DB->count('news');
if ($count > 0) {
    $rows = $DB->findAll('news', '*', array(), "`news_id` DESC");
}

$status_types = array(
    "关闭",
    "打开",
);

$PageInfo['title'] = $lang->I18N('News List');