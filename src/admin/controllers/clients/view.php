<?php

require_once ROOT . '/core/library/countries.php';

$client_id = get('client_id');

if (empty($client_id)) {
    redirect('admin/clients');
}


$ClientInfo = $DB->find('clients', '*', array('client_id' => $client_id), null, 1);

$CountryName = 'Not Defined';

foreach ($countries as $country) {
    if ($ClientInfo['client_country'] == $country['code']) {
        $CountryName = $country['name'];
        break;
    }
}

$PageInfo['title'] = 'View client (' . $client_id . ')';
$count_account = $DB->count('account', array('account_client_id' => $ClientInfo['client_id']));
$count_ssl = $DB->count('ssl', array('ssl_client_id' => $ClientInfo['client_id']));
$count_tickets = $DB->count('tickets', array('ticket_client_id' => $ClientInfo['client_id']));
