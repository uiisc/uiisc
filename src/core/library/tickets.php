<?php

function get_ticket_department($key = '')
{
    global $lang;
    $ticket_types = array(
        'order'   => $lang->I18N('Order Issue'),
        'hosting' => $lang->I18N('Hosting Issue'),
        'ssl'     => $lang->I18N('SSL Issue'),
        'domain'  => $lang->I18N('Domain Issue'),
        'tech'    => $lang->I18N('Technical Issue'),
        'client'  => $lang->I18N('Customer Issue'),
    );
    return isset($ticket_types[$key]) ? $ticket_types[$key] : '';
}

function get_ticket_status_span($status)
{
    global $lang;
    if ($status == '0') {
        return '<span class="label label-primary">' . $lang->I18N('Opened') . '</span>';
    } elseif ($status == '1') {
        return '<span class="label label-success">' . $lang->I18N('Support Reply') . '</span>';
    } elseif ($status == '2') {
        return '<span class="label label-info">' . $lang->I18N('Customer Reply') . '</span>';
    } elseif ($status == '3') {
        return '<span class="label label-default">' . $lang->I18N('Closed') . '</span>';
    }
    return '';
}
