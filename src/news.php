<?php

require __DIR__ . '/core/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'view'))) {
    $action = 'list';
}

require __DIR__ . '/public/controllers/news/' . $action . '.php';
// require __DIR__ . '/public/views/common/header.php';
// require __DIR__ . '/public/views/common/navbar.php';
// require __DIR__ . '/public/views/news/' . $action . '.php';
// require __DIR__ . '/public/views/common/footer.php';
