<?php

require_once __DIR__ . '/../../../core/application.php';

if (isset($_COOKIE['UIISC_MEMBER']) && $_COOKIE['UIISC_MEMBER'] != 'NULL') {
    setMessage('Your account has been logged !', 'danger');
    redirect('clientarea/index');
}

if (isset($_POST['signup'])) {
    $FormData = array(
        'hosting_client_fname' => post('first'),
        'hosting_client_lname' => post('last'),
        'hosting_client_email' => post('email'),
        'hosting_client_company' => '',
        'hosting_client_country' => '',
        'hosting_client_city' => '',
        'hosting_client_address' => '',
        'hosting_client_pcode' => '',
        'hosting_client_phone' => '',
        'hosting_client_state' => '',
        'hosting_client_password' => hash('sha256', post('password')),
        'hosting_client_date' => date('Y-m-d H:i:s'),
        'hosting_client_key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
        'hosting_client_status' => 0,
    );

    $where = "`hosting_client_email`='" . $FormData['hosting_client_email'] . "' OR `hosting_client_key`='" . $FormData['hosting_client_key'] . "'";

    $has = $DB->find('clients', 'hosting_client_id', $where);
    if ($has) {
        setMessage('Account already <b>exsits!</b> or invalid <b>token</b>', 'danger');
        redirect('clientarea/login');
    }
    $result = $DB->insert('clients', $FormData);

    $Token = str_replace('$2y$10$', '', password_hash($FormData['hosting_client_key'], PASSWORD_DEFAULT));

    $EmailContent = '<p>Your new account has been registered. </p><p>Please copy the code below to verify your account.</p>';
    $EmailDescription = '<div style="padding:1rem;background:#e6e6e6;overflow-x:auto;">' . $Token . '</div>';
    $email_body = email_build_body('Verify Email', $FormData['hosting_client_fname'], $EmailContent, $EmailDescription);

    send_mail(array(
        'to' => $FormData['hosting_client_email'],
        'message' => $email_body,
        'subject' => 'Verify Account'
    ));

    if ($result) {
        setMessage('Account created <b>successfully</b> !', 'success');
        redirect('clientarea/login');
    } else {
        setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
        redirect('clientarea/signup');
    }
}

$PageInfo['title'] = $lang->I18N('Signup');
$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/login.css" rel="stylesheet" />';
