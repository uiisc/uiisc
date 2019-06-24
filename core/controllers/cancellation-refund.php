<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../cancellation-refund.php");
    exit;
}

$title = $title . ' - ' . I18N('cancellation_refund');
