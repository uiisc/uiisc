<?php
 
function curlrequest($url,$data,$method="post"){
    $ch = curl_init(); // 初始化CURL句柄 
    curl_setopt($ch, CURLOPT_URL, $url); // 设置请求的URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // 设为TRUE把curl_exec()结果转化为字串，而不是直接输出 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); // 设置请求方式
    curl_setopt($ch, CURLOPT_REFERER,$url); // 构造来路
    curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-HTTP-Method-Override: $method"));//设置HTTP头信息
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // 设置提交的字符串
    $document = curl_exec($ch); // 执行预定义的CURL
    if(!curl_errno($ch)) {
      $info = curl_getinfo($ch);
      echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url']; 
    } else {
      echo 'Curl error: ' . curl_error($ch); 
    }
    curl_close($ch);
    return $document;
}
 
$url = 'http://order.uiisc.com/register.php';
$data = "request from put method";
$return = curlrequest($url, $data, "post");
 
var_dump($return);exit;
?>