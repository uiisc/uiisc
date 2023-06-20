<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'details'))) {
    $action = 'list';
}

$PageInfo['title'] = 'SSL ' . $lang->I18N($action);

require __DIR__ . '/controllers/ssl/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
require __DIR__ . '/views/ssl/' . $action . '.php';
require __DIR__ . '/views/footer.php';
