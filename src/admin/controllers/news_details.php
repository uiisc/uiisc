<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");

if (empty($_GET["id"])) {
    redirect("admin", "news");
}

$status_types = [
    "关闭",
    "打开"
];

$news_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
$res = $dbpdo->find_and('news', ["id" => $news_id]);
if ($res) {
    $data = $res;
} else {
    setMsg("msg_notify", "The News Not found.", "warning");
    redirect("admin", "news");
}
