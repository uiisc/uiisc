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
                    <h3 class="panel-title">Reset Password</h3>
                </div>
                <div class="panel-body">
                    <p>Please fill in credentials to Reset Password.</p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="reset_code">Reset code: <sup>*</sup></label>
                            <input type="text" name="reset_code" id="reset_code" value="<?php echo ($reset_code); ?>" class="form-control" readonly>
                            <span class="text-warning"><?php echo isset($err["code_err"]) ? $err["code_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password: <sup>*</sup></label>
                            <input type="password" name="new-password" id="new-password" autocomplete="new-password" value="<?php echo ($data['password']); ?>" class="form-control <?php echo (isset($err['password_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo isset($err["password_err"]) ? $err["password_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm-password" id="confirm-password" autocomplete="confirm-password" value="<?php echo ($data['confirm_password']); ?>" class="form-control <?php echo (isset($err['confirm_password_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo isset($err["confirm_password_err"]) ? $err["confirm_password_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="reset_password" value="Reset Password" class="btn btn-default">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
