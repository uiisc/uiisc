<?php
    require_once ("core.php");
    $domain = "uiisc.com";
    $post_data = $_POST;
    print_r($post_data);
    $data = file_get_contents("php://input");
    $url = "http://order.".$domain."/register.php";
    // $data = $post_data;
    $return = curlrequest($url, $post_data, "post");

    var_dump($return);exit;
