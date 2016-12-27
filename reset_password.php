<?php
	require_once ("core.php");
    $domain = "uiisc.com";
    // $html = file_get_contents("http://cpanel.".$domain."/lostpassword.php");
    // preg_match('/<footer[^>]*id="footer"[^>]*>(.*?) <//footer>/si', $html, $match);
    $password_reset_token_id = "b374b5bd4e35d2cadd98caa77d68c19a";
    $logged_ipaddress = "116.228.234.98";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - Lost Password / Password Recovery</title>
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
    <!--<?=$match?>-->
    <!--<?=$str_code?>-->
    <blink>ipaddress logged <?=$logged_ipaddress?></blink>
    <h2 data-i18n="password_eset">Lost Password Retrieval System</h2>
    <form class="form-signin" role="form" action="http://cpanel.<?=$domain?>/passwords.php" method="post" name="password_reset">
        <h2 data-i18n="password_eset">Password Reset</h2>
        <input type="hidden" name="token" value="<?=$password_reset_token_id?>">
        <div class="form-group">
            <label for="inputUsername" class="control-label" data-i18n="username">Username</label>
            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" data-i18n="input_username" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="control-label" data-i18n="email">Email Address</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address" data-i18n="input_email" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block" data-i18n="Fetch">Fetch</button>
        </div>
    </form>
    <div class="row">
        <p>In the above form, enter the username and the REGISTERED email address that was used when signing up for the account.<br>
		We will then email the registered email address with reset account details.
        </p>
    </div>
</div>
<?php include ("footer.php"); ?>
</body>
</html>