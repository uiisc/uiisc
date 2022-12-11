<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">My Tickets</h5>
            <a href="index.php" class="btn text-white btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="50%">Subject</th>
                    <th width="5%">Department</th>
                    <th width="30%">Client Email</th>
                    <th width="5%">Date</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
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
        <p class="pb-10"><?php echo $count; ?> Records Founds</p>
    </div>
</div>