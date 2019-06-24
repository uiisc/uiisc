<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../admin.php");
    exit;
}

function isAdminLoggedIn()
{
    if (isset($_SESSION["isAdminLoggedIn"]) && $_SESSION["isAdminLoggedIn"] == true) {
        return true;
    } else {
        return false;
    }
}
