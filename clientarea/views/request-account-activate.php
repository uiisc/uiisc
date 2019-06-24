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
                    <h3 class="panel-title">Activate Account Request</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" value="<?php echo ($data['email']); ?>" class="form-control <?php echo (isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo ($err['email_err']); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="request-activate-account" value="Send Reset Link" class="btn btn-default">
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
