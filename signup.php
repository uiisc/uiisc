<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><? echo "$yourdomain" ;?>web hosting</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <? 
    $yourdomain = $_SERVER['HTTP_HOST'];
    $yourdomain = preg_replace('/^www\./' , '' , $yourdomain);
    ?>

 <? include ("menu.php"); ?>

<div id="page">
  <div id="content">
    <div id="welcome">
<h2>Sign Up For Free Hosting</h2>
<p>You can sign up here for fast free PHP & MySQL hosting including a free sub domain. 
Fill out the form below and your free hosting account will be created.  <em>Enjoy :)</em><br>
</p>

<td style="text-align: left;" colspan="21">
<font size="-1"><span style="font-family: Helvetica,Arial,sans-serif;">
<form method=post action="http://order.<? echo "$yourdomain" ;?>/register.php">
<table>
<tr><th style="text-align: left;">Username<td><input type=text name=username size=20 value="<?PHP if (isset($_GET['username'])) { echo $_GET['username']; }?>">
<tr><th>&nbsp;<td>&nbsp;
<tr><th style="text-align: left;">Password<td><input type=password name=password size=20>
<tr><th>&nbsp;<td>&nbsp;
<tr><th style="text-align: left;">Email Address<td><input type=text name=email size=20 value="<?PHP if (isset($_GET['email'])) { echo $_GET['email']; }?>">

<tr><th style="text-align: left;">Site Category<td><select size="1" name="website_category">
<option>Choose from Below</option>
<option>Personal</option>
<option>Business</option>
<option>Hobby</option>
<option>Forum</option>
<option>Adult</option>
<option>Dating</option>
<option>Software / Download</option>
</select>
</td>

<tr><th style="text-align: left;"><td>
</td>

<tr><th style="text-align: left;">Site Language<td>
<select size="1" name="website_language">
<option>Choose from Below</option>
<option>English</option>
<option>Non-English</option>
</select>
</td>

<tr><th>&nbsp;<td>&nbsp;
<?PHP 
$id = md5(rand(6000,99999999999999991000));
?>
<input type=hidden name=id value="<?PHP echo $id; ?>">
<tr><th style="text-align: left;">Security Code<td><img width="250px" height="90px" src="http://order.<? echo "$yourdomain" ;?>/image.php?id=<?PHP echo $id; ?>">
<tr><th>&nbsp;<td>&nbsp;
<tr><th style="text-align: left;">Enter Security Code<td><input type=text name=number size=20>
<tr><th>&nbsp;<td>&nbsp;

<tr><th colspan=2><input type=submit value="Register" name=submit>
</table>
</form>		
</span>
<br style="font-family: Helvetica,Arial,sans-serif;">
      </font>
      <br style="font-family: Helvetica,Arial,sans-serif;">
      </span></font>
By signing up for our free hosting, you accept and agree to our <br><a href="https://ifastnet.com/portal/terms.php">Terms of Service</a>
</td>

    </div>
  </div>
  <!-- end #content -->
  <div id="sidebar">
    <div id="links">
      <ul>

    <li class="first"><a href="index.php"><b>H</b>omepage</a></li>
    <li><a href="signup.php" accesskey="A"><b>S</b>ignup</a></li>
    <li><a href="news.php" accesskey="P"><b>P</b>roduct new</a></li>
    <li><a href="contact.php" accesskey="U">Contact <b>U</b>s</a></li>
    <li><a href="https://ifastnet.com/portal/terms.php" accesskey="S"><b>T</b>erms of service</a></li>
      </ul>
    </div>
    <div>
      <h2>Instant activation</h2>
      <blockquote>
        <p>Free hosting accounts are activated instantly, no need to wait for manual approval, you can start building your pages immediately!  A powerful Vista Panel control panel is provided to manage your website, packed with hundreds of great features including Email, FTP add-on domain and much more..</p>
      </blockquote>
    </div>
  </div>
  <!-- end #sidebar -->
  <div style="clear: both; height: 1px;"></div>
</div>
<!-- end #page -->
 <? include ("footer.php"); ?>

</body>
</html>
