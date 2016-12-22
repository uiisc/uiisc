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

  <h2>Free hosting news</h2>
  <p>We proudly announce the following new features on all free hosting accounts!..<br></br>
<strong>1. cPanel x3 theme</strong> - The popular and professional x3 theme is now available for all free hosting accounts.<br>
<strong>2. Automatic HTTP/SSL</strong> - We are the only webhost's in the world to offer automatic free SSL/HTTP's encryption on all free hosted domain names.  You can instantly browse any domain on our network on a https:// url.<br>
<strong>3. Softaculous 1 click script installer</strong> - Softaculous is an auto installer for cPanel.
Unlike other auto installers Softaculous is much faster, well designed and it installs all scripts in just ONE STEP. 
    <div class="floating-box">
      <p><img src="images/cluster.jpg" alt="" width="200" height="150" title="rack" /></p>
    </div>
    <div class="floating-box" style="margin-right: 20px;">
      <h2 class="title">Value for free</h2>
<p>
Our cluster-based GRID network features hundreds of server nodes using the right software for the right job powered by Linux and Unix operating systems.
<br><? echo "$yourdomain" ;?> hosting has the right services for you and at the right price... $0.00!</p>
 </div>
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
