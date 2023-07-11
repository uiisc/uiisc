<?php
if (!defined('IN_CRONLITE')) {
    exit();
}
?>

<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 mx-5">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <a href="accounts.php?action=add" class="btn text-white btn-success btn-sm">
                <i class="fa fa-plus-circle"></i> <?php echo $lang->I18N('add'); ?>
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="45%">Username</th>
                    <th width="20%">Domain</th>
                    <th width="5%">Date</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                </thead>
                <tbody>
                <?php if ($total_count > 0): ?>
                    <?php foreach ($rows as $value): ?>

                    <tr>
                        <td># <?php echo $value['account_id']; ?></td>
                        <td><?php echo $value['account_username']; ?></td>
                        <td><?php echo $value['account_domain']; ?></td>
                        <td><?php echo $value['account_addtime']; ?></td>
                        <td><?php
if ($value['account_status'] == '0') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger text-white border-0">Inactive</span>';
} elseif ($value['account_status'] == '1') {
    $btn = ['success', 'globe'];
    echo '<span class="badge bg-success border-0 text-white">Activated</span>';
} elseif ($value['account_status'] == '2') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger text-white border-0">Suspended</span>';
}
?></td>
                        <td>
                            <a href="accounts.php?action=view&account_id=<?php echo $value['account_id']; ?>" class="btn btn-sm btn-<?php echo $btn[0]; ?> btn-rounded">
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
        <?php if ($active_count > 2): ?>
        <div class="alert alert-secondary">
            <i class="fa fa-info-circle mr-5"></i>
            You are about to reach your account limit please upgrade to premium in order to get more hosting space and resources.
        </div>
        <?php endif;?>

        <p class="pb-10">Activated Accounts: <?php echo $active_count; ?> / 3, Total: <?php echo $total_count; ?></p>
    </div>
</div>
