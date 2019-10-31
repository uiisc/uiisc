<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../help.php");
    exit;
}

?>

<div class="container">
    <div class="page-header">
        <h1><?php echo $lang->I18N('help'); ?></h1>
    </div>
</div>

<div class="container">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($questions as $key => $value) { ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-<?php echo $key; ?>">
                    <a class="panel-title<?php echo $key == 0 ? '' : ' collapsed'; ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#questions-<?php echo $key; ?>" aria-expanded="<?php echo $key == 0 ? 'true' : 'false'; ?>" aria-controls="questions-<?php echo $key; ?>">
                        <?php echo $key + 1; ?>.<?php echo $value["title"]; ?>
                    </a>
                </div>
                <div id="questions-<?php echo $key; ?>" class="panel-collapse collapse<?php echo $key == 0 ? ' in' : ''; ?>" role="tabpanel" aria-labelledby="heading-<?php echo $key; ?>">
                    <div class="panel-body">
                        <p><?php echo $value["content"]; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>