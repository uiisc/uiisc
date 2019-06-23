<?php


function isAdminLoggedIn()
{
    if (isset($_SESSION["isAdminLoggedIn"]) && $_SESSION["isAdminLoggedIn"] == true) {
        return true;
    } else {
        return false;
    }
}
