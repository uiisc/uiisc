<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (isUserLoggedIn()) {

    if (isset($_COOKIE["user"])) {
        setcookie("user", "", time() - (86400 * 30), "/");
    }

    if (isset($_SESSION["user"])) {
        unset($_SESSION["user"]);
    }

    setMsg("msg_notify", "Your account has been successfully logged out.", "success");
    redirect("clientarea", "login");
} else {
    setMsg("msg_notify", "You have not logged in yet.", "warning");
    redirect("clientarea", "login");
}
