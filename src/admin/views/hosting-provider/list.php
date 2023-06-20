<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('Hosting Provider'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="hosting-provider.php?action=add" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
            </div>
            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-hover">
                    <thead>
                        <th>Key</th>
                        <th>Type</th>
                        <th>Panel URL</th>
                        <th>Package</th>
                        <th width="160">Action</th>
                    </thead>
                    <tbody>
                    <?php if ($count > 0): ?>
                    <?php foreach ($rows as $value): ?>
                        <tr>
                            <td><?php echo $value['api_key']; ?></td>
                            <td><?php echo $value['api_type']; ?></td>
                            <td><?php echo $value['api_cpanel_url']; ?></td>
                            <td><?php echo $value['api_package']; ?></td>
                            <td>
                                <a href="hosting-provider.php?action=edit&id=<?php echo $value['api_id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?></a>
                                <a href="hosting-provider.php?action=details&id=<?php echo $value['api_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?></a>
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
            <div class="panel-footer"><?php echo $count; ?> Records Found</div>
        </div>
    </div>
</div>