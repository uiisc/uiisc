<?php
  define('IN_SYS', true);
  require_once ("core.php");
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <?php include ("headmate.php"); ?>
</head>
<body class="fixed-header-on">
    <?php include ("nav.php"); ?>

    <div class="home">
      <div class="container home-banner">
        <div class="form-group form-domain">
          <div class="input-group input-group-lg">
            <!-- <span class="input-group-addon">www</span> -->
            <input type="text" class="form-control" id="domainInput" placeholder="DomainName">
            <span class="input-group-btn">
              <input type="button" class="btn btn-lg btn-default check-domain" value="Start" />
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Automated features!</h2>
          <img src="images/img6.jpg" alt="server" class="img-rounded">
          <!--<p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>-->
          <p>We provide free FTP, PHP 5.3, MySQL and our very popular feature: The Automatic Script Installer Fantastico can install many popular scripts such as PHPbb2 and PHPbb3, Wordpress, Zen-Cart, osCommerce, MyBB, UseBB, MyLittle Forum, 4images, Coppermine, SMF, Joomla, e107, XOOPS, PHP Wind, CuteNews, Mambo, WikiWig and many more! No need to wait a long time uploading files, Our Automatic Script Installer deploys your files in seconds!.</p>
        </div>
        <div class="col-md-6">
          <h2>Quotas and forum</h2>
          <img src="images/img5.jpg" alt="server" class="img-rounded">
          <p>Combined with our high bandwidth, space provisions and excellent sub-domain options, make us the optimal option. Our very popular Community Forums has been taken up excellently and active members are growing steadily, hence resulting in a better hosting and friendly experience..</p>
          <h3>Cluster servers</h3>
          <p>We are using a powerful cluster of webservers that are all interconnected to act as one giant super computer.</p>
        </div>
      </div>
    </div>

    <?php include ("footer.php"); ?>

    <script type="text/javascript">
      window.onscroll = function () {
        var a = document.documentElement.scrollTop || document.body.scrollTop;//滚动条y轴上的距离
        if (a > 0) {
          $('body').removeClass('fixed-header-on');
        } else {
          $('body').addClass('fixed-header-on');
        }
      }
      $('.check-domain').click(function () {
        subCheck();
      });
      $('#domainInput').keyup(function(event){
        if(event.keyCode == 13) {
          subCheck();
        }
      });
      function subCheck () {
        var domain = $('#domainInput').val()
        if (domain) {
          $.ajax({
            type: 'post',
            url: 'https://api.croidc.cn/mofh/DomainCheck',
            dataType: 'json',
            contentType : "application/json",
            data: JSON.stringify({
              domain: domain
            }),
            success: function (x) {
              console.log(x);
            }
          })
        }
      }
    </script>
</body>
</html>