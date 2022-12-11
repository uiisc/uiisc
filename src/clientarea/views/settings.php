<div class="container-fluid">
    <div class="card py-15">
        <div class="d-flex justify-content-between align-items-center px-5">
            <h5 class="m-0"><?php echo $lang->I18N('Settings'); ?></h5>
            <a href="index.php" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <form action="controllers/settings/edit.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('First Name'); ?></label>
                        <input type="text" name="fname" value="<?php echo $ClientInfo['hosting_client_fname']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Last Name'); ?></label>
                        <input type="text" name="lname" value="<?php echo $ClientInfo['hosting_client_lname']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Email Address'); ?></label>
                        <input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email']; ?>" class="form-control disabled" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Phone Number</label>
                        <input type="text" name="phone" value="<?php echo $ClientInfo['hosting_client_phone']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Company Name</label>
                        <input type="text" name="company" value="<?php echo $ClientInfo['hosting_client_company']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Billing Address</label>
                        <input type="text" name="address" value="<?php echo $ClientInfo['hosting_client_address']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Country Name</label>
                        <select class="form-control" id="area-of-specialization" name="country" required="required">
                          <?php
foreach ($countries as $State) {
    if ($State['code'] == $ClientInfo['hosting_client_country']) {
        echo '<option value="' . $State['code'] . '" selected>' . $State['name'] . '</option>';
    } elseif ($State['code'] == 'NULL') {
        echo '<option value="NULL" disabled="disabled" selected="selected">Select your country</option>';
    } else {
        echo '<option value="' . $State['code'] . '">' . $State['name'] . '</option>';
    }
}
?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">State Name</label>
                        <input type="text" name="state" value="<?php echo $ClientInfo['hosting_client_state']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">City Name</label>
                        <input type="text" name="city" value="<?php echo $ClientInfo['hosting_client_city']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Postal Code</label>
                        <input type="text" name="postal" value="<?php echo $ClientInfo['hosting_client_pcode']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <button name="submit" class="btn btn-sm btn-primary">Update Profile</button>
                        <a href="https://en.gravatar.com/" target="_blank" class="btn m5t btn-sm btn-secondary">Update Image</a>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
            </div>
        </form>
        <form class="row" action="controllers/settings/password.php" method="post"
            onsubmit="
                var password = document.getElementById('password').value;
                var cpassword = document.getElementById('cpassword').value;
                if(password != cpassword){
                    alert('Password not match');
                    return false;
                }
                return true;
            ">
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">New Password</label>
                    <input type="password" name="new_password" id="password" placeholder="New password here..." class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Confirm Password</label>
                    <input type="password" name="confirm_password" id="cpassword" placeholder="Confirm password here..." class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Old Password</label>
                    <input type="password" name="old_password" placeholder="Old password here..." class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-10 px-10">
                    <input type="submit" name="submit" value="Change Password" class="btn btn-sm btn-primary text-white">
                </div>
            </div>
        </form>
    </div>
</div>