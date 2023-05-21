<?php

require __DIR__ . '/../../application.php';

if (isset($_POST['submit'])) {
    $FormData = array(
        'ticket_subject' => post('subject'),
        'ticket_email' => post('email'),
        'ticket_content' => post('editor'),
        'ticket_department' => post('department'),
        'ticket_client_id' => $ClientInfo['client_id'],
        'ticket_date' => date('Y-m-d H:i:s'),
        'ticket_status' => 0,
    );
    $ticket_id = $DB->insert('tickets', $FormData);

    if ($ticket_id) {
        $ticket_url = setURL('clientarea/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id));

        // to customer
        send_mail(array(
            'to' => $FormData['ticket_email'],
            'subject' => 'New Ticket (#' . $ClientInfo['client_id'] . ')',
            'message' => email_build_body('New Ticket',
                $ClientInfo['client_fname'],
                '<p>You have opened a support ticket which will be processed soon. It can take up to 2 hours.</p>',
                '<p>Click <a href="' . $ticket_url . '" target="_blank">here</a> for details.</p>'
            ),
        ));

        // to Administrator
        send_mail(array(
            'to' => $SiteConfig['site_email'],
            'subject' => 'New Ticket (#' . $ClientInfo['client_id'] . ')',
            'message' => email_build_body('New Ticket',
                'Administrator',
                '<p>We have received a new support ticket request, please handle it in time.</p>',
                '<p>Click <a href="' . setURL('admin/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id)) . '" target="_blank">here</a> for details.</p>'
            ),
        ));
        setMessage('Ticket added <b>successfully</b> !', 'success');
        redirect('clientarea/tickets', '', array('action' => 'view', 'ticket_id' => $ticket_id));
    } else {
        setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
    }
    redirect('clientarea/tickets');
    die();
}

$PageInfo['title'] = 'New Ticket';
