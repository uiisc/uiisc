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
                    <span class="panel-title">News</span>
                    <div class="pull-right">
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news_add'); ?>">Add</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Department</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($tickets["total"]) {
                                    foreach ($tickets["list"] as $key => $value) { ?>
                                        <tr>
                                            <th><?php echo $value["date"]; ?></th>
                                            <td><?php echo $value["department"]; ?></td>
                                            <td><?php echo $value["subject"]; ?></td>
                                            <td><?php echo $value["status"]; ?></td>
                                            <td><?php echo $value["lastupdated"]; ?></td>
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
                    <span><?php echo $tickets["total"]; ?> Records Found, Page <?php echo $tickets["page"]; ?> of <?php echo $tickets["pages"]; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>