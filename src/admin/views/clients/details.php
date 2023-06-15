
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('home'); ?></a></li>
            <li><a href="clients.php"><?php echo $lang->I18N('Client List'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('details'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/clients', '', array('action' => 'edit', 'id' => $ClientInfo['client_id'])); ?>" class="btn btn-success btn-xs">
                        <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
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
                <table class="table table-stripped table-bordered table-hover">
                    <tr>
                        <td width="200"><?php echo $lang->I18N('First Name'); ?></td>
                        <td><?php echo $ClientInfo['client_fname']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('Last Name'); ?></b></td><td><?php echo $ClientInfo['client_lname']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('Email Address'); ?></b></td><td><?php echo $ClientInfo['client_email']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('Phone Number'); ?></b></td><td><?php echo $ClientInfo['client_phone']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('Billing Address'); ?></b></td><td><?php echo $ClientInfo['client_address']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('Company'); ?></b></td><td><?php echo $ClientInfo['client_company']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('Country'); ?></b></td><td><?php echo $CountryName; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('City'); ?></b></td><td><?php echo $ClientInfo['client_city']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Postal Code</b></td><td><?php echo $ClientInfo['client_pcode']; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('Hosting Accounts'); ?></b></td><td><?php echo $count_account; ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo $lang->I18N('SSL Certificates'); ?></b></td><td><?php echo $count_ssl; ?></td>
                    </tr>
                    <tr>
                        <td><b>Support Tickets</b></td><td><?php echo $count_tickets; ?></td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <a href="clients.php?action=login&client_id=<?php echo $ClientInfo['client_id'] ?>" target="_blank" class="btn btn-primary btn-sm">Login as <?php echo $ClientInfo['client_fname'] ?></a>
                <?php if ($ClientInfo['client_status'] !== '1'): ?>
                <a href="controllers/clients/activate.php?client_id=<?php echo $ClientInfo['client_id']; ?>" class="btn btn-success btn-sm">Mark as Active</a>
                <?php else: ?>
                <a href="controllers/clients/suspend.php?client_id=<?php echo $ClientInfo['client_id']; ?>" class="btn btn-default btn-sm">Mark as Suspended</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
