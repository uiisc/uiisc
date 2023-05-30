<?php
require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$data = array(
    'api_username' => post('username'),
    'api_password' => post('password'),
);

$where = array(
    'api_key' => 'FREESSL',
);

$result = $DB->update('ssl_api', $data, $where);

if ($result) {
    setMessage('SSL API updated <b>successfully!</b>');
} else {
    setMessage("Something went's <b>wrong!</b>", 'danger');
}

redirect('admin/settings', 'sslapi');
