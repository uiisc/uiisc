
<div class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-sm-and-down">
    <nav class="navbar">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><?php echo $SiteConfig['site_name']; ?></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-height dropdown with-arrow">
                <a class="btn btn-sm m5x" data-toggle="dropdown" id="nav-link-dropdown-toggle">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
                    <a href="logout.php" class="dropdown-item"><?php echo $lang->I18N('logout'); ?></a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-content">
                        <button class="btn btn-block" role="button" onclick="halfmoon.toggleDarkMode()"><i class="fa fa-sun"></i> Switch</button>
                    </div>
                </div>
                </li>
                <li class="nav-item nav-height hidden-on-up">
                    <button class="btn btn-sm my-auto" onclick="halfmoon.toggleSidebar()"><i class="fa fa-bars"></i></button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
    <div class="sidebar">
        <div class="sidebar-menu">
            <h5 class="sidebar-title"><?php echo $lang->I18N('Logged in as'); ?>:</h5>
            <div class="sidebar-divider"></div>
            <a href="profile.php" class="sidebar-link sidebar-link-with-icon">
                <span class="sidebar-icon bg-secondary text-dark rounded-circle">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>
                <?php echo $ClientInfo['client_fname'] . " " . $ClientInfo['client_lname']; ?>

            </a>
            <h5 class="sidebar-title"><?php echo $lang->I18N('Main Menu'); ?></h5>
            <div class="sidebar-divider"></div>
            <a href="logout.php" class="sidebar-link sidebar-link-with-icon">
                <span class="sidebar-icon bg-transparent">
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                </span>
                <?php echo $lang->I18N('logout'); ?>

            </a>
            <!-- <br /> -->
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card p-15">
                <h5 class="mb-0 px-5"><?php echo $lang->I18N('Validate Account'); ?></h5><hr>
                <div>
                    <p><b>Note:</b> You need to verify this account in order to use our free hosting and ssl services. An email has been sent to your submitted email address(<samp><?php echo $ClientInfo['client_email']; ?></samp>) with validation code.</p>
                    <form action="controllers/clients/validate.php" method="post">
                        <div class="form-group">
                            <label class="form-label"><?php echo $lang->I18N('Validation Code'); ?></label>
                            <input type="text" name="validation_code" class="form-control" placeholder="eg. Abdu6236734h...">
                        </div>
                        <div class="form-group">
                            <button name="validate" class="btn btn-primary"><?php echo $lang->I18N('Validate'); ?></button>
                        </div>
                    </form>
                </div>
                <hr />
                <div>
                    <p>If you have not received this verification code, please click the Resend Code button, and the system will send a new verification code to your mailbox.</p>
                    <form action="controllers/clients/resendcode.php" method="post">
                        <button name="resendcode" class="btn btn-secondary"><?php echo $lang->I18N('Resend Code'); ?></button>
                    </form>
                </div>
            </div>
        </div>
