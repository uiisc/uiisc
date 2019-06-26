<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (!isUserLoggedIn()) {
    setMsg("msg_notify", "You need to login before accessing the Support Tickets page.", "warning");
    redirect("clientarea", "login");
}

$err = getMsg("errors");
$data = getMsg("form_data");

$tickets = [
    "total" => 10,
    "pages" => 4,
    "page" => 1,
    "list" => [],
];

// $tickets["list"] = $dbpdo->select('SELECT * FROM `tickets` WHERE `user_id` = ?', [$user->id]);
$tickets["list"] = $dbpdo->select_and("tickets", ["user_id" => $user->id]);
