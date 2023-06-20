<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'details', 'goftp', 'login', 'sync'))) {
    $action = 'list';
}

require __DIR__ . '/controllers/accounts/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
// require __DIR__ . '/views/sidebar.php';
require __DIR__ . '/views/accounts/' . $action . '.php';
require __DIR__ . '/views/footer.php';
