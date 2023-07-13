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
                <form action="controllers/database.php" method="post">
                    <div class="panel-body">
                        <div class="mb-10">
                            <label class="form-label">Database Hostname</label>
                            <input type="text" name="hostname" class="form-control" placeholder="Enter database hostname here...">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Database Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter database username here...">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Database Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter database password here...">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Database Name</label>
                            <input type="text" name="dbname" class="form-control" placeholder="Enter database name here...">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Database Port</label>
                            <input type="text" name="dbport" class="form-control" placeholder="Enter database port here(default:3306)">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Database prefix</label>
                            <input type="text" name="prefix" class="form-control" placeholder="Enter database prefix here(default:uiisc)">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Validate">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APP_ROOT . '/views/footer.php';?>
