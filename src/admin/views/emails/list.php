<?php
if (!defined('IN_CRONLITE')) {
    exit;
}
?>

<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Emails List'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
            <a href="emails.php?action=add" class="btn btn-primary btn-xs">
                <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
            </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th width="100">ID</th>
                    <th><?php echo $lang->I18N('Client'); ?></th>
                    <th><?php echo $lang->I18N('Title'); ?></th>
                    <th><?php echo $lang->I18N('Status'); ?></th>
                    <th style="width: 160px;"><?php echo $lang->I18N('Date'); ?></th>
                    <th style="width: 100px;"><?php echo $lang->I18N('Action'); ?></th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td><?php echo $value['email_id']; ?></td>
                        <td><?php echo $value['email_client_id']; ?></td>
                        <td><?php echo $value["email_subject"]; ?></td>
                        <td><?php echo $status_types[$value['email_status']]; ?></td>
                        <td><?php echo $value["email_date"]; ?></td>
                        <td>
                            <a href="emails.php?action=view&id=<?php echo $value['email_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nothing found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer"><?php echo $count; ?> Records Found, Page 1 of 1</div>
    </div>
</div>
