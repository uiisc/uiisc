<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'new');

if (!in_array($action, array('new', 'decode'))) {
    $action = 'new';
}

require_once __DIR__ . '/controllers/csr/' . $action . '.php';
require_once __DIR__ . '/views/common/header.php';
require_once __DIR__ . '/views/common/navbar.php';
require_once __DIR__ . '/views/common/sidebar.php';
require_once __DIR__ . '/views/csr/' . $action . '.php';
require_once __DIR__ . '/views/common/footer.php';
