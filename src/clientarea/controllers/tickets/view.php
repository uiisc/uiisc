<?php

require_once __DIR__ . '/../../application.php';

$ticket_id = get('ticket_id', 0);

if (!$ticket_id) {
    setMessage('need field: ticket_id', 'danger');
    redirect('clientarea/tickets');
}

$where = array(
    'ticket_id' => $ticket_id,
    'ticket_for' => $ClientInfo['hosting_client_id'],
);

$TicketInfo = $DB->find('tickets', '*', $where, null, 1);

if ($TicketInfo) {
    $PageInfo['title'] = 'View Ticket #' . $ticket_id;
    $ReplyCount = $DB->count('ticket_replies', array('reply_for' => $ticket_id));
    $ReplyInfo = $DB->findAll('ticket_replies', '*', array('reply_for' => $ticket_id), '`reply_id` DESC');
} else {
    setMessage('not found', 'danger');
    redirect('clientarea/tickets');
}
