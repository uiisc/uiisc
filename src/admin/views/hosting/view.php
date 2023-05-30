<div class="content-wrapper">
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <div>
                <a href="hosting.php" class="btn btn-sm btn-danger">
                    <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
                </a>
                <a href="<?php echo setURL('admin/hosting', '', array('action' => 'edit', 'id' => $data['api_id'])); ?>" class="btn btn-sm btn-success">
                    <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
                </a>
                <a href="hosting.php?action=add" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                </a>
            </div>
        </div>
        <hr />
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label">MOFH API Username</label>
                        <input type="text" name="api_username" value="<?php echo $data['api_username']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label">MOFH API Password</label>
                        <input type="text" name="api_password" value="<?php echo $data['api_password']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Hosting Type</label>
                        <input type="text" name="api_type" value="<?php echo $data['api_type']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Hosting Key</label>
                        <input type="text" name="api_key" value="<?php echo $data['api_key']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Control Panel URL</label>
                        <input type="text" name="api_cpanel_url" value="<?php echo $data['api_cpanel_url']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Hosting Package</label>
                        <input type="text" name="api_package" value="<?php echo $data['api_package']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Server IP</label>
                        <input type="text" name="api_server_ip" value="<?php echo $data['api_server_ip']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">API Callback Token</label>
                        <input type="text" name="api_callback_token" value="<?php echo $data['api_callback_token']; ?>" class="form-control" maxlength="32" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Nameserver 1</label>
                        <input type="text" name="api_ns_1" value="<?php echo $data['api_ns_1']; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Nameserver 2</label>
                        <input type="text" name="api_ns_2" value="<?php echo $data['api_ns_2']; ?>" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <a href="<?php echo setURL('admin/hosting', '', array('action' => 'edit', 'id' => $data['api_id'])); ?>" class="btn btn-sm btn-secondary mx-5 btn-rounded"><i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
