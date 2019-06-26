<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (!isUserLoggedIn()) {
    setMsg("msg_notify", "You need to login before accessing the Tickets Add page.", "warning");
    redirect("clientarea", "login");
}

$err = getMsg("errors");
$data = getMsg("form_data");

$ticket_types = [
    "技术支持","销售财务","管理员信箱"
];