<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <div class="page-header">
        <h1><?php echo $lang->I18N('clientarea'); ?> (BATE Version)</h1>
    </div>
</div>

<div class="container">
    <?php echo getMsg("msg_notify"); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $lang->I18N('我的服务'); ?></h3>
                </div>
                <div class="panel-body">
                    <p>产品/服务数量: <a href="">1 (1) - 查看 »</a></p>
                    <p>我的工单数量: <a href="">处理中 1 个（总共：1000 个） - 查看 »</a></p>
                    <p>推广注册数量: <a href="">1 (1) - 查看 »</a></p>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $lang->I18N('账户信息'); ?></h3>
                </div>
                <div class="panel-body">
                    <p>登录账号：<?php echo ($user->username); ?></p>
                    <p>姓名：<?php echo ($user->name); ?></p>
                    <p>我的站点：<?php echo ($user->website); ?></p>
                    <p>邮箱地址：<?php echo ($user->email); ?></p>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo setRouter('clientarea', 'edit_details'); ?>">Edit Account Details</a>
                    <a href="<?php echo setRouter('clientarea', 'change_password'); ?>">Change password</a>
                </div>
            </div>
        </div>
    </div>
</div>