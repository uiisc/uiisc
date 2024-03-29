
<div class="content-wrapper">
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?php echo $lang->I18N('Profile Edit'); ?></h3>
            <a href="index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
        </div>
        <hr />
        <div class="card-body">
            <form action="controllers/profile/edit.php" method="post">
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
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <button name="submit" class="btn btn-primary">Update Profile</button>
                            <a href="https://www.gravatar.com/" target="_blank" class="btn btn-secondary">Update Image</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-12"><hr></div>
            <form action="controllers/profile/password.php" method="post" onsubmit="
                    var password = document.getElementById('password').value;
                    var cpassword = document.getElementById('cpassword').value;
                    if(password != cpassword){
                        alert('Password not match');
                        return false;
                    }
                    return true;
                ">
                <div class="row">
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
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <input type="submit" name="submit" value="Change Password" class="btn btn-sm btn-primary text-white">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>