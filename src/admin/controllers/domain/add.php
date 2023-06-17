<?php

require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$domain = post('domain');

if (!$domain) {
    redirect('admin/domain');
}

$domain = strtolower($domain);

if (substr($domain, 0, 1) != '.') {
    $domain = '.' . $domain;
}

$data = array(
    'extension_value' => $domain,
);

$has = $DB->count('account_domaintld', $data);
if ($has && $has > 0) {
    setMessage('Extension aleady <b>exsist!</b>', 'danger');
} else {
    $result = $DB->insert('account_domaintld', $data);
    if ($result) {
        setMessage('Extension added <b>successfully!</b>');
    } else {
        setMessage('Something went' . "'" . 's <b>wrong!</b>', 'danger');
    }
}

redirect('admin/domain');
