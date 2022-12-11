<?php

require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$domain = post('domain');

if (!$domain) {
    redirect('admin/settings', 'domain');
}

$domain = strtolower($domain);

if (substr($domain, 0, 1) != '.') {
    $domain = '.' . $domain;
}

$data = array(
    'extension_value' => $domain,
);

$has = $DB->count('domain_extensions', $data);
if ($has && $has > 0) {
    setMessage('Extension aleady <b>exsist!</b>', 'danger');
} else {
    $resault = $DB->insert('domain_extensions', $data);
    if ($resault) {
        setMessage('Extension added <b>successfully!</b>');
    } else {
        setMessage('Something went' . "'" . 's <b>wrong!</b>', 'danger');
    }
}

redirect('admin/settings', 'domain');
