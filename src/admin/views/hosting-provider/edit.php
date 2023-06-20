<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="hosting-provider.php"><?php echo $lang->I18N('Hosting Provider'); ?></a></li>
            <li><a href="<?php echo setURL('admin/hosting-provider', '', array('action' => 'details', 'id' => $data['api_id'])); ?>"><?php echo $lang->I18N('details'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('edit'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/hosting-provider', '', array('action' => 'details', 'id' => $data['api_id'])); ?>" class="btn btn-success btn-xs">
                        <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                    </a>
                    <a href="hosting-provider.php?action=add" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                    <a href="hosting-provider.php" class="btn btn-primary btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?> ID: <?php echo $data['api_id']; ?></span>
            </div>
            <form action="controllers/hosting/edit.php" method="post">
                <input type="hidden" name="api_id" value="<?php echo $data['api_id']; ?>" style="display:none;">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required"><?php echo $lang->I18N('Provider Type'); ?></label>
                                <input type="text" name="api_type" value="<?php echo $data['api_type']; ?>" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Hosting Key</label>
                                <input type="text" name="api_key" value="<?php echo $data['api_key']; ?>" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-10 px-10">
                                <label class="form-label required">MOFH API Username</label>
                                <input type="text" name="api_username" value="<?php echo $data['api_username']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-10 px-10">
                                <label class="form-label required">MOFH API Password</label>
                                <input type="text" name="api_password" value="<?php echo $data['api_password']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Server domain</label>
                                <input type="text" name="api_server_domain" value="<?php echo $data['api_server_domain']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Server IP</label>
                                <input type="text" name="api_server_ip" value="<?php echo $data['api_server_ip']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">FTP Server</label>
                                <input type="text" name="api_server_ftp_domain" value="<?php echo $data['api_server_ftp_domain']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">SQL Server</label>
                                <input type="text" name="api_server_sql_domain" value="<?php echo $data['api_server_sql_domain']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Control Panel URL</label>
                                <input type="text" name="api_cpanel_url" value="<?php echo $data['api_cpanel_url']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Hosting Package</label>
                                <input type="text" name="api_package" value="<?php echo $data['api_package']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Nameserver 1</label>
                                <input type="text" name="api_ns_1" value="<?php echo $data['api_ns_1']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Nameserver 2</label>
                                <input type="text" name="api_ns_2" value="<?php echo $data['api_ns_2']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-10 px-10">
                                <label class="form-label required">API Callback Token</label>
                                <input type="text" name="api_callback_token" value="<?php echo $data['api_callback_token']; ?>" class="form-control" maxlength="32" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="my-10 px-10">
                        <button name="submit" class="btn btn-primary"><?php echo $lang->I18N('Save'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
