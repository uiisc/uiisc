<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");

$ticket_types = [
    "技术支持", "销售财务", "管理员信箱"
];
$status_types = [
    "关闭",
    "打开"
];
if (empty($_GET["id"])) {
    redirect("admin", "tickets");
}
$tickets_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

if (isset($_POST["do_comment_tickets"])) {
    $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
    $errors = array();

    $data = [
        "tickets_id" => $tickets_id,
        "comment" => $comment
    ];
    if (!count($errors)) {
        $data["date"] = time();
        $data["user_type"] = "admin";
        if ($dbpdo->find_and('tickets', ["id" => $tickets_id, "user_id" => $user->id])) {
            if ($dbpdo->add("tickets_comment", $data)) {
                $dbpdo->update("tickets", ["lastupdated" => $data["date"]]);
                setMsg("msg_notify", "Add Comment successfully.", "success");
            } else {
                setMsg("msg_notify", "Add Comment failed.", "warning");
            }
            redirect("admin", "tickets_details", ["id" => $res]);
        } else {
            setMsg("msg_notify", "The Tickets Not found.", "warning");
            redirect("admin", "tickets");
        }
    } else {
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("admin", "tickets_details", ["id" => $res]);
    }
} else {
    $res = $dbpdo->find_and('tickets', ["id" => $tickets_id]);
    if ($res) {
        $data = $res;
    } else {
        setMsg("msg_notify", "The Tickets Not found.", "warning");
        redirect("admin", "tickets");
    }
}
