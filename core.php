<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: index.php");
    exit;
}
header("X-Powered-By: PHP");
header("Content-Type: text/html; charset=UTF-8");

$ROOT = __DIR__;
include_once "{$ROOT}/data/config.php";
include_once "{$ROOT}/library/lang.class.php";
include_once "{$ROOT}/library/functions.php";
include_once "{$ROOT}/library/pdo.class.php";

$rooturl = $_SERVER['HTTP_HOST'];
$domain = preg_replace('/^www\./', '', $rooturl);

$lang = new Language("{$ROOT}/data/language/");
