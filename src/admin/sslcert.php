<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'view'))) {
    $action = 'list';
}

require __DIR__ . '/controllers/sslcert/' . $action . '.php';
require __DIR__ . '/views/common/header.php';
require __DIR__ . '/views/common/navbar.php';
// require __DIR__ . '/views/common/sidebar.php';
require __DIR__ . '/views/sslcert/' . $action . '.php';
require __DIR__ . '/views/common/footer.php';
