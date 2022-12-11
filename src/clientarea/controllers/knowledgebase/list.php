<?php

$count = $DB->count('knowledgebase');
if ($count > 0) {
    $rows = $DB->findAll('knowledgebase', '*', array(), "`knowledgebase_id` DESC");
}

$PageInfo['title'] = 'Knowledgebase List';
