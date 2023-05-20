<?php
$avatar_path = $ClientInfo['client_email'] ? md5($ClientInfo['client_email']) : 'default';
?>

<div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>

<div class="sidebar">
    <div class="sidebar-menu">
        <h5 class="sidebar-title"><?php echo $lang->I18N('Logged in as'); ?>:</h5>
        <div class="sidebar-divider"></div>
        <a href="profile.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent text-dark rounded-circle">
                <!-- <i class="fa fa-user-circle" aria-hidden="true"></i> -->
                <img class="rounded-circle" src="https://dn-qiniu-avatar.qbox.me/avatar/<?php echo $avatar_path; ?>?s=30" height="30px" width="30px">
            </span>
            <?php echo $ClientInfo['client_fname'] . " " . $ClientInfo['client_lname']; ?>

        </a>

        <h5 class="sidebar-title"><?php echo $lang->I18N('Main Menu'); ?></h5>
        <div class="sidebar-divider"></div>
        <a href="index.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-home" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('home'); ?>
        </a>
        <a href="accounts.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-server" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Hosting Accounts'); ?>
        </a>
        <a href="myssl.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('SSL Certificate'); ?>
        </a>
        <a href="knowledgebase.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-book" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Knowledgebase'); ?>
        </a>
        <a href="tickets.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Tickets'); ?>
        </a>
        <a href="tools.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-tools" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Additional Tools'); ?>
        </a>
        <a href="settings.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-cog" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Settings'); ?>
        </a>
        <a href="logout.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('logout'); ?>
        </a>
    </div>
</div>

<div class="content-wrapper">