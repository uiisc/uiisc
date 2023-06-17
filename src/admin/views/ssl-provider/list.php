<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('home'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('SSL Provider'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="ssl-provider.php?action=add" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
            </div>
            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-hover">
                    <thead>
                        <th width="100">ID</th>
                        <th width="100"><?php echo $lang->I18N('Type'); ?></th>
                        <th width="100">Name</th>
                        <th><?php echo $lang->I18N('API Username'); ?></th>
                        <th><?php echo $lang->I18N('API Password'); ?></th>
                        <th width="100"><?php echo $lang->I18N('Status'); ?></th>
                        <th width="150"><?php echo $lang->I18N('Action'); ?></th>
                    </thead>
                    <tbody>
<?php if ($count > 0): ?>
<?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['api_type']; ?></td>
                            <td><?php echo $row['api_name']; ?></td>
                            <td><?php echo $row['api_username']; ?></td>
                            <td><?php echo $row['api_password']; ?></td>
                            <td>Status</td>
                            <td>
                                <a href="<?php echo setRouter('ssl-provider', '', array('action' => 'edit', 'id' => $row['id'])); ?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
                                </a>
                                <a href="<?php echo setRouter('ssl-provider', '', array('action' => 'details', 'id' => $row['id'])); ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                                </a>
                            </td>
                        </tr>
<?php endforeach;?>
<?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Nothing found</td>
                        </tr>
<?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer"><?php echo $count; ?> Records Founds.</div>
        </div>
    </div>
</div>
