<?php
define('IN_SYS', true);
require_once "core.php";
// $title = 'About UIISC';
$section = empty($_GET["s"]) ? "terms" : $_GET["s"];

include("index/header.php");

switch ($section) {
    case "privacy":
        include("index/legal_privacy.php");
        break;
    case "terms":
    default:
        include("index/legal_terms.php");
}

include("index/footer.php");
