<?php
define('IN_CRONLITE', true);
require_once("core.php");

include("core/controllers/news.php");

include("core/views/header.php");
include("core/views/navbar.php");
include($section_page);
include("core/views/footer.php");
