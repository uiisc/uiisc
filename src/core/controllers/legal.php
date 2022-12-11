<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$section = get('s', 'terms');

if ($section == "privacy") {
    $page_title = $page_title . ' - ' . $lang->I18N('privacy_policy');
    $section_page = ROOT . "/core/views/legal_privacy.php";
} else {
    $page_title = $page_title . ' - ' . $lang->I18N('tos');
    $section_page = ROOT . "/core/views/legal_terms.php";
}
