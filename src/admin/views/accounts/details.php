
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="accounts.php"><?php echo $lang->I18N('Account List'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Account Details'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <?php echo $PageInfo['title']; ?>
                <span class="label label-default"> ID <?php echo $account_id; ?></span>
            </div>
        </div>
        <div class="panel-body">
        <?php if ($AccountInfo['account_status'] == '0'): ?>
            <div class="alert alert-secondary col-md-12">This account is inactive.</div>
        <?php elseif ($AccountInfo['account_status'] == '2'): ?>
            <div class="alert alert-secondary col-md-12">This account has been suspended.</div>
        <?php elseif ($AccountInfo['account_status'] == '3'): ?>
            <div class="alert alert-secondary col-md-12">This account has been deleted.</div>
        <?php endif;?>
            <div class="row pb-10">
                <div class="col-md-12 pb-10 mb-10">
                    <div class="row">
                        <div class="col-md-6 px-5 text-center py-15">
                            <i class="fa fa-laptop fa-10x"></i>
                        </div>
                        <div class="col-md-6 py-5 text-center text-md-right">
                        <?php if ($AccountInfo['account_status'] == '1'): ?>
                            <a href="accounts.php?action=login&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-success btn-block"><?php echo $lang->I18N('Control Panel'); ?></a>
                            <a href="accounts.php?action=goftp&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-primary btn-block"><?php echo $lang->I18N('File Manager'); ?></a>
                        <?php endif;?>
                            <a href="accounts.php?action=edit&account_id=<?php echo $account_id; ?>" class="btn btn-secondary btn-block"><?php echo $lang->I18N('Edit Settings'); ?></a>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="col-md-4 col-sm-6">
                    <div class="m-5">
                        <b>Control Panel Username:</b>
                        <span><?php echo $AccountInfo['account_username']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Control Panel Password:</b>
                        <span><kbd><?php echo $AccountInfo['account_password']; ?></kbd></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Main Domain:</b>
                        <span><?php echo $AccountInfo['account_domain']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Control Panel Domain:</b>
                        <span><?php echo $AccountApi['api_cpanel_url']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-md-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Status:</b>
                        <span><?php if ($AccountInfo['account_status'] == '0'): ?>
                            <span class="label label-info"><?php echo $lang->I18N('Inactive'); ?></span>
                        <?php elseif ($AccountInfo['account_status'] == '1'): ?>
                            <span class="label label-success"><?php echo $lang->I18N('Active'); ?></span>
                        <?php elseif ($AccountInfo['account_status'] == '2'): ?>
                            <span class="label label-warning"><?php echo $lang->I18N('Suspended'); ?></span>
                        <?php elseif ($AccountInfo['account_status'] == '3'): ?>
                            <span class="label label-default"><?php echo $lang->I18N('Deleted'); ?></span>
                        <?php endif; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Creation Date:</b>
                        <span><?php echo $AccountInfo['account_addtime']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Server IP:</b>
                        <span><?php echo $AccountApi['api_server_ip']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Your IP:</b>
                        <span><?php echo get_client_ip(); ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>FTP Hostname:</b>
                        <span><?php echo $AccountApi['api_server_ftp_domain']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>FTP Port:</b>
                        <span>21</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>MySQL Hostname:</b>
                        <span><?php echo $AccountInfo['account_sql'] . '.' . $AccountApi['api_server_sql_domain']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Mysql Port:</b>
                        <span>3306</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Nameserver 1:</b>
                        <span><?php echo $AccountApi['api_ns_1']; ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Nameserver 2:</b>
                        <span><?php echo $AccountApi['api_ns_2']; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
        <?php if ($AccountInfo['account_status'] == '1'): ?>
            <a href="accounts.php?action=login&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-success"><?php echo $lang->I18N('Control Panel'); ?></a>
            <a href="accounts.php?action=goftp&account_id=<?php echo $account_id; ?>" target="_blank" class="btn btn-primary"><?php echo $lang->I18N('File Manager'); ?></a>
        <?php endif;?>
            <a href="accounts.php?action=edit&account_id=<?php echo $account_id; ?>" class="btn btn-default"><?php echo $lang->I18N('Account Settings'); ?></a>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="accounts.php?action=sync&type=domain&account_id=<?php echo $account_id; ?>" class="btn btn-xs btn-primary">
                    <i class="fa fa-sync"></i> <?php echo $lang->I18N('Sync'); ?>
                </a>
            </div>
            <span class="panel-title">Account Domains</span>
        </div>
        <?php if (count($AccountDomainList) > 0): ?>
            <ul class="list-group">
            <?php foreach ($AccountDomainList as $domain): ?>
                <li class="list-group-item">
                    <span class="pull-right"><a href="accounts.php?action=goftp&account_id=<?php echo $account_id; ?>&domain=<?php echo $domain['domain_name']; ?>" target="_blank"><i class="fa fa-file-import"></i></a></span>
                    <a href="http://<?php echo $domain['domain_name']; ?>" target="_blank" ref="noreferrer noopener"><?php echo $domain['domain_name']; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
        <div class="panel-body">
            <p class='text-center'>No Domain Found</p>
        </div>
        <?php endif; ?>
    </div>
</div>
