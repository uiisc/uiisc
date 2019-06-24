<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php echo getMsg("msg_notify"); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Register</h3>
                </div>
                <div class="panel-body">
                    <p>Please fill in credentials to Sign Up.</p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="name" name="name" value="<?php echo ($data['name']); ?>" class="form-control <?php echo (isset($err['name_err'])) ? 'is-invalid' : ''; ?>" autocomplete="off">
                            <span class="text-warning"><?php echo ($err["name_err"]); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="username">Username: <sup>*</sup></label>
                            <input type="text" name="username" value="<?php echo ($data['username']); ?>" class="form-control <?php echo (isset($err['username_err'])) ? 'is-invalid' : ''; ?>" autocomplete="off">
                            <span class="text-warning"><?php echo ($err["username_err"]); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" value="<?php echo ($data['email']); ?>" class="form-control <?php echo (isset($err['email_err'])) ? 'is-invalid' : ''; ?>" autocomplete="off">
                            <span class="text-warning"><?php echo ($err['email_err']); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="url">Your Website URL: <sup>*</sup></label>
                            <input type="text" name="website" value="<?php echo ($data['website']); ?>" class="form-control <?php echo (isset($err['website_err'])) ? 'is-invalid' : ''; ?>" autocomplete="off">
                            <span class="text-warning"><?php echo ($err['website_err']); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" value="<?php echo ($data['password']); ?>" class="form-control <?php echo (isset($err['password_err'])) ? 'is-invalid' : ''; ?>" autocomplete="off">
                            <span class="text-warning"><?php echo ($err['password_err']); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm_password" value="<?php echo ($data['confirm_password']); ?>" class="form-control <?php echo (isset($err['confirm_password_err'])) ? 'is-invalid' : ''; ?>" autocomplete="off">
                            <span class="text-warning"><?php echo ($err['confirm_password_err']); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" value="Register" class="btn btn-default">
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-right">
                    <a href="<?php echo setRouter('clientarea', 'login'); ?>">Have account ? Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
