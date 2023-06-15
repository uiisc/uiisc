<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('home'); ?></a></li>
            <li><a href="tickets.php"><?php echo $lang->I18N('Tickets List'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('Tickets Details'); ?></li>
        </ol>
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="pull-right">
                <?php if ($TicketInfo['ticket_status'] != '3'): ?>
                    <a href="controllers/tickets/close.php?ticket_id=<?php echo $ticket_id; ?>" class="btn btn-danger btn-xs"><?php echo $lang->I18N('close'); ?></a>
                <?php endif; ?>
                    <!-- <a href="tickets.php?action=add" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?></a> -->
                    <a href="tickets.php" class="btn btn-primary btn-xs"><i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?></a>
                </div>
                <div class="panel-title">
                    <?php echo $PageInfo['title']; ?>
                    <span class="label label-default"> ID <?php echo $ticket_id; ?></span>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 mb-10">
                        <b>Subject:</b>
                        <span><?php echo $TicketInfo['ticket_subject']; ?></span>
                    </div>
                    <div class="col-md-6 mb-10">
                        <b>Status:</b>
                        <span><?php echo get_ticket_status_span($TicketInfo['ticket_status']); ?></span>
                    </div>
                    <div class="col-md-6 mb-10">
                        <b>Department:</b>
                        <span><?php echo get_ticket_department($TicketInfo['ticket_department']); ?></span>
                    </div>
                    <div class="col-md-6 mb-10">
                        <b>Date:</b>
                        <span><?php echo $TicketInfo['ticket_date']; ?></span>
                    </div>
                </div>
                <!-- <hr /> -->
                <p><b>Ticket content :</b></p>
                <?php echo $TicketInfo['ticket_content']; ?>
            </div>
        </div>
<?php if ($ReplyCount > 0): ?>
    <?php foreach ($ReplyInfo as $value): ?>
        <div class="panel <?php echo $value['reply_from'] == 999999 ? 'panel-default' : 'panel-success'; ?>">
            <div class="panel-heading">
                <strong><?php echo $value['reply_from'] == 999999 ? 'Support Staff' : 'Client Reply'; ?></strong>
                <span><?php echo $value['reply_date']; ?></span>
            </div>
            <div class="panel-body">
                <?php echo $value['reply_content']; ?>
            </div>
        </div>
    <?php endforeach;?>
<?php else: ?>
        <div class="panel panel-default">
            <div class="panel-body text-center">No replies to this ticket yet.</div>
        </div>
<?php endif;?>

<?php if ($TicketInfo['ticket_status'] == '3'): ?>
        <div class="panel panel-default">
            <div class="panel-body text-center">You can't reply to this ticket anymore open new ticket for any further questions.</div>
        </div>
<?php else: ?>
        <form action="controllers/tickets/reply.php" method="post">
            <input type="hidden" name="ticket_id" value="<?php echo $TicketInfo['ticket_id']; ?>">
            <input type="hidden" name="ticket_email" value="<?php echo $TicketInfo['ticket_email']; ?>">
            <div class="panel panel-default" id="reply">
                <div class="panel-heading">
                    Reply content
                </div>
                <div class="panel-body">
                    <textarea class="form-control" name="content" id="content"></textarea>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sm btn-primary" name="submit">Add Reply</button>
                    <a href="controllers/tickets/close.php?ticket_id=<?php echo $ticket_id; ?>" class="btn btn-danger btn-sm">Close Ticket</a>
                </div>
            </div>
        </form>
<?php endif;?>
    </div>
</div>
