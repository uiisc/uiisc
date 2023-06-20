<?php

require_once __DIR__ . '/../../application.php';

$client_id = get('id');

if (empty($client_id)) {
    redirect('admin/clients');
}

$ClientInfo = $DB->find('clients', '*', array('client_id' => $client_id), null, 1);

$key = rand(000000, 999999);
$email = $ClientInfo['client_email'];
$token = hash('sha256', json_encode([$email, $ClientInfo['client_key'], $key]));
$times = 1;

setcookie('UIISC_MEMBER', base64_encode(gzcompress(json_encode(array('email' => $email, 'token' => $token, 'key' => $key)))), time() + $times * 86400, '/', $site_domain);

setMessage('Logged in as ' . $email . ' <b>successfully!</b>', 'success');

redirect('clientarea/index');
