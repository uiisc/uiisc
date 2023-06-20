<?php
if (!defined('IN_CRONLITE')) {
    exit;
}
?>


<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="news.php"><?php echo $lang->I18N('News List'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('details'); ?></li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/news', '', array('action' => 'edit', 'id' => $id)); ?>" class="btn btn-success btn-xs">
                        <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
                    </a>
                    <a href="news.php?action=add" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                    <a href="news.php?action=list" class="btn btn-primary btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?> ID:<?php echo $id; ?></span>
            </div>
            <div class="panel-body">
                <div class="page-header text-center">
                    <h2><?php echo $data['news_subject']; ?></h2>
                    <p><?php echo $data['news_date']; ?></p>
                </div>
                <div class="news-content">
                    <?php echo htmlspecialchars_decode($data['news_content']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
