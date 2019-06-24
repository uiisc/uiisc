<?php

session_start();
define('IN_SYS', true);

$ROOT = __DIR__;

// include_once "{$ROOT}/lib/language.php";
include_once "{$ROOT}/clientarea/data/config.php";
include_once "{$ROOT}/clientarea/library/email.class.php";
include_once "{$ROOT}/clientarea/library/functions.php";

$section = empty($_GET["s"]) ? "main" : $_GET["s"];
$section_page = "{$ROOT}/clientarea/views/{$section}.php";
if (!is_file($section_page)) {
    exit('Page Not Found!');
}

$objDB = objDB();
$user = get_userinfo();

$controller = "{$ROOT}/clientarea/controllers/{$section}.php";
if (is_file($controller)) {
    include_once $controller;
}

require_once "clientarea/views/header.php";
require_once "clientarea/views/navbar.php";
require_once $section_page;
require_once "clientarea/views/footer.php";
