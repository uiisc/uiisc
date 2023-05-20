<?php
if (!$TicketInfo) {
    include __DIR__ . '/../common/404.php';
    exit();
}
?>

<div class="content-wrapper">
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0"><?php echo $lang->I18N('Tickets Details'); ?> (#<?php echo $ticket_id; ?>)</h5>
            <a href="tickets.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <b>Subject:</b>
                    <span><?php echo $TicketInfo['ticket_subject']; ?></span>
                </div>
                <div class="col-md-6">
                    <b>Status:</b>
                    <span><?php echo get_ticket_status_span($TicketInfo['ticket_status']); ?></span>
                </div>
                <div class="col-md-6">
                    <b>Department:</b>
                    <span><?php echo get_ticket_department($TicketInfo['ticket_department']); ?></span>
                </div>
                <div class="col-md-6">
                    <b>Date:</b>
                    <span><?php echo $TicketInfo['ticket_date']; ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Client Reply</strong>
            <span><?php echo $TicketInfo['ticket_date']; ?></span>
        </div>
        <hr />
        <div class="card-body">
            <?php echo $TicketInfo['ticket_content']; ?>
        </div>
    </div>
<?php if ($ReplyCount > 0): ?>
<?php foreach ($ReplyInfo as $value): ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong><?php echo $value['reply_from'] == 999999 ? 'Support Staff' : 'Client Reply'; ?></strong>
            <span><?php echo $value['reply_date']; ?></span>
        </div>
        <hr />
        <div class="card-body m-5">
            <?php echo $value['reply_content']; ?>
        </div>
    </div>
<?php endforeach;?>
<?php else: ?>
    <div class="card">
        <div class="card-body text-center">No replies to this ticket yet.</div>
    </div>
<?php endif;?>

<?php if ($TicketInfo['ticket_status'] == '3'): ?>
    <div class="card">
        <div class="card-body text-center">You can't reply to this ticket anymore open new ticket for any further questions.</div>
    </div>
<?php else: ?>
    <div class="card" id="reply">
        <form action="controllers/tickets/reply.php" method="post">
            <label class="card-header form-label required" for="content">Reply content</label>
            <div class="card-body">
                <div class="form-group mb-10">
                    <textarea class="form-control" name="content" id="content"></textarea>
                    <input type="hidden" name="ticket_id" value="<?php echo $TicketInfo['ticket_id']; ?>">
                    <input type="hidden" name="ticket_email" value="<?php echo $TicketInfo['ticket_email']; ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-primary" name="submit">Add Reply</button>
                    <a href="controllers/tickets/close.php?ticket_id=<?php echo $ticket_id; ?>" class="btn btn-danger btn-sm">Close Ticket</a>
                    <a href="tickets.php" class="btn btn-sm btn-danger pull-right"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
                </div>
            </div>
        </form>
<?php endif;?>
    </div>
</div>
</div>
