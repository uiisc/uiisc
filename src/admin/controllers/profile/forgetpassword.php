<?php

require_once __DIR__ . '/../../../core/application.php';

if (isset($_SESSION['UIISC_ADMIN']) && $_SESSION['UIISC_ADMIN'] != 'NULL') {
    setMessage('Your has been logged !', 'danger');
    redirect('admin/index');
}

if (isset($_POST['reset'])) {
    $post_mail = post('email');
    if (empty($post_mail)) {
        setMessage('need field: <b>email</b> !', 'danger');
        redirect('admin/forgetpassword');
    }

    $AdminInfo = $DB->find('admin', 'admin_key, admin_fname', array('admin_email' => $post_mail), null, 1);
    if ($AdminInfo) {
        $TokenId = password_hash($AdminInfo['admin_key'], PASSWORD_DEFAULT);
        $TokenData = [['token' => str_replace('$2y$10$', '', $TokenId), 'email' => $post_mail]];
        $Token = base64_encode(json_encode($TokenData));

        $EmailContent = '<p>You have requested a password reset.</p>';
        $EmailDescription = '<div style="padding:1rem;background:#e6e6e6;overflow-x:auto;">' . $Token . '</div>';
        $EmailDescription .= '<p><a href="' . setURL('admin/resetpassword') . '" target="_blank">Reset Password</a></p>';
        $email_body = email_build_body('Reset Password', $AdminInfo['admin_fname'], $EmailContent, $EmailDescription);

        send_mail(array(
            'to' => $post_mail,
            'message' => $email_body,
            'subject' => 'Forget Password',
        ));

        setMessage('Email sent <b>successfully</b> !', 'success');
        redirect('admin/resetpassword');
    } else {
        setMessage('Invalid <b>email</b> !', 'danger');
    }
    redirect('admin/forgetpassword');
}

$PageInfo['title'] = 'Forget Password';
$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';
