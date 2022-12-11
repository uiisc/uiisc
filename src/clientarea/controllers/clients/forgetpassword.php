<?php

require_once __DIR__ . '/../../../core/application.php';

if (isset($_COOKIE['UIISC_MEMBER']) && $_COOKIE['UIISC_MEMBER'] != 'NULL') {
    setMessage('Your account has been logged !', 'danger');
    redirect('clientarea/index');
}

if (isset($_POST['reset'])) {
    $post_mail = post('email');
    if (empty($post_mail)) {
        setMessage('need field: <b>email</b> !', 'danger');
        redirect('clientarea/forgetpassword');
    }

    $ClientInfo = $DB->find('clients', 'hosting_client_key, hosting_client_fname', array('hosting_client_email' => $post_mail), null, 1);
    if ($ClientInfo) {
        $TokenId = password_hash($ClientInfo['hosting_client_key'], PASSWORD_DEFAULT);
        $TokenData = [['token' => str_replace('$2y$10$', '', $TokenId), 'email' => $post_mail]];
        $Token = base64_encode(json_encode($TokenData));

        $EmailContent = '<p>You have requested a password reset. If you have not requested a password reset please let us know by opening a support ticket in the clientarea.</p>';
        $EmailDescription = '<div style="padding:1rem;background:#e6e6e6;overflow-x:auto;">' . $Token . '</div>';
        $EmailDescription .= '<p><a href="' . setURL('clientarea/resetpassword') . '" target="_blank">Reset Password</a></p>';
        $email_body = email_build_body('Reset Password', $ClientInfo['hosting_client_fname'], $EmailContent, $EmailDescription);

        send_mail(array(
            'to' => $post_mail,
            'message' => $email_body,
            'subject' => 'Forget Password'
        ));
        setMessage('Email sent <b>successfully</b> !', 'success');
    } else {
        setMessage('Invalid <b>email</b> !', 'danger');
    }
    redirect('clientarea/forgetpassword');
    die();
}

$PageInfo['title'] = 'Forget Password';
$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';
