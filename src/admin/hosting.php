<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'details'))) {
    $action = 'list';
}

$PageInfo['title'] = 'Hosting Provider ' . ucfirst($action);

require __DIR__ . '/controllers/hosting/' . $action . '.php';
require __DIR__ . '/views/common/header.php';
require __DIR__ . '/views/common/navbar.php';
// require __DIR__ . '/views/common/sidebar.php';
require __DIR__ . '/views/hosting/' . $action . '.php';
require __DIR__ . '/views/common/footer.php';
