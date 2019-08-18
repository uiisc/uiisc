<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../news.php");
    exit;
}

$title = $title . ' - ' . $lang->I18N('news');

$news_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$section_page = empty($news_id) ? "{$ROOT}/core/views/news/list.php" : "{$ROOT}/core/views/news/details.php";

if (!is_file($section_page)) {
    header("HTTP/1.1 404 Not Found");
    exit('Page Not Found!');
}

$dbpdo = DBPDO::getInstance($dbconfig);

if (empty($news_id)) {
    $news = [
        "total" => 10,
        "pages" => 4,
        "page" => 1,
        "list" => []
    ];
    $news["list"] = $dbpdo->select_and('news', ['status' => 1]);
} else {
    $data = $dbpdo->find_and('news', ['id' => $news_id]);
    if ($data) {
        // $data = $res;
    } else {
        setMsg("msg_notify", "The News Not found.", "warning");
        redirect("news");
    }
}
