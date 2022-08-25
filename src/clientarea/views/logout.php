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
                    <h3 class="panel-title">Logout</h3>
                </div>
                <div class="panel-body">
                    <p>What do you want to do.</p>
                    <p>
                        <a href="<?php echo setRouter('clientarea', 'login'); ?>" class="btn btn-default">Login</a>
                        <a href="<?php echo setRouter('clientarea', 'register'); ?>" class="btn btn-default">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>