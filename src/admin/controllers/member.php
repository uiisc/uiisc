<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}


$members = [
    "total" => 10,
    "pages" => 4,
    "page" => 1,
    "list" => []
];

$status_types = [
    "关闭",
    "打开"
];

$members["list"] = $dbpdo->select_and("users");
