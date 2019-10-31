<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

if (isset($_POST["do_reg_account"])) {
    $tsData = [
        "username" => setProtect(strtolower($_POST["username"])),
        "password" => setProtect($_POST["password"]),
        "domain" => setProtect(strtolower($_POST["domain"])),
        "email" => setProtect(strtolower($_POST["email"])),
        "plan" => setProtect($_POST["plan"]),
    ];

    if (!isset($tsData["username"]) || empty($tsData["username"])) {
        $message = [0, "The Username is required"];
    } elseif (strlen($tsData["username"]) < 8 || strlen($tsData["username"]) > 12) {
        $message = [0, "The username must be 8 characters."];
    } elseif (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $tsData["username"])) {
        $message = [0, "The username does not allow strange characters."];
    } elseif (strlen($tsData["password"]) < 6 || strlen($tsData["password"]) > 35) {
        $message = [0, "Enter a minimum password of 6 to 35 characters."];
    } elseif (strlen($tsData["domain"]) < 4) {
        $message = [0, "Enter a domain name or sub-domain."];
    } elseif (strlen($tsData["domain"]) > 35) {
        $message = [0, "The domain can not exceed 35 characters."];
    } elseif (!mb_ereg("^([a-zA-Z0-9]+).([a-zA-Z0-9-]+).([a-zA-Z]{2,4})$", $tsData["domain"])) {
        $message = [0, "The domain does not have a valid extension. Check it."];
    } elseif (preg_match("/(^.*)\.(tk)$/i", $tsData["domain"])) {
        // To not allow domains.tk
        $message = [0, "Domain extension is not allowed on this server."];
    } elseif (!mb_ereg("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $tsData["email"])) {
        $message = [0, "The email does not have a valid format, check it."];
    } elseif (strlen($tsData["email"]) > 35) {
        $message = [0, "The email can not exceed 35 characters."];
    } elseif (empty($tsData["plan"])) {
        $message = [0, "You must select a hosting plan."];
    } else {
        $client = Api::init($config);
        $client->createAccount([
            "username" => $tsData["username"], // A unique, 8 character identifier of the account.
            "password" => $tsData["password"], // A password to login to the control panel, FTP MySQL and cPanel.
            "domain" => $tsData["domain"], // Can be a subdomain or a custom domain.
            "email" => $tsData["email"], // The email address of the user.
            "plan" => $tsData["plan"], // A hosting plan for the account.
        ]);
        $message = $client->message;
    }
}
