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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Deactivation</h3>
                </div>
                <div class="panel-body">
                    <?php echo getMsg("msg_notify"); ?>
                </div>
                <div class="panel-footer text-right">
                    <a href="<?php echo setRouter('clientarea', 'login'); ?>">Go Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
