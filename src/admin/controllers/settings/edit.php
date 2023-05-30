<?php

require_once __DIR__ . '/../../application.php';

if (isset($_POST['submit'])) {
    $data = array(
        'site_name' => post('name'),
        'site_path' => post('url'),
        'site_email' => post('email'),
        'site_phone' => post('phone'),
        'site_brand' => post('brand'),
        'site_company' => post('company'),
        'site_status' => post('status'),
        'page_title' => post('page_title'),
        'page_description' => post('page_description'),
        'page_keywords' => post('page_keywords'),
        'page_copyright' => post('page_copyright'),
        'page_author' => post('page_author'),
        'ifastnet_aff' => post('ifastnet_aff'),
    );
    $where = array(
        'site_key' => 'UIISC',
    );

    $result = $DB->update('config', $data, $where);

    if ($result) {
        setMessage('Clientarea updated <b>successfully!</b>');
    } else {
        setMessage("Something went's <b>wrong!</b>", 'danger');
    }
    redirect('admin/settings');
}
