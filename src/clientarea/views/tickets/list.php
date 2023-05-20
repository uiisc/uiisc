<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0"><?php echo $lang->I18N('My Tickets'); ?></h5>
            <a href="tickets.php?action=add" class="btn text-white btn-success btn-sm">New Ticket</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="80%">Subject</th>
                    <th width="5%">Department</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $TicketInfo): ?>
                    <tr>
                        <td>#<?php echo $TicketInfo['ticket_id']; ?></td>
                        <td><?php echo str_rot13($TicketInfo['ticket_subject']); ?></td>
                        <td><?php echo get_ticket_department($TicketInfo['ticket_department']); ?></td>
                        <td><?php
if ($TicketInfo['ticket_status'] == '0') {
    $btn = ['secondary', 'clock'];
    echo '<span class="badge bg-secondary badge-pill">Open</span>';
} elseif ($TicketInfo['ticket_status'] == '1') {
    $btn = ['success', 'comment'];
    echo '<span class="badge bg-success badge-pill">Support Reply</span>';
} elseif ($TicketInfo['ticket_status'] == '2') {
    $btn = ['primary', 'comment'];
    echo '<span class="badge bg-primary badge-pill">Customer Reply</span>';
} elseif ($TicketInfo['ticket_status'] == '3') {
    $btn = ['danger', 'lock'];
    echo '<span class="badge bg-danger badge-pill">Closed</span>';
}
?></td>
                        <td>
                            <a href="tickets.php?action=view&ticket_id=<?php echo $TicketInfo['ticket_id']; ?>#reply" class="btn btn-sm btn-<?php echo $btn[0]; ?> btn-rounded">
                                <i class="fa fa-<?php echo $btn[1]; ?>"></i> Manage
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nothing found</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <p class="pb-10"><?php echo $count; ?> Support Tickets</p>
    </div>
</div>