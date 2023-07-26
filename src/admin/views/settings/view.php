<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('System Settings'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php require __DIR__ . '/menu.php'; ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="./" class="btn btn-primary btn-xs">
                    <i class="fa fa-tachometer-alt"></i> <?php echo $lang->I18N('Return'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $lang->I18N('System Settings'); ?></span>
        </div>
        <div class="panel-body">

        <form action="controllers/settings/edit.php" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Site Name'); ?></label>
                            <input type="text" name="name" value="<?php echo $SiteConfig['site_name']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Site Status'); ?></label>
                            <select name="status" class="form-control">
                                <?php

foreach ($Statuses as $Status) {
    if ($Status['value'] == $SiteConfig['site_status']) {
        echo '<option value=' . $Status['value'] . ' selected>' . $Status['name'] . '</option>';
    } else {
        echo '<option value=' . $Status['value'] . '>' . $Status['name'] . '</option>';
    }
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Brand Name'); ?></label>
                            <input type="text" name="brand" value="<?php echo $SiteConfig['site_brand']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Company Name'); ?></label>
                            <input type="text" name="company" value="<?php echo $SiteConfig['site_company']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Contact Phone'); ?></label>
                            <input type="text" name="phone" value="<?php echo $SiteConfig['site_phone']; ?>" class="form-control" required maxlength="30">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required">Clientarea URL</label>
                            <input type="text" name="url" value="<?php echo $SiteConfig['site_path']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Contact Email'); ?></label>
                            <input type="text" name="email" value="<?php echo $SiteConfig['site_email']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10 px-10">
                            <label class="form-label"><?php echo $lang->I18N('iFastNet Affiliate ID'); ?></label>
                            <input type="text" name="ifastnet_aff" value="<?php echo $SiteConfig['ifastnet_aff']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Page Title'); ?></label>
                            <input type="text" name="page_title" value="<?php echo $SiteConfig['page_title']; ?>" class="form-control" required maxlength="80">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Page Description'); ?></label>
                            <input type="text" name="page_description" value="<?php echo $SiteConfig['page_description']; ?>" class="form-control" required maxlength="200">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Page Keywords'); ?></label>
                            <input type="text" name="page_keywords" value="<?php echo $SiteConfig['page_keywords']; ?>" class="form-control" required maxlength="100">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Page Copyright'); ?></label>
                            <input type="text" name="page_copyright" value="<?php echo $SiteConfig['page_copyright']; ?>" class="form-control" required maxlength="100">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required"><?php echo $lang->I18N('Page Author'); ?></label>
                            <input type="text" name="page_author" value="<?php echo $SiteConfig['page_author']; ?>" class="form-control" required maxlength="30">
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="card-footer">
                <button name="submit" class="btn btn-primary"><?php echo $lang->I18N('Save'); ?></button>
            </div>
        </form>
    </div>
</div>
