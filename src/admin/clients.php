<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'details', 'login'))) {
    $action = 'list';
}

require __DIR__ . '/controllers/clients/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
// require __DIR__ . '/views/common/sidebar.php';
require __DIR__ . '/views/clients/' . $action . '.php';
require __DIR__ . '/views/footer.php';
