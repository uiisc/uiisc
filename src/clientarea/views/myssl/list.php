<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 px-5">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <a href="myssl.php?action=add" class="btn text-white btn-success btn-sm"><i class="fa fa-plus-circle"></i> <?php echo $lang->I18N('add'); ?></a>
        </div>
        <hr />
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="5%"><?php echo $lang->I18N('Order ID'); ?></th>
                    <th width="75%"><?php echo $lang->I18N('Domain Name'); ?></th>
                    <th width="5%"><?php echo $lang->I18N('Method'); ?></th>
                    <th width="5%"><?php echo $lang->I18N('Status'); ?></th>
                    <th width="5%"><?php echo $lang->I18N('Action'); ?></th>
                </thead>
                <tbody>
<?php if ($count > 0): ?>
<?php foreach ($rows as $row):
    $SSLInfo = $apiClient->getOrderStatus($row['ssl_key']);
?>
                    <tr>
                        <td># <?php echo $row['ssl_id']; ?></td>
                        <td><?php echo $SSLInfo['order_id']; ?></td>
                        <td><?php echo $SSLInfo['domain']; ?></td>
                        <td>DNS</td>
                        <td><?php
if ($SSLInfo['status'] == 'processing') {
    $btn = ['primary', 'cog'];
    echo '<span class="badge bg-primary badge-pill">Processing</span>';
} elseif ($SSLInfo['status'] == 'active') {
    $btn = ['success', 'globe'];
    echo '<span class="badge bg-success badge-pill">Active</span>';
} elseif ($SSLInfo['status'] == 'cancelled') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger badge-pill">Cancelled</span>';
} elseif ($SSLInfo['status'] == 'expired') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger badge-pill">Expired</span>';
}
?></td>
                        <td><a href="myssl.php?action=view&ssl_id=<?php echo $SSLInfo['order_id']; ?>" class="btn btn-rounded btn-sm btn-<?php echo $btn[0] ?>"><i class="fa fa-<?php echo $btn[1] ?>"></i>Manage</a></td>
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
        <p class="pb-10"><?php echo $count; ?> <?php echo $lang->I18N('SSL Certificates'); ?></p>
    </div>
</div>
