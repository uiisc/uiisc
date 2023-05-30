<?php

if (isset($_POST['submit'])) {
    require '../../application.php';
    $api_id = post('api_id');
    if (!$api_id) {
        setMessage('need field: api_id', 'danger');
        redirect('admin/hosting');
    }
    $data = array(
        'api_username' => post('api_username'),
        'api_password' => post('api_password'),
        'api_type' => post('api_type'),
        'api_key' => post('api_key'),
        'api_cpanel_url' => post('api_cpanel_url'),
        'api_server_ip' => post('api_server_ip'),
        'api_ns_1' => post('api_ns_1'),
        'api_ns_2' => post('api_ns_2'),
        'api_package' => post('api_package'),
        'api_callback_token' => post('api_callback_token')
    );

    $result = $DB->update('account_api', $data, array('api_id' => $api_id));

    if ($result) {
        setMessage('Hosting Provider updated successfully !');
    } else {
        setMessage("Something went's wrong !", 'danger');
    }

    redirect('admin/hosting');
} else {
    if (!defined('IN_CRONLITE')) {
        exit('Access Denied');
    }
    $id = get('id');
    if ($id > 0) {
        $data = $DB->find('account_api', '*', array('api_id' => $id), null, 1);
        $PageInfo = ['title' => 'Edit Hosting Provider #' . $id, 'rel' => ''];
    } else {
        setMessage('need field: id', 'danger');
        redirect('admin/hosting');
    }
}
