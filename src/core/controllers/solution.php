<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../solution.php");
    exit;
}

$title = $title . ' - ' . $lang->I18N('solution');
