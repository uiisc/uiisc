<?php

require __DIR__ . '/../../application.php';

$ticket_id = get('ticket_id');

if (!$ticket_id) {
    exit('Access Denied');
}

// 查找工单信息
$TicketInfo = $DB->find('tickets', 'ticket_email', array('ticket_id' => $ticket_id));

if (!$TicketInfo) {
    setMessage('Not Found !');
    redirect('admin/tickets');
}

// 查找客户信息
$ClientInfo = $DB->find('clients', 'hosting_client_email, hosting_client_fname', array('hosting_client_id' => $TicketInfo['ticket_for']));

if (!$ClientInfo) {
    setMessage('Not Found !');
    redirect('admin/tickets');
}

$resault = $DB->update('tickets', array('ticket_status' => 3), array('ticket_id' => $ticket_id));

if ($resault) {
    $ticket_url = setURL('admin/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id));
    $email_body = email_build_body('Ticket Closed',
        $ClientInfo['hosting_client_fname'],
        '<p>The ticket ("' . $ticket_id . '") had been closed.</p>',
        '<p>Click <a href="' . $ticket_url . '" target="_blank">here</a> for details.</p>'
    );

    send_mail(array(
        'to' => $TicketInfo['ticket_email'],
        'message' => $email_body,
        'subject' => 'Ticket Closed',
    ));

    setMessage('Ticket closed successfully !');
} else {
    setMessage("Something went's wrong !", 'danger');
}

redirect('admin/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id));
