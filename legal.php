<?php
define('IN_SYS', true);
require_once "core.php";

include("{$ROOT}/core/controllers/legal.php");

include("{$ROOT}/core/views/header.php");
include("{$ROOT}/core/views/navbar.php");
include("{$section_page}");
include("{$ROOT}/core/views/footer.php");
