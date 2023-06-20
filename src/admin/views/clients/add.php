
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="clients.php"><?php echo $lang->I18N('Client List'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('details'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/clients', '', array('action' => 'list')); ?>" class="btn btn-info btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
            </div>
            <div class="panel-body">
                <div class="row">
                </div>
            </div>
            <div class="panel-footer">
                <a href="#" target="_blank" class="btn btn-primary btn-sm"><?php echo $lang->I18N('Save') ?></a>
            </div>
        </div>
    </div>
</div>
