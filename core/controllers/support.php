<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../support.php");
    exit;
}

$title = $title . ' - ' . $lang->I18N('Technical Support');
