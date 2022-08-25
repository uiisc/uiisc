<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");

$tickets = [
    "total" => 10,
    "pages" => 4,
    "page" => 1,
    "list" => [],
];
$ticket_types = [
    "技术支持", "销售财务", "管理员信箱"
];
$status_types = [
    "关闭",
    "打开"
];
// $tickets["list"] = $dbpdo->select('SELECT * FROM `tickets` WHERE `user_id` = ?', [$user->id]);
$tickets["list"] = $dbpdo->select_and("tickets");
