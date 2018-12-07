<?php
  define('IN_SYS', true);
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
    <?php include ("headmate.php"); ?>
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
            <button type="submit" name="submit" class="btn btn-primary btn-block" data-i18n="Fetch">Fetch</button>
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