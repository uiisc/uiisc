<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$id = get('id');

if (empty($id)) {
    redirect('admin/emails');
    exit();
}

$status_types = array(
    '关闭',
    '打开',
);

$data = null;

if ($id > 0) {
    $data = $DB->find('emails', '*', array('email_id' => $id), null, 1);
}

$PageInfo['title'] = $lang->I18N('Email Details');