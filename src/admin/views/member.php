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
            <span class="panel-title"><?php echo $lang->I18N('member'); ?></span>
            <div class="pull-right">
                <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member_add'); ?>"><?php echo $lang->I18N('add'); ?></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 150px;">Username</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Registration</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($members["total"] && $members["list"]) {
                            foreach ($members["list"] as $key => $value) { ?>
                                <tr>
                                    <td style="width: 150px;"><?php echo $value["username"]; ?></td>
                                    <td><?php echo $value["name"]; ?></td>
                                    <td><?php echo $status_types[$value['is_active']]; ?></td>
                                    <td><?php echo $value["email"]; ?></td>
                                    <td><?php echo $value["website"]; ?></td>
                                    <td><?php echo cTime($value["created_at"]); ?></td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member_details', ['id' => $value['id']]); ?>"><?php echo $lang->I18N('details'); ?></a>
                                        <a class="btn btn-default btn-xs" href="#"><?php echo $lang->I18N('login'); ?></a>
                                        <button class="btn btn-default btn-xs"><?php echo $lang->I18N('active'); ?></button>
                                        <button class="btn btn-default btn-xs"><?php echo $lang->I18N('disable'); ?></button>
                                    </td>
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
            <span><?php echo $members["total"]; ?> Records Found, Page <?php echo $members["page"]; ?> of <?php echo $members["pages"]; ?></span>
        </div>
    </div>
</div>