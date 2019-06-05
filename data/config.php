<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../index.php");
    exit;
}

$brandName = "UIISC";

$admin = [
    "username" => "admin",
    "password" => "admin",
];

$config = [
    "apiUsername" => "1",
    "apiPassword" => "1",
    "apiUrl" => "https://panel.myownfreehost.net:2087/xml-api/",
    "plan" => [
        "test_whm_api" => "test",
        "ccc" => "test2",
    ],
];
