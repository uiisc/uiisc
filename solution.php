<?php
  define('IN_SYS', true);
  require_once ("core.php");
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - <?php echo $LANG['solution']; ?></title>
    <?php include ("headmate.php"); ?>
</head>
<body>
<?php include ("nav.php"); ?>

  <div class="bs-docs-header">
    <div class="container">
      <h1><?php echo $LANG['solution']; ?></h1>
      <p>You can sign up here for fast free PHP & MySQL hosting including a free sub domain. Fill out the form below and your free hosting account will be created.  <em>Enjoy :)</em></p>
    </div>
  </div>
  <section class="section-wrap">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="list-group">
            <div class="list-group-item">
              <?php echo $LANG['host-plan-free']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">1</span>
              <?php echo $LANG['ftp-accounts']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">1</span>
              <?php echo $LANG['sub-domains']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">1</span>
              <?php echo $LANG['add-on-domains']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['parked-domains']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">10</span>
              <?php echo $LANG['mysql-databases']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">10GB (10240MB)</span>
              <?php echo $LANG['disk-quota']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">100GB (102400MB)</span>
              <?php echo $LANG['bandwidth']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">50000</span>
              <?php echo $LANG['daily-hits']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">30019</span>
              <?php echo $LANG['host-inodes']; ?>
            </div>
            <div class="list-group-item text-center">
              <a class="btn btn-primary" href="./register.php" role="button"><?php echo $LANG['register']; ?></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="list-group">
            <div class="list-group-item">
              <?php echo $LANG['host-plan-paid']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge">1</span>
              <?php echo $LANG['ftp-accounts']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['sub-domains']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['add-on-domains']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['parked-domains']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['mysql-databases']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['disk-quota']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['bandwidth']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['daily-hits']; ?>
            </div>
            <div class="list-group-item">
              <span class="badge"><?php echo $LANG['unlimited']; ?></span>
              <?php echo $LANG['host-inodes']; ?>
            </div>
            <div class="list-group-item text-center">
              <a class="btn btn-primary disabled" href="./register.php" role="button"><?php echo $LANG['register']; ?></a>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php include ("footer.php"); ?>
</body>
</html>