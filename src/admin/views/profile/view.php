<?php
if (!defined('IN_CRONLITE')) {
    exit;
}
?>

<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('My Profile'); ?></li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="profile.php?action=edit" class="btn btn-primary btn-xs">
                        <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
                    </a>
                    <a href="profile.php?action=password" class="btn btn-primary btn-xs">
                        <i class="fa fa-user-shield"></i> <?php echo $lang->I18N('Change Password'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?> ID:<?php echo $AdminInfo['admin_id']; ?></span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label"><?php echo $lang->I18N('First Name'); ?></label>
                            <input type="text" name="fname" value="<?php echo $AdminInfo['admin_fname']; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label"><?php echo $lang->I18N('Last Name'); ?></label>
                            <input type="text" name="lname" value="<?php echo $AdminInfo['admin_lname']; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label"><?php echo $lang->I18N('Email Address'); ?></label>
                            <input type="text" name="email" value="<?php echo $AdminInfo['admin_email']; ?>" class="form-control disabled" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="profile.php?action=edit" class="btn btn-primary"><?php echo $lang->I18N('Update Profile'); ?></a>
                <a href="https://www.gravatar.com/" target="_blank" class="btn btn-secondary">Update Image</a>
            </div>
        </div>
    </div>
</div>
