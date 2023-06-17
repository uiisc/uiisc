<?php

if (isset($_POST['submit'])) {
    require '../../application.php';

    if (!post('api_type')) {
        setMessage('need field: api_type', 'danger');
        redirect('admin/ssl-provider');
    }

    if (!post('username')) {
        setMessage('need field: username', 'danger');
        redirect('admin/ssl-provider');
    }

    if (!post('password')) {
        setMessage('need field: password', 'danger');
        redirect('admin/ssl-provider');
    }

    $data = array(
        'api_type' => post('api_type'),
        'api_name' => post('api_name', ''),
        'api_username' => post('username'),
        'api_password' => post('password'),
    );

    $result = $DB->insert('ssl_api', $data);

    if ($result) {
        setMessage('SSL Provider added <b>successfully!</b>');
    } else {
        setMessage("Something went's <b>wrong!</b>", 'danger');
    }

    redirect('admin/ssl-provider');
}
