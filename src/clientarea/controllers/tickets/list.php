<?php

$PageInfo['title'] = $lang->I18N('My Tickets');

$count = $DB->count('tickets', array('ticket_client_id' => $ClientInfo['client_id']));

if ($count > 0) {
    $rows = $DB->findAll('tickets', '*', array('ticket_client_id' => $ClientInfo['client_id']), "`ticket_id` DESC");
}
