
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?php echo $PageInfo['title']; ?></h3>
            <a href="index.php" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <form class="card-body" action="controllers/sslapi/edit.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">SSL API Username</label>
                        <input type="text" name="username" value="<?php echo $SSLApi['api_username']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">SSL API Password</label>
                        <input type="text" name="password" value="<?php echo $SSLApi['api_password']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr />
                    <button name="submit" class="btn btn-primary"><?php echo $lang->I18N('Save'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
