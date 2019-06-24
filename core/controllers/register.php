<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../register.php");
    exit;
}
$security_id = md5(rand(6000, getrandmax())); // $security_id = md5(rand(6000,PHP_INT_MAX));
$title = $title . ' - ' . $LANG['register'];
