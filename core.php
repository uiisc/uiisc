<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: index.php");
    exit;
}
include_once 'lang.php';
$title = "UIISC";
$title_s = "UIISC";
$author = 'Crogram Inc.';
$description = "uiisc, freewebhost, webhost, Crogram";
$rooturl = $_SERVER['HTTP_HOST'];
$domain = preg_replace('/^www\./', '', $rooturl);
$static_release = 'build_20181124';
function curlrequest($url, $data, $method = "post")
{
    $ch = curl_init(); // 初始化CURL句柄
    curl_setopt($ch, CURLOPT_URL, $url); // 设置请求的URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // 设为TRUE把curl_exec()结果转化为字串，而不是直接输出
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); // 设置请求方式
    curl_setopt($ch, CURLOPT_REFERER, $url); // 构造来路
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-HTTP-Method-Override: $method")); // 设置HTTP头信息
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // 设置提交的字符串
    $document = curl_exec($ch); // 执行预定义的CURL
    if (!curl_errno($ch)) {
        $info = curl_getinfo($ch);
        echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
    } else {
        echo 'Curl error: ' . curl_error($ch);
    }
    curl_close($ch);
    // $document=preg_replace("/[\t\n\r]+/","",$document);
    return $document;
}
