<?php
define('IN_SYS', true);
require_once "core.php";
// $title = 'About UIISC';
$section = empty($_GET["s"]) ? "terms" : $_GET["s"];

include("core/views/header.php");

switch ($section) {
    case "privacy":
        include("core/views/legal_privacy.php");
        break;
    case "terms":
    default:
        include("core/views/legal_terms.php");
}

include("core/views/footer.php");
