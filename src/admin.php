<?php

session_start();
define("IN_CRONLITE", true);
require_once("core.php");

include_once "{$ROOT}/library/api.php";
include_once "{$ROOT}/admin/library.php";
// getVersion();
// if (!file_exists("{$ROOT}/data/installed") || !isset($config) || $config['apiUsername'] == '#getUsername#' || $config['apiPassword'] == '#getPassword#') {
//     header('Location: ./install.php');
// }
// $session_name = session_name();
// if (!isset($_COOKIE[$session_name])) {
//     foreach ($_COOKIE as $key => $val) {
//         $key = strtoupper($key);
//         if (strpos($key, $session_name)) {
//             session_id($_COOKIE[$key]);
//         }
//     }
// }

$section = isAdminLoggedIn() ? (empty($_GET["s"]) ? "main" : $_GET["s"]) : "login";
$section_page = "{$ROOT}/admin/views/{$section}.php";
if (!is_file($section_page)) {
    header("HTTP/1.1 404 Not Found");
    exit('Page Not Found!');
}

$message = [];

$dbpdo = DBPDO::getInstance($dbconfig);

$controller = "{$ROOT}/admin/controllers/{$section}.php";
if (is_file($controller)) {
    include_once $controller;
}

include("{$ROOT}/admin/views/header.php");
include("{$ROOT}/admin/views/navbar.php");
include($section_page);
include("{$ROOT}/admin/views/footer.php");
