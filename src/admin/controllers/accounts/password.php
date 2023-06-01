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

$new_password = post('new_password', '');

if (empty($new_password)) {
    setMessage('need field: new_password', 'danger');
    redirect('admin/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
}

$AccountInfo = $DB->find('account', '*', array('account_id' => $account_id), null, 1);

if (empty($AccountInfo)) {
    setMessage('Account not found', 'danger');
    redirect('admin/accounts');
}

if ($AccountInfo['account_status'] != 1) {
    setMessage('Hosting Account is deactivated', 'danger');
    redirect('admin/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
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
$request = $client->password([
    'username' => $AccountInfo['account_key'],
    'password' => $new_password,
    'enabledigest' => 1,
]);
$response = $request->send();
$Data = $response->getData();
$Result = array(
    'status' => $Data['passwd']['status'],
    'message' => $Data['passwd']['statusmsg']
);

if ($Result['status'] == 0 && strlen($Result['message']) > 1) {
    setMessage($Result['message'], 'danger');
} elseif ($Result['status'] == 1 && strlen($Result['message']) > 1) {
    $sql = $DB->update('account', array('account_password' => $new_password), array('account_id' => $account_id));
    if ($sql) {
        setMessage('Password changed <b>successfully</b> !', 'success');
    } else {
        setMessage("1Something went's <b>wrong</b> !", 'danger');
    }
} elseif ($Result['status'] == 0 && $Result['message'] == 0) {
    setMessage("2Something went's <b>wrong</b> !", 'danger');
} else {
    setMessage("3Something went's <b>wrong</b> !", 'danger');
}

redirect('admin/accounts', '', array('action' => 'edit', 'account_id' => $account_id));
