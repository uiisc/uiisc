<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'new');

if (!in_array($action, array('new', 'decode'))) {
    $action = 'new';
}

require_once __DIR__ . '/controllers/csr/' . $action . '.php';
require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/views/navbar.php';
require_once __DIR__ . '/views/sidebar.php';
require_once __DIR__ . '/views/csr/' . $action . '.php';
require_once __DIR__ . '/views/footer.php';
