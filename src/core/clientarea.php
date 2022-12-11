<?php

if ($SiteConfig['site_status'] != 1) {
    if (empty($current_route) || $current_route != 'clientarea/maintaince') {
        redirect('clientarea/maintaince');
    }
} else if (isset($_COOKIE['UIISC_MEMBER'])) {
    $data = json_decode(gzuncompress(base64_decode($_COOKIE['UIISC_MEMBER'])), true);
    $token = $data['token'];
    $email = $data['email'];
    $key = $data['key'];
    $ClientInfo = $DB->find('clients', '*', array('hosting_client_email' => $email), null, 1);

    if ($ClientInfo) {
        if ($ClientInfo['hosting_client_status'] == '0') {
            if (empty($current_route) || $current_route != 'clientarea/validate') {
                // redirect to clientarea/validate
                redirect('clientarea/validate');
            }
        } elseif ($ClientInfo['hosting_client_status'] == '2') {
            if (empty($current_route) || $current_route != 'clientarea/suspended') {
                // redirect to clientarea/suspended
                redirect('clientarea/suspended');
            }
        }

        $verify = hash('sha256', json_encode([$email, $ClientInfo['hosting_client_key'], $key]));
        if (trim($token) !== trim($verify)) {
            setcookie('UIISC_MEMBER', '', -1, '/');
            setMessage('Login to <b>continue!</b>', 'danger');
            redirect('clientarea/login');
        }
    } else {
        setcookie('UIISC_MEMBER', '', -1, '/');
        setMessage('Login to <b>continue!</b>', 'danger');
        redirect('clientarea/login');
    }
} else {
    setMessage('Login to <b>continue!</b>', 'danger');
    redirect('clientarea/login');
}
