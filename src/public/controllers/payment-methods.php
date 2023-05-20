<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$page_title = $page_title . ' - ' . $lang->I18N('payment_methods');

require ROOT . '/public/views/common/header.php';
require ROOT . '/public/views/common/navbar.php';
require ROOT . '/public/views/payment-methods.php';
require ROOT . '/public/views/common/footer.php';
