<?php
	require_once ("core.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - Login</title>
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
    <form class="form-signin" role="form" action="//cpanel.<?=$domain?>/login.php" method="post" name="login">
        <h2 class="form-signin-heading" data-i18n="please_login">Please sign in</h2>
        <input type="text" name="uname" class="form-control" placeholder="Username" data-i18n="input_username" required autofocus>
        <input type="password" name="passwd" class="form-control" placeholder="Password" data-i18n="input_password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"><span data-i18n="remember_me"> Remember me</span>
                <a href="https://panel.byethost.com/lostpassword.php" data-i18n="lost_password">Lost your password?</a>
            </label>
        </div>
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block" data-i18n="login">Sign in</button>
    </form>
</div>
<?php include ("footer.php"); ?>
</body>
</html>