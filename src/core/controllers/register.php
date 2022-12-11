<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
$security_id = md5(rand(6000, getrandmax())); // $security_id = md5(rand(6000,PHP_INT_MAX));
$page_title = $page_title . ' - ' . $lang->I18N('register');
