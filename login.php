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
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $LANG['please_login']; ?></h3>
        </div>
        <div class="panel-body">
            <form class="form-group form-horizontal form-account" role="form" action="//cpanel.<?=$domain?>/login.php" method="post" name="login">
                <input type="text" name="uname" class="form-control" placeholder="<?php echo $LANG['input_username']; ?>" required autofocus autocomplete="off">
                <input type="password" name="passwd" class="form-control" placeholder="<?php echo $LANG['input_password']; ?>" required autocomplete="off">
                <input type="hidden" name="language" class="hide" value="<?php echo $LANG['language']; ?>">
                <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"><span><?php echo $LANG['remember_me']; ?></span>
                    <a href="//cpanel.<?=$domain?>/lostpassword.php"><?php echo $LANG['lost_password']; ?></a>
                </label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block"><?php echo $LANG['login']; ?></button>
            </form>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>

</body>
</html>