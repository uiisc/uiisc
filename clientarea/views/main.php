<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo getMsg("msg_notify"); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $lang->I18N('clientarea'); ?></h3>
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