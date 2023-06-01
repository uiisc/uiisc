<div class="content-wrapper">
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <div>
                <a href="hosting.php" class="btn btn-danger btn-sm">
                    <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
                </a>
            </div>
        </div>
        <hr />
        <form class="card-body" action="controllers/hosting/add.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Provider Type'); ?></label>
                        <select name="api_type" class="form-control" required>
                            <option value="myownfreehost" selected>MyOwnFreeHost</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Hosting Key</label>
                        <input type="text" name="api_key" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required">MOFH API Username</label>
                        <input type="text" name="api_username" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required">MOFH API Password</label>
                        <input type="text" name="api_password" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Server domain</label>
                        <input type="text" name="api_server_domain" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Server IP</label>
                        <input type="text" name="api_server_ip" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">FTP Server</label>
                        <input type="text" name="api_server_ftp_domain" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">SQL Server</label>
                        <input type="text" name="api_server_sql_domain" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Control Panel URL</label>
                        <input type="text" name="api_cpanel_url" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Hosting Package</label>
                        <input type="text" name="api_package" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Nameserver 1</label>
                        <input type="text" name="api_ns_1" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Nameserver 2</label>
                        <input type="text" name="api_ns_2" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required">API Callback Token</label>
                        <input type="text" name="api_callback_token" class="form-control" maxlength="32" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label">API Callback URL</label>
                        <input type="text" class="form-control" value="<?php echo $site_url ?>/callback/[Hosting Key]/[API Callback Token]" readonly>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="my-10 px-10">
                        <button name="submit" class="btn btn-primary"><?php echo $lang->I18N('Save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
