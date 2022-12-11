<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$id = get('id');

if (empty($id)) {
    redirect('admin/news');
    exit();
}

$status_types = array(
    '关闭',
    '打开',
);

$data = null;

if ($id > 0) {
    $data = $DB->find('news', '*', array('news_id' => $id), null, 1);
}
