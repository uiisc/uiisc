<?php

require __DIR__ . '/../../application.php';

$PageInfo = ['title' => 'New CSR', 'rel' => ''];

if (isset($_POST['submit'])) {
    $SSLApi = $DB->find('ssl_api', '*', array('api_key' => 'FREESSL'), null, 1);
    $FormData = array(
        'csr_commonname' => strtolower(post('domain')),
        'csr_organization' => post('company'),
        'csr_department' => post('department'),
        'csr_city' => post('city'),
        'csr_state' => post('state'),
        'csr_country' => post('country'),
        'csr_email' => post('email'),
    );

    require ROOT . '/modules/GoGetSSL/GoGetSSLApi.php';

    $apiClient = new GoGetSSLApi();
    $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);

    $newOrder = $apiClient->generateCSR($FormData);
    if (isset($newOrder['error'])) {
        echo "<hr>" . $newOrder['description'];
    } else {
        echo '<hr><label>CSR Code:</label><pre><textarea class="form-control disabled mb-5" style="height:250px" readonly>' . $newOrder['csr_code'] . '</textarea></pre><label>Private Key:</label><pre><textarea class="form-control disabled    " style="height:250px" readonly>' . $newOrder['csr_key'] . '</textarea></pre>';
    }
}
