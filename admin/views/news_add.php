<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-10 margin-auto">
            <?php echo (getMsg("msg_notify")); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">News Add</span>
                    <!-- <div class="pull-right">
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news'); ?>">Add News</a>
                    </div> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <label>
                            <span>Title:</span>
                            <input type="text" name="title" value="" class="form-control" maxlength="8" placeholder="Title">
                        </label>
                        <label>
                            <span>Content:</span>
                            <textarea name="content" class="form-control" rows="10" maxlength="5000" placeholder="Content"></textarea>
                        </label>
                        <button type="submit" name="do_add_news" class="btn btn-primary">Add</button>
                    </form>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>