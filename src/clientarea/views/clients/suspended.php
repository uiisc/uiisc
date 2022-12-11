
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
        </div>
    </nav>
    <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
      <div class="sidebar">
        <div class="sidebar-menu">
            <h5 class="sidebar-title"><?php echo $lang->I18N('Logged in as'); ?></h5>
            <div class="sidebar-divider"></div>
            <a href="profile.php" class="sidebar-link sidebar-link-with-icon">
                <span class="sidebar-icon bg-secondary text-dark rounded-circle">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>
                <?php
if ($ClientInfo['hosting_client_status'] == 1) {
    header("location: index.php");
}
echo $ClientInfo['hosting_client_fname'] . " " . $ClientInfo['hosting_client_lname'];
?>

            </a>
            <h5 class="sidebar-title">Main Menu</h5>
            <div class="sidebar-divider"></div>
            <a href="logout.php" class="sidebar-link sidebar-link-with-icon">
                <span class="sidebar-icon bg-transparent">
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                </span>
                <?php echo $lang->I18N('logout'); ?>
            </a>
        </div>
      </div>
      <div class="content-wrapper">
          <div class="container-fluid">
              <div class="card p-15 text-center">
                <h2 class="mb-0">Sorry !</h2>
                <h5 class="mb-0">Account Suspended</h5>
                <p>Your account has been suspended due to over usage of resources or due to abuse of services. Please open a support ticket inorder to know the reason of suspention.</p>
              </div>
          </div>
