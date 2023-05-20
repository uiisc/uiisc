
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?php echo $PageInfo['title']; ?></h3>
            <a href="index.php" class="btn btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <form class="card-body" action="controllers/smtp/edit.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">SMTP Hostname</label>
                        <input type="text" name="host" value="<?php echo $SMTPInfo['smtp_host']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">SMTP Username</label>
                        <input type="text" name="username" value="<?php echo $SMTPInfo['smtp_username']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">SMTP Password</label>
                        <input type="text" name="password" value="<?php echo $SMTPInfo['smtp_password']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">SMTP Port</label>
                        <input type="text" name="port" value="<?php echo $SMTPInfo['smtp_port']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Email From</label>
                        <input type="text" name="from" value="<?php echo $SMTPInfo['smtp_from']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <button name="submit" class="btn btn-primary"><?php echo $lang->I18N('Save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
        <hr />
        <form class="card-body" action="controllers/smtp/test.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Send Test Email'); ?></label>
                        <input type="text" name="email" class="form-control" placeholder="<?php echo $lang->I18N('input_email'); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">&nbsp;</label>
                        <button name="submit" class="btn btn-primary form-control"><?php echo $lang->I18N('Send Email'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
