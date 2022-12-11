<?php

require_once ROOT . '/core/handler/HostingHandler.php';
require_once ROOT . '/core/library/userinfo.class.php';
require_once ROOT . '/core/library/countries.php';

$client_id = get('client_id');

if (empty($client_id)) {
    redirect('admin/clients');
    exit();
}

$PageInfo['title'] = 'View client (' . $client_id . ')';

$ClientInfo = $DB->find('clients', '*', array('hosting_client_id' => $client_id), null, 1);

$CountryName = 'Not Defined';

foreach ($countries as $country) {
    if ($ClientInfo['hosting_client_country'] == $country['code']) {
        $CountryName = $country['name'];
        break;
    }
}

$count_account = $DB->count('account', array('account_client_id' => $ClientInfo['hosting_client_id']));
$count_ssl = $DB->count('ssl', array('ssl_for' => $ClientInfo['hosting_client_id']));
$count_tickets = $DB->count('tickets', array('ticket_for' => $ClientInfo['hosting_client_id']));
