<div class="content-wrapper">
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0">Viewing Account (# <?php echo $account_id; ?>)</h5>
            <a href="accounts.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="card-body">
        <?php if ($AccountInfo['account_status'] == '0'): ?>
            <div class="alert alert-secondary col-md-12">This account is inactive.</div>
        <?php elseif ($AccountInfo['account_status'] == '2'): ?>
            <div class="alert alert-secondary col-md-12">This account has been suspended.</div>
        <?php endif;?>
            <div class="row pb-10">
                <div class="col-md-12 pb-10 mb-10">
                    <div class="row">
                        <div class="col-md-6 px-5 text-center py-15">
                            <i class="fa fa-laptop fa-10x"></i>
                        </div>
                        <div class="col-md-6 py-5 text-center text-md-right">
                        <?php if ($AccountInfo['account_status'] == '1'): ?>
                            <a href="accounts.php?action=login&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-success text-white btn-block my-5 btn-rounded"><?php echo $lang->I18N('Control Panel'); ?></a>
                            <a href="accounts.php?action=goftp&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-primary text-white btn-block my-5 btn-rounded"><?php echo $lang->I18N('File Manager'); ?></a>
                        <?php else: ?>
                            <button class="btn btn-success text-white btn-block my-5 btn-rounded disabled"><?php echo $lang->I18N('Control Panel'); ?></button>
                            <button class="btn btn-primary text-white btn-block my-5 btn-rounded disabled"><?php echo $lang->I18N('File Manager'); ?></button>
                        <?php endif;?>
                            <a href="accounts.php?action=edit&account_id=<?php echo $account_id; ?>" class="btn btn-secondary btn-block my-5 btn-rounded"><?php echo $lang->I18N('Edit Settings'); ?></a>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="col-md-4 col-sm-6">
                    <div class="m-5">
                        <b>Cpanel Username:</b>
                        <span><?php echo $AccountInfo['account_username']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Cpanel Password:</b>
                        <span><kbd><?php echo $AccountInfo['account_password']; ?></kbd></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Main Domain:</b>
                        <span><?php echo $AccountInfo['account_domain']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Cpanel Domain:</b>
                        <span><?php echo $HostingApi['api_cpanel_url']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-md-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Status:</b>
                        <span>
                            <?php if ($AccountInfo['account_status'] == '0') {
    echo '<span class="badge bg-secondary">Inactive</span>';
} elseif ($AccountInfo['account_status'] == '1') {
    echo '<span class="badge bg-success">Active</span>';
} elseif ($AccountInfo['account_status'] == '2') {
    echo '<span class="badge bg-danger">Suspend</span>';
}?>
                        </span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Creation Date:</b>
                        <span><?php echo $AccountInfo['account_date']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Server IP:</b>
                        <span><?php echo $HostingApi['api_server_ip']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Your IP:</b>
                        <span><?php echo UserInfo::get_ip() ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>FTP Hostname:</b>
                        <span><?php echo str_replace('cpanel', 'ftp', $HostingApi['api_cpanel_url']) ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>FTP Port:</b>
                        <span>21</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>MySQL Hostname:</b>
                        <span><?php echo str_replace('cpanel', 'sqlxxx', $HostingApi['api_cpanel_url']) ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Mysql Port:</b>
                        <span>3306</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Nameserver 1:</b>
                        <span><?php echo $HostingApi['api_ns_1']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center m-5">
                        <b>Nameserver 2:</b>
                        <span><?php echo $HostingApi['api_ns_2']; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="card-footer">
            <div class="col-md-6">
            <?php if ($AccountInfo['account_status'] == '1'): ?>
                <a href="accounts.php?action=login&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-success text-white m-5 btn-rounded">Control Panel</a>
                <a href="accounts.php?action=goftp&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-primary text-white m-5 btn-rounded">File Manager</a>
            <?php else: ?>
                <button class="btn btn-success text-white m-5 btn-rounded disabled">Control Panel</button>
                <button class="btn btn-primary text-white m-5 btn-rounded disabled">File Manager</button>
            <?php endif;?>
                <a href="accounts.php?action=edit&account_id=<?php echo $account_id; ?>" class="btn btn-secondary m-5 btn-rounded">Edit Settings</a>
            </div>
        </div>
    </div>
</div>
</div>
