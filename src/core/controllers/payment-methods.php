<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../payment-methods.php");
    exit;
}

$title = $title . ' - ' . $lang->I18N('payment_methods');
