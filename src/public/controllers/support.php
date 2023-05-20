<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$page_title = $page_title . ' - ' . $lang->I18N('Technical Support');

require ROOT . '/public/views/common/header.php';
require ROOT . '/public/views/common/navbar.php';
require ROOT . '/public/views/support.php';
require ROOT . '/public/views/common/footer.php';
