<?php

require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    redirect('clientarea/settings');
}

$old_password = post('old_password');
$old_password = hash('sha256', $old_password);
$new_password = post('new_password');
$new_password = hash('sha256', $new_password);

if ($old_password == $ClientInfo['client_password']) {
    $update_data = array('client_password' => $new_password);
    $where_data = array('client_id' => $ClientInfo['client_id']);
    $result = $DB->update('clients', $update_data, $where_data);

    if ($result) {
        setMessage('Password changed <b>successfully!</b>', 'success');
        setcookie('UIISC_MEMBER', 'NULL', -1, '/', $site_domain);
        redirect('clientarea/login');
    } else {
        setMessage('Something went' . "'" . 's <b>wrong !</b>', 'danger');
    }
} else {
    setMessage('Invalid user <b>password !</b>', 'danger');
}

redirect('clientarea/settings');
