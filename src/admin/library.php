<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../admin.php");
    exit;
}

function isAdminLoggedIn()
{
    if (isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"] == true) {
        return true;
    } else {
        return false;
    }
}

function adminLogout()
{
    if (isset($_COOKIE["adminloggedin"])) {
        setcookie("adminloggedin", "", time() - (86400 * 30), "/");
    }

    if (isset($_SESSION["adminloggedin"])) {
        unset($_SESSION["adminloggedin"]);
    }
    // session_destroy();
}
