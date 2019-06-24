<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");

$tickets = [
    "total" => 10,
    "pages" => 4,
    "page" => 1,
    "list" => [
        [
            "date" => "Saturday, August 11th, 2018 (04:50)",
            "department" => "Saturday, August 11th, 2018 (04:50)",
            "subject" => "Invoice Payment Confirmation",
            "status" => "",
            "lastupdated" => ""
        ],
        [
            "date" => "Friday, August 10th, 2018 (12:00)",
            "department" => "Friday, August 10th, 2018 (12:00)",
            "subject" => "Customer Invoice",
            "status" => "",
            "lastupdated" => ""
        ],
        [
            "date" => "Tuesday, April 3rd, 2018 (00:51)",
            "department" => "Tuesday, April 3rd, 2018 (00:51)",
            "subject" => "Your password has been reset",
            "status" => "",
            "lastupdated" => ""
        ]
    ]
];
