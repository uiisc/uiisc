<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$count = $DB->count('knowledgebase');
if ($count > 0) {
    $rows = $DB->findAll('knowledgebase', '*', array(), "`knowledgebase_id` DESC");
}
