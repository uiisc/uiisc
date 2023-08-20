<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Clients List'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="<?php echo setURL('admin/clients', '', array('action' => 'add')); ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th>ID</th>
                    <th><?php echo $lang->I18N('Name'); ?></th>
                    <th><?php echo $lang->I18N('Email'); ?></th>
                    <th><?php echo $lang->I18N('Phone'); ?></th>
                    <th><?php echo $lang->I18N('Date'); ?></th>
                    <th><?php echo $lang->I18N('Status'); ?></th>
                    <th><?php echo $lang->I18N('Action'); ?></th>
                </thead>
                <tbody>
<?php if ($count > 0): ?>
<?php foreach ($rows as $value): ?>
                <tr>
                    <td>
                        <a href="clients.php?action=details&id=<?php echo $value['client_id']; ?>"><?php echo $value['client_id']; ?></a>
                    </td>
                    <td><?php echo $value['client_fname'] . " " . $value['client_lname']; ?></td>
                    <td><?php echo $value['client_email']; ?></td>
                    <td><?php echo $value['client_phone']; ?></td>
                    <td><?php echo $value['client_addtime']; ?></td>
                    <td><?php if ($value['client_status'] == '0'): ?>
                        <span class="label label-warning"><?php echo $lang->I18N('Inactive'); ?></span>
                    <?php elseif ($value['client_status'] == '1'): ?>
                        <span class="label label-success"><?php echo $lang->I18N('Active'); ?></span>
                    <?php elseif ($value['client_status'] == '2'): ?>
                        <span class="label label-default"><?php echo $lang->I18N('Suspended'); ?></span>
                    <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo setURL('admin/clients', '', array('action' => 'edit', 'id' => $value['client_id'])); ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
                        </a>
                        <a href="<?php echo setURL('admin/clients', '', array('action' => 'details', 'id' => $value['client_id'])); ?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                        </a>
                        <a href="clients.php?action=login&id=<?php echo $value['client_id'] ?>" target="_blank" class="btn btn-info btn-xs">
                            <i class="fa fa-sign-in-alt"></i> <?php echo $lang->I18N('login'); ?>
                        </a>
                    </td>
                </tr>
<?php endforeach;?>
<?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Nothing found</td>
                </tr>
<?php endif;?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer"><?php echo $count; ?> Records Founds.</div>
    </div>
</div>
