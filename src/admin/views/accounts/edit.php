<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="accounts.php"><?php echo $lang->I18N('Account List'); ?></a></li>
            <li><a href="accounts.php?action=details&account_id=<?php echo $account_id; ?>"><?php echo $lang->I18N('Account Details'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('Account Settings'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/accounts', '', array('action' => 'details', 'account_id' => $account_id)); ?>" class="btn btn-success btn-xs">
                        <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                    </a>
                    <a href="<?php echo setURL('admin/accounts', '', array('action' => 'add')); ?>" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                    <a href="<?php echo setURL('admin/accounts', '', array('action' => 'list')); ?>" class="btn btn-info btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                    </a>
                </div>
                <div class="panel-title">
                    <?php echo $PageInfo['title']; ?>
                    <span class="label label-default"> ID <?php echo $account_id; ?></span>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required">Name</label>
                            <input type="text" value="<?php echo $ClientInfo['client_fname'] . ' ' . $ClientInfo['client_lname']; ?>" class="form-control disabled" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required">Email</label>
                            <input type="text" value="<?php echo $ClientInfo['client_email']; ?>" class="form-control disabled" readonly>
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
                <div class="col-md-12"><hr /></div>
            <?php if ($AccountInfo['account_status'] == '1'): ?>
                <form class="row" action="controllers/accounts/password.php" method="post">
                    <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
                    <div class="col-md-6">
                        <div class="pb-10 px-10">
                            <label class="form-label required">New Password</label>
                            <input type="password" name="new_password" placeholder="New password here..." class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" name="submit" class="form-control btn btn-primary btn-sm text-white">Change Password</button>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-sm text-white">
                        </div>
                    </div> -->
                </form>
                <hr>
                <form
                    action="controllers/accounts/deactivate.php"
                    method="post"
                    onsubmit="
                        var reason = document.getElementsByName('reason')[0].value;
                        if (reason.length < 8) {
                            alert('Reason must be 8 characters long...');
                            return false;
                        }
                        return true;
                ">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Deacivation Reason</label>
                        <textarea name="reason" placeholder="Deactivation reason here..." class="form-control" id="reason"></textarea>
                        <div class="text-muted my-10 alert alert-secondary">Your account will be deleted after 30 days of your account deactivation and all of the account data will be removed completely(This action cannot be undo).</div>
                        <input type="hidden" name="account_id" value="<?php echo $AccountInfo['account_id']; ?>">
                    </div>
                    <div class="mb-10 px-10">
                        <input type="submit" name="submit" value="Deactivate Account" class="btn btn-danger btn-sm text-white">
                    </div>
                </form>
            <?php else: ?>
                <form class="row" action="controllers/accounts/reactivate.php" method="post">
                    <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label">Activate Account</label>
                            <button type="submit" name="submit" class="btn btn-success text-white btn-block my-5 btn-rounded">Activate Account</button>
                        </div>
                    </div>
                </form>
            <?php endif;?>
            </div>
        </div>
    </div>
</div>
