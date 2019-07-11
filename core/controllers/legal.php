<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../legal.php");
    exit;
}

$section = empty($_GET["s"]) ? "terms" : $_GET["s"];

if ($section == "privacy") {
    $title = $title . ' - ' . $lang->I18N('privacy_policy');
    $section_page = "{$ROOT}/core/views/legal_privacy.php";
} else {
    $title = $title . ' - ' . $lang->I18N('tos');
    $section_page = "{$ROOT}/core/views/legal_terms.php";
}
