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
if (empty($_GET["id"])) {
    redirect("clientarea", "tickets");
}
$tickets_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

$res = $dbpdo->find_and('tickets', ["id" => $tickets_id, "user_id" => $user->id]);
if ($res) {
    $data = $res;
} else {
    setMsg("msg_notify", "The Tickets Not Found.", "warning");
    redirect("clientarea", "tickets");
}

if (isset($_POST["do_close_tickets"])) {
    if ($dbpdo->find_and('tickets', ["id" => $tickets_id, "user_id" => $user->id])) {
        if ($dbpdo->update('tickets', ["status" => 0, "lastupdated" => time()], "`id`={$tickets_id}")) {
            setMsg("msg_notify", "The Tickets Closed Successfully.");
        } else {
            setMsg("msg_notify", "The Tickets Close Failed.", "warning");
        }
        redirect("clientarea", "tickets_details", ["id" => $tickets_id]);
    } else {
        setMsg("msg_notify", "The Tickets Not Found.", "warning");
        redirect("clientarea", "tickets");
    }
} elseif (isset($_POST["do_open_tickets"])) {
    if ($dbpdo->find_and('tickets', ["id" => $tickets_id, "user_id" => $user->id])) {
        if ($dbpdo->update('tickets', ["status" => 1, "lastupdated" => time()], "`id`={$tickets_id}")) {
            setMsg("msg_notify", "The Tickets Opened Successfully.");
        } else {
            setMsg("msg_notify", "The Tickets Open Failed.", "warning");
        }
        redirect("clientarea", "tickets_details", ["id" => $tickets_id]);
    } else {
        setMsg("msg_notify", "The Tickets Not Found.", "warning");
        redirect("clientarea", "tickets");
    }
} elseif (isset($_POST["do_comment_tickets"])) {
    $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_SPECIAL_CHARS);
    $errors = array();

    $data = [
        "tickets_id" => $tickets_id,
        "comment" => $comment
    ];
    if (!count($errors)) {
        $data["date"] = time();
        $data["user_type"] = "user";
        if ($dbpdo->find_and('tickets', ["id" => $tickets_id, "user_id" => $user->id])) {
            if ($dbpdo->add("tickets_comment", $data)) {
                $dbpdo->update("tickets", ["lastupdated" => $data["date"]]);
                setMsg("msg_notify", "Add Comment successfully.", "success");
            } else {
                setMsg("msg_notify", "Add Comment failed.", "warning");
            }
            redirect("clientarea", "tickets_details", ["id" => $res]);
        } else {
            setMsg("msg_notify", "The Tickets Not Found.", "warning");
            redirect("clientarea", "tickets");
        }
    } else {
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("clientarea", "tickets_details", ["id" => $res]);
    }
}
