<?php

// require_once __DIR__ . '/../../core/application.php';

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$username = post('username');

if (!$username) {
    exit('need: username');
}

// 账号信息
$AccountInfo = $DB->find('account', '*', array('account_username' => $username, 'account_api_key' => $HostingApi['api_key']));
if ($AccountInfo) {
    // 账号存在 激活账号
    $res = $DB->update('account', array('account_sql' => $status, 'account_status' => '1'), array('account_id' => $AccountInfo['account_id']));

    // 查找客户信息
    $ClientInfo = $DB->find('clients', 'hosting_client_email, hosting_client_fname', array('hosting_client_id' => $AccountInfo['account_client_id']));
    if ($ClientInfo) {
        $EmailTo = $ClientInfo['hosting_client_email'];
        $EmailSubject = 'New Hosting Account';
        $EmailToPeople = $ClientInfo['hosting_client_fname'];
    } else {
        $EmailTo = $SiteConfig['site_email'];
        $EmailToPeople = 'Administrator';
    }
    $EmailContent = '<p>You have successfully created a new hosting account the details are given bellow.</p>';
} else {
    // TODO: 账号不存在，入库
    $EmailTo = $SiteConfig['site_email'];
    $EmailToPeople = 'Administrator';
    $EmailContent = '<p>Congratulations !</p><p>You have successfully received a new hosting account, the details are given bellow.</p>';
}

$EmailDescription = '
<b>cPanel Username: </b><span>' . $AccountInfo['account_username'] . '</span><br />
<b>cPanel Password: </b><span>' . $AccountInfo['account_password'] . '</span><br />
<b>cPanel URL     : </b><span>' . $HostingApi['api_cpanel_url'] . '</span><br /><br />
<b>Main Domain    : </b><span>' . $AccountInfo['account_domain'] . '</span><br />
<b>Account Date   : </b><span>' . $AccountInfo['account_date'] . '</span><br />
<b>Server IP      : </b><span>' . $HostingApi['api_server_ip'] . '</span><br />
<b>Hosting Package: </b><span>' . $HostingApi['api_package'] . '</span><br /><br />
<b>FTP Username   : </b><span>' . $AccountInfo['account_username'] . '</span><br />
<b>FTP Password   : </b><span>' . $AccountInfo['account_password'] . '</span><br />
<b>FTP Hostname   : </b><span>ftpupload.net</span><br />
<b>FTP Port       : </b><span>21</span><br /><br />
<b>MySQL Username : </b><span>' . $AccountInfo['account_username'] . '</span><br />
<b>MySQL Password : </b><span>' . $AccountInfo['account_password'] . '</span><br />
<b>MySQL Hostname : </b><span>' . str_replace('cpanel', $AccountInfo['account_sql'], $HostingApi['api_cpanel_url']) . '</span><br />
<b>MySQL Port     : </b><span>3306</span><br /><br />
<b>Nameserver 1   : </b><span>' . $HostingApi['api_ns_1'] . '</span><br />
<b>Nameserver 2   : </b><span>' . $HostingApi['api_ns_2'] . '</span>';
$email_body = email_build_body('New Hosting Account', $EmailToPeople, $EmailContent, $EmailDescription);

send_mail(array(
    'to' => $EmailTo,
    'message' => $email_body,
    'subject' => 'New Hosting Account'
));
