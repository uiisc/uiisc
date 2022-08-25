<?php

if (!defined('IN_CRONLITE')) {
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

if (isset($_POST["do_add_news"])) {
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
        $res = $dbpdo->add("news", $data);
        print_r($res);
        if ($res) {
            setMsg("msg_notify", "Add News successfully.", "success");
            redirect("admin", "news_details", ["id" => $res]);
        } else {
            setMsg("form_data", $data);
            setMsg("msg_notify", "Add News failed.", "warning");
            redirect("admin", "news_add");
        }
    } else {
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("admin", "news");
    }
}
