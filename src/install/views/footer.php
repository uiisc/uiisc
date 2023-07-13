<?php

if (!defined('IN_CRONLITE')) {
    exit();
}
?>

<div id="hidden-area"><?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}?></div>


</body>
</html>