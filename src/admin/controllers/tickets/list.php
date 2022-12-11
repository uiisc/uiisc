<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$count = $DB->count('tickets');
if ($count > 0) {
    $rows = $DB->findAll('tickets', '*', array(), "`ticket_id` DESC");
}
