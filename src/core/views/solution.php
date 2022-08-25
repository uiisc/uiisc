<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../solution.php");
    exit;
}
?>

<div class="container">
    <div class="page-header">
        <h1><?php echo $lang->I18N('solution'); ?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="list-group">
                <div class="list-group-item">
                    <a class="btn btn-link btn-xs pull-right" href="register.php" role="button"><?php echo $lang->I18N('register'); ?></a>
                    <?php echo $lang->I18N('host-plan-free'); ?>
                </div>
                <div class="list-group-item"><span class="badge">1</span><?php echo $lang->I18N('ftp-accounts'); ?></div>
                <div class="list-group-item disabled"><span class="badge"><?php echo $lang->I18N('not-support'); ?></span><?php echo $lang->I18N('free-domains'); ?></div>
                <div class="list-group-item"><span class="badge">10</span><?php echo $lang->I18N('sub-domains'); ?></div>
                <div class="list-group-item"><span class="badge">10</span><?php echo $lang->I18N('add-on-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('parked-domains'); ?></div>
                <div class="list-group-item"><span class="badge">10</span><?php echo $lang->I18N('mysql-databases'); ?></div>
                <div class="list-group-item"><span class="badge">10 GB</span><?php echo $lang->I18N('disk-quota'); ?></div>
                <div class="list-group-item"><span class="badge">100 GB</span><?php echo $lang->I18N('monthly-bandwidth'); ?></div>
                <div class="list-group-item"><span class="badge">50000</span><?php echo $lang->I18N('daily-hits'); ?></div>
                <div class="list-group-item"><span class="badge">30019</span><?php echo $lang->I18N('host-inodes'); ?></div>
                <div class="list-group-item">Latest vPanel with Softaculous</div>
                <div class="list-group-item">Latest PHP and mySQL</div>
                <div class="list-group-item">SiteBuilder</div>
                <div class="list-group-item">1 Click Script Installer</div>
                <div class="list-group-item disabled"><span class="badge"><?php echo $lang->I18N('not-support'); ?></span>Node.JS</div>
                <div class="list-group-item disabled"><span class="badge"><?php echo $lang->I18N('not-support'); ?></span>Postgres</div>
                <div class="list-group-item disabled"><span class="badge"><?php echo $lang->I18N('not-support'); ?></span>Free SSL Certificate</div>
                <div class="list-group-item disabled"><span class="badge"><?php echo $lang->I18N('not-support'); ?></span>Custom CRON Jobs</div>
                <div class="list-group-item text-center">
                    <!-- <a class="btn btn-default" href="plan/free.php" role="button">详情</a> -->
                    <a class="btn btn-primary" href="register.php" role="button"><?php echo $lang->I18N('register'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="list-group">
                <div class="list-group-item">
                    <a class="btn btn-link btn-xs pull-right" href="register.php" role="button"><?php echo $lang->I18N('register'); ?></a>
                    <?php echo $lang->I18N('host-plan-super'); ?>
                </div>
                <div class="list-group-item"><span class="badge">100</span><?php echo $lang->I18N('ftp-accounts'); ?></div>
                <div class="list-group-item"><span class="badge">6</span><?php echo $lang->I18N('free-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('sub-domains'); ?></div>
                <div class="list-group-item"><span class="badge">20</span><?php echo $lang->I18N('add-on-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('parked-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('mysql-databases'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('disk-quota'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('monthly-bandwidth'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('daily-hits'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('host-inodes'); ?></div>
                <div class="list-group-item">Latest cPanel with Softaculous</div>
                <div class="list-group-item">Latest PHP and mySQL</div>
                <div class="list-group-item">SiteBuilder</div>
                <div class="list-group-item">1 Click Script Installer</div>
                <div class="list-group-item">Node.JS</div>
                <div class="list-group-item">Postgres</div>
                <div class="list-group-item">Free SSL Certificate</div>
                <div class="list-group-item">Custom CRON Jobs</div>
                <div class="list-group-item text-center">
                    <a class="btn btn-primary" href="register.php" role="button"><?php echo $lang->I18N('register'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="list-group">
                <div class="list-group-item">
                    <a class="btn btn-link btn-xs pull-right" href="register.php" role="button"><?php echo $lang->I18N('register'); ?></a>
                    <?php echo $lang->I18N('host-plan-ultimate'); ?>
                </div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('ftp-accounts'); ?></div>
                <div class="list-group-item"><span class="badge">21</span><?php echo $lang->I18N('free-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('sub-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('add-on-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('parked-domains'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('mysql-databases'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('disk-quota'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('monthly-bandwidth'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('daily-hits'); ?></div>
                <div class="list-group-item"><span class="badge"><?php echo $lang->I18N('unlimited'); ?></span><?php echo $lang->I18N('host-inodes'); ?></div>
                <div class="list-group-item">Latest cPanel with Softaculous</div>
                <div class="list-group-item">Latest PHP and mySQL</div>
                <div class="list-group-item">SiteBuilder</div>
                <div class="list-group-item">1 Click Script Installer</div>
                <div class="list-group-item">Node.JS</div>
                <div class="list-group-item">Postgres</div>
                <div class="list-group-item">Free SSL Certificate</div>
                <div class="list-group-item">Custom CRON Jobs</div>
                <div class="list-group-item text-center"><a class="btn btn-primary" href="register.php" role="button"><?php echo $lang->I18N('register'); ?></a></div>
            </div>
        </div>
    </div>
</div>