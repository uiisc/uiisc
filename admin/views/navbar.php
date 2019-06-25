<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo setRouter('index'); ?>"><?php echo $brandName; ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo setRouter('admin'); ?>"><?php echo I18N('home'); ?></a></li>
                    <?php if (isAdminLoggedIn()) { ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Account&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-header">Account Management</li>
                                <li><a href="<?php echo setRouter('admin', 'check_domain'); ?>">Check Domain</a></li>
                                <li><a href="<?php echo setRouter('admin', 'account_list'); ?>">Account List</a></li>
                                <li><a href="<?php echo setRouter('admin', 'account_add'); ?>">Account Add</a></li>
                                <li><a href="<?php echo setRouter('admin', 'account_password'); ?>">Account Password</a></li>
                                <li><a href="<?php echo setRouter('admin', 'account_active'); ?>">Account Activate</a></li>
                                <li><a href="<?php echo setRouter('admin', 'account_status'); ?>">Account Status</a></li>
                                <li><a href="<?php echo setRouter('admin', 'account_domain'); ?>">Account Domains</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo setRouter('admin', 'account_disable'); ?>">Account Suspend</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo setRouter('admin', 'tickets'); ?>"><?php echo I18N('Tickets'); ?></a></li>
                        <li><a href="<?php echo setRouter('admin', 'news'); ?>"><?php echo I18N('news'); ?></a></li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isAdminLoggedIn()) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello,&nbsp;<?php echo ($admin["name"]); ?>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo setRouter('admin', 'details'); ?>">Account Details</a></li>
                                <li><a href="<?php echo setRouter('admin', 'edit_details'); ?>">Edit Account Details</a></li>
                                <li><a href="<?php echo setRouter('admin', 'change_password'); ?>">Change password</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo setRouter('clientarea'); ?>" target="_blank"><?php echo I18N('clientarea'); ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo setRouter('admin', 'logout'); ?>"><?php echo I18N('Logout'); ?></a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a href="<?php echo setRouter('admin'); ?>"><?php echo I18N('ControlArea'); ?></a></li>
                        <li><a href="<?php echo setRouter('clientarea'); ?>"><?php echo I18N('clientarea'); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>