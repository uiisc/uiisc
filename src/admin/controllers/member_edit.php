<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

$err = getMsg("errors");

if (empty($_GET["id"])) {
    redirect("admin", "member");
}

$status_types = [
    "关闭",
    "打开"
];

$member_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

if (empty($member_id)) {
    setMsg("msg_notify", "The Member Not Found.", "error");
    redirect("admin", "member");
}

$member = $dbpdo->find_and('users', ["id" => $member_id]);
if ($member) {
    $member_avatar = (!empty($member['image'])) ? '/clientarea/images/' . $member['image'] : "http://via.placeholder.com/150x150";
} else {
    setMsg("msg_notify", "The Member Not Found.", "warning");
    redirect("admin", "member");
}
