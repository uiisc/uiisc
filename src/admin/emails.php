<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'view'))) {
    $action = 'list';
}

require __DIR__ . '/controllers/emails/' . $action . '.php';
require __DIR__ . '/views/emails/' . $action . '.php';
