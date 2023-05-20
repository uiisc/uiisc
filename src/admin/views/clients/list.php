<div class="content-wrapper">
<div class="container-fluid">
    <div class="card m-20 p-20">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?php echo $lang->I18N('My Clients'); ?></h3>
            <a href="index.php" class="btn btn-danger btn-sm pull-right"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
        </div>
        <hr />
        <div class="card-body table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
<?php if ($count > 0): ?>
<?php foreach ($rows as $value): ?>
                    <tr>
                        <td># <?php echo $value['client_id']; ?></td>
                        <td><?php echo $value['client_fname'] . " " . $value['client_lname']; ?></td>
                        <td><?php echo $value['client_email']; ?></td>
                        <td><?php echo $value['client_date']; ?></td>
                        <td><?php
if ($value['client_status'] == '0') {
$btn = ['secondary', 'cog'];
echo '<span class="badge bg-secondary badge-pill">Inactive</span>';
} elseif ($value['client_status'] == '1') {
$btn = ['success', 'globe'];
echo '<span class="badge bg-success badge-pill">Active</span>';
} elseif ($value['client_status'] == '2') {
$btn = ['danger', 'lock'];
echo '<span class="badge bg-danger badge-pill">Suspended</span>';
}
?></td>
                        <td>
                            <a href="clients.php?action=view&client_id=<?php echo $value['client_id']; ?>" class="btn btn-sm btn-<?php echo $btn[0] ?> btn-rounded">
                                <i class="fa fa-<?php echo $btn[1]; ?>"></i> Manage
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
        <hr />
        <div class="card-footer"><?php echo $count; ?> Records Founds.</div>
    </div>
</div>
</div>
