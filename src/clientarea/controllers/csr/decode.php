<?php

require __DIR__ . '/../../application.php';

$PageInfo = ['title' => 'Decode CSR', 'rel' => ''];

if (isset($_POST['submit'])) {
    $FormData = array(
        'csr' => post('csr'),
    );
    $SSLApi = $DB->find('ssl_api', '*', array('api_key' => 'FREESSL'), null, 1);

    require ROOT . '/modules/GoGetSSL/GoGetSSLApi.php';

    $apiClient = new GoGetSSLApi();
    $token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
    $newOrder = $apiClient->decodeCSR($FormData['csr']);
    if (isset($newOrder['error'])) {
        echo "<hr>" . $newOrder['description'];
    } else {
        echo '<hr><div class="row">
            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>Domain Name:</b><span>' . $newOrder['csrResult']['CN'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>Email Address:</b><span>' . $newOrder['csrResult']['Email'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>Company Name:</b><span>' . $newOrder['csrResult']['O'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>Department:</b><span>' . $newOrder['csrResult']['OU'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>Country Code:</b><span>' . $newOrder['csrResult']['C'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>State:</b><span>' . $newOrder['csrResult']['L'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>City:</b><span>' . $newOrder['csrResult']['S'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>md5 signature:</b><span>' . $newOrder['csrResult']['md5'] . '</span></div>

            <div class="col-md-6 mb-5 px-10 d-flex justify-content-between align-items-center"><b>sha1 signature:</b><span>' . $newOrder['csrResult']['sha1'] . '</span></div>
        </div>';
    }
}
