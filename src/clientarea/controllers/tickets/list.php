<?php

$PageInfo['title'] = 'My Tickets';

require_once ROOT . '/core/library/userinfo.class.php';

$count = $DB->count('tickets', array('ticket_for' => $ClientInfo['client_id']));

if ($count > 0) {
    $rows = $DB->findAll('tickets', '*', array('ticket_for' => $ClientInfo['client_id']), "`ticket_id` DESC");
}
