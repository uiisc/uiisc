<?php

require __DIR__ . '/core/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'view'))) {
    $action = 'list';
}

require __DIR__ . '/public/controllers/news/' . $action . '.php';
