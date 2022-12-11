<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center px-5 pt-15">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <a href="index.php" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <form action="controllers/sslapi/edit.php" method="post">
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
                    <div class="mb-10 px-10">
                        <button name="submit" class="btn btn-sm btn-primary"><?php echo $lang->I18N('Save'); ?></button>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
            </div>
        </form>
    </div>
</div>
