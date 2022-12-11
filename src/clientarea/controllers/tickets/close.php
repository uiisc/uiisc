<?php

require __DIR__ . '/../../application.php';

$ticket_id = get('ticket_id');

if (!$ticket_id) {
    exit('Access Denied');
}

$resault = $DB->update('tickets', array('ticket_status' => 3), array('ticket_id' => $ticket_id));

if ($resault) {
    $TicketInfo = $DB->find('tickets', 'ticket_email', $where, null, 1);
    $TicketUrl = setURL('clientarea/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id));
    $EmailContent = '<p>You have closed a ticket(' . $ticket_id . ') .</p>';
    $EmailDescription = '<p>Click <a href="' . $TicketUrl . '" target="_blank">here</a> for details.</p>';
    $email_body = email_build_body('Ticket Closed', $ClientInfo['client_fname'], $EmailContent, $EmailDescription);

    send_mail(array(
        'to' => $TicketInfo['ticket_email'],
        'message' => $email_body,
        'subject' => 'Ticket Closed (#' . $ticket_id . ')',
    ));
    setMessage('Ticket closed <b>successfully</b> !', 'success');
} else {
    setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
}

redirect('clientarea/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id));
