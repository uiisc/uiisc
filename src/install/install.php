<?php

include __DIR__ . '/application.php';

$step = empty($_GET['step']) ? 0 : $_GET['step'];

switch ($step) {
    case 0:
        $PageInfo['title'] = 'Database Configuration';
        include APP_ROOT . '/views/install/database.php';
        break;
    case 1:
        $PageInfo['title'] = 'System Configuration';
        include APP_ROOT . '/views/install/config.php';
        break;
    case 2:
        $PageInfo['title'] = 'Admin Configuration';
        include APP_ROOT . '/views/install/admin.php';
        break;
    case 'done':
        $PageInfo['title'] = 'Done';
        include APP_ROOT . '/views/install/done.php';
        break;
    default:
        exit(403);
        break;
}
