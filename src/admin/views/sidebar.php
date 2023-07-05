<?php
$avatar_path = $AdminInfo['admin_email'] ? md5($AdminInfo['admin_email']) : 'default';
?>

<!-- Sidebar Start -->
<div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
<div class="sidebar">
    <div class="sidebar-menu">
        <h5 class="sidebar-title"><?php echo $lang->I18N('Logged in as'); ?>:</h5>
        <div class="sidebar-divider"></div>
        <a href="profile.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent text-dark rounded-circle">
                <img class="rounded-circle" src="https://dn-qiniu-avatar.qbox.me/avatar/<?php echo $avatar_path; ?>?s=30" height="30px" width="30px">
            </span>
            <?php echo $AdminInfo['admin_fname'] . " " . $AdminInfo['admin_lname']; ?>

        </a>
        <h5 class="sidebar-title"><?php echo $lang->I18N('Main Menu'); ?></h5>
        <div class="sidebar-divider"></div>
        <a href="./" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-home" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Dashboard'); ?>
        </a>
        <a href="clients.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-users" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Clients List'); ?>
        </a>
        <a href="tickets.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-ticket-alt" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Tickets List'); ?>
        </a>
        <a href="ssl.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-shield-alt" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('SSL Certificates'); ?>
        </a>
        <a href="accounts.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Hosting Accounts'); ?>
        </a>
        <a href="knowledgebase.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-book" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Knowledgebase'); ?>
        </a>
        <a href="news.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-newspaper" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('News List'); ?>
        </a>
        <a href="hosting-provider.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-server" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Hosting Provider'); ?>
        </a>
        <a href="hosting-provider.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent"><i class="fa fa-globe" aria-hidden="true"></i></span>
            <?php echo $lang->I18N('Domain Provider'); ?>
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
    <div class="sidebar-footer">
        <p class="copyright text-center">
            &copy; <?php echo date("Y") ?> <a target="_blank" href="https://uiisc.org">UIISC</a> All rights reserved.
        </p>
    </div>
</div>
<!-- Sidebar End -->
