<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");

$status_types = [
    "关闭",
    "打开"
];

$load_editor = true;

if (isset($_POST["do_add_member"])) {
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_SPECIAL_CHARS);
    $errors = array();

    $data = [
        "title" => $title,
        "status" => $status,
        "content" => $content
    ];
    if (!count($errors)) {
        $data["date"] = time();
        $data["lastupdated"] = "";
        $res = $dbpdo->add("member", $data);
        print_r($res);
        if ($res) {
            setMsg("msg_notify", "Add Member successfully.", "success");
            redirect("admin", "member_details", ["id" => $res]);
        } else {
            setMsg("form_data", $data);
            setMsg("msg_notify", "Add Member failed.", "warning");
            redirect("admin", "member_add");
        }
    } else {
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("admin", "member");
    }
}
