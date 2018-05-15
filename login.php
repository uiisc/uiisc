<?php
  define('IN_SYS', true);
  require_once ("core.php");
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
  <meta charset="utf-8">
  <title><?=$title?> - <?php echo $LANG['login']; ?></title>
  <?php include ("headmate.php"); ?>
</head>

<body>
<?php include ("nav.php"); ?>

  <div class="bs-docs-header">
    <div class="container">
      <h1><?php echo $LANG['please_login']; ?></h1>
      <p>Enter your Username and Password</p>
    </div>
  </div>
  <div class="container">
    <form class="form-group form-horizontal form-account" role="form" action="//cpanel.<?=$domain?>/login.php" method="post" name="login">
      <div class="form-group">
        <label for="inputUsername" class="control-label">Username</label>
        <input type="text" name="uname" class="form-control" id="inputUsername" placeholder="<?php echo $LANG['input_username']; ?>" required autofocus>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="control-label">Password</label>
        <input type="password" name="passwd" class="form-control" id="inputPassword" placeholder="<?php echo $LANG['input_password']; ?>" required autofocus>
      </div>
      <input type="hidden" name="language" value="<?php echo $LANG['language']; ?>">
      <div class="form-group">
        <label><input type="checkbox" value="remember-me"> <span><?php echo $LANG['remember_me']; ?></span></label>
        <label><a href="resetpass.php"><?php echo $LANG['lost_password']; ?></a></label>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block"><?php echo $LANG['login']; ?></button>
      </div>
    </form>
  </div>

<?php include ("footer.php"); ?>

</body>
</html>