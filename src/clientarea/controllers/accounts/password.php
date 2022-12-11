<?php

require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$account_id = post('account_id', '');

if (empty($account_id)) {
    setMessage('need field: account_id', 'danger');
    redirect('clientarea/accounts');
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id, 'account_client_id' => $ClientInfo['hosting_client_id']), null, 1);

if (empty($AccountInfo)) {
    setMessage('Account not found', 'danger');
    redirect('clientarea/accounts');
}

if ($AccountInfo['account_status'] != 1) {
    setMessage('Hosting Account is deactivated', 'danger');
    redirect('clientarea/accounts', '', array('action' => 'view', 'account_id' => $account_id));
}

$FormData = array(
    'old_password' => post('old_password'),
    'new_password' => post('new_password'),
    'account_key' => $AccountInfo['account_key'],
    'account_username' => $AccountInfo['account_username']
);

require_once ROOT . '/core/handler/HostingHandler.php';
require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

if ($FormData['old_password'] == $AccountInfo['account_password']) {
    $client = Client::create($HostingApiConfig);
    $request = $client->password([
        'username' => $AccountInfo['account_key'],
        'password' => $FormData['new_password'],
        'enabledigest' => 1,
    ]);
    $response = $request->send();
    $Data = $response->getData();
    $Result = array(
        'status' => $Data['passwd']['status'],
        'message' => $Data['passwd']['statusmsg'],
        'username' => $AccountInfo['account_username'],
        'password' => $FormData['new_password'],
    );

    if ($Result['status'] == 0 && strlen($Result['message']) > 1) {
        setMessage($Result['message'], 'danger');
    } elseif ($Result['status'] == 1 && strlen($Result['message']) > 1) {
        $sql = $DB->update('account', array('account_password' => $Result['password']), array('account_id' => $account_id));
        if ($sql) {
            setMessage('Password changed <b>successfully</b> !', 'success');
        } else {
            setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
        }
    } elseif ($Result['status'] == 0 && $Result['message'] == 0) {
        setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
    } else {
        setMessage('Something went' . "'" . 's <b>wrong</b> !', 'danger');
    }
} else {
    setMessage('Invalid account <b>password</b> !', 'danger');
}

redirect('clientarea/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
