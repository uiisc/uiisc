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
    <div class="page-header">
        <h1><?php echo $lang->I18N('managearea'); ?> (BATE Version)</h1>
    </div>
</div>

<div class="container">
    <?php echo getMsg("msg_notify"); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">统计信息</h3>
                </div>
                <div class="panel-body">
                    <p>客户：100 个</p>
                    <p>工单：待处理 100 个（总共：1000 个）</p>
                    <p>订单：100 个</p>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-6">
            <?php echo getMsg("msg_notify"); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">快捷操作</h3>
                </div>
                <div class="panel-body">
                    <a class="btn btn-default" href="<?php echo setRouter('admin', 'news_add'); ?>">添加新闻</a>
                    <a class="btn btn-default" href="<?php echo setRouter('admin', 'account_add'); ?>">添加账号</a>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>