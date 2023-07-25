<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="ssl-provider.php"><?php echo $lang->I18N('SSL Provider'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('details'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="<?php echo setURL('admin/ssl-provider', '', array('action' => 'details', 'id' => $data['id'])); ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                </a>
                <a href="ssl-provider.php?action=add" class="btn btn-primary btn-xs">
                    <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                </a>
                <a href="ssl-provider.php" class="btn btn-primary btn-xs">
                    <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?> ID: <?php echo $data['id']; ?></span>
        </div>
        <form action="controllers/ssl-provider/edit.php" method="post">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label"><?php echo $lang->I18N('Provider Type'); ?></label>
                            <select name="api_type" class="form-control" value="<?php echo $data['api_type']; ?>" required>
                                <option value="gogetssl" selected>GoGetSSL</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label"><?php echo $lang->I18N('API Name'); ?></label>
                            <input type="text" name="api_name" value="<?php echo $data['api_name']; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('API Username'); ?></label>
                            <input type="text" name="username" value="<?php echo $data['api_username']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('API Password'); ?></label>
                            <input type="text" name="password" value="<?php echo $data['api_password']; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button name="submit" class="btn btn-primary"><?php echo $lang->I18N('Save'); ?></button>
            </div>
        </form>
    </div>
</div>
