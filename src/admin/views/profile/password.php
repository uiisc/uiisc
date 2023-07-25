<?php
if (!defined('IN_CRONLITE')) {
    exit;
}
?>

<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="profile.php"><?php echo $lang->I18N('My Profile'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Change Password'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="profile.php?action=edit" class="btn btn-primary btn-xs">
                    <i class="fa fa-edit"></i> <?php echo $lang->I18N('Profile Edit'); ?>
                </a>
                <a href="profile.php" class="btn btn-primary btn-xs">
                    <i class="fa fa-id-card"></i> <?php echo $lang->I18N('My Profile'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?> ID:<?php echo $AdminInfo['admin_id']; ?></span>
        </div>
        <form action="controllers/profile/password.php" method="post" onsubmit="
                var password = document.getElementById('password').value;
                var cpassword = document.getElementById('cpassword').value;
                if(password != cpassword){
                    alert('Password not match');
                    return false;
                }
                return true;
            ">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('New Password'); ?></label>
                            <input type="password" name="new_password" id="password" placeholder="<?php echo $lang->I18N('Input New Password'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Confirm Password'); ?></label>
                            <input type="password" name="confirm_password" id="cpassword" placeholder="<?php echo $lang->I18N('Input Confirm Password'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Old Password'); ?></label>
                            <input type="password" name="old_password" placeholder="<?php echo $lang->I18N('Input Old Password'); ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" name="submit" value="<?php echo $lang->I18N('Save Changes'); ?>" class="btn btn-sm btn-primary text-white">
            </div>
        </form>
    </div>
</div>
