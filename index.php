<?php
    define('IN_SYS', true);
    require_once ("core.php");
?>
<?php include ("include/header.php"); ?>

    <div class="container">
        <div class="jumbotron">
            <h1>Instant activation</h1>
            <p>Free hosting accounts are activated instantly, no need to wait for manual approval, you can start building your pages immediately!  A powerful Vista Panel control panel is provided to manage your website, packed with hundreds of great features including Email, FTP add-on domain ...</p>
            <p><a class="btn btn-primary" href="register.php" role="button">Get More &raquo;</a></p>
        </div>
    </div>
    <!-- <div class="container">
        <div class="form-group">
            <label for="domainInput">Domain</label>
            <input type="text" class="form-control" id="domainInput" placeholder="uiisc.com">
            <input type="button" class="btn btn-default check-domain" value="Check" />
        </div>
        <button class="btn btn-default check-domain">Check</button>
    </div> -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Automated features!</h2>
                <p><img src="assets/images/img6.jpg" alt="server" class="img-rounded"></p>
                <p>We provide free FTP, PHP 5.3, MySQL and our very popular feature: The Automatic Script Installer Fantastico can install many popular scripts such as PHPbb2 and PHPbb3, Wordpress, Zen-Cart, osCommerce, MyBB, UseBB, MyLittle Forum, 4images, Coppermine, SMF, Joomla, e107, XOOPS, PHP Wind, CuteNews, Mambo, WikiWig and many more! No need to wait a long time uploading files, Our Automatic Script Installer deploys your files in seconds!.</p>
            </div>
            <div class="col-md-6">
                <h2>Quotas and forum</h2>
                <p><img src="assets/images/img5.jpg" alt="server" class="img-rounded"></p>
                <p>Combined with our high bandwidth, space provisions and excellent sub-domain options, make us the optimal option. Our very popular Community Forums has been taken up excellently and active members are growing steadily, hence resulting in a better hosting and friendly experience..</p>
                <h3>Cluster servers</h3>
                <p>We are using a powerful cluster of webservers that are all interconnected to act as one giant super computer.</p>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        $('.check-domain').click(function () {
            var domain = $('#domainInput').val()
            if (domain) {
                $.ajax({
                    method: 'post',
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
        })
    </script> -->
<?php include ("include/footer.php"); ?>