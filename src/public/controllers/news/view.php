<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$id = get('id');

if (empty($id)) {
    redirect('news');
}

$status_types = array(
    "关闭",
    "打开",
);

if ($id > 0) {
    $data = $DB->find('news', '*', array('news_id' => $id), null, 1);
} else {
    $data = null;
}

$page_title = $page_title . ' - ' . $lang->I18N('News Details');

require ROOT . '/public/views/header.php';
require ROOT . '/public/views/navbar.php';
require ROOT . '/public/views/news/view.php';
require ROOT . '/public/views/footer.php';
