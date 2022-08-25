<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Logout</h3>
                </div>
                <div class="panel-body">
                    <?php echo getMsg("msg"); ?>
                </div>
            </div>
        </div>
    </div>
</div>