<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (isset($_GET["code"])) {
    $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRING);
    if (checkUserByCode($code)) {
        verifyUserAccount($code);
        setMsg("msg_notify", "Your account has been activated, you can login your account.");
        redirect("clientarea", "login");
        exit();
    } else {
        setMsg("msg_notify", "Invalid activation code", "warning");
    }
} else {
    setMsg("msg_notify", "Activation code not exists", "warning");
}
redirect("clientarea", "register");
