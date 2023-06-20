<a href="<?php echo setRouter('settings'); ?>" class="btn<?php if ($section == 'settings') echo ' btn-primary'; ?>">
    <i class="fa fa-cog"></i> <?php echo $lang->I18N('System Settings'); ?>
</a>
<a href="<?php echo setRouter('settings', 'smtp'); ?>" class="btn<?php if ($section == 'smtp') echo ' btn-primary'; ?>">
    <i class="fa fa-inbox"></i></span>
    <?php echo $lang->I18N('SMTP Settings'); ?>
</a>
<a href="<?php echo setRouter('settings', 'sitepro'); ?>" class="btn<?php if ($section == 'sitepro') echo ' btn-primary'; ?>">
    <i class="fa fa-tools"></i></span>
    <?php echo $lang->I18N('SitePro Settings'); ?>
</a>
