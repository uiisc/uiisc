<?php
	require_once ("core.php");
    $security_id = md5(rand(6000,99999999999999991000));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="<?=$author?>">
    <link rel="icon" href="favicon.ico">
    <title><?=$domain?></title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css?v=<?=$static_release?>" rel="stylesheet"><!--[if lt IE 9]>
    <script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script><!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<?php include ("header.php"); ?>
<div class="container">
    <div class="row">
        <h2>Sign Up For Free Hosting</h2>
        <p>You can sign up here for fast free PHP & MySQL hosting including a free sub domain. 
        Fill out the form below and your free hosting account will be created.  <em>Enjoy :)</em><br>
        </p>
    </div>
        <form class="form-horizontal" role="form" method=post action="https://order.<?=$domain?>/register.php">
            <div class="form-group">
                <label for="inputUsername" class="col-sm-4 control-label">Username</label>
                <div class="col-sm-5">
                <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="<?php if (isset($_GET['username'])) { echo $_GET['username']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-5">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-4 control-label">Email Address</label>
                <div class="col-sm-5">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCategory" class="col-sm-4 control-label">Site Category</label>
                <div class="col-sm-5">
                    <select class="form-control" name="website_category" id="inputCategory">
                        <option>Choose from Below</option>
                        <option>Personal</option>
                        <option>Business</option>
                        <option>Hobby</option>
                        <option>Forum</option>
                        <option>Adult</option>
                        <option>Dating</option>
                        <option>Software / Download</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputLanguage" class="col-sm-4 control-label">Site Language</label>
                <div class="col-sm-5">
                    <select class="form-control" name="website_language" id="inputLanguage">
                        <option>Choose from Below</option>
                        <option>English</option>
                        <option>Non-English</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-4 control-label">Security Code</label>
                <div class="col-sm-5">
                <img width="90px" height="25px" src="https://order.<?=$domain?>/image.php?id=<?=$security_id?>">
                <input type="hidden" name="id" class="form-control" id="inputID" placeholder="ID" value="<?=$security_id?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSecurityCode" class="col-sm-4 control-label">Enter Security Code</label>
                <div class="col-sm-5">
                <input type="text" name="number" class="form-control" id="inputSecurityCode" placeholder="Security Code">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                <button type="submit" name="submit" class="btn btn-default">Register</button>
                </div>
            </div>
        </form>
</div>
<?php include ("footer.php"); ?>
<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>