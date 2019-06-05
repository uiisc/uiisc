<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../index.php");
    exit;
}
/**
 * Verify PHP version
 */
function getVersion()
{
    if ((float)phpversion() < 5.5) {
        exit('<center style="font-family:Verdana, Geneva, sans-serif;font-size:14px;margin:10% auto;"><p><b>Oops!</b> There was a problem. Apparently <br/>You are using the php <b>version ' . phpversion() . '</b> a lower version than the one indicated <br/></p><h2>Anake script requires the php version</h2><h1 style="font-size:4em;">5.5.+</h1></center>');
    }
}

// Protect the entered data function
function setProtect($var)
{
    return htmlentities(htmlspecialchars($var));
}
