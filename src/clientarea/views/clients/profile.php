<div class="container-fluid">
    <div class="card py-15">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="m-0"><?php echo $lang->I18N('My Profile'); ?></h5>
            <a href="index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return');?></a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('First Name'); ?>:</b> <?php echo $ClientInfo['hosting_client_fname'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Last Name'); ?>:</b> <?php echo $ClientInfo['hosting_client_lname'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Email Address'); ?>:</b> <?php echo $ClientInfo['hosting_client_email'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Phone Number:</b> <?php echo $ClientInfo['hosting_client_phone'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Billing Address'); ?>:</b> <?php echo $ClientInfo['hosting_client_address'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Company'); ?>:</b> <?php echo $ClientInfo['hosting_client_company'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Country'); ?>:</b> <?php echo $CountryName; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('City'); ?>:</b> <?php echo $ClientInfo['hosting_client_city'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Postal Code:</b> <?php echo $ClientInfo['hosting_client_pcode'];?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('IP Address'); ?>:</b> <?php echo UserInfo::get_ip();?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Device Type:</b> <?php echo UserInfo::get_device();?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Device OS:</b> <?php echo UserInfo::get_os();?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Web Browser:</b> <?php echo UserInfo::get_browser();?></h6>
            </div>
            <div class="col-md-12 pb-5">
                <a href="settings.php" class="btn m5t btn-sm btn-primary">Update Profile</a>
                <a href="https://en.gravatar.com/" target="_blank" class="btn m5t btn-sm btn-secondary">Update Image</a>
            </div>
        </div>
    </div>
</div>