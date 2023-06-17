<?php

require_once __DIR__ . '/application.php';
require_once ROOT . '/core/library/tickets.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'details'))) {
    $action = 'list';
}

$PageInfo['title'] = 'Ticket ' . ucfirst($action);

require __DIR__ . '/controllers/tickets/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
// require __DIR__ . '/views/common/sidebar.php';
require __DIR__ . '/views/tickets/' . $action . '.php';
require __DIR__ . '/views/footer.php';
