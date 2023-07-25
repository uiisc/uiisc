<div class="col-sm-3 col-md-3 col-lg-2">
    <!-- <div class="page-header">
        <a href="profile.php" class="sidebar-link sidebar-link-with-icon">
            <span class="sidebar-icon bg-transparent text-dark rounded-circle">
                <img class="rounded-circle" src="https://dn-qiniu-avatar.qbox.me/avatar/<?php echo $avatar_path; ?>?s=30" height="30px" width="30px">
            </span>
            <?php echo $AdminInfo['admin_fname'] . " " . $AdminInfo['admin_lname']; ?>
        </a>
    </div> -->
    <div class="sidebar">
        <div class="panel panel-default">
            <div class="panel-heading"><span class="panel-title">菜单</span></div>
            <div class="list-group">
                <a class="list-group-item <?php echo checkIfActive('index,') ?>" href="index.php"><i class="fa fa-tachometer-alt" aria-hidden="true"></i> <?php echo $lang->I18N('Dashboard'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('clients') ?>" href="clients.php"><i class="fa fa-users fa-fw"></i> <?php echo $lang->I18N('Clients List'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('accounts') ?>" href="accounts.php"><i class="fa fa-server fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Hosting Accounts'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('tickets') ?>" href="tickets.php"><i class="fa fa-ticket-alt" aria-hidden="true"></i> <?php echo $lang->I18N('Tickets List'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('ssl') ?>" href="ssl.php"><i class="fa fa-shield-alt" aria-hidden="true"></i> <?php echo $lang->I18N('SSL Certificates'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('knowledgebase') ?>" href="knowledgebase.php"><i class="fa fa-book fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Knowledgebase'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('news') ?>" href="news.php"><i class="fa fa-newspaper fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('News List'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('hosting-provider') ?>" href="hosting-provider.php"><i class="fa fa-server fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Hosting Provider'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('ssl-provider') ?>" href="ssl-provider.php"><i class="fa fa-server fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('SSL Provider'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('domain-provider') ?>" href="domain-provider.php"><i class="fa fa-globe fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Domain Provider'); ?></a>
                <a class="list-group-item <?php echo checkIfActive('settings') ?>" href="settings.php"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('System Settings'); ?></a>
                <a class="list-group-item" href="#" onclick="return logout();"><i class="fa fa-sign-out-alt fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('logout'); ?></a>
            </div>
        </div>
    </div>

    <div class="sidebar-footer">
        <p class="copyright text-center">
            &copy; <?php echo date("Y") ?> <a target="_blank" href="https://uiisc.org">UIISC</a> All rights reserved.
        </p>
    </div>
</div>
<div class="col-sm-9 col-md-9 col-lg-10">
