<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$ticket_id = get('ticket_id', 0);

if ($ticket_id > 0) {
    $TicketInfo = $DB->find('tickets', '*', array('ticket_id' => $ticket_id), null, 1);
    $ReplyCount = $DB->count('ticket_replies', array('reply_for' => $ticket_id));
    $ReplyInfo = $DB->findAll('ticket_replies', '*', array('reply_for' => $ticket_id), '`reply_id` DESC');
} else {
    $TicketInfo = null;
}
