<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

if (isset($_POST["do_check_domain"])) {
    $tsData = array(
        "domain" => setProtect(strtolower($_POST["domain"])),
    );
    if (!isset($tsData["domain"]) || empty($tsData["domain"])) {
        $message = [0, "The domain is required."];
    } elseif (strlen($tsData["domain"]) < 4) {
        $message = [0, "Enter a domain name or sub-domain."];
    } elseif (strlen($tsData["domain"]) > 50) {
        $message = [0, "The domain can not exceed 50 characters."];
    } elseif (!mb_ereg("^([a-zA-Z0-9]+).([a-zA-Z0-9-]+).([a-zA-Z]{2,4})$", $tsData["domain"])) {
        $message = [0, "The domain does not have a valid extension. Check it."];
    } elseif (preg_match("/(^.*)\.(tk)$/i", $tsData["domain"])) {
        // To not allow domains.tk
        $message = [0, "The domain extension is not allowed on this server."];
    } else {
        $client = Api::init($config);
        $client->availability(["domain" => $tsData["domain"]]);
        $message = $client->message;
    }
}
