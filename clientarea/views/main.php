<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <p><h1><?php echo I18N('clientarea'); ?></h1></p>
    <div class="row">
        <div class="col-md-12">
            <?php echo getMsg("msg_notify"); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo I18N('clientarea'); ?></h3>
                </div>
                <div class="panel-body">
                    <p>Please fill in credentials to log in.</p>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo setRouter('clientarea', 'forget_password'); ?>" class="btn btn-link">Forget Passsword?</a>
                    <a href="<?php echo setRouter('clientarea', 'register'); ?>" class="btn btn-link">No account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="text-center">
        <h1>Project Client Area Features</h1>
        <p class="lead">Create the complete login and register form</p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group text-center">
                <li class="list-group-item"><a href="clientarea.php?s=login">Login</a> / <a href="clientarea.php?s=register">Register</a></li>
                <li class="list-group-item"><a href="clientarea.php?s=details">Account Details</a></li>
                <li class="list-group-item"><a href="clientarea.php?s=forget_password">Forget</a> / <a href="clientarea.php?s=reset_password">Reset</a> Password</li>
                <li class="list-group-item">Remember me Option</li>
            </ul>
        </div>
        <div class="col-md-6 ">
            <ul class="list-group text-center">
                <li class="list-group-item">Deactivate Account</li>
                <li class="list-group-item">Email Verification</li>
                <li class="list-group-item"><a href="clientarea.php?s=request-account-activate">Account Verification</a></li>
            </ul>
        </div>
    </div>
</div>