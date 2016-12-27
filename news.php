<?php
	require_once ("core.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - News</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="<?=$author?>">
    <link href="favicon.ico?_=<?=$static_release?>" rel="icon">
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css?_=<?=$static_release?>" rel="stylesheet"><!--[if lt IE 9]>
    <script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script><!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<?php include ("nav.php"); ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>free hosting news</h2>
            <p>We proudly announce the following new features on all free hosting accounts!..</p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">1. cPanel x3 theme</h3>
        </div>
        <div class="panel-body">
            The popular and professional x3 theme is now available for all free hosting accounts.
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">2. Automatic HTTP/SSL</h3>
        </div>
        <div class="panel-body">
            We are the only webhost's in the world to offer automatic free SSL/HTTP's encryption on all free hosted domain names. You can instantly browse any domain on our network on a https:// url.
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">3. Softaculous 1 click script installer</h3>
        </div>
        <div class="panel-body">
            Softaculous is an auto installer for cPanel. Unlike other auto installers Softaculous is much faster, well designed and it installs all scripts in just ONE STEP.
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="media">
                <div class="media-left media-middle">
                    <img src="images/cluster.jpg" alt="rack">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Value for free</h4>
                    <p>Our cluster-based GRID network features hundreds of server nodes using the right software for the right job powered by Linux and Unix operating systems.</p>
                    <p><?=$title_s?> hosting has the right services for you and at the right price... $0.00!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ("footer.php"); ?>
</body>
</html>