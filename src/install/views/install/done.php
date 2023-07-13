<?php

if (!defined('IN_CRONLITE')) {
    exit();
}

require APP_ROOT . '/views/header.php';

?>

<div class="container" id="login">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 center-block" style="float: none;">
            <h1 class="page-header">UIISC</h1>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
                </div>
                <div class="panel-body text-center">
                    <i class="fa fa-info-circle fa-5x icon-text"></i>
                    <h3 class="my-10">Congratulations</h3>
                    <p class="my-5">You have successfully installed UIISC.</p>
                    <p class="my-5">Please click on the button bellow to log into your admin panel. <i class="fa fa-smile"></i></p>
                    <p class="my-5">Don't forget to rename or delete the install folder.
                    <p class="mb-5"><a href="../admin/" class="btn btn-primary">Login Now!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APP_ROOT . '/views/footer.php'; ?>
