<?php
define('IN_SYS', true);
require_once "core.php";
// $title = 'About UIISC';
$section = empty($_GET["s"]) ? "terms" : $_GET["s"];

include("include/header.php");

switch ($section) {
    case "privacy":
        include("include/legal_privacy.php");
        break;
    case "terms":
    default:
        include("include/legal_terms.php");
}

include("include/footer.php");
