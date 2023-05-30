<?php

if (isset($_POST['submit'])) {
    require '../../application.php';
    $id = post('id');
    if (!$id) {
        setMessage('need field: id', 'danger');
        redirect('admin/knowledgebase', '', array('action' => 'edit', 'id' => $id));
    }
    $subject = post('subject');
    if (!$subject) {
        setMessage('need field: subject', 'danger');
        redirect('admin/knowledgebase', '', array('action' => 'edit', 'id' => $id));
    }
    $editor = post('editor');
    if (!$editor) {
        setMessage('need field: editor', 'danger');
        redirect('admin/knowledgebase', '', array('action' => 'edit', 'id' => $id));
    }

    $FormData = array(
        'knowledgebase_subject' => $subject,
        'knowledgebase_content' => $editor,
        'knowledgebase_date' => date('Y-m-d H:i:s'),
    );
    $result = $DB->update('knowledgebase', $FormData, array('knowledgebase_id' => $id));

    if ($result) {
        setMessage('Knowledgebase updated successfully !');
    } else {
        setMessage("Something went's wrong !", 'danger');
    }
    redirect('admin/knowledgebase', '', array('action' => 'edit', 'id' => $id));
} else {
    $id = get('id');
    $load_editor = 1;
    if ($id > 0) {
        $PageInfo = ['title' => 'Edit Knowledgebase #' . $id, 'rel' => ''];
        $Knowledgebase = $DB->getRow("SELECT * FROM pre_knowledgebase WHERE knowledgebase_id='{$id}' limit 1");
    } else {
        $PageInfo = ['title' => 'Unathorized Access', 'rel' => ''];
        $Knowledgebase = null;
    }
}
