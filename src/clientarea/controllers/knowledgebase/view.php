<?php

$knowledgebase_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($knowledgebase_id > 0) {
    $PageInfo['title'] = 'View Knowledgebase #' . $knowledgebase_id;
    $data = $DB->find('knowledgebase', '*', array('knowledgebase_id' => $knowledgebase_id), null, 1);
} else {
    $PageInfo['title'] = 'Unathorized Access';
    $data = null;
}
