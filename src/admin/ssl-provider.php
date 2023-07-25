<?php

require_once __DIR__ . '/application.php';

$action = get('action', 'list');

if (!in_array($action, array('list', 'add', 'edit', 'details', 'raw'))) {
    $action = 'list';
}

$PageInfo['title'] = $lang->I18N('SSL Provider') . $lang->I18N($action);

require __DIR__ . '/controllers/ssl-provider/' . $action . '.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navbar.php';
require __DIR__ . '/views/sidebar.php';
require __DIR__ . '/views/ssl-provider/' . $action . '.php';
require __DIR__ . '/views/footer.php';
