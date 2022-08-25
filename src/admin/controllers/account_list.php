<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

$member = [
    [
        "branch" => "uiisc",
        "account" => "testapi",
        "username" => "uii_12345678",
        "email" => "usitetest@uiisc.com",
        "plan" => "test_whm_api",
        "domain" => ["test1.uiisc.com", "testapi.uiisc.com"],
        "password" => "abcAbc123",
        "nameserver" => [
            "ns1.byet.org",
            "ns2.byet.org"
        ]
    ]
];
