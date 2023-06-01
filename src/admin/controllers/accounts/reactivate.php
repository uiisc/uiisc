<?php

require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$account_id = post('account_id', '');

if (empty($account_id)) {
    setMessage('need field: account_id', 'danger');
    redirect('admin/accounts');
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($AccountInfo)) {
    setMessage('Account not found', 'danger');
    redirect('admin/accounts');
}

if ($AccountInfo['account_status'] == 1) {
    setMessage('Hosting Account is active', 'danger');
    redirect('admin/accounts', '', array('action' => 'view', 'account_id' => $account_id));
}

$AccountApi = $DB->find('account_api', '*', array('api_key' => $AccountInfo['account_api_key']), null, 1);

$AccountApiConfig = array(
    'apiUsername' => $AccountApi['api_username'],
    'apiPassword' => $AccountApi['api_password'],
    // 'apiUrl' => 'https://panel.myownfreehost.net/xml-api/',
    'plan' => $AccountApi['api_package'],
);

require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

$client = Client::create($AccountApiConfig);
$request = $client->unsuspend(array(
    'username' => $AccountInfo['account_key'],
));

$response = $request->send();
$Data = $response->getData();
$Result = array(
    'status' => $Data['result']['status'],
    'message' => $Data['result']['statusmsg'],
);

if ($Result['status'] == 0 && !is_array($Result['message'])) {
    // 执行操作失败
    setMessage($Result['message'], 'danger');
    redirect('admin/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
} elseif ($Result['status'] == 1 && is_array($Result['message'])) {
    // 执行操作成功
    $sql = $DB->update('account', array('account_status' => '1'), array('account_id' => $account_id));
    if ($sql) {
        // 本地同步成功
        $ClientInfo = $DB->find('clients', 'client_email, client_fname', array('client_id' => $AccountInfo['account_client_id']), null, 1);
        $EmailContent = 'Your account(# ' . $account_id . ') have been activated successfully.';
        $EmailDescription = '<p><a href="' . setURL('clientarea/login') . '" target="_blank">Login to Clientarea</a></p>';
        $email_body = email_build_body('Hosting Account Activated', $ClientInfo['client_fname'], $EmailContent, $EmailDescription);

        send_mail(array(
            "to" => $ClientInfo['client_email'],
            "message" => $email_body,
            "subject" => 'Activate Hosting Account',
        ));

        setMessage('Hosting Account activated <b>successfully</b> !', 'success');
        redirect('admin/accounts', '', array('action' => 'view', 'account_id' => $account_id));
    } else {
        // 本地同步异常
        setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
        redirect('admin/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
    }
} elseif ($Result['status'] == 0 && $Result['message'] == 0) {
    // 执行操作异常
    setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
    redirect('admin/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
}
