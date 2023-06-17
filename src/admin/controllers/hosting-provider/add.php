<?php

if (isset($_POST['submit'])) {
    require '../../application.php';

    if (!post('api_type')) {
        setMessage('need field: api_type', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_key')) {
        setMessage('need field: api_key', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_username')) {
        setMessage('need field: api_username', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_password')) {
        setMessage('need field: api_password', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_server_domain')) {
        setMessage('need field: api_server_domain', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_cpanel_url')) {
        setMessage('need field: api_cpanel_url', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_server_ip')) {
        setMessage('need field: api_server_ip', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_server_ftp_domain')) {
        setMessage('need field: api_server_ftp_domain', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_server_sql_domain')) {
        setMessage('need field: api_server_sql_domain', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_ns_1')) {
        setMessage('need field: api_ns_1', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_ns_2')) {
        setMessage('need field: api_ns_2', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_package')) {
        setMessage('need field: api_package', 'danger');
        redirect('admin/hosting');
    }

    if (!post('api_callback_token')) {
        setMessage('need field: api_callback_token', 'danger');
        redirect('admin/hosting');
    }


    $data = array(
        'api_username' => post('api_username'),
        'api_password' => post('api_password'),
        'api_type' => post('api_type'),
        'api_key' => post('api_key'),
        'api_server_domain' => post('api_server_domain'),
        'api_cpanel_url' => post('api_cpanel_url'),
        'api_server_ftp_domain' => post('api_server_ftp_domain'),
        'api_server_sql_domain' => post('api_server_sql_domain'),
        'api_server_ip' => post('api_server_ip'),
        'api_ns_1' => post('api_ns_1'),
        'api_ns_2' => post('api_ns_2'),
        'api_package' => post('api_package'),
        'api_callback_token' => post('api_callback_token')
    );

    $result = $DB->insert('account_api', $data);

    if ($result) {
        setMessage('Hosting Provider added successfully !');
    } else {
        setMessage("Something went's wrong !", 'danger');
    }

    redirect('admin/hosting');
}
