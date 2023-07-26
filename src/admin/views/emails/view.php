<?php
if (!defined('IN_CRONLITE')) {
    exit;
}
?>


<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="emails.php"><?php echo $lang->I18N('Emails List'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('details'); ?></li>
    </ol>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="<?php echo setURL('admin/emails', '', array('action' => 'view', 'client_id' => $data['email_client_id'])); ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-edit"></i> <?php echo $lang->I18N('Client More'); ?>
                </a>
                <a href="emails.php?action=list" class="btn btn-primary btn-xs">
                    <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?> ID:<?php echo $id; ?></span>
        </div>
        <div class="panel-body">
            <div class="alert alert-info">
                <p>Subject: <?php echo $data['email_subject']; ?></p>
                <p>Date: <?php echo $data['email_date']; ?></p>
                <p>To: <?php echo $data['email_to']; ?></p>
                <p>Client ID: <?php echo $data['email_client_id']; ?></p>
            </div>
            <div class="news-content">
                <?php echo htmlspecialchars_decode($data['email_body']); ?>
            </div>
        </div>
    </div>
</div>
