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
      <h1>Welcome to <? echo "$yourdomain" ;?></h1>
      <p><strong><? echo "$yourdomain" ;?></strong> are specialists in free hosting services</p>

<li>1000 MB Disk Space</li>
<li>FTP account and File Manager</li>
<li>Control Panel</li>
<li>MySQL databases &amp; PHP Support</li>
<li>Free tech support</li>
<li>Addon domain, Parked Domains, Sub-Domains</li>
<li>Free Community Access (Forums)</li>
<li>Clustered Servers</li>
<li>Webmail email Accounts</li>
<li>Softaculous</li>
<li>Cron Jobs</li>
<li>SPF Records</li>
<li> Automatic Self Signed SSL</li>
    </div>

    <div class="floating-box" style="margin-right: 20px;">
      <p><img src="images/img6.jpg" alt="server" width="200" height="90" title="server" /></p>
      <h2 class="title">Automated features</h2>
      <p>We provide free FTP, PHP 5.3, MySQL and our very popular feature: The Automatic Script Installer Fantastico can install many popular scripts such as PHPbb2 and PHPbb3, Wordpress, Zen-Cart, osCommerce, MyBB, UseBB, MyLittle Forum, 4images, Coppermine, SMF, Joomla, e107, XOOPS, PHP Wind, CuteNews, Mambo, WikiWig and many more! No need to wait a long time uploading files, Our Automatic Script Installer deploys your files in seconds!.</p>
      <ul>
  

      </ul>
    </div>
    <div class="floating-box">
      <p><img src="images/img5.jpg" alt="server" width="200" height="90" title="server" /></p>
      <h2 class="title">Quotas and forum</h2>
      <p>Combined with our high bandwidth, space provisions and excellent sub-domain options, make us the optimal option. Our very popular Community Forums has been taken up excellently and active members are growing steadily, hence resulting in a better hosting and friendly experience..</p>
      <h3>Cluster servers</h3>
      <p>We are using a powerful cluster of webservers that are all interconnected to act as one giant super computer.</p>
      <ol>


      </ol>
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
      <h2>Faster webpages</h2>
      <blockquote>
        <p>The powerful cluster technology is years ahead of other hosting companies. Combining the power of lots of server simultaneously creates lightening fast website speeds. Not only is the service extremely fast, it is resistant to common failures that effect 'single server' hosting, used by most other free and paid hosting providers. </p>
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
