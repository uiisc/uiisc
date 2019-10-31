<?php

session_start();
define('IN_SYS', true);
require_once "core.php";

include_once "{$ROOT}/library/email.class.php";
$section = empty($_GET["s"]) ? "main" : $_GET["s"];
$section_page = "{$ROOT}/clientarea/views/{$section}.php";
if (!is_file($section_page)) {
    exit('Page Not Found!');
}

$objDB = objDB();
$dbpdo = DBPDO::getInstance($dbconfig);
$user = get_userinfo();

$controller = "{$ROOT}/clientarea/controllers/{$section}.php";
if (is_file($controller)) {
    include_once $controller;
}

require_once "clientarea/views/header.php";
require_once "clientarea/views/navbar.php";
require_once $section_page;
require_once "clientarea/views/footer.php";
