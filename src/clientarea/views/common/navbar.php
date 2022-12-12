
<div class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-sm-and-down">
    <nav class="navbar">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><?php echo $lang->I18N('Client Area'); ?></a>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item nav-height">
                <button class="btn btn-sm my-auto" role="button" onclick="halfmoon.toggleDarkMode()">
                    <i class="fas fa-paint-roller"></i>
                </button>
            </li>
            <div class="nav-item nav-height dropdown with-arrow">
                <button class="btn" data-toggle="dropdown" type="button" id="language-change-toggle" aria-haspopup="true" aria-expanded="false">
                    <?php echo $lang->get_language_name(); ?> <i class="fa fa-angle-up ml-5" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu language-change" aria-labelledby="language-change-toggle">
                    <?php echo $lang->get_languages_tags(); ?>
                </div>
            </div>
            <li class="nav-item nav-height dropdown with-arrow">
                <a class="btn btn-sm m5x" data-toggle="dropdown" id="nav-link-dropdown-toggle">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
                    <a href="<?php echo $site_url; ?>" class="dropdown-item" target="_blank"><?php echo $lang->I18N('Home'); ?></a>
                    <div class="dropdown-divider"></div>
                    <a href="profile.php" class="dropdown-item"><?php echo $lang->I18N('Profile'); ?></a>
                    <a href="settings.php" class="dropdown-item"><?php echo $lang->I18N('Settings'); ?></a>
                    <a href="logout.php" class="dropdown-item"><?php echo $lang->I18N('logout'); ?></a>
                </div>
            </li>
            <li class="nav-item nav-height hidden-on-up">
                <button class="btn btn-sm my-auto" onclick="halfmoon.toggleSidebar()"><i class="fa fa-bars"></i></button>
            </li>
        </div>
    </nav>
