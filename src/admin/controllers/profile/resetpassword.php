<?php

require_once __DIR__ . '/../../../core/application.php';

if (isset($_SESSION['UIISC_ADMIN']) && $_SESSION['UIISC_ADMIN'] != 'NULL') {
    setMessage('Your has been logged !', 'danger');
    redirect('admin/index');
}

if (isset($_POST['reset'])) {
    $post_token = post('token');
    if (!$post_token) {
        setMessage('Invalid reset <b>token</b> !', 'danger');
        redirect('admin/resetpassword');
    }
    $new_password = post('password');
    if (!$new_password) {
        setMessage('Invalid <b>password</b> !', 'danger');
        redirect('admin/resetpassword');
    }

    try {
        $TokenInfo = json_decode(base64_decode($post_token));
    } catch (Exception $e) {
        setMessage('Invalid reset <b>token</b> !', 'danger');
        redirect('admin/resetpassword');
    }

    $AdminEmail = $TokenInfo[0]->email;

    $AdminInfo = $DB->find('admin', 'admin_key, admin_fname', array('admin_email' => $AdminEmail), null, 1);

    if (!$AdminInfo) {
        setMessage('Invalid reset <b>token</b> !', 'danger');
        redirect('admin/resetpassword');
    }

    $Key = '$2y$10$' . $TokenInfo[0]->token;

    if (password_verify($AdminInfo['admin_key'], $Key)) {
        $hashed_password = hash('sha256', $new_password);
        $result = $DB->update('admin', array('admin_password' => $hashed_password), array('admin_email' => $AdminEmail));
        if ($result) {
            $EmailContent = '<p>Your account password has been reset successfully. Please login to clientarea to use our services again.</p>';
            $EmailDescription = '<p>Click <a href="' . setURL('admin/login') . '">here</a> to login.</p>';
            $email_body = email_build_body('Reset Password', $AdminInfo['admin_fname'], $EmailContent, $EmailDescription);

            send_mail(array(
                'to' => $AdminEmail,
                'message' => $email_body,
                'subject' => 'Reset Password',
            ));

            setMessage('Password reset <b>successfully</b> !', 'success');
            redirect('admin/login');
        } else {
            setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
            redirect('admin/resetpassword');
        }
    } else {
        setMessage('Invalid reset <b>token</b> !', 'danger');
        redirect('admin/resetpassword');
    }
} else {
    $PageInfo['title'] = 'Reset Password';
    $PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';
}
