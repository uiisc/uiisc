<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

if (isset($_POST["do_login"])) {
    $username = setProtect(strtolower(trim($_POST["username"])));
    $password = setProtect(strtolower(trim($_POST["password"])));
    $captcha = setProtect(strtolower($_POST["captcha"]));
    if (!isset($username) || empty($username)) {
        $message = [0, "The username is required."];
    } elseif (!isset($password) || empty($password)) {
        $message = [0, "The password is required."];
    } elseif (!isset($captcha) || empty($captcha)) {
        $message = [0, "The captcha code is required."];
    } else {
        if (!isset($_SESSION["admincaptchacode"]) || $captcha != strtolower($_SESSION["admincaptchacode"])) {
            $message = [0, "The captcha code is invalid."];
        } elseif ($username == $admin["username"] && $password == $admin["password"]) {
            $_SESSION["adminloggedin"] = true;
            $message = [1, "Login successfully. 2 seconds later redirect to the main page"];
            header("refresh:2;url=admin.php");
        } else {
            $message = [0, "Login failed.Please check if the account or password is correct."];
        }
    }
}
