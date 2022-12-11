<?php

require '../../application.php';

if (!isset($_POST['submit'])) {
    exit('Access Denied');
}

$data = array(
    'api_username' => post('api_username'),
    'api_password' => post('api_password'),
    'api_cpanel_url' => post('api_cpanel_url'),
    'api_server_ip' => post('api_server_ip'),
    'api_ns_1' => post('api_ns_1'),
    'api_ns_2' => post('api_ns_2'),
    'api_package' => post('api_package'),
    'api_callback_token' => post('api_callback_token')
);

$resault = $DB->update('account_api', $data, array('api_key' => 'myownfreehost'));

if ($resault) {
    setMessage('Hosting Server updated successfully !');
} else {
    setMessage("Something went's wrong !", 'danger');
}

redirect('admin/settings', 'hosting');
