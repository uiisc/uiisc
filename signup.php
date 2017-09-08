<?php
  define('IN_SYS', true);
  require_once ("core.php");
   $security_id = md5(rand(6000,getrandmax())); // $security_id = md5(rand(6000,PHP_INT_MAX));
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
  <meta charset="utf-8">
  <title><?=$title?> - <?php echo $LANG['signup']; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="<?=$description?>">
  <meta name="author" content="<?=$author?>">
  <link href="favicon.ico?_=<?=$static_release?>" rel="icon">
  <link href="//<?=$static_bootstrap_css?>" rel="stylesheet">
  <link href="./css/style.css?_=<?=$static_release?>" rel="stylesheet"><!--[if lt IE 9]>
  <script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="./js/ie-emulation-modes-warning.js"></script><!--[if lt IE 9]>
  <script src="//apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
  <script src="//apps.bdimg.com/libs/respond.js/1.4.2/respond.js"></script><![endif]-->
</head>
<body>
<?php include ("nav.php"); ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h2><?php echo $LANG['signup_free_hosting']; ?></h2>
            <p>You can sign up here for fast free PHP & MySQL hosting including a free sub domain. Fill out the form below and your free hosting account will be created.  <em>Enjoy :)</em></p>
        </div>
    </div>
    <div class="panel panel-default">
        <!--<div class="panel-heading">
            <h3 class="panel-title"><h2>Sign Up</h2>
            <p>You can sign up here for fast free PHP & MySQL hosting including a free sub domain. 
            Fill out the form below and your free hosting account will be created.  <em>Enjoy :)</em>
            </p></h3>
        </div>-->
        <div class="panel-body">
            <form class="form-horizontal" role="form" method=post action="//order.<?=$domain?>/register.php"><!--remote_reg.php-->
                <input type="hidden" name="plan_name" value="free webhosting">
                <div class="form-group">
                    <label for="inputUsername" class="col-sm-4 control-label"><?php echo $LANG['username']; ?></label>
                    <div class="col-sm-5">
                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="<?php echo $LANG['input_username']; ?>" value="<?php if (isset($_GET['username'])) { echo $_GET['username']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-4 control-label"><?php echo $LANG['password']; ?></label>
                    <div class="col-sm-5">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="<?php echo $LANG['input_password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-4 control-label"><?php echo $LANG['email']; ?></label>
                    <div class="col-sm-5">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="<?php echo $LANG['input_email']; ?>" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; }?>">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputCategory" class="col-sm-4 control-label"><?php echo $LANG['site_category']; ?></label>
                  <div class="col-sm-5">
                    <select class="form-control" name="website_category" id="inputCategory">
                      <option><?php echo $LANG['choose_from_below']; ?></option>
                      <option><?php echo $LANG['personal']; ?></option>
                      <option><?php echo $LANG['business']; ?></option>
                      <option><?php echo $LANG['hobby']; ?></option>
                      <option><?php echo $LANG['forum']; ?></option>
                      <option><?php echo $LANG['dating']; ?></option>
                      <option><?php echo $LANG['software_download']; ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputLanguage" class="col-sm-4 control-label"><?php echo $LANG['site_language']; ?></label>
                    <div class="col-sm-5">
                        <select class="form-control" name="website_language" id="inputLanguage">
                            <option><?php echo $LANG['choose_from_below']; ?></option>
                            <option data-i18n="english">English</option>
                            <option data-i18n="non_english">Non-English</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID" class="col-sm-4 control-label"><?php echo $LANG['security_code']; ?></label>
                    <div class="col-sm-5">
                    <img width="90px" height="25px" src="./security_code.php?id=<?=$security_id?>">
                    <input type="hidden" name="id" class="form-control" id="inputID" value="<?=$security_id?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSecurityCode" class="col-sm-4 control-label"><?php echo $LANG['input_security_code']; ?></label>
                    <div class="col-sm-5">
                    <input type="text" name="number" class="form-control" id="inputSecurityCode" placeholder="<?php echo $LANG['input_security_code_above']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="submit" class="btn btn-default"><?php echo $LANG['signup']; ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("footer.php"); ?>
</body>
</html>