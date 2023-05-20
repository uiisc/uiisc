
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 mx-5">
            <h5 class="m-0">Account Settings</h5>
            <a href="accounts.php?action=view&account_id=<?php echo $account_id; ?>" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="mb-15">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Your Name</label>
                        <input type="text" value="<?php echo $ClientInfo['client_fname'] . ' ' . $ClientInfo['client_lname']; ?>" class="form-control disabled" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Your Email</label>
                        <input type="text" value="<?php echo $ClientInfo['client_email']; ?>" class="form-control disabled" readonly disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Phone Number'); ?></label>
                        <input type="text" value="<?php echo $ClientInfo['client_phone']; ?>" class="form-control disabled" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Billing Address</label>
                        <input type="text" value="<?php echo $ClientInfo['client_address']; ?>" class="form-control disabled" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12"><hr></div>
            <form class="row" action="controllers/accounts/password.php" method="post">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">New Password</label>
                        <input type="password" name="new_password" placeholder="New password here..." class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Old Password</label>
                        <input type="password" name="old_password" placeholder="Old password here..." class="form-control">
                        <input type="hidden" name="account_id" value="<?php echo $AccountInfo['account_id']; ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-sm text-white">
                    </div>
                </div>
            </form>
            <hr />
            <form
                action="controllers/accounts/deactivate.php"
                method="post"
                onsubmit="var reason = document.getElementsByName('reason')[0].value;
                if (reason.length < 8) {
                    alert('Reason must be 8 characters long...');
                    return false;
                }
                return true;"
            >
                <input type="hidden" name="account_id" value="<?php echo $AccountInfo['account_id']; ?>">
                <div class="mb-10 px-10">
                    <label class="form-label required">Deacivation Reason</label>
                    <textarea name="reason" placeholder="Deactivation reason here..." class="form-control"></textarea>
                    <div class="text-muted my-10 alert alert-secondary">Your account will be deleted after 30 days of your account deactivation and all of the account data will be removed completely(This action cannot be undone).</div>
                </div>
                <div class="mb-10 px-10">
                    <input type="submit" name="submit" value="Deactivate Account" class="btn btn-danger btn-sm text-white">
                </div>
            </form>
        </div>
    </div>
</div>
