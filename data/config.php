<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../index.php");
    exit;
}

$static_release = '1559728996134';
$brandName = "UIISC";
$iFastNetAff = 19474;
$CopyRightYear = "2013 - " . date("Y");
$title = "UIISC";
$title_s = "UIISC";
$author = 'Crogram Inc.';
$description = "uiisc, freewebhost, webhost, Crogram, iFastNet";
$google_site_verification = "5O6Wxt0gIyGb7btMuXiQqddZJ516n-xBOW_9RLMBeSY";

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
