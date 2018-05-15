<?php
  if(!defined('IN_SYS')) { 
    // exit('禁止访问');
    header("Location:"."index.php");
    exit;
  }
?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="<?=$author?>">
    <link href="favicon.ico?_=<?=$static_release?>" rel="icon">
    <link href="./css/bootstrap.min.css?_=<?=$static_release?>" rel="stylesheet">
    <link href="./css/style.css?_=<?=$static_release?>" rel="stylesheet">
    <script src="./js/ie-emulation-modes-warning.js?_=<?=$static_release?>"></script><!--[if lt IE 9]>
    <script src="./js/html5shiv.min.js"></script>
    <script src="./js/respond.min.js"></script><![endif]-->