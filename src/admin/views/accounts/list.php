
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Hosting Accounts'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="accounts.php?action=add" class="btn btn-primary btn-xs">
                    <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                </a>
            </div>
            <div class="panel-title">
                <?php echo $PageInfo['title']; ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th>ID</th>
                    <th><?php echo $lang->I18N('Clients'); ?></th>
                    <th><?php echo $lang->I18N('Provider'); ?></th>
                    <th><?php echo $lang->I18N('Username'); ?></th>
                    <th><?php echo $lang->I18N('Domain'); ?></th>
                    <th><?php echo $lang->I18N('Deploy Date'); ?></th>
                    <th><?php echo $lang->I18N('Status'); ?></th>
                    <th><?php echo $lang->I18N('Action'); ?></th>
                </thead>
                <tbody>
<?php if ($count > 0): ?>
<?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo $row['account_id'];?></td>
                    <td><?php echo $row['account_client_id']; ?></td>
                    <td>
                        <a href="hosting-provider.php?action=details&api_key=<?php echo $row['account_api_key']; ?>">
                            <?php echo $row['account_api_key']; ?>
                        </a>
                    </td>
                    <td><?php echo $row['account_username']; ?></td>
                    <td><?php echo $row['account_domain']; ?></td>
                    <td><?php echo $row['account_addtime']; ?></td>
                    <td><?php if ($row['account_status'] == '0'): ?>
                        <span class="label label-info"><?php echo $lang->I18N('Inactive'); ?></span>
                    <?php elseif ($row['account_status'] == '1'): ?>
                        <span class="label label-success"><?php echo $lang->I18N('Active'); ?></span>
                    <?php elseif ($row['account_status'] == '2'): ?>
                        <span class="label label-warning"><?php echo $lang->I18N('Suspended'); ?></span>
                    <?php elseif ($row['account_status'] == '3'): ?>
                        <span class="label label-default"><?php echo $lang->I18N('Deleted'); ?></span>
                    <?php endif; ?></td>
                    <td>
                        <a href="accounts.php?action=edit&account_id=<?php echo $row['account_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
                        </a>
                        <a href="accounts.php?action=details&account_id=<?php echo $row['account_id']; ?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                        </a>
                    </td>
                </tr>
<?php endforeach;?>
<?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Nothing found</td>
                </tr>
<?php endif;?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <?php echo $count; ?> Records Founds
        </div>
    </div>
</div>
