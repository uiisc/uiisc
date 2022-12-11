<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <a href="index.php" class="btn text-white btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="40%">Username</th>
                    <th width="30%">Domain</th>
                    <th width="5%">Deploy Date</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                </thead>
                <tbody>
<?php if ($count > 0): ?>
    <?php foreach ($rows as $row): ?>
                    <tr>
                        <td># <?php $row['account_id'];?></td>
                        <td><?php echo $row['account_username']; ?></td>
                        <td><?php echo $row['account_domain']; ?></td>
                        <td><?php echo $row['account_date']; ?></td>
                        <td><?php
if ($row['account_status'] == '0') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger text-white border-0">Inactive</span>';
} elseif ($row['account_status'] == '1') {
    $btn = ['success', 'globe'];
    echo '<span class="badge bg-success border-0 text-white">Active</span>';
} elseif ($row['account_status'] == '2') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger text-white border-0">Suspended</span>';
}
?></td>
                        <td>
                            <a href="accounts.php?action=view&account_id=<?php echo $row['account_id']; ?>" class="btn btn-sm btn-<?php echo $btn[0]; ?> btn-rounded">
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
        <p class="pb-10"><?php echo $count; ?> Records Founds</p>
    </div>
</div>
