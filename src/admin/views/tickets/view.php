<?php
if (!$TicketInfo) {
    include __DIR__ . '/../common/404.php';
    exit();
}
?>
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0"><?php echo $lang->I18N('Tickets Details'); ?> (#<?php echo $ticket_id; ?>)</h5>
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
    <div class="card py-10">
        <div class="d-flex justify-content-between align-items-center px-5">
            <b class="py-5">Client Reply</b>
            <span><?php echo $TicketInfo['ticket_date']; ?></span>
        </div><hr>
        <div class="px-10 m-5">
            <?php echo $TicketInfo['ticket_content']; ?>
        </div>
    </div>

<?php if ($ReplyCount > 0): ?>
<?php foreach ($ReplyInfo as $value): ?>
    <div class="card py-10">
        <div class="d-flex justify-content-between align-items-center px-5">
            <b class="py-5"><?php echo $value['reply_from'] == 999999 ? 'Support Staff' : 'Client Reply'; ?></b>
            <span><?php echo $value['reply_date']; ?></span>
        </div>
        <hr>
        <div class="px-10 m-5">
            <?php echo $value['reply_content']; ?>
        </div>
    </div>
<?php endforeach;?>
<?php else: ?>
    <div class="card py-5">
        <div class="text-center">
            <p>No replies to this ticket yet</p>
        </div>
    </div>
<?php endif;?>

    <div class="card p-10" id="reply">
<?php if ($TicketInfo['ticket_status'] == '3'): ?>
        <div class="text-center">
            <p>You can't reply to this ticket anymore open new ticket for any further questions.</p>
        </div>
<?php else: ?>
        <form action="controllers/tickets/reply.php" method="post" class="p-10">
            <div class="form-group mb-10">
                <label class="form-label required" for="content">Reply content</label>
                <textarea class="form-control" name="content" id="content" style="max-width: 100vw;" style="height: 200px"></textarea>
                <input type="hidden" name="ticket_id" value="<?php echo $TicketInfo['ticket_id']; ?>">
                <input type="hidden" name="ticket_email" value="<?php echo $TicketInfo['ticket_email']; ?>">
            </div>
            <div class="form-group my-0">
                <button class="btn btn-sm btn-primary" name="submit">Add Reply</button>
                <a href="controllers/tickets/close.php?ticket_id=<?php echo $ticket_id; ?>" class="btn btn-danger btn-sm">Close Ticket</a>
            </div>
        </form>
<?php endif;?>
    </div>
</div>
