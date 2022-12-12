<?php

require '../../application.php';

if (!isset($_POST['submit'])) {
    redirect('clientarea/settings');
}

$form_data = array(
    'client_fname'   => post('fname'),
    'client_lname'   => post('lname'),
    'client_phone'   => post('phone'),
    'client_company' => post('company'),
    'client_address' => post('address'),
    'client_country' => post('country'),
    'client_city'    => post('city'),
    'client_pcode'   => post('postal'),
    'client_state'   => post('state')
);

$where_data = array('client_id' => $ClientInfo['client_id']);

$data = $DB->update('clients', $form_data, $where_data);

if ($data == 1) {
    setMessage('Profile updated <b>successfully !</b>', 'success');
} else {
    setMessage(`Something went's <b>wrong!</b>`, 'danger');
}

redirect('clientarea/settings');
