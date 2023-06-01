
<div class="content-wrapper">
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?php echo $lang->I18N('Tickets List'); ?></h3>
            <a href="index.php" class="btn text-white btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="card-body table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Department</th>
                    <th>Client Email</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td>#<?php echo $value['ticket_id']; ?></td>
                        <td><?php echo $value['ticket_subject']; ?></td>
                        <td><?php echo get_ticket_department($value['ticket_department']); ?></td>
                        <td><?php echo $value['ticket_email']; ?></td>
                        <td><?php echo $value['ticket_date']; ?></td>
                        <td><?php echo get_ticket_status_span($value['ticket_status']);
if ($value['ticket_status'] == '0') {
$btn = ['secondary', 'clock'];
} elseif ($value['ticket_status'] == '1') {
$btn = ['success', 'comment'];
} elseif ($value['ticket_status'] == '2') {
$btn = ['primary', 'comment'];
} elseif ($value['ticket_status'] == '3') {
$btn = ['danger', 'lock'];
}
?></td>
                        <td>
                            <a href="tickets.php?action=view&ticket_id=<?php echo $value['ticket_id']; ?>#reply" class="btn btn-sm btn-<?php echo $btn[0]; ?> btn-rounded">
                                <i class="fa fa-<?php echo $btn[1]; ?>"></i> Manage
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nothing found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <hr />
        <div class="card-footer">
            <p class="pb-10"><?php echo $count; ?> Records Founds</p>
        </div>
    </div>
</div>
</div>
