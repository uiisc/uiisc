<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../contact.php");
    exit;
}

$title = $title . ' - ' . $lang->I18N('contact_us');
