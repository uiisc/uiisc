<?php

require_once __DIR__ . '/../../application.php';

$PageInfo = ['title' => 'New Account', 'rel' => ''];

require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

if (isset($_POST['submit'])) {
    $api_key = post('api_key');
    if (empty($api_key)) {
        send_response([500, '', 'api_key cannot be <b>empty</b> !']);
    }
    $FormData = array(
        'username' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
        'password' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 16),
        'account_domain' => post('domain'),
        'email' => $ClientInfo['client_email'],
        // 'plan' => post('package'),
    );
    if (empty($FormData['account_domain'])) {
        send_response([500, '', 'Domain cannot be <b>empty</b> !']);
    } else {
        $AccountList = $DB->findAll('account', '*', array('account_client_id' => $ClientInfo['client_id']));
        if (count($AccountList) < 3) {
            $AccountApi = $DB->find('account_api', '*', array('api_key' => post('api_key')), null, 1);
            $AccountApiConfig = array(
                'apiUsername' => $AccountApi['api_username'],
                'apiPassword' => $AccountApi['api_password'],
                // 'apiUrl' => 'https://panel.myownfreehost.net/xml-api/',
                'plan' => $AccountApi['api_package'],
            );
            $client = Client::create($AccountApiConfig);
            $request = $client->createAccount(array(
                'username' => $FormData['username'],
                'password' => $FormData['password'],
                'domain' => $FormData['account_domain'],
                'email' => $FormData['email'],
                'plan' => $AccountApiConfig['plan'],
            ));
            $response = $request->send();
            $Data = $response->getData();
            $Result = array(
                'account_username' => $Data['result']['options']['vpusername'],
                'message' => $Data['result']['statusmsg'],
                'status' => $Data['result']['status'],
                'account_domain' => str_replace('cpanel', strtolower($FormData['username']), $AccountApi['api_cpanel_url']),
                'date' => date('Y-m-d H:i:s'),
            );
            if ($Result['status'] == 0 && strlen($Result['message']) > 1) {
                send_response([500, '', $Result['message']]);
                // setMessage($Result['message'], 'danger');
                // redirect('clientarea/accounts', '', array('action' => 'add'));
            } elseif ($Result['status'] == 1 && strlen($Result['message']) > 1) {
                $account_id = $DB->insert('account', array(
                    'account_username' => $Result['account_username'],
                    'account_password' => $FormData['password'],
                    'account_key' => $FormData['username'],
                    'account_api_key' => post('api_key'),
                    'account_domain' => $Result['account_domain'],
                    'account_status' => '1',
                    'account_date' => $Result['date'],
                    'account_client_id' => $ClientInfo['client_id'],
                    'account_sql' => 'NULL',
                ));
                if ($account_id) {
                    $EmailTo = $FormData['email'];

                    $EmailContent = '<p>Congratulations !</p>
<p>You have successfully created a new free hosting account, more details are given below:</p><br />';
                    $EmailDescription = '
<b>Control Panel Username : </b><span>' . $Result['account_username'] . '</span><br />
<b>Control Panel Password : </b><span>' . $FormData['password'] . '</span><br />
<b>Control Panel URL      : </b><span>' . $AccountApi['api_cpanel_url'] . '</span><br />
<b>Main Domain     : </b><span>' . $Result['account_domain'] . '</span><br />
<b>Account Date    : </b><span>' . $Result['date'] . '</span><br />
<b>Server IP       : </b><span>' . $AccountApi['api_server_ip'] . '</span><br />
<b>Hosting Package : </b><span>' . $AccountApi['api_package'] . '</span><br />
<b>FTP Hostname    : </b><span>' . $AccountApi['api_server_ftp_domain'] . '</span><br />
<b>MySQL Hostname  : </b><span>' . $AccountApi['api_server_sql_domain'] . '</span><br />
<b>Nameserver 1    : </b><span>' . $AccountApi['api_ns_1'] . '</span><br />
<b>Nameserver 2    : </b><span>' . $AccountApi['api_ns_2'] . '</span>
<br />
<p>Next, </p>
<br />';
                    $EmailDescription .= '<p><a href="' . setURL('clientarea/login') . '" target="_blank">Login to Clientarea</a></p>';
                    $email_body = email_build_body('New Hosting Account', $ClientInfo['client_fname'], $EmailContent, $EmailDescription);

                    send_mail(array(
                        'to' => $EmailTo,
                        'message' => $email_body,
                        'subject' => 'New Hosting Account'
                    ));
                    send_response([500, '', 'Account created <b>successfully</b> !']);
                } else {
                    send_response([500, '', 'Something went' . "'" . 's <b>wrong</b> !']);
                }
            } elseif ($Result['status'] == 0 && $Result['message'] == 0) {
                send_response([500, '', 'Something went' . "'" . 's <b>wrong</b> !']);
            }
        } else {
            send_response([500, '', 'Free account limit <b>reached</b> !']);
        }
    }
} else {
    $api_key = get('api_key');
    if (empty($api_key)) {
        setMessage('api_key cannot be <b>empty</b> !', 'danger');
        redirect('clientarea/accounts');
    }
    $HostnameInfo = $DB->findAll('account_hostname', '*', array(), 'host_id');
    $AccountApi = $DB->find('account_api', '*', array('api_key' => get('api_key')), null, 1);
    $AccountApiConfig = array(
        'apiUsername' => $AccountApi['api_username'],
        'apiPassword' => $AccountApi['api_password'],
        'plan' => $AccountApi['api_package'],
    );
    if (empty($HostnameInfo)) {
        $HostnameInfo = array(
            'host_name' => '.html-5.me',
        );
    }
}
