<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 px-5">
            <h5 class="m-0">Viewing Account (#<?php echo $account_id; ?>)</h5>
            <a href="accounts.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="row pb-10">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 px-5 text-center py-15">
                        <i class="fa fa-laptop fa-10x"></i>
                    </div>
                    <?php if ($data['account_status'] == 1): ?>
                    <div class="col-md-4 offset-md-4 px-20 py-5 text-center text-md-right">
                        <a href="accounts.php?action=login&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-success text-white btn-block my-5 btn-rounded">Control Panel</a>
                        <a href="accounts.php?action=goftp&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-primary text-white btn-block my-5 btn-rounded">File Manager</a>
                        <a href="accounts.php?action=edit&account_id=<?php echo $account_id; ?>" class="btn btn-secondary btn-block my-5 btn-rounded">Edit Settings</a>
                    </div>
                    <?php else: ?>
                    <div class="col-md-4 offset-md-4 px-20 py-5 text-center text-md-right">
                        <button class="btn btn-success text-white btn-block my-5 btn-rounded disabled">Control Panel</button>
                        <button class="btn btn-primary text-white btn-block my-5 btn-rounded disabled">File Manager</button>
                        <a href="tickets.php?action=add" class="btn btn-secondary btn-block my-5 btn-rounded">Open Ticket</a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>cPanel Username:</b>
                    <span><?php echo $data['account_username']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>cPanel Password:</b>
                    <span><kbd><?php echo $data['account_password']; ?></kbd></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>Main Domain:</b>
                    <span><?php echo $data['account_domain']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>cPanel Domain:</b>
                    <span><?php echo $data['api_cpanel_url']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>Status:</b>
                    <span>
                        <?php if ($data['account_status'] == '0') {
                            echo '<span class="badge bg-secondary">Inactive</span>';
                        } elseif ($data['account_status'] == '1') {
                            echo '<span class="badge bg-success">Active</span>';
                        } elseif ($data['account_status'] == '2') {
                            echo '<span class="badge bg-danger">Suspened</span>';
                        } ?>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>Creation Date:</b>
                    <span><?php echo $data['account_date']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>Server IP:</b>
                    <span><?php echo $data['api_server_ip']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>Your IP:</b>
                    <span><?php echo $data['user_ip']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>FTP Hostname:</b>
                    <span><?php echo $data['ftp_host']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>FTP Port:</b>
                    <span><?php echo $data['ftp_port']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>MySQL Hostname:</b>
                    <span><?php echo $data['mysql_host']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>MySQL Port:</b>
                    <span><?php echo $data['mysql_port']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>Nameserver 1:</b>
                    <span><?php echo $data['api_ns_1']; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center m-5">
                    <b>Nameserver 2:</b>
                    <span><?php echo $data['api_ns_2']; ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">Account Domains</h5>
        </div>
        <hr />
        <div class="mb-10">
        <?php if (count($DomainList) > 0): ?>
        <?php foreach ($DomainList as $domain): ?>
            <div class='d-flex justify-content-between align-items-center m-5'>
                <span><a href="http://<?php echo $domain; ?>" target="_blank" ref="noreferrer noopener"><?php echo $domain; ?></a></span>
                <span><a href="accounts.php?action=goftp&account_id=<?php echo $account_id; ?>&domain=<?php echo $domain; ?>" class='btn btn-sm btn-square btn-secondary' target='_blank'><i class='fa fa-file-import'></i></a></span>
            </div>
        <?php endforeach;?>
        <?php else: ?>
            <p class='text-center'>No Domain Found</p>
        <?php endif;?>
        </div>
    </div>
</div>
