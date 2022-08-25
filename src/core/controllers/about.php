<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../about.php");
    exit;
}

$section = empty($_GET["s"]) ? "uiisc" : $_GET["s"];
$enable_section = array(
    "crogram" => array("title" => "Crogram"),
    "ifastnet" => array("title" => "iFastNet"),
    "uiisc" => array("title" => "UIISC")
);

$section_page = "{$ROOT}/core/views/about/{$section}.php";

if (is_file(($section_page))) {
    $title = $title . ' - ' . $lang->I18N('about') . ' ' . $enable_section[$section]['title'];
} else {
    $title = $title . ' - ' . $lang->I18N('about');
    $section_page = "{$ROOT}/core/views/about/uiisc.php";
}
