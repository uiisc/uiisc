<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

if (isset($_POST["do_get_domains"])) {
    $tsData = array(
        "username" => setProtect(strtolower($_POST["username"])),
    );
    if (!isset($tsData["username"]) || empty($tsData["username"])) {
        $message = [0, "The username is required."];
    } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 18) {
        $message = [0, "Enter a username that is valid."];
    } elseif (!preg_match("/^[a-zA-Z0-9-_]{4,16}$/", $tsData["username"])) {
        $message = [0, "The username does not allow strange characters."];
    } else {
        $client = Api::init($config);
        $client->getUserDomains(["username" => $tsData["username"]]);
        $message = $client->message;
    }
}
