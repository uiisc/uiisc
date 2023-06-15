<div class="container" id="login">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
            <form action="controllers/profile/forgetpassword.php" method="post">
                <h3 class="m-0 text-center"><?php echo $lang->I18N('Forget Password'); ?></h3>
                <hr />
                <div class="form-group mb-10">
                    <label class="form-label required"><?php echo $lang->I18N('Email Address'); ?></label>
                    <input type="email" name="email" class="form-control" placeholder="<?php echo $lang->I18N('input_email'); ?>">
                </div>
                <div class="form-group mb-10">
                    <button class="btn btn-primary btn-block" name="reset"><?php echo $lang->I18N('Reset Password'); ?></button>
                </div>
            </form>
            <div class="nav-links">
                <a href="login.php"><?php echo $lang->I18N('login'); ?></a>
            </div>
        </div>
    </div>
</div>
