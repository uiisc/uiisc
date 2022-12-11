<?php

require '../../application.php';

if (!isset($_POST['submit'])) {
    redirect('clientarea/settings');
}

$form_data = array(
    'hosting_client_fname' => post('fname'),
    'hosting_client_lname' => post('lname'),
    'hosting_client_phone' => post('phone'),
    'hosting_client_company' => post('company'),
    'hosting_client_address' => post('address'),
    'hosting_client_country' => post('country'),
    'hosting_client_city' => post('city'),
    'hosting_client_pcode' => post('postal'),
    'hosting_client_state' => post('state')
);

$where_data = array('hosting_client_key' => $ClientInfo['hosting_client_key']);

$data = $DB->update('clients', $form_data, $where_data);

if ($data == 1) {
    setMessage('Profile updated <b>successfully !</b>', 'success');
} else {
    setMessage(`Something went's <b>wrong!</b>`, 'danger');
}

redirect('clientarea/settings');
