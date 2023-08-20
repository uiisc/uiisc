<div class="container-fluid">
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">navbar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./"><?php echo $lang->I18N('Admin Area'); ?></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php echo checkIfActive('index,') ?>">
                        <a href="./"><i class="fa fa-tachometer-alt" aria-hidden="true"></i> <?php echo $lang->I18N('Dashboard'); ?></a>
                    </li>
                    <li class="<?php echo checkIfActive('clients') ?>">
                        <a href="clients.php"><i class="fa fa-users fa-fw"></i> <?php echo $lang->I18N('Clients List'); ?></a>
                    </li>
                    <li class="<?php echo checkIfActive('accounts') ?>">
                        <a href="accounts.php"><i class="fa fa-server fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Hosting Accounts'); ?></a>
                    </li>
                    <li class="<?php echo checkIfActive('tickets') ?>">
                        <a href="tickets.php"><i class="fa fa-ticket-alt" aria-hidden="true"></i> <?php echo $lang->I18N('Tickets List'); ?></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="changelanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-language"></span> <?php echo $lang->get_language_name(); ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu language-change"><?php echo $lang->get_languages_tags(); ?></ul>
                    </li>
                    <li class="<?php echo checkIfActive('profile'); ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-cog fa-fw"></i>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php" class="text-center">
                                    <p><img class="img-rounded" src="<?php echo $AdminInfo['avatar']; ?>" height="80px" width="80px"></p>
                                    <!-- <i class="fa fa-user-circle fa-5x"></i> -->
                                    <div><?php echo $AdminInfo['admin_fname'] . " " . $AdminInfo['admin_lname']; ?></div>
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="profile.php"><i class="fa fa-user-alt fa-fw"></i> <?php echo $lang->I18N('Profile'); ?></a></li>
                            <li><a href="profile.php?action=password"><i class="fa fa-user-shield fa-fw"></i> <?php echo $lang->I18N('Change Password'); ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo $site_url; ?>" target="_blank"><i class="fa fa-external-link-alt fa-fw"></i> <?php echo $lang->I18N('home'); ?></a></li>
                            <li><a href="<?php echo $site_url; ?>/clientarea/" target="_blank"><i class="fa fa-house-user fa-fw"></i> <?php echo $lang->I18N('Client Area'); ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" onclick="return logout();"><i class="fa fa-sign-out-alt fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('logout'); ?></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" aria-hidden="true"><i id="theme-selector"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid">
<div class="row page-wrapper">
