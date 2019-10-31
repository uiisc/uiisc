<?php
define('IN_SYS', true);
require_once ("core.php");
// $security_id = md5(rand(6000,getrandmax())); // $security_id = md5(rand(6000,99999999999999991000));
$security_id = $_GET["id"];

header('Content-Type:image/png');
$url = "http://order.uiisc.com/image.php?id=".$security_id."";//图片链接
$ch = curl_init();
// Cookie:PHPSESSID=121b1127dcded8702c6a1e702c40eca4
curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch,CURLOPT_COOKIE,'PHPSESSID=121b1127dcded8702c6a1e702c40eca4'); // 如果不需要cookies就删除这条语句
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
curl_setopt($ch, CURLOPT_TIMEOUT,0); // 忽略超时
curl_setopt($ch, CURLOPT_NOBODY, false);
$str = curl_exec($ch);
curl_close($ch);