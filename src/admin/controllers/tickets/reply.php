<?php

require '../../application.php';

if (!isset($_POST['submit'])) {
    exit('Access Denied');
}

$ticket_id = post('ticket_id');

if (!$ticket_id) {
    exit('Access Denied');
}

$TicketInfo = $DB->find('tickets', 'ticket_email, ticket_for', array('ticket_id' => $ticket_id));

if (!$TicketInfo) {
    exit('Access Denied');
}

// update status
$resault = $DB->update('tickets', array('ticket_status' => '1'), array('ticket_id' => $ticket_id));

if ($resault) {
    $FormData = array(
        'reply_for' => $ticket_id,
        'reply_from' => 999999,
        'reply_content' => post('content'),
        'reply_date' => date('Y-m-d H:i:s'),
    );
    $resault_insert = $DB->insert('ticket_replies', $FormData);
    if ($resault_insert) {
        $ticket_url = setURL('clientarea/tickets', array('action' => 'view', 'ticket_id' => $ticket_id));

        $EmailContent = '<p>You have received a reply from Support Staff.</p>';
        $EmailDescription = '<a href="' . $ticket_url . '" target="_blank">View Ticket</a>';
        $email_body = email_build_body('Ticket Reply', 'there', $EmailContent, $EmailDescription);

        send_mail(array(
            'to' => $TicketInfo['ticket_email'],
            'subject' => 'Ticket Reply #' . $ticket_id,
            'message' => $email_body,
        ));
        // if (send_mail($msg_email)) {
        //     $email_insert = array(
        //         'email_subject' => 'Ticket Reply #' . $ticket_id,
        //         'email_date' => date('Y-m-d H:i:s'),
        //         'email_body' => $email_body,
        //         'email_for' => $TicketInfo['ticket_for'],
        //         'email_read' => 0
        //     );
        //     print_r($email_insert);
        //     // exit;
        //     $DB->insert('emails', $email_insert);
        // };
        setMessage('Reply added <b>successfully!</b>');
    } else {
        setMessage("Something went's <b>wrong!</b>", 'danger');
    }
} else {
    setMessage("Something went's <b>wrong!</b>", 'danger');
}

redirect('admin/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id));
