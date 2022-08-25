<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

if (isset($_POST["do_disable_account"])) {
    $tsData = array(
        "username" => setProtect(strtolower($_POST["username"])),
        "reason" => setProtect($_POST["reason"]),
    );
    if (!isset($tsData["username"]) || empty($tsData["username"])) {
        $message = [0, "The username is required."];
    } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 8) {
        $message = [0, "The Username must be 8 characters"];
    } elseif (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $tsData["username"])) {
        $message = [0, "The Username does not allow strange characters"];
    } elseif (strlen($tsData["reason"]) < 10 || strlen($tsData["reason"]) > 60) {
        $message = [0, "You must enter a reason with a maximum of 60 characters"];
    } else {
        $client = Api::init($config);
        $client->suspend([
            "username" => setProtect(strtolower($tsData["username"])),
            "reason" => setProtect($tsData["reason"]),
        ]);
        $message = $client->message;
    }
}
