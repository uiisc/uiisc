<?php
require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$data = array(
    'smtp_host' => post('host'),
    'smtp_username' => post('username'),
    'smtp_password' => post('password'),
    'smtp_port' => post('port'),
    'smtp_from' => post('from'),
);

$where = array(
    'smtp_key' => 'SMTP',
);

$result = $DB->update('smtp', $data, $where);

if ($result) {
    setMessage('SMTP updated <b>successfully!</b>');
} else {
    setMessage("Something went's <b>wrong!</b>", 'danger');
}

redirect('admin/settings', 'smtp');
