<?php

$id = get('id');

$data = $DB->find('ssl_api', '*', array('id' => $id), null, 1);
