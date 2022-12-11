<div class="container-fluid">
    <div class="px-10 m-20">
        <a href="<?php echo setRouter('settings');?>" class="btn<?php if ($section == 'settings') echo ' btn-primary'; ?>">
            <i class="fa fa-cog"></i> <?php echo $lang->I18N('System Settings'); ?>
        </a>
        <a href="<?php echo setRouter('settings', 'hosting');?>" class="btn<?php if ($section == 'hosting') echo ' btn-primary'; ?>">
            <i class="fa fa-server"></i></span>
            <?php echo $lang->I18N('Hosting Settings'); ?>
        </a>
        <a href="<?php echo setRouter('settings', 'domain');?>" class="btn<?php if ($section == 'domain') echo ' btn-primary'; ?>">
            <i class="fa fa-plug"></i></span>
            <?php echo $lang->I18N('Domain Settings'); ?>
        </a>
        <a href="<?php echo setRouter('settings', 'smtp');?>" class="btn<?php if ($section == 'smtp') echo ' btn-primary'; ?>">
            <i class="fa fa-inbox"></i></span>
            <?php echo $lang->I18N('SMTP Settings'); ?>
        </a>
        <a href="<?php echo setRouter('settings', 'sslapi');?>" class="btn<?php if ($section == 'sslapi') echo ' btn-primary'; ?>">
            <i class="fa fa-lock"></i></span>
            <?php echo $lang->I18N('SSL API Settings'); ?>
        </a>
        <a href="<?php echo setRouter('settings', 'sitepro');?>" class="btn<?php if ($section == 'sitepro') echo ' btn-primary'; ?>">
            <i class="fa fa-tools"></i></span>
            <?php echo $lang->I18N('SitePro Settings'); ?>
        </a>
    </div>
</div>
