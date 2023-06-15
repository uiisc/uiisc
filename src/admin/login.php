<?php

require_once __DIR__ . '/../core/application.php';

if (isset($_SESSION['UIISC_ADMIN'])) {
    header('location: index.php');
}

$PageInfo['title'] = $lang->I18N('login');
$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';

require_once __DIR__ . '/views/login/header.php';
require_once __DIR__ . '/views/login/login.php';
require_once __DIR__ . '/views/login/footer.php';
