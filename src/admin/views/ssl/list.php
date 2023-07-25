<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('SSL Certificates'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="ssl.php?action=add" class="btn btn-primary btn-xs">
                    <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th width="100">ID</th>
                    <th width="100"><?php echo $lang->I18N('Third ID'); ?></th>
                    <th><?php echo $lang->I18N('Domain Name'); ?></th>
                    <th width="100"><?php echo $lang->I18N('Method'); ?></th>
                    <th width="100"><?php echo $lang->I18N('Status'); ?></th>
                    <th width="150"><?php echo $lang->I18N('Action'); ?></th>
                </thead>
                <tbody>
<?php if ($count > 0): ?>
<?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $row['ssl_id']; ?></td>
                        <td><?php echo $row['ssl_third_id']; ?></td>
                        <td><?php echo $row['ssl_domain']; ?></td>
                        <td><?php echo $row['ssl_dcv_method']; ?></td>
                        <td><?php
if ($row['ssl_status'] == 'processing') {
$btn = ['primary', 'cog'];
echo '<span class="badge bg-primary badge-pill">Processing</span>';
} elseif ($row['ssl_status'] == 'active') {
$btn = ['success', 'globe'];
echo '<span class="badge bg-success badge-pill">Active</span>';
} elseif ($row['ssl_status'] == 'cancelled') {
$btn = ['danger', 'lock'];
echo '<span class="badge bg-danger badge-pill">Cancelled</span>';
} elseif ($row['ssl_status'] == 'expired') {
$btn = ['danger', 'lock'];
echo '<span class="badge bg-danger badge-pill">Expired</span>';
}
?></td>
                        <td>
                            <a href="<?php echo setRouter('ssl', '', array('action' => 'details', 'id' => $row['ssl_id'])); ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                            </a>
                        </td>
                    </tr>
<?php endforeach;?>
<?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nothing found</td>
                    </tr>
<?php endif;?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer"><?php echo $count; ?> Records Founds.</div>
    </div>
</div>
