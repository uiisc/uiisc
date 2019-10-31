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
            <span class="panel-title"><?php echo $lang->I18N('news'); ?></span>
            <div class="pull-right">
                <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news_add'); ?>"><?php echo $lang->I18N('add'); ?></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 150px;">Date</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($news["total"] && $news["list"]) {
                            foreach ($news["list"] as $key => $value) { ?>
                                <tr>
                                    <td style="width: 150px;"><?php echo cTime($value["date"]); ?></td>
                                    <td><?php echo $value["title"]; ?></td>
                                    <td><?php echo $status_types[$value['status']]; ?></td>
                                    <td><a class="btn btn-default btn-xs pull-right" href="<?php echo setRouter('admin', 'news_details', ['id' => $value['id']]); ?>"><?php echo $lang->I18N('details'); ?></a></td>
                                </tr>
                            <?php }
                    } else { ?>
                            <tr>
                                <td colspan="5" class="text-center">No Records Found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <span><?php echo $news["total"]; ?> Records Found, Page <?php echo $news["page"]; ?> of <?php echo $news["pages"]; ?></span>
        </div>
    </div>
</div>