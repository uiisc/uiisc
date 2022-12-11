<?php

require_once __DIR__ . '/../../application.php';

$PageInfo = ['title' => 'New Account', 'rel' => ''];

require_once ROOT . '/core/handler/HostingHandler.php';
require_once ROOT . '/modules/autoload.php';

// require_once ROOT . '/core/library/userinfo.class.php';

use \InfinityFree\MofhClient\Client;

if (isset($_POST['submit'])) {
    $FormData = array(
        'username' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
        'password' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 16),
        'account_domain' => post('domain'),
        'email' => $ClientInfo['hosting_client_email'],
        'plan' => post('package'),
    );
    if (empty($FormData['account_domain'])) {
        setMessage('Domain cannot be <b>empty</b> !', 'danger');
        redirect('clientarea/accounts', '', array('action' => 'add'));
    } else {
        $AccountList = $DB->findAll('account', '*', array('account_client_id' => $ClientInfo['hosting_client_id']));
        if (count($AccountList) < 3) {
            $client = Client::create($HostingApiConfig);
            $request = $client->createAccount(array(
                'username' => $FormData['username'],
                'password' => $FormData['password'],
                'domain' => $FormData['account_domain'],
                'email' => $FormData['email'],
                'plan' => $FormData['plan'],
            ));
            $response = $request->send();
            $Data = $response->getData();
            $Result = array(
                'account_username' => $Data['result']['options']['vpusername'],
                'message' => $Data['result']['statusmsg'],
                'status' => $Data['result']['status'],
                'account_domain' => str_replace('cpanel', strtolower($FormData['username']), $HostingApi['api_cpanel_url']),
                'date' => date('Y-m-d H:i:s'),
            );
            if ($Result['status'] == 0 && strlen($Result['message']) > 1) {
                setMessage($Result['message'], 'danger');
                redirect('clientarea/accounts', '', array('action' => 'add'));
            } elseif ($Result['status'] == 1 && strlen($Result['message']) > 1) {
                $account_id = $DB->insert('account', array(
                    'account_username' => $Result['account_username'],
                    'account_password' => $FormData['password'],
                    'account_key' => $FormData['username'],
                    'account_domain' => $Result['account_domain'],
                    'account_status' => '1',
                    'account_date' => $Result['date'],
                    'account_client_id' => $ClientInfo['hosting_client_id'],
                    'account_sql' => 'NULL',
                ));
                if ($account_id) {
                    $EmailTo = $FormData['email'];

                    $EmailContent = '
<p>Congratulations !</p>
<p>You have successfully created a new free hosting account, more details are given below:</p><br />';
                    $EmailDescription = '
<b>cPanel Username : </b><span>' . $Result['account_username'] . '</span><br />
<b>cPanel Password : </b><span>' . $FormData['password'] . '</span><br />
<b>Main Domain     : </b><span>' . $Result['account_domain'] . '</span><br />
<b>Account Date    : </b><span>' . $Result['date'] . '</span><br />
<b>cPanel URL      : </b><span>' . $HostingApi['api_cpanel_url'] . '</span><br />
<b>Server IP       : </b><span>' . $HostingApi['api_server_ip'] . '</span><br />
<b>Hosting Package : </b><span>' . $HostingApi['api_package'] . '</span><br />
<b>FTP Hostname    : </b><span>ftpupload.net</span><br />
<b>MySQL Hostname  : </b><span>' . str_replace('cpanel', 'sqlxxx', $HostingApi['api_cpanel_url']) . '</span><br />
<b>Nameserver 1    : </b><span>' . $HostingApi['api_ns_1'] . '</span><br />
<b>Nameserver 2    : </b><span>' . $HostingApi['api_ns_2'] . '</span>
<br />
<p>Next, </p>
<br />';
                    $EmailDescription .= '<p><a href="' . setURL('clientarea/login') . '" target="_blank">Login to Clientarea</a></p>';
                    $email_body = email_build_body('New Hosting Account', $ClientInfo['hosting_client_fname'], $EmailContent, $EmailDescription);

                    send_mail(array(
                        'to' => $EmailTo,
                        'message' => $email_body,
                        'subject' => 'New Hosting Account'
                    ));
                    
                    setMessage('Account created <b>successfully</b> !', 'success');
                    redirect('clientarea/accounts', '', array('action' => 'view', 'account_id' => $account_id));
                } else {
                    setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
                    redirect('clientarea/accounts', '', array('action' => 'add'));
                }
            } elseif ($Result['status'] == 0 && $Result['message'] == 0) {
                setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
                redirect('clientarea/accounts', '', array('action' => 'add'));
            }
        } else {
            setMessage('Free account limit <b>reached</b> !', 'danger');
            redirect('clientarea/accounts', '', array('action' => 'add'));
        }
    }
} else {
    $ExtensionInfo = $DB->findAll('domain_extensions', '*', array(), 'extension_id');

    if (empty($ExtensionInfo)) {
        $ExtensionInfo = array(
            'extension_value' => '.html-5.me',
        );
    }
}
