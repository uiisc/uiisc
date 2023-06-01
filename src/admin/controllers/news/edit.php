<?php
if (isset($_POST['submit'])) {
    require '../../application.php';
    $id = post('id');
    if (!$id) {
        setMessage('need field: id', 'danger');
        redirect('admin/news');
    }
    $data = array(
        'news_subject' => post('subject'),
        'news_content' => post('content'),
        'news_status' => post('status'),
        'news_lastupdated' => date('Y-m-d H:i:s'),
    );

    $result = $DB->update('news', $data, array('news_id' => $id));

    if ($result) {
        setMessage('News update <b>successfully!</b>');
    } else {
        setMessage("Something went's <b>wrong!</b>", 'danger');
    }
    redirect('admin/news', '', array());
}

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

$news = null;

if ($id > 0) {
    $news = $DB->find('news', '*', array('news_id' => $id), null, 1);
}
$load_editor = 1;

$PageInfo['title'] = $lang->I18N('News Edit');
