<?php

require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    redirect('clientarea/settings');
}

$form_data = array(
    'old_password' => post('old_password'),
    'new_password' => post('new_password'),
    'hashed_password' => hash('sha256', post('new_password')),
    'user_key' => $ClientInfo['hosting_client_key'],
    'user_password' => $ClientInfo['hosting_client_password'],
);

if (hash('sha256', $form_data['old_password']) == $form_data['user_password']) {

    $update_data = array('hosting_client_password' => $form_data['hashed_password']);
    $where_data = array('hosting_client_key' => $form_data['user_key']);
    $result = $DB->update('clients', $update_data, $where_data);

    if ($result) {
        setMessage('Password changed <b>successfully!</b>', 'success');
        setcookie('UIISC_MEMBER', 'NULL', -1, '/');
        redirect('clientarea/login');
    } else {
        setMessage('Something went' . "'" . 's <b>wrong !</b>', 'danger');
    }
} else {
    setMessage('Invalid user <b>password !</b>', 'danger');
}

redirect('clientarea/settings');
