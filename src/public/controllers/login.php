<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$page_title = $page_title . ' - ' . $lang->I18N('login');

require ROOT . '/public/views/common/header.php';
require ROOT . '/public/views/common/navbar.php';
require ROOT . '/public/views/login.php';
require ROOT . '/public/views/common/footer.php';
