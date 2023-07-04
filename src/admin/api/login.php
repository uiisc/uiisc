<?php

require_once __DIR__ . '/application.php';

@header('Content-Type: application/json; charset=UTF-8');

if (!checkRefererHost()) exit(json_encode(['code' => 403, 'msg' => 'error' ]));

$admin_email = post('email');

if (empty($admin_email)) {
    exit(json_encode(['code' => -1, 'msg' => 'Email address is required !' ]));
}

$admin_password = post('password');

if (empty($admin_password)) {
    exit(json_encode(['code' => -1, 'msg' => 'Password is required !' ]));
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
    exit(json_encode(['code' => 0, 'msg' => 'Logged in successfully !' ]));
} else {
    exit(json_encode(['code' => -1, 'msg' => 'Invalid email address or password !' ]));
}
