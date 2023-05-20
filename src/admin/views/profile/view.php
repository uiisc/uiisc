
<div class="content-wrapper">
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?php echo $lang->I18N('My Profile'); ?></h3>
            <a href="index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return');?></a>
        </div>
        <hr />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="mb-0"><b><?php echo $lang->I18N('First Name'); ?>:</b> <?php echo $AdminInfo['admin_fname']; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b><?php echo $lang->I18N('Last Name'); ?>:</b> <?php echo $AdminInfo['admin_lname']; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b><?php echo $lang->I18N('Email Address'); ?>:</b> <?php echo $AdminInfo['admin_email']; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b><?php echo $lang->I18N('IP Address'); ?>:</b> <?php echo UserInfo::get_ip(); ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Shared IP:</b> <?php echo gethostbyname($_SERVER['HTTP_HOST']); ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Device Type:</b> <?php echo UserInfo::get_device(); ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Device OS:</b> <?php echo UserInfo::get_os(); ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Web Browser:</b> <?php echo UserInfo::get_browser(); ?></h6>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Site Name:</b> <?php echo $SiteConfig['site_name']; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Site Path:</b> <?php echo $SiteConfig['site_path']; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Site Email:</b> <?php echo $SiteConfig['site_email']; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Site Status:</b> <?php if ($SiteConfig['site_status'] == 1) {echo '<span class="badge badge-success">Live</span>';} elseif ($SiteConfig['site_status'] == 0) {echo '<span class="badge badge-secondary">Maintaince</span>';}?></h6>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Document Root:</b> <?php echo $_SERVER['DOCUMENT_ROOT'] ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>Server Protocol:</b> <?php echo HTTP_PROTOCOL; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>PHP Version:</b> <?php echo PHP_VERSION; ?></h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-0"><b>App Version:</b> <?php echo APP_VERSION; ?></h6>
                </div>
            </div>
        </div>
        <hr />
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="profile.php?action=edit" class="btn btn-primary">Update Profile</a>
                    <a href="https://www.gravatar.com/" target="_blank" class="btn btn-secondary">Update Image</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
