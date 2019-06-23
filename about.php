<?php
define('IN_SYS', true);
require_once "core.php";

$section = empty($_GET["s"]) ? "uiisc" : $_GET["s"];
$enable_section = ["crogram", "ifastnet", "uiisc"];

switch ($section) {
    case "crogram":
        $title = $title . ' - ' . $LANG['about'] . ' Crogram';
        break;
    case "ifastnet":
        $title = $title . ' - ' . $LANG['about'] . ' iFastNet';
        break;
    case "uiisc":
        $title = $title . ' - ' . $LANG['about'] . ' UIISC';
        break;
}

include("index/header.php");

if (in_array($section, $enable_section)) {
    include("index/about_" . $section . ".php");
} else {
    include("index/about_uiisc.php");
}



include("index/footer.php");
