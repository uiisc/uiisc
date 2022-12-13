<?php

require __DIR__ . '/core/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'view'))) {
    $action = 'list';
}

require __DIR__ . '/core/controllers/news/' . $action . '.php';
require __DIR__ . '/core/views/common/header.php';
require __DIR__ . '/core/views/common/navbar.php';
require __DIR__ . '/core/views/news/' . $action . '.php';
require __DIR__ . '/core/views/common/footer.php';
