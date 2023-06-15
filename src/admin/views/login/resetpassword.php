<div class="container" id="login">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
            <form action="controllers/profile/resetpassword.php" method="post" onsubmit="
                var password = document.getElementById('password').value;
                var cpassword = document.getElementById('cpassword').value;
                if(password != cpassword){
                    alert('Password not match');
                    return false;
                }
                return true;
            ">
                <h3 class="m-0 text-center"><?php echo $lang->I18N('Reset Password'); ?></h3><hr>
                <div class="form-group">
                    <label class="form-label required"><?php echo $lang->I18N('Reset Token'); ?></label>
                    <input type="text" name="token" class="form-control" placeholder="<?php echo $lang->I18N('Input Reset Token'); ?>">
                </div>
                <div class="form-group">
                    <label class="form-label required"><?php echo $lang->I18N('Password'); ?></label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo $lang->I18N('input_password'); ?>">
                </div>
                <div class="form-group">
                    <label class="form-label required"><?php echo $lang->I18N('Confirm Password'); ?></label>
                    <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="<?php echo $lang->I18N('Input Confirm Password'); ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" name="reset"><?php echo $lang->I18N('Reset Password'); ?></button>
                </div>
            </form>
            <div class="nav-links">
                <a href="login.php"><?php echo $lang->I18N('login'); ?></a>
            </div>
        </div>
    </div>
</div>
</div>
