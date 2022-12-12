<?php

$current_route = 'clientarea/validate'; // TODO: make it automation
require_once __DIR__ . '/../../application.php';

if ($ClientInfo['client_status'] == 1) {
    setMessage('Your account has been <b>verified</b> !');
    redirect('clientarea/index');
}

if (isset($_POST['resendcode'])) {
    $Token = str_replace('$2y$10$', '', password_hash($ClientInfo['client_key'], PASSWORD_DEFAULT));
    $EmailContent = '<p>We\'ll like you to be a member of our service. Please copy the code from below in order to verify your account.</p>';
    $EmailDescription = '<div style="padding:1rem;background:#e6e6e6;overflow-x:auto;">' . $Token . '</div>';
    $email_body = email_build_body('Verify Email', $ClientInfo['client_fname'], $EmailContent, $EmailDescription);
    send_mail(array(
        'to' => $ClientInfo['client_email'],
        'message' => $email_body,
        'subject' => 'Verify Email'
    ));
    setMessage('Email sent <b>successfully !</b>', 'success');
}

redirect('clientarea/validate');
