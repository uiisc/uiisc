<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: index.php");
    exit;
}

?>

<div class="container">
    <div class="bs-docs-header">
        <h1><?php echo I18N('about'); ?> iFastNet</h1>
    </div>
</div>
<div class="container">
    <div class="">
        <a href="https://ifastnet.com/portal/aff.php?aff=<?php echo $iFastNetAff; ?>" target="blank">iFastNet</a>
    </div>
</div>