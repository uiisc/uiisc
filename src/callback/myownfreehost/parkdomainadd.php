<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$username = post('username');

if (!$username) {
    exit('need: username');
}

$callback_log = array(
    'callback_date'      => date('Y-m-d H:i:s'),
    'callback_username'  => $username,
    'callback_action'    => $status,
    'callback_comments'  => post('comments'), // domain name
    'callback_client_id' => 0,
    'callback_raw'       => json_encode(post())
);

// 账号信息
$AccountInfo = $DB->find('account', '*', array('account_username' => $username));
if ($AccountInfo) {
    $account_id = $AccountInfo['account_id'];
    // 查找客户信息
    $ClientInfo = $DB->find('clients', 'client_email, client_fname', array('client_id' => $AccountInfo['account_client_id']));
    if ($ClientInfo) {
        $callback_log['callback_client_id'] = $AccountInfo['account_client_id'];
        $EmailTo = $ClientInfo['client_email'];
        $EmailToNickname = $ClientInfo['client_fname'];
        $EmailContent = '<p>Your hosting account has successfully added a new parked domain. The details are given bellow.</p>';
    } else {
        $EmailTo = $SiteConfig['site_email'];
        $EmailToNickname = 'Administrator';
        $EmailContent = '<p>An unassigned hosting account has successfully added a new parked domain. The details are given bellow.</p>';
    }
} else {
    // 账号不存在，入库
    $AccountInfo = array(
        'account_username' => $username,
        'account_password' => '********',
        'account_key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
        'account_api_key' => $api_key,
        'account_domain' => '***.' . $AccountApi['api_server_domain'],
        'account_status' => '1',
        'account_addtime' => $callback_log['callback_date'],
        'account_client_id' => 0,
        'account_sql' => 'sql***'
    );
    $account_id = $DB->insert('account', $AccountInfo);

    $EmailTo = $SiteConfig['site_email'];
    $EmailToNickname = 'Administrator';
    $EmailContent = '<p>An unassigned hosting account has successfully added a new parked domain. The details are given bellow.</p>';
}

// 同步到本地
$DB->insert('account_domain', array(
    'domain_account_id' => $account_id,
    'domain_name' => $callback_log['callback_comments']
));

$EmailDescription = '<p><pre>' . $callback_log['callback_comments'] . '</pre></p>
<p>The new parked domain is now available for use.</p>';

// 记录日志
$DB->insert('account_callback', $callback_log);

$email_body = email_build_body('Hosting Account Parked Domain Added', $EmailToNickname, $EmailContent, $EmailDescription);

// print_r($email_body);

$emails_log = array(
    'email_client_id' => $AccountInfo['account_client_id'],
    'email_date' => date('Y-m-d H:i:s'),
    'email_to' => $EmailTo,
    'email_subject' => 'Hosting Account Parked Domain Added',
    'email_body' => $email_body,
    'email_read' => 0
);

// print_r($emails_log);
$DB->insert('emails', $emails_log);

send_mail(array(
    'to' => $EmailTo,
    'message' => $email_body,
    'subject' => 'Hosting Account Parked Domain Added'
));
