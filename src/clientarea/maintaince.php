<?php

$current_route = 'clientarea/maintaince'; // TODO: make it automation

require_once __DIR__ . '/application.php';

if ($SiteConfig['site_status'] != 0) {
    redirect('clientarea/index');
}

$PageInfo['title'] = 'Maintaince';
$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';

require_once __DIR__ . '/views/common/header.php';
require_once __DIR__ . '/views/maintaince.php';
require_once __DIR__ . '/views/common/footer.php';
