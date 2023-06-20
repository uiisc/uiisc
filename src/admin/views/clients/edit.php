
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="clients.php"><?php echo $lang->I18N('Client List'); ?></a></li>
            <li><a href="<?php echo setURL('admin/clients', '', array('action' => 'details', 'id' => $ClientInfo['client_id'])); ?>"><?php echo $lang->I18N('details'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('edit'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/clients', '', array('action' => 'details', 'id' => $ClientInfo['client_id'])); ?>" class="btn btn-success btn-xs">
                        <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                    </a>
                    <a href="<?php echo setURL('admin/clients', '', array('action' => 'add')); ?>" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                    <a href="<?php echo setURL('admin/clients', '', array('action' => 'list')); ?>" class="btn btn-info btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                    </a>
                </div>
                <span class="panel-title">
                    <?php echo $PageInfo['title']; ?>
                    <span class="label label-default">ID <?php echo $ClientInfo['client_id']; ?></span>
                </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label required"><?php echo $lang->I18N('First Name'); ?></label>
                        <input type="text" name="client_fname" value="<?php echo $ClientInfo['client_fname']; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Last Name'); ?></label>
                        <input type="text" name="client_lname" value="<?php echo $ClientInfo['client_lname']; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Email Address'); ?></label>
                        <input type="text" name="client_email" value="<?php echo $ClientInfo['client_email']; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Phone Number'); ?></label>
                        <input type="text" name="client_phone" value="<?php echo $ClientInfo['client_phone']; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Billing Address'); ?></label>
                        <input type="text" name="client_address" value="<?php echo $ClientInfo['client_address']; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Company'); ?></label>
                        <input type="text" name="client_company" value="<?php echo $ClientInfo['client_company']; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Country'); ?></label>
                        <input type="text" name="country_name" value="<?php echo $CountryName; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('City'); ?></label>
                        <input type="text" name="client_city" value="<?php echo $ClientInfo['client_city']; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-10">
                        <label class="form-label required"><?php echo $lang->I18N('Postal Code'); ?></label>
                        <input type="text" name="client_pcode" value="<?php echo $ClientInfo['client_pcode']; ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="#" target="_blank" class="btn btn-primary btn-sm"><?php echo $lang->I18N('Save'); ?></a>
            </div>
        </div>
    </div>
</div>
