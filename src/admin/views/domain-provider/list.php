<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('Domain Provider'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="domain-provider.php?action=add" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
            </div>
            <div class="panel-body">
                
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>