
<div class="container-fluid" id="login">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="card mx-30" style="opacity: 80%">
                <form action="controllers/login/login.php" method="post">
                    <h5 class="m-0 text-center"><?php echo $lang->I18N('login'); ?></h5><hr>
                    <div class="mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('email'); ?></label>
                        <input type="email" name="email" class="form-control" placeholder="<?php echo $lang->I18N('input_email'); ?>">
                    </div>
                    <div class="mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('password'); ?></label>
                        <input type="password" name="password" class="form-control" placeholder="<?php echo $lang->I18N('input_password'); ?>">
                    </div>
                    <div class="form-group">
                        <div class="custom-switch">
                            <input type="checkbox" name="remember" value="1" id="remember-my-information">
                            <label for="remember-my-information"><?php echo $lang->I18N('Remember me'); ?></label>
                        </div>
                    </div>
                    <div class="mb-10 d-grid">
                        <button class="btn btn-primary btn-block" name="login"><?php echo $lang->I18N('login'); ?></button>
                    </div>
                </form>
                <div class="nav-links">
                    <a href="forgetpassword.php"><?php echo $lang->I18N('password_lost'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
