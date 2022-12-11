<?php

require_once __DIR__ . '/../../application.php';

$client_id = get('client_id');

if (empty($client_id)) {
    redirect('admin/clients');
}

$ClientInfo = $DB->find('clients', '*', array('hosting_client_id' => $client_id), null, 1);

$key = rand(000000, 999999);
$email = $ClientInfo['hosting_client_email'];
$token = hash('sha256', json_encode([$email, $ClientInfo['hosting_client_key'], $key]));
$times = 1;

setcookie('UIISC_MEMBER', base64_encode(gzcompress(json_encode(array('email' => $email, 'token' => $token, 'key' => $key)))), time() + $times * 86400, '/');

setMessage('Logged in as ' . $email . ' <b>successfully!</b>', 'success');

redirect('clientarea/index');
