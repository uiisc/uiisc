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

$reason = post('reason', '');

if (strlen($reason) < 8) {
    setMessage('Reason must be at least 8 characters !', 'danger');
    redirect('admin/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($AccountInfo)) {
    setMessage('Account not found', 'danger');
    redirect('admin/accounts');
}

// if ($AccountInfo['account_status'] != 1) {
//     setMessage('Hosting Account is deactivated', 'danger');
//     redirect('admin/accounts', '', array('action' => 'view', 'account_id' => $account_id));
// }

require_once ROOT . '/core/handler/HostingHandler.php';
require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

$client = Client::create($HostingApiConfig);
$request = $client->suspend(array(
    'username' => $AccountInfo['account_key'],
    'reason' => $reason,
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
    $sql = $DB->update('account', array('account_status' => '0'), array('account_id' => $account_id));
    if ($sql) {
        // 本地同步成功
        $ClientInfo = $DB->find('clients', 'hosting_client_email, hosting_client_fname', array('hosting_client_id' => $AccountInfo['account_client_id']), null, 1);
        $EmailContent = '<p>We had a good time with you while you were with us. </p>';
        $EmailDescription = 'Your account(# ' . $account_id . ') have been deactivate successfully and all files and database will be deleted within 30 days.';
        $email_body = email_build_body('Hosting Account Deactivated', $ClientInfo['hosting_client_fname'], $EmailContent, $EmailDescription);

        send_mail(array(
            'to' => $ClientInfo['hosting_client_email'],
            'message' => $email_body,
            'subject' => 'Hosting Account Deactivated'
        ));

        setMessage('Hosting Account deactivated <b>successfully</b> !', 'success');
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
