<?php
	require_once ("core.php");
    $security_id = md5(rand(6000,99999999999999991000));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="<?=$author?>">
    <link rel="icon" href="favicon.ico?_=<?=$static_release?>">
    <link href="//ajax.aspnetcdn.com/ajax/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css?_=<?=$static_release?>" rel="stylesheet"><!--[if lt IE 9]>
    <script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script><!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<?php include ("header.php"); ?>
<div class="container">
    <div class="row">
        <h2>Sign Up<!-- For Free Hosting--></h2>
        <p>You can sign up here for fast free PHP & MySQL hosting including a free sub domain. 
        Fill out the form below and your free hosting account will be created.  <em>Enjoy :)</em><br>
        </p>
    </div>
    <form class="form-horizontal" role="form" method=post action="https://order.<?=$domain?>/register.php">
        <div class="form-group">
            <label for="inputUsername" class="col-sm-4 control-label" data-i18n="username">Username</label>
            <div class="col-sm-5">
            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" data-i18n="input_username" value="<?php if (isset($_GET['username'])) { echo $_GET['username']; }?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label" data-i18n="password">Password</label>
            <div class="col-sm-5">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" data-i18n="input_password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-sm-4 control-label" data-i18n="email">Email Address</label>
            <div class="col-sm-5">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address" data-i18n="input_email" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; }?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategory" class="col-sm-4 control-label" data-i18n="site_category">Site Category</label>
            <div class="col-sm-5">
                <select class="form-control" name="website_category" id="inputCategory">
                    <option data-i18n="choose_from_below">Choose from Below</option>
                    <option data-i18n="personal">Personal</option>
                    <option data-i18n="business">Business</option>
                    <option data-i18n="hobby">Hobby</option>
                    <option data-i18n="forum">Forum</option>
                    <option data-i18n="adult">Adult</option>
                    <option data-i18n="dating">Dating</option>
                    <option data-i18n="software_download">Software / Download</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputLanguage" class="col-sm-4 control-label" data-i18n="site_language">Site Language</label>
            <div class="col-sm-5">
                <select class="form-control" name="website_language" id="inputLanguage">
                    <option data-i18n="choose_from_below">Choose from Below</option>
                    <option data-i18n="english">English</option>
                    <option data-i18n="non_english">Non-English</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputID" class="col-sm-4 control-label" data-i18n="security_code">Security Code</label>
            <div class="col-sm-5">
            <img width="90px" height="25px" src="https://order.<?=$domain?>/image.php?id=<?=$security_id?>">
            <input type="hidden" name="id" class="form-control" id="inputID" placeholder="ID" value="<?=$security_id?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputSecurityCode" class="col-sm-4 control-label" data-i18n="input_security_code">Enter Security Code</label>
            <div class="col-sm-5">
            <input type="text" name="number" class="form-control" id="inputSecurityCode" placeholder="Input Above Security Code" data-i18n="input_security_code_above">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-6">
            <button type="submit" name="submit" class="btn btn-default" data-i18n="signup">Register</button>
            </div>
        </div>
    </form>
</div>
<?php include ("footer.php"); ?>
</body>
</html>