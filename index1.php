<?php
	require_once ("core.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="<?=$author?>">
    <link href="favicon.ico?_=<?=$static_release?>" rel="icon">
    <link href="//ajax.aspnetcdn.com/ajax/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css?_=<?=$static_release?>" rel="stylesheet"><!--[if lt IE 9]>
    <script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script><!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<?php include ("nav.php"); ?>
<div class="container">
	<div class="jumbotron">
		<h1>Instant activation</h1>
        <p>Free hosting accounts are activated instantly, no need to wait for manual approval, you can start building your pages immediately!  A powerful Vista Panel control panel is provided to manage your website, packed with hundreds of great features including Email, FTP add-on domain ...</p>
		<p>
			<a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">More &raquo;</a>
		</p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Automated features!</h2>
            <img src="images/img6.jpg" alt="server" class="img-rounded">
            <!--<p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>-->
            <p>We provide free FTP, PHP 5.3, MySQL and our very popular feature: The Automatic Script Installer Fantastico can install many popular scripts such as PHPbb2 and PHPbb3, Wordpress, Zen-Cart, osCommerce, MyBB, UseBB, MyLittle Forum, 4images, Coppermine, SMF, Joomla, e107, XOOPS, PHP Wind, CuteNews, Mambo, WikiWig and many more! No need to wait a long time uploading files, Our Automatic Script Installer deploys your files in seconds!.</p>
        </div>
        <div class="col-md-6">
            <h2>Quotas and forum</h2>
            <img src="images/img5.jpg" alt="server" class="img-rounded">
            <p>Combined with our high bandwidth, space provisions and excellent sub-domain options, make us the optimal option. Our very popular Community Forums has been taken up excellently and active members are growing steadily, hence resulting in a better hosting and friendly experience..</p>
            <h3>Cluster servers</h3>
            <p>We are using a powerful cluster of webservers that are all interconnected to act as one giant super computer.</p>
        </div>
    </div>
</div>
<?php include ("footer.php"); ?>
</body>
</html>