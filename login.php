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