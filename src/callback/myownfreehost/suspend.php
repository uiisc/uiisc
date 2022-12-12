<?php

require_once __DIR__ . '/../../core/application.php';

$username = post('username');

// 账号信息
$AccountInfo = $DB->find('account', '*', array('account_username' => $username, 'account_api_key' => $HostingApi['api_key']));
if (!$AccountInfo) {
    // 账号不存在
    exit();
}

// 禁用账号
$DB->update('account', array('account_status' => '2'), array('account_id' => $AccountInfo['account_id']));
// 创建删除任务
// $DB->query("CREATE EVENT " . $username . "_delete ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY DO DELETE FROM `hosting_account` WHERE `account_id`='" . $AccountInfo['account_id'] . "'");

// 查找客户信息
$ClientInfo = $DB->find('clients', 'client_email, client_fname', array('client_id' => $AccountInfo['account_client_id']));

$EmailContent = '<p>We had a good time with you while you were with us. </p>';
$EmailDescription = '<p>Your account(' . $username . ') have been deactivate successfully and all files and database will be deleted within 30 days.</p><br>';
$email_body = email_build_body('Hosting Account Deactivated', $ClientInfo['client_fname'], $EmailContent, $EmailDescription);

send_mail(array(
    'to' => $ClientInfo['client_email'],
    'message' => $email_body,
    'subject' => 'Hosting Account Deactivated'
));
