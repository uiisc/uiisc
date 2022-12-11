
<div class="container-fluid" id="login">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="card mx-30" style="opacity: 80%">
                <form action="controllers/clients/forgetpassword.php" method="post">
                    <h5 class="m-0 text-center"><?php echo $lang->I18N('Forget Password'); ?></h5><hr>
                    <div class="mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Email Address'); ?></label>
                        <input type="email" name="email" required class="form-control" placeholder="<?php echo $lang->I18N('input_email'); ?>">
                    </div>
                    <div class="mb-10 d-grid">
                        <button class="btn btn-primary btn-block" name="reset"><?php echo $lang->I18N('Reset Password'); ?></button>
                    </div>
                </form>
                <div class="nav-links">
                    <a href="signup.php"><?php echo $lang->I18N('Signup'); ?></a> or <a href="login.php"><?php echo $lang->I18N('login'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
