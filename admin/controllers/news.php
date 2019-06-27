<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}


$news = [
    "total" => 10,
    "pages" => 4,
    "page" => 1,
    "list" => []
];

$status_types = [
    "关闭",
    "打开"
];

$news["list"] = $dbpdo->select_and("news");
