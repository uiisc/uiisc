<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">My Clients</h5>
            <a href="index.php" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="10%">Name</th>
                    <th width="40%">Email</th>
                    <th width="10%">Date</th>
                    <th width="10%">Status</th>
                    <th width="10%">Action</th>
                </thead>
                <tbody>
<?php if ($count > 0): ?>
    <?php foreach ($rows as $value): ?>
                    <tr>
                        <td># <?php echo $value['hosting_client_id']; ?></td>
                        <td><?php echo $value['hosting_client_fname'] . " " . $value['hosting_client_lname']; ?></td>
                        <td><?php echo $value['hosting_client_email']; ?></td>
                        <td><?php echo $value['hosting_client_date']; ?></td>
                        <td><?php
if ($value['hosting_client_status'] == '0') {
    $btn = ['secondary', 'cog'];
    echo '<span class="badge bg-secondary badge-pill">Inactive</span>';
} elseif ($value['hosting_client_status'] == '1') {
    $btn = ['success', 'globe'];
    echo '<span class="badge bg-success badge-pill">Active</span>';
} elseif ($value['hosting_client_status'] == '2') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger badge-pill">Suspended</span>';
}
?></td>
                        <td><a href="clients.php?action=view&client_id=<?php echo $value['hosting_client_id']; ?>" class="btn btn-sm btn-<?php echo $btn[0] ?> btn-rounded"><i class="fa fa-<?php echo $btn[1]; ?>"></i> Manage</a></td>
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
