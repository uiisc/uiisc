<?php

$PageInfo['title'] = $lang->I18N('Hosting Hostname');

$api_id = get('id');
$where = array();
if ($api_id > 0) {
    $has = $DB->find('account_api', 'api_id', array('api_id' => $api_id), null, 1);
    if ($has) {
        $where = array('api_id' => $api_id);
    }
}

$count = $DB->count('account_hostname', $where);
if ($count > 0) {
    $rows = $DB->findAll('account_hostname', '*', $where, '`host_id` ASC');
}
