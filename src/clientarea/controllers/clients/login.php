<?php

require_once __DIR__ . '/../../../core/application.php';

if (isset($_COOKIE['UIISC_MEMBER']) && $_COOKIE['UIISC_MEMBER'] != 'NULL') {
    redirect('clientarea/index');
}

if (isset($_POST['login'])) {
    $email = post('email');

    if (!$email || empty($email)) {
        setMessage('Please input <b>email</b> !', 'danger');
        redirect('clientarea/login');
    }

    $password = post('password');

    if (!$password || empty($password)) {
        setMessage('Please input <b>password</b> !', 'danger');
        redirect('clientarea/login');
    }

    $password_hash = hash('sha256', $password);

    $ClientInfo = $DB->find('clients', 'client_id, client_password, client_key', array(
        'client_email' => $email,
        'client_password' => $password_hash,
    ), null, 1);

    if (!$ClientInfo || empty($ClientInfo)) {
        setMessage('Invalid <b>email address </b>or<b> password</b> !', 'danger');
        redirect('clientarea/login');
    }

    if ($password_hash == $ClientInfo['client_password']) {
        $key = rand(000000, 999999);
        $token = hash('sha256', json_encode([$email, $ClientInfo['client_key'], $key]));
        $times = isset($_POST['remember']) ? 30 : 1;
        $token2 = ['email' => $email, 'token' => $token, 'key' => $key];
        setcookie('UIISC_MEMBER', base64_encode(gzcompress(json_encode($token2))), time() + $times * 86400, '/');
        setMessage('Logged in <b>successfully</b> !', 'success');
        redirect('clientarea/index');
    }

    setMessage('Invalid <b>email address </b>or<b> password</b> !', 'danger');
    redirect('clientarea/login');
    die();
}

$PageInfo['title'] = $lang->I18N('login');
$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';
