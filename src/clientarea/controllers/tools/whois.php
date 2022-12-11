<?php

require_once __DIR__ . '/../../application.php';

if (isset($_POST['domain'])) {
    $domain = post('domain');
    if (substr(strtolower($domain), 0, 7) == "http://") {
        $domain = substr($domain, 7);
    }

    if (substr(strtolower($domain), 0, 8) == "https://") {
        $domain = substr($domain, 8);
    }

    if (substr(strtolower($domain), 0, 4) == "www.") {
        $domain = substr($domain, 4);
    }

    $Whois = new \lib\Whois();

    if ($Whois->validateDomain($domain)) {
        echo '<hr><pre>' . $Whois->lookUp($domain) . '</pre>';
    } else {
        echo "Invalid Input!";
    }
}
