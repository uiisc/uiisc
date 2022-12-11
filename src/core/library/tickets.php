<?php

function get_ticket_department($key = '')
{
    $ticket_types = array(
        'hosting' => 'Hosting Issue',
        'ssl' => 'SSL Issue',
        'domain' => 'Domain Issue',
        'tech' => 'Technical Issue',
        'client' => 'Customer Issue',
    );
    return isset($ticket_types[$key]) ? $ticket_types[$key] : '';
}

function get_ticket_status_span($status)
{
    if ($status == '0') {
        return '<span class="badge bg-success">Open</span>';
    } elseif ($status == '1') {
        return '<span class="badge bg-success text-white">Support Reply</span>';
    } elseif ($status == '2') {
        return '<span class="badge bg-success">Customer Reply</span>';
    } elseif ($status == '3') {
        return '<span class="badge bg-danger">Closed</span>';
    }
    return '';
}
