<?php
if (!defined('IN_CRONLITE')) {
    exit;
}
?>

<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="profile.php"><?php echo $lang->I18N('My Profile'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Profile Edit'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="profile.php" class="btn btn-primary btn-xs">
                    <i class="fa fa-id-card"></i> <?php echo $lang->I18N('My Profile'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?> ID:<?php echo $AdminInfo['admin_id']; ?></span>
        </div>
        <form action="controllers/profile/edit.php" method="post">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('First Name'); ?></label>
                            <input type="text" name="fname" value="<?php echo $AdminInfo['admin_fname']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Last Name'); ?></label>
                            <input type="text" name="lname" value="<?php echo $AdminInfo['admin_lname']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required">Email Address</label>
                            <input type="text" name="email" value="<?php echo $AdminInfo['admin_email']; ?>" class="form-control disabled" required readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button name="submit" class="btn btn-primary"><?php echo $lang->I18N('Save Changes'); ?></button>
                <!-- <a href="https://www.gravatar.com/" target="_blank" class="btn btn-secondary">Update Image</a> -->
            </div>
        </form>
    </div>
</div>
