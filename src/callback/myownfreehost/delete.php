<?php

// require_once __DIR__ . '/../../core/application.php';

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
    'callback_comments'  => post('comments'),
    'callback_client_id' => 0,
    'callback_raw'       => json_encode(post())
);

// 账号信息
$AccountInfo = $DB->find('account', '*', array('account_username' => $username));
if ($AccountInfo) {
    // 更新账号信息
    // 0未激活1已激活2禁用3删除
    $res = $DB->update('account', array('account_status' => '3'), array('account_id' => $AccountInfo['account_id']));

    // 查找客户信息
    $ClientInfo = $DB->find('clients', 'client_email, client_fname', array('client_id' => $AccountInfo['account_client_id']));
    if ($ClientInfo) {
        $callback_log['callback_client_id'] = $AccountInfo['account_client_id'];
        $EmailTo = $ClientInfo['client_email'];
        $EmailToNickname = $ClientInfo['client_fname'];
    } else {
        $EmailTo = $SiteConfig['site_email'];
        $EmailToNickname = 'Administrator';
    }
    $EmailContent = '<p><strong>Notification</strong></p><p>You have a hosting account that has been deleted by the system, the details are below.</p>';
} else {
    // 账号不存在，入库
    $AccountInfo = array(
        'account_username' => $username,
        'account_password' => '********',
        'account_key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
        'account_api_key' => $api_key,
        'account_domain' => '***.' . $AccountApi['api_server_domain'],
        'account_status' => '3',
        'account_date' => $callback_log['callback_date'],
        'account_client_id' => 0,
        'account_sql' => 'sql***'
    );
    $DB->insert('account', $AccountInfo);

    $EmailTo = $SiteConfig['site_email'];
    $EmailToNickname = 'Administrator';
    $EmailContent = '<p><strong>Notification</strong></p><p>The system has deleted a hosting account, the details are given bellow.</p>';
}

// 记录日志
$DB->insert('account_callback', $callback_log);

$EmailDescription = '<p>Hosting Account : <pre>' . $AccountInfo['account_username'] . '</pre></p>';

$email_body = email_build_body('Hosting Account Status Changed', $EmailToNickname, $EmailContent, $EmailDescription);

// print($email_body);

$emails_log = array(
    'email_client_id' => $AccountInfo['account_client_id'],
    'email_date' => date('Y-m-d H:i:s'),
    'email_to' => $EmailTo,
    'email_subject' => 'Hosting Account Status Changed',
    'email_body' => $email_body,
    'email_read' => 0
);
// print_r($emails_log);
$DB->insert('emails', $emails_log);

send_mail(array(
    'to' => $EmailTo,
    'message' => $email_body,
    'subject' => 'Hosting Account Status Changed'
));
