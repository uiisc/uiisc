<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

if (isset($_POST["do_check_status"])) {
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

        // if ($this->data != "null" && strpos($this->response, '[[') === 0) {
        //     $statuses = array_unique(array_map(function ($item) {
        //         return strtolower($item["status"]);
        //     }, $this->domain));
        //     // print_r($statuses);
        //     if (count($statuses) == 1) {
        //         return $statuses[0];
        //     } elseif (count($statuses) > 1) {
        //         return "The account domains have different statuses <b>" . $this->getUserName() . "</b>." . $this->data;
        //     } else {
        //         return null;
        //     }
        // } else {
        //     return null;
        // }
        if ($client->getStatus() === "active") {
            $message = [1, "<b>The account </b> " . $tsData["username"] . " is Actived"];
        } elseif ($client->getStatus() === "suspend") {
            $message = [1, "<b>The account </b> " . $tsData["username"] . " is Suspend"];
        } else {
            "Cannot find the specified associated account";
            $message = [0, "The account <b>" . $tsData["username"] . "</b> does not have associated accounts."];
        }
    }
}
