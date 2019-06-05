<?php
    define('IN_SYS', true);
    require_once ("core.php");
    $title = $title . ' - ' . $LANG['news'];
?>
<?php include ("include/header.php"); ?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>free hosting news</h2>
                <p>We proudly announce the following new features on all free hosting accounts!..</p>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">1. cPanel x3 theme</h3>
            </div>
            <div class="panel-body">
                The popular and professional x3 theme is now available for all free hosting accounts.
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">2. Automatic HTTP/SSL</h3>
            </div>
            <div class="panel-body">
                We are the only webhost's in the world to offer automatic free SSL/HTTP's encryption on all free hosted domain names. You can instantly browse any domain on our network on a https:// url.
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">3. Softaculous 1 click script installer</h3>
            </div>
            <div class="panel-body">
                Softaculous is an auto installer for cPanel. Unlike other auto installers Softaculous is much faster, well designed and it installs all scripts in just ONE STEP.
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <div class="media-left media-middle">
                        <img src="assets/images/cluster.jpg" alt="rack">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Value for free</h4>
                        <p>Our cluster-based GRID network features hundreds of server nodes using the right software for the right job powered by Linux and Unix operating systems.</p>
                        <p><?=$title_s?> hosting has the right services for you and at the right price... $0.00!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ("include/footer.php"); ?>
