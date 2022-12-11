<?php

require_once __DIR__ . '/../../application.php';

if (isset($_POST['submit'])) {
    $data = array(
        'news_subject' => post('subject'),
        'news_content' => post('content'),
        'news_status' => post('status'),
        'news_date' => date('Y-m-d H:i:s'),
    );

    $resault = $DB->insert('news', $data);

    if ($resault) {
        setMessage('News added <b>successfully!</b>');
    } else {
        setMessage("Something went's <b>wrong!</b>", 'danger');
    }
    redirect('admin/news');
} else {
    $PageInfo['title'] = 'Add News';
    $status_types = array(
        "关闭",
        "打开",
    );

    $load_editor = 1;
}
