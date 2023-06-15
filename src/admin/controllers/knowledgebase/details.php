<?php

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$knowledgebase_id = get('id');

if ($knowledgebase_id > 0) {
    $Knowledgebase = $DB->find('knowledgebase', '*', array('knowledgebase_id' => $knowledgebase_id), null, 1);
} else {
    $Knowledgebase = null;
}
