<?php
if (isset($_POST['submit'])) {
    require '../../application.php';

    if (!post('id')) {
        setMessage('need field: id', 'danger');
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
        'api_name' => post('api_name', ''),
        'api_username' => post('username'),
        'api_password' => post('password'),
    );
    $where = array(
        'id' => post('id'),
    );

    $result = $DB->update('ssl_api', $data, $where);

    if ($result) {
        setMessage('SSL API updated <b>successfully!</b>');
    } else {
        setMessage("Something went's <b>wrong!</b>", 'danger');
    }

    redirect('admin/ssl-provider', '', array('action' => 'details', 'id' => post('id')));
} else {
    if (!defined('IN_CRONLITE')) {
        exit('Access Denied');
    }
    $id = get('id');
    if ($id > 0) {
        $data = $DB->find('ssl_api', '*', array('id' => $id), null, 1);
    } else {
        setMessage('need field: id', 'danger');
        redirect('admin/ssl-provider');
    }
}
