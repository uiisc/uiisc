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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
                </div>
                <form action="controllers/config.php" method="post">
                    <div class="panel-body">
                        <div class="mb-5">
                            <label class="form-label">Site Name</label>
                            <input type="text" name="site_name" class="form-control" placeholder="Enter Site Name here...">
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Clientarea Brand</label>
                            <input type="text" name="site_brand" class="form-control" placeholder="Enter Brand name here...">
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Clientarea Company</label>
                            <input type="text" name="site_company" class="form-control" placeholder="Enter Company name here...">
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Clientarea Path</label>
                            <input type="text" name="site_path" class="form-control" placeholder="Enter Clientarea url here...">
                        </div>
                        <div>
                            <label class="form-label">Clientarea Email</label>
                            <input type="text" name="site_email" class="form-control" placeholder="Enter Clientarea email here...">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" name="submit" class="btn btn-primary mb-0" value="Next Step">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APP_ROOT . '/views/footer.php';?>
