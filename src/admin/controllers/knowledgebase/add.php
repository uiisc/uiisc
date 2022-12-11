<?php

if (isset($_POST['submit'])) {
    require '../../application.php';

    $data = array(
        'knowledgebase_subject' => post('subject'),
        'knowledgebase_content' => post('editor'),
        'knowledgebase_date' => date('Y-m-d H:i:s'),
    );

    $resault = $DB->insert('knowledgebase', $data);
    if ($resault) {
        setMessage('Knowledgebase added successfully !');
    } else {
        setMessage("Something went's wrong !", 'danger');
    }
    redirect('admin/knowledgebase');
} else {
    $PageInfo = ['title' => 'New Knowledgebase', 'rel' => ''];
    $load_editor = 1;
}
