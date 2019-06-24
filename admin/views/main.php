<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}

if (file_exists("{$ROOT}/install.php")) {
    require_once("{$ROOT}/admin/views/install_tips.php");
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo getMsg("msg_notify"); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Content Management System for Reseller</h3>
                </div>
                <div class="panel-body">

                </div>
                <div class="panel-footer">
                    <a href="<?php echo setRouter('clientarea', 'forget_password'); ?>" class="btn btn-link">Forget Passsword?</a>
                    <a href="<?php echo setRouter('clientarea', 'register'); ?>" class="btn btn-link">No account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>