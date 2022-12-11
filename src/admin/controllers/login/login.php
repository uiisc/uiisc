<?php

require_once __DIR__ . '/../../../core/application.php';

if (!isset($_POST['login'])) {
    redirect('admin/login');
    exit();
}

$admin_email = post('email');

if (empty($admin_email)) {
    setMessage('Email address is required !', 'danger');
    redirect('admin/login');
}

$admin_password = post('password');

if (empty($admin_password)) {
    setMessage('Password is required !', 'danger');
    redirect('admin/login');
}

$admin_password = hash('sha256', post('password'));

$data = $DB->find('admin', '*', array(
    'admin_email' => $admin_email,
    'admin_password' => $admin_password,
));

if (!empty($data) && is_array($data)) {
    if (isset($_POST['remember'])) {
        $_SESSION['UIISC_ADMIN'] = base64_encode($data['admin_key']);
    } else {
        $_SESSION['UIISC_ADMIN'] = base64_encode($data['admin_key']);
    }
    setMessage('Logged in successfully !');
    redirect('admin/index');
} else {
    setMessage('Invalid email address or password !', 'danger');
    redirect('admin/login');
}
