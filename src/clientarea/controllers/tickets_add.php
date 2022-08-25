<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (!isUserLoggedIn()) {
    setMsg("msg_notify", "You need to login before accessing the Tickets Add page.", "warning");
    redirect("clientarea", "login");
}
$load_editor = true;
$err = getMsg("errors");
$data = getMsg("form_data");

$ticket_types = [
    "技术支持", "销售财务", "管理员信箱"
];
$status_types = [
    "关闭",
    "打开"
];

if (isset($_POST["do_add_tickets"])) {
    $department = filter_input(INPUT_POST, "department", FILTER_SANITIZE_STRING);
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_SPECIAL_CHARS);
    $errors = array();

    $data = [
        "department" => $department,
        "subject" => $subject,
        "content" => $content
    ];
    if (!count($errors)) {
        $data["date"] = time();
        $data["lastupdated"] = "";
        $data["user_id"] = $user->id;
        $res = $dbpdo->add("tickets", $data);
        print_r($res);
        if ($res) {
            setMsg("msg_notify", "Add Tickets successfully.", "success");
            redirect("clientarea", "tickets_details", ["id" => $res]);
        } else {
            setMsg("msg_notify", "Add Tickets failed.", "warning");
            redirect("clientarea", "tickets_add");
        }
    } else {
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("clientarea", "tickets");
    }
}
