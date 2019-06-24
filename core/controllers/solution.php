<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../solution.php");
    exit;
}

$title = $title . ' - ' . I18N('solution');
