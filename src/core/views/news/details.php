<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../index.php");
    exit;
}
?>

<div class="container">
    <div class="pull-right">
        <a class="btn btn-default btn-xs" href="<?php echo setRouter('news'); ?>"><?php echo $lang->I18N('list'); ?></a>
    </div>
    <div class="page-header text-center">
        <h1><?php echo $data['title']; ?></h1>
        <p><?php echo cTime($data['date']); ?></p>
    </div>
    <?php echo htmlspecialchars_decode($data['content']); ?>
</div>