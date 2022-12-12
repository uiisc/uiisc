<?php

require __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit();
}

if (empty($ClientInfo['client_country'])) {
    $Country = 'CN';
} else {
    $Country = ucwords($ClientInfo['client_country']);
}

if (empty($ClientInfo['client_company'])) {
    $Company = 'UIISC';
} else {
    $Company = $ClientInfo['client_company'];
}

if (empty($ClientInfo['client_phone'])) {
    $Phone = '021-51351888';
} else {
    $Phone = $ClientInfo['client_phone'];
}

if (empty($ClientInfo['client_city'])) {
    $City = 'Lahore';
} else {
    $City = $ClientInfo['client_city'];
}

if (empty($ClientInfo['client_pcode'])) {
    $Postal = '200000';
} else {
    $Postal = $ClientInfo['client_pcode'];
}

$FormData = array(
    'product_id'       => 65, // the GoGetSSL® 90-day Trial SSL ID: 65
    'csr'              => $_POST['csr'],
    'server_count'     => '-1',
    'period'           => 3,
    'approver_email'   => 'uiisc@qq.com',
    'webserver_type'   => '1',
    'admin_firstname'  => $ClientInfo['client_fname'],
    'admin_lastname'   => $ClientInfo['client_lname'],
    'admin_phone'      => $Phone,
    'admin_title'      => 'Mr',
    'admin_email'      => $ClientInfo['client_email'],
    'tech_firstname'   => $ClientInfo['client_fname'],
    'tech_lastname'    => $ClientInfo['client_lname'],
    'tech_phone'       => $Phone,
    'tech_title'       => 'Mr',
    'tech_email'       => $ClientInfo['client_email'],
    'org_name'         => $Company,
    'org_division'     => 'Hosting',
    'org_addressline1' => $ClientInfo['client_address'],
    'org_city'         => $City,
    'org_country'      => $Country,
    'org_phone'        => $Phone,
    'org_postalcode'   => $Postal,
    'org_region'       => 'None',
    'dcv_method'       => 'dns',
);

echo '<pre>';
print_r($FormData);

$SSLApi = $DB->find('ssl_api', '*', array('api_key' => 'FREESSL'), null, 1);

require_once ROOT . '/modules/GoGetSSL/GoGetSSLApi.php';

$apiClient = new GoGetSSLApi();
$apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
$result = $apiClient->addSSLOrder($FormData);

if (count($result) > 4) {
    $data = array(
        'ssl_key' => $result['order_id'],
        'ssl_for' => $ClientInfo['client_id'],
    );
    $res = $DB->insert('ssl', $data);

    if ($res) {
        $ssl_url = setURL('clientarea/myssl', '', array('action' => 'view', 'ssl_id' => $result['order_id']));

        $EmailContent = '<p>You have successfully created a new ssl and you need to verify your domain using dns record in order to issue an ssl certificate.</p>';
        $EmailDescription = '<a href="' . $ssl_url . '" target="_blank">View SSL</a>';
        $email_body = email_build_body('New SSL', $ClientInfo['client_fname'], $EmailContent, $EmailDescription);

        send_mail(array(
            'to' => $FormData['email'],
            'message' => $email_body,
            'subject' => 'New SSL #' . $FormData['order_id'],
        ));

        send_mail(array(
            'to' => $SiteConfig['site_email'],
            'message' => email_build_body('New SSL',
                'Administrator',
                '<p>You have successfully created a new ssl and you need to verify your domain using dns record in order to issue an ssl certificate.</p>',
                '<a href="' . setURL('admin/sslcert', '', array('action' => 'view', 'ssl_id' => $result['order_id'])) . '" target="_blank">View SSL</a>'
            ),
            'subject' => 'New SSL #' . $FormData['order_id'],
        ));

        setMessage('SSL requested <b>successfully !</b>', 'success');
        redirect('clientarea/myssl');
    } else {
        setMessage('Something wemt' . "'" . ' <b>weong!</b>', 'danger');
        redirect('clientarea/newssl');
    }
} else {
    setMessage($result['description'], 'danger');
    redirect('clientarea/newssl');
}
