<?php

require_once __DIR__ . '/../../application.php';

require_once ROOT . '/core/handler/HostingHandler.php';
require_once ROOT . '/modules/autoload.php';

use \InfinityFree\MofhClient\Client;

if (isset($_POST['submit'])) {
    $domain = post('domain');
    $client = Client::create($HostingApiConfig);
    $request = $client->availability(array('domain' => $domain));
    $response = $request->send();
    if ($response->isSuccessful() == 0 && strlen($response->getMessage()) > 1) {
        echo $response->getMessage();
    } elseif ($response->isSuccessful() == 1 && $response->getMessage() == 1) {
        exit($domain);
    } elseif ($response->isSuccessful() == 0 && $response->getMessage() == 0) {
        exit('<p>Sorry !</p><p>"' . $domain . '" is already <b>registered</b> !</p>');
    }
    exit('Sorry ! Something went' . "'" . 's <b>wrong</b> !');
}

echo 'Method Not Allowed';
