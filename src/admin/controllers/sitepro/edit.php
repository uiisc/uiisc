<?php
require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$data = array(
    'builder_username' => post('username'),
    'builder_password' => post('password')
);

$where = array(
    'builder_id' => 'SITEPRO',
);

$result = $DB->update('builder_api', $data, $where);

if ($result) {
    setMessage('SitePro API updated <b>successfully!</b>');
} else {
    setMessage("Something went's <b>wrong!</b>", 'danger');
}

redirect('admin/settings', 'sitepro');
