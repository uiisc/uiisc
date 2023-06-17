<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'view');

if (!in_array($action, array('edit', 'view'))) {
    $action = 'view';
}

require __DIR__ . '/controllers/profile/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
// require __DIR__ . '/views/common/sidebar.php';
require __DIR__ . '/views/profile/' . $action . '.php';
require __DIR__ . '/views/footer.php';
