<?php

include __DIR__ . '/application.php';

if (isset($_GET['step'])) {
    if ($_GET['step'] == 1) {
        $PageInfo['title'] = 'Client Area';
        include __DIR__ . '/views/step1.php';
    } elseif ($_GET['step'] == 2) {
        $PageInfo['title'] = 'Register Admin';
        include __DIR__ . '/views/step2.php';
    } elseif ($_GET['step'] == 3) {
        $PageInfo['title'] = 'Done';
        include __DIR__ . '/views/done.php';
    }
} else {
    $PageInfo['title'] = 'Database Configuration';
    include __DIR__ . '/views/configuration.php';
}
