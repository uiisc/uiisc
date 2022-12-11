<?php

require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$extension = post('extension');

if (!$extension) {
    redirect('admin/settings', 'domain');
}

$extension = strtolower($extension);

if (substr($extension, 0, 1) != '.') {
    $extension = '.' . $extension;
}

$data = array(
    'extension_value' => $extension,
);

$count = $DB->count('domain_extensions', $data);

if (!$count > 0) {
    setMessage('Extension won' . "'" . 't <b>exsist!</b>', 'danger');
} else {
    $result = $DB->delete('domain_extensions', $data);
    if ($result) {
        setMessage('Extension deleted <b>successfully!</b>');
    } else {
        setMessage('Something went' . "'" . 's <b>wrong!</b>', 'danger');
    }
}

redirect('admin/settings', 'domain');
