<?php

require_once ROOT . '/core/library/countries.php';

$CountryName = 'Not Defined';

foreach ($countries as $country) {
    if ($ClientInfo['client_country'] == $country['code']) {
        $CountryName = $country['name'];
        break;
    }
}

$PageInfo['title'] = $lang->I18N('My Profile');
