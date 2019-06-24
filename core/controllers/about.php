<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../about.php");
    exit;
}

$section = empty($_GET["s"]) ? "uiisc" : $_GET["s"];
$enable_section = [
    "crogram" => ["title" => "Crogram"],
    "ifastnet" => ["title" => "iFastNet"],
    "uiisc" => ["title" => "UIISC"]
];

$section_page = "{$ROOT}/core/views/about_{$section}.php";

if (is_file(($section_page))) {
    $title = $title . ' - ' . I18N('about') . ' ' . $enable_section[$section]['title'];
} else {
    $title = $title . ' - ' . I18N('about');
    $section_page = "{$ROOT}/core/views/about_uiisc.php";
}
