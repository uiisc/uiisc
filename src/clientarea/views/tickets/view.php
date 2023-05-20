<div class="container-fluid">
    <div class="card m-20 py-10">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0"><?php echo $lang->I18N('Tickets Details'); ?> #<?php echo $ticket_id; ?></h5>
            <a href="tickets.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <div class="mb-20">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mx-10 my-5">
                        <b>Subject:</b>
                        <span><?php echo $TicketInfo['ticket_subject']; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mx-10 my-5">
                        <b>Status:</b>
                        <span><?php echo get_ticket_status_span($TicketInfo['ticket_status']); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mx-10 my-5">
                        <b>Department:</b>
                        <span><?php echo get_ticket_department($TicketInfo['ticket_department']); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mx-10 my-5">
                        <b>Date:</b>
                        <span><?php echo $TicketInfo['ticket_date']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card m-20 py-10">
        <div class="d-flex justify-content-between align-items-center">
            <b class="py-5"><?php echo $ClientInfo['client_fname'] . ' ' . $ClientInfo['client_lname']; ?></b>
            <span><?php echo $TicketInfo['ticket_date']; ?></span>
        </div>
        <hr>
        <div class="m-5">
            <?php echo $TicketInfo['ticket_content']; ?>
        </div>
    </div>
<?php if ($ReplyCount > 0): ?>
<?php foreach ($ReplyInfo as $value): ?>
        <div class="card m-20 py-10">
            <div class="d-flex justify-content-between align-items-center">
                <b class="py-5"><?php if ($value['reply_from'] == $ClientInfo['client_id']) {
    echo $ClientInfo['client_fname'] . ' ' . $ClientInfo['client_lname'];
} else {
    echo 'Staff Member';
}?></b>
                <span><?php echo $value['reply_date']; ?></span>
            </div>
            <hr>
            <div class="m-5">
                <?php echo $value['reply_content']; ?>
            </div>
        </div>
<?php endforeach;?>
<?php else: ?>
        <div class="card p-5">
            <div class="text-center">
                <p>No replies to this ticket yet</p>
            </div>
        </div>
<?php endif;?>
    <div class="card m-20 p-15" id="reply">
<?php if ($TicketInfo['ticket_status'] == '3'): ?>
        <div class="text-center">
            <p>You can't reply to this ticket anymore open new ticket for any further questions.</p>
        </div>
<?php else: ?>
        <form action="controllers/tickets/reply.php" method="post" class="p-10">
            <div class="form-group mb-10">
                <label class="form-label required">Reply content</label>
                <textarea class="form-control" name="editor" style="max-width: 100vw;" id="content" style="height: 200px"></textarea>
                <input type="hidden" name="ticket_id" value="<?php echo $TicketInfo['ticket_id']; ?>">
            </div>
            <div class="form-group my-0">
                <button class="btn btn-sm btn-primary" name="submit">Add Reply</button>
                <a href="controllers/tickets/close.php?ticket_id=<?php echo $TicketInfo['ticket_id'] ?>" class="btn btn-danger btn-sm">Close Ticket</a>
            </div>
        </form>
<?php endif;?>
    </div>
</div>