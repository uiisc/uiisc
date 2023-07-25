<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="knowledgebase.php"><?php echo $lang->I18N('Knowledgebase'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('details'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="knowledgebase.php?action=edit&id=<?php echo $knowledgebase_id; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?></a>
                <a href="knowledgebase.php?action=add" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?></a>
                <a href="knowledgebase.php" class="btn btn-primary btn-xs"><i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?></a>
            </div>
            <div class="panel-title">
                <?php echo $PageInfo['title']; ?>
                <span class="label label-default"> ID <?php echo $knowledgebase_id; ?></span>
            </div>
        </div>
        <div class="panel-body">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <b>Subject :</b>
                        <span><?php echo $Knowledgebase['knowledgebase_subject']; ?></span>
                    </div>
                    <div class="col-md-6">
                        <b>Date :</b>
                        <span><?php echo $Knowledgebase['knowledgebase_date']; ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo htmlspecialchars_decode($Knowledgebase['knowledgebase_content']); ?>
                </div>
            </div>
        </div>
    </div>
</div>