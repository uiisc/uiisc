<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../admin.php");
    exit;
}

if (isset($_POST["do_set_password"])) {
    $tsData = array(
        "username" => setProtect(strtolower($_POST["username"])),
        "password" => setProtect($_POST["password"]),
    );
    if (!isset($tsData["username"]) || empty($tsData["username"])) {
        $message = [0, "The username is required"];
    } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 8) {
        $message = [0, "The username must be 8 characters."];
    } elseif (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $tsData["username"])) {
        $message = [0, "The username does not allow strange characters."];
    } elseif (strlen($tsData["password"]) < 6 || strlen($tsData["password"]) > 35) {
        $message = [0, "Enter a minimum password of 6 to 35 characters."];
    } else {
        $client = Api::init($config);
        $client->password([
            "username" => $tsData["username"],
            "password" => $tsData["password"],
            "enabledigest" => 1, // [enabledigest] Change the password in cPanel - FTP - MySQL
        ]);
        $message = $client->message;
    }
}
