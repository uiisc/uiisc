<?php

if (!defined('IN_CRONLITE')) {
    exit();
}

require __DIR__ . '/header.php';

?>

<div class="container" id="login">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 center-block" style="float: none;">
            <h1 class="page-header">UIISC</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
                </div>
                <div class="panel-body text-center">
                    <i class="fa fa-info-circle fa-5x icon-text"></i>
                    <h3 class="my-10">Installation</h3>
                    <p class="my-5">Hi there! looks like you have not installed UIISC yet. Click the button bellow to start the installation. <i class="fa fa-smile"></i></p>
                    <p class="my-5">
                        <strong><i>Warning!</i> This software is not secure, and client information can be leaked in seconds. Do not use this software in a production or public envirement. Falure the abide by the previous statement may result in legal action by clients when you are hacked.</strong>
                        <br><br>
                        By clicking the button below, you acknowledge that this software in insecure, and release UIISC, as well as all maiantainers, from any and all legal action.
                    </p>
                    <p class="my-5"><a href="install.php" class="btn btn-primary">Install Now!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/footer.php';?>
