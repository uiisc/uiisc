<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'view', 'add'))) {
    $action = 'list';
}

require_once ROOT . '/core/library/tickets.php';

require_once __DIR__ . '/controllers/tickets/' . $action . '.php';
require_once __DIR__ . '/views/common/header.php';
require_once __DIR__ . '/views/common/navbar.php';
require_once __DIR__ . '/views/common/sidebar.php';
require_once __DIR__ . '/views/tickets/' . $action . '.php';
require_once __DIR__ . '/views/common/footer.php';
