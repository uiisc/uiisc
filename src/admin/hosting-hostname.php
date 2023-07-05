<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list'))) {
    $action = 'list';
}

$PageInfo['title'] = 'Hosting Hostname ' . ucfirst($action);

require __DIR__ . '/controllers/hosting-hostname/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
require __DIR__ . '/views/hosting-hostname/' . $action . '.php';
require __DIR__ . '/views/footer.php';
