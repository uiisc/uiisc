<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="/"><?php echo $lang->I18N('home'); ?></a></li>
        <li><a href="<?php echo setRouter('news'); ?>"><?php echo $lang->I18N('News'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('details'); ?></li>
    </ol>
    <div class="page-header text-center">
        <h2><?php echo $data['news_subject']; ?></h2>
        <p><?php echo $data['news_date']; ?></p>
    </div>
    <div>
        <?php echo htmlspecialchars_decode($data['news_content']); ?>
    </div>
</div>
