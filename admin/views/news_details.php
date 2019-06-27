<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo (getMsg("msg_notify")); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">News Details</span>
                    <div class="pull-right">
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news'); ?>"><?php echo I18N('list'); ?></a>
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news_add'); ?>"><?php echo I18N('add'); ?></a>
                    </div>
                </div>
                <div class="panel-body">
                    <p>Status: <?php echo $status_types[$data['status']]; ?></p>
                    <p>Date: <?php echo cTime($data['date']); ?></p>
                    <p>Title: <?php echo $data['title']; ?></p>
                    <p>Content: <?php echo $data['content']; ?></p>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>