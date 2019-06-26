<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (!isUserLoggedIn()) {
    setMsg("msg_notify", "You need to login before accessing the Support Tickets page.", "warning");
    redirect("clientarea", "login");
}

$err = getMsg("errors");
$data = getMsg("form_data");

function getTickets()
{
    // DB_HOST, DB_USER, DB_PASSWORD, DB_NAME
    echo "getTickets()";
    $stmt = $dbpdo->prepare(
        "SELECT * FROM tickets"
    );
    $sql = 'SELECT * FROM `tickets`';
    $rs = $pdo->query($sql);
    $data = $rs->fetchAll(); //取出所有结果
    print_r($data);
    // $sql = 'UPDATE t1 SET t1.`id1`=11 WHERE t1.`id1`=1';
    // $rs = $pdo->query($sql);
    // // $stmt->bind_param("s", $email);
    // $stmt->execute();
    // // $stmt->store_result();
    // // return $stmt->num_rows;
    // $result = $stmt->get_result();

    // // while ($row = $result->fetch_assoc()) {
    // //     // do something with $row
    // // }
    // return $result;
}

print_r(getTickets());

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
            "lastupdated" => "",
        ],
        [
            "date" => "Friday, August 10th, 2018 (12:00)",
            "department" => "Friday, August 10th, 2018 (12:00)",
            "subject" => "Customer Invoice",
            "status" => "",
            "lastupdated" => "",
        ],
        [
            "date" => "Tuesday, April 3rd, 2018 (00:51)",
            "department" => "Tuesday, April 3rd, 2018 (00:51)",
            "subject" => "Your password has been reset",
            "status" => "",
            "lastupdated" => "",
        ],
    ],
];
