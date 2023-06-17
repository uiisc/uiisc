<?php

require_once __DIR__ . '/application.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if (!in_array($action, array('list', 'view'))) {
    $action = 'list';
}

require_once __DIR__ . '/controllers/knowledgebase/' . $action . '.php';

require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/views/navbar.php';
require_once __DIR__ . '/views/common/sidebar.php';
require_once __DIR__ . '/views/knowledgebase/' . $action . '.php';
require_once __DIR__ . '/views/footer.php';
