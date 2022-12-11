<?php

// error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (defined('IN_CRONLITE')) {
    exit();
}

define('IN_CRONLITE', true);
define('APP_ROOT', dirname(__FILE__) . '/');
define('ROOT', dirname(APP_ROOT));
define('CONFIG_FILE', ROOT . '/data/config.php');
define('LOCK_FILE', ROOT . '/data/install.lock');

$PageInfo = array('title' => 'UIISC', 'rel' => '');

ob_start();
session_start();

if (file_exists(LOCK_FILE)) {
    $PageInfo['title'] = 'Done';
    include __DIR__ . '/views/done.php';
    exit();
}

if (file_exists(CONFIG_FILE)) {
    // 配置信息已添加
    require CONFIG_FILE;
    $connect = mysqli_connect(
        $dbconfig['hostname'],
        $dbconfig['username'],
        $dbconfig['password'],
        $dbconfig['dbname'],
        $dbconfig['dbport']
    );
    if (!$connect) {
        $_SESSION['message'] = 'Connection not established';
    }
}
