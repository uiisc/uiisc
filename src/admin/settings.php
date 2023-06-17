<?php

require_once __DIR__ . '/application.php';

$section = get('s', 'settings');
$action = get('action', 'view');

if (!in_array($section, array('settings', 'hosting', 'domain', 'sslapi', 'smtp', 'sitepro'))) {
    $section = 'settings';
}

if (!in_array($action, array('edit', 'view'))) {
    $action = 'view';
}

require __DIR__ . '/controllers/' . $section . '/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
// require __DIR__ . '/views/common/sidebar.php';
require __DIR__ . '/views/settings/menu.php';
require __DIR__ . '/views/' . $section . '/' . $action . '.php';
require __DIR__ . '/views/footer.php';
