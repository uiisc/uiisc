<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$news = array(
    'total' => 0,
    'list' => null,
    'page' => 1,
    'pages' => 1
);

$news['total'] = $DB->count('news');
if ($news['total'] > 0) {
    $news['list'] = $DB->findAll('news', '*', array(), "`news_id` DESC");
}

$status_types = array(
    '关闭',
    '打开'
);

$page_title = $page_title . ' - ' . $lang->I18N('News List');

require ROOT . '/public/views/common/header.php';
require ROOT . '/public/views/common/navbar.php';
require ROOT . '/public/views/news/list.php';
require ROOT . '/public/views/common/footer.php';
