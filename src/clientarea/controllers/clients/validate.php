<?php

if (isset($_POST['validate'])) {
    $current_route = 'clientarea/validate'; // TODO: make it automation
    require_once __DIR__ . '/../../application.php';

    $validation_code = post('validation_code');

    if (empty($validation_code)) {
        setMessage('<b>Empty</b> validation code !', 'danger');
        redirect('clientarea/validate');
    }

    $token = '$2y$10$' . post('validation_code');
    $client_key = $ClientInfo['client_key'];

    if (password_verify($client_key, $token)) {
        $resault = $DB->update('clients', array('client_status' => '1'), array('client_key' => $client_key));
        if ($resault) {
            setMessage('validated <b>successfully</b> !', 'success');
            redirect('clientarea/index');
        } else {
            setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
        }
    } else {
        setMessage('<b>Invalid</b> validation code !', 'danger');
    }
    redirect('clientarea/validate');
}

if ($ClientInfo['client_status'] == 1) {
    setMessage('Your account has been <b>verified</b> !');
    redirect('clientarea/index');
}

$PageInfo['title'] = 'Validate Account';
