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
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <p>Please fill in credentials to Change Password.</p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="current-password">Current Password: <sup>*</sup></label>
                            <input type="password" name="old_password" id="current-password" value="<?php echo ($data['old_password']); ?>" class="form-control <?php echo (isset($err['old_password_err'])) ? 'is-invalid' : ''; ?>" autocomplete="current-password">
                            <span class="text-warning"><?php echo isset($err["old_password_err"]) ? $err["old_password_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password: <sup>*</sup></label>
                            <input type="password" name="password" id="new-password" value="<?php echo ($data['password']); ?>" class="form-control <?php echo (isset($err['password_err'])) ? 'is-invalid' : ''; ?>" autocomplete="new-password">
                            <span class="text-warning"><?php echo isset($err["password_err"]) ? $err["password_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm_password" id="confirm-password" value="<?php echo ($data['confirm_password']); ?>" class="form-control <?php echo (isset($err['confirm_password_err'])) ? 'is-invalid' : ''; ?>" autocomplete="new-password">
                            <span class="text-warning"><?php echo isset($err["confirm_password_err"]) ? $err["confirm_password_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="change_password" value="Change Password" class="btn btn-default">
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-right">
                    <a href="<?php echo setRouter('clientarea', 'details'); ?>">Go Back to Details</a>
                </div>
            </div>
        </div>
    </div>
</div>