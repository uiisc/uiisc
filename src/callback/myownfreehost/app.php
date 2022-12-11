<?php

// require_once __DIR__ . '/../../core/application.php';

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

if (!isset($_POST['comments'])) {
    exit('need: comments');
}

$status = post('status');

if (substr($status, 0, 3) == 'sql') {
    require_once __DIR__ . '/activate.php';
} elseif ($status == 'SUSPENDED') {
    require_once __DIR__ . '/suspend.php';
} else {
    exit('Access Denied');
}
