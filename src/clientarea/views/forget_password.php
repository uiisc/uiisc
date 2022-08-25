<?php
if (!defined('IN_CRONLITE')) {
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
                    <h3 class="panel-title"><?php echo $lang->I18N('password_reset'); ?></h3>
                </div>
                <div class="panel-body">
                    <p>If you have forgotten your password, you can reset it here. When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
                    <p>Please fill in credentials to get a link to reset password.</p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address: <sup>*</sup></label>
                            <input type="email" name="email" value="<?php echo ($data['email']); ?>" class="form-control <?php echo (isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo isset($err["email_err"]) ? $err["email_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="reset_request" value="Send Reset Link" class="btn btn-default">
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-right">
                    <a href="<?php echo setRouter('clientarea', 'login'); ?>">Go Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
