<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

unset($_SESSION);
// session_destroy();
setMsg("msg", "Logout successfully. 2 seconds later redirect to the login page.");
header("refresh:2;url=admin.php");
