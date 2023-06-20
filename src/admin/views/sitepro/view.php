<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="settings.php"><?php echo $lang->I18N('System Settings'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('SitePro'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php require __DIR__ . '/menu.php'; ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="settings.php" class="btn btn-primary btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('Return'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
            </div>
            <form class="card-body" action="controllers/sitepro/edit.php" method="post">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">SitePro API Username</label>
                                <input type="text" name="username" value="<?php echo $SitePro['builder_username']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 px-10">
                                <label class="form-label required">SitePro API Password</label>
                                <input type="text" name="password" value="<?php echo $SitePro['builder_password']; ?>" class="form-control" required>
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
</div>
