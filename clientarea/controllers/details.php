<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (!isUserLoggedIn()) {
    setMsg("msg_notify", "You need to login before accessing the Account Details page.", "warning");
    redirect("clientarea", "login");
}

$err = getMsg("errors");
$data = getMsg("form_data");

$userAvatar = (!empty($user->image)) ? '/clientarea/images/' . $user->image : "http://via.placeholder.com/150x150";
$userRegDate = cTime($user->created_at);
