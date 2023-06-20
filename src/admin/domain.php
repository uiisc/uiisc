<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'view'))) {
    $action = 'list';
}

$PageInfo['title'] = 'Domain Provider ' . ucfirst($action);

require __DIR__ . '/controllers/domain/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
// require __DIR__ . '/views/sidebar.php';
require __DIR__ . '/views/domain/' . $action . '.php';
require __DIR__ . '/views/footer.php';
