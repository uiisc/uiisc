<?php

require '../../application.php';

$client_id = get('client_id');

if (!$client_id) {
    exit('Access Denied');
}

$resault = $DB->update('clients', array('hosting_client_status' => 1), array('hosting_client_id' => $client_id));

if ($resault) {
    setMessage('Client activated successfully !');
} else {
    setMessage("Something went's wrong !", 'danger');
}

redirect('admin/clients', '', array('action' => 'view', 'client_id' => $client_id));
