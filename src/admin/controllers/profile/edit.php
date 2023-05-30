<?php
if (isset($_POST['submit'])) {
    require '../../application.php';
    $data = array(
        'admin_fname' => post('fname'),
        'admin_lname' => post('lname')
    );
    $where = array(
        'admin_key' => $AdminInfo['admin_key']
    );

    $result = $DB->update('admin', $data, $where);
    if ($result) {
        setMessage('Profile updated successfully !');
    } else {
        setMessage("Something went's wrong !", 'danger');
    }
    redirect('admin/profile');
}

