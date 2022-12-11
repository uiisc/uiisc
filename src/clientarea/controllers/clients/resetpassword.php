<?php

require_once __DIR__ . '/../../../core/application.php';

if (isset($_COOKIE['UIISC_MEMBER']) && $_COOKIE['UIISC_MEMBER'] != 'NULL') {
    setMessage('Your account has been logged !', 'danger');
    redirect('clientarea/index');
}

if (isset($_POST['reset'])) {
    $post_token = post('token');
    $new_password = post('password');

    try {
        $TokenInfo = json_decode(base64_decode($post_token));
    } catch (Exception $e) {
        setMessage('Invalid reset <b>token</b> !', 'danger');
        redirect('clientarea/resetpassword');
    }

    $ClientEmail = $TokenInfo[0]->email;

    $ClientInfo = $DB->find('clients', 'hosting_client_id, hosting_client_key, hosting_client_fname', array('hosting_client_email' => $ClientEmail), null, 1);

    if (!$ClientInfo) {
        setMessage('Invalid reset <b>token</b> !', 'danger');
        redirect('clientarea/resetpassword');
    }

    $Key = '$2y$10$' . $TokenInfo[0]->token;

    if (password_verify($ClientInfo['hosting_client_key'], $Key)) {
        $hashed_password = hash('sha256', $new_password);
        $result = $DB->update('clients', array('hosting_client_password' => $hashed_password), array('hosting_client_id' => $ClientInfo['hosting_client_id']));

        if ($result) {
            $EmailContent = '<p>Your account password has been reset successfully. Please login to clientarea to use our services again.</p>';
            $EmailDescription = '<p>Click <a href="' . setURL('clientarea/login') . '">here</a> to login.</p>';
            $email_body = email_build_body('Reset Password', $ClientInfo['hosting_client_fname'], $EmailContent, $EmailDescription);

            send_mail(array(
                'to' => $ClientEmail,
                'message' => $email_body,
                'subject' => 'Reset Password'
            ));
            setMessage('Password reset <b>successfully</b> !', 'success');
            redirect('clientarea/login');
        } else {
            setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
            redirect('clientarea/resetpassword');
        }
    } else {
        setMessage('Invalid reset <b>token</b> !', 'danger');
        redirect('clientarea/resetpassword');
    }
}

$PageInfo['title'] = 'Reset Password';
$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';
