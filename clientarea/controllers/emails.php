<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");

$emails = [
    "total" => 12,
    "pages" => 4,
    "page" => 1,
    "list" => [
        [
            "id" => "3453822",
            "date" => "Saturday, August 11th, 2018 (04:50)",
            "subject" => "Invoice Payment Confirmation"
        ],
        [
            "id" => "3453821",
            "date" => "Friday, August 10th, 2018 (12:00)",
            "subject" => "Customer Invoice"
        ],
        [
            "id" => "3453820",
            "date" => "Tuesday, April 3rd, 2018 (00:51)",
            "subject" => "Your password has been reset"
        ]
    ]
];
