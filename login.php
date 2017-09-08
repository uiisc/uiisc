<?php
  define('IN_SYS', true);
  require_once ("core.php");
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
  <meta charset="utf-8">
  <title><?=$title?> - <?php echo $LANG['login']; ?></title>
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
  <form class="form-signin" role="form" action="//cpanel.<?=$domain?>/login.php" method="post" name="login">
    <h2 class="form-signin-heading"><?php echo $LANG['please_login']; ?></h2>
    <input type="text" name="uname" class="form-control" placeholder="<?php echo $LANG['input_username']; ?>" required autofocus>
    <input type="password" name="passwd" class="form-control" placeholder="<?php echo $LANG['input_password']; ?>" required>
    <input type="hidden" name="language" value="<?php echo $LANG['language']; ?>">
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"><span><?php echo $LANG['remember_me']; ?></span>
        <a href="//cpanel.<?=$domain?>/lostpassword.php"><?php echo $LANG['lost_password']; ?></a>
      </label>
    </div>
    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block"><?php echo $LANG['login']; ?></button>
  </form>
</div>
<?php include ("footer.php"); ?>
</body>
</html>