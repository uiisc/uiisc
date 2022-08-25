<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
// print_r($member);
// print_r($member_avatar);
// print_r($member_reg_date);
?>

<div class="container">
    <?php echo (getMsg("msg_notify")); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $lang->I18N('Member Details'); ?></span>
                    <div class="pull-right">
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member_edit', ['id' => $member['id']]); ?>"><?php echo $lang->I18N('modify'); ?></a>
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member_add'); ?>"><?php echo $lang->I18N('add'); ?></a>
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member'); ?>"><?php echo $lang->I18N('list'); ?></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <img src="<?php echo $member_avatar; ?>" class="img-avatar img-responsive img-responsive img-circle img-thumbnail">
                    </div>
                    <hr />
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th style="width: 150px;"><?php echo $lang->I18N('username'); ?></th>
                                <td><?php echo $member['username']; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo $lang->I18N('name'); ?></th>
                                <td><?php echo $member['name']; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo $lang->I18N('email'); ?></th>
                                <td><?php echo $member['email']; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo $lang->I18N('website'); ?></th>
                                <td><?php echo $member['website']; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo $lang->I18N('reg_date'); ?></th>
                                <td><?php echo $member_reg_date; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="" data-toggle="modal" data-target="#deactivate-account"><i class="glyphicon glyphicon-off"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $lang->I18N('我的服务'); ?></span>
                </div>
                <div class="panel-body">
                    <p>产品/服务数量: <a href="<?php echo setRouter('admin', 'service', ['uid' => $member['id']]); ?>">1 (1) - 查看 »</a></p>
                    <p>Tickets: <a href="<?php echo setRouter('admin', 'tickets', ['uid' => $member['id']]); ?>">处理中 1 个（总共：1000 个） - 查看 »</a></p>
                    <p>Emails: <a href="<?php echo setRouter('admin', 'emails', ['uid' => $member['id']]); ?>">15</a> 个</p>
                    <p>Ordes: 100 个</p>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>
