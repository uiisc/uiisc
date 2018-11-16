<?php
  define('IN_SYS', true);
  require_once ("core.php");
  $domain = "uiisc.com";
  $logged_ipaddress = "116.228.234.98";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - Lost Password / Password Recovery</title>
    <?php include ("headmate.php"); ?>
</head>
<body>
<?php include ("nav.php"); ?>

<div class="container">
    <blink>ipaddress logged <?=$logged_ipaddress?></blink>
    <!-- <h2 data-i18n="password_eset">Lost Password Retrieval System</h2> -->
    <div class="form-group form-horizontal form-account">
        <!-- <h2 data-i18n="password_eset">Password Reset</h2> -->
        <input type="hidden" name="ipaddress" value="<?=$logged_ipaddress?>">
        <div class="form-group">
            <label for="inputUsername" class="control-label" data-i18n="username">Username</label>
            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" data-i18n="input_username" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="control-label" data-i18n="email">Email Address</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address" data-i18n="input_email" required>
        </div>
        <div class="form-group">
            <label>Not yet have an account ?</label>
            <label><a href="register.php"><?php echo $LANG['register']; ?></a></label>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
        </div>
    </div>
    <div class="row">
        <p>In the above form, enter the username and the REGISTERED email address that was used when signing up for the account.<br>
		We will then email the registered email address with reset account details.
        </p>
    </div>
</div>
<?php include ("footer.php"); ?>
</body>
</html>