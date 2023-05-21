<?php

if (!defined('IN_CRONLITE')) {
    exit();
}

require __DIR__ . '/header.php';

?>

<div class="container-fluid" id="login">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="card mx-30" style="opacity: 80%">
                <h5 class="text-center my-0">Database Configuration</h5><hr>
                <form action="function/configuration.php" method="post">
                    <div class="mb-5">
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
                        <input type="text" name="prefix" class="form-control" placeholder="Enter database prefix here(default:hosting)">
                    </div>
                    <div class="mt-15">
                        <input type="submit" name="submit" class="btn btn-primary" value="Validate">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/footer.php';?>
