<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <?php echo (getMsg("msg_notify")); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="panel-title">News Details</span>
            <div class="pull-right">
                <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news'); ?>"><?php echo $lang->I18N('list'); ?></a>
                <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news_add'); ?>"><?php echo $lang->I18N('add'); ?></a>
            </div>
        </div>
        <div class="panel-body">
            <p>Title: <?php echo $data['title']; ?></p>
            <p>Date: <?php echo cTime($data['date']); ?></p>
            <p>Status: <?php echo $status_types[$data['status']]; ?></p>
            <hr />
            <?php echo htmlspecialchars_decode($data['content']); ?>
        </div>
    </div>
</div>