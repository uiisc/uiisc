<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$page_title = $page_title . ' - ' . $lang->I18N('cancellation_refund');

require ROOT . '/public/views/common/header.php';
require ROOT . '/public/views/common/navbar.php';
require ROOT . '/public/views/cancellation-refund.php';
require ROOT . '/public/views/common/footer.php';
