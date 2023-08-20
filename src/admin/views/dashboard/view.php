<?php
if (!defined('IN_CRONLITE')) {
    exit;
}

require ROOT_ADMIN . '/views/header.php';
require ROOT_ADMIN . '/views/navbar.php';
require ROOT_ADMIN . '/views/sidebar.php';

?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <span id="count_client"></span>/<span class="count-all" id="count_clients"></span>
                            </div>
                            <div>客户数量</div>
                        </div>
                    </div>
                </div>
                <a href="clients.php">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $lang->I18N('View details'); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-server fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <span id="count_account"></span>/<span class="count-all" id="count_accounts"></span>
                            </div>
                            <div>账户数量</div>
                        </div>
                    </div>
                </div>
                <a href="accounts.php">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $lang->I18N('View details'); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-ticket-alt fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <span id="count_ticket"></span>/<span class="count-all" id="count_tickets"></span>
                            </div>
                            <div>工单数量</div>
                        </div>
                    </div>
                </div>
                <a href="tickets.php">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $lang->I18N('View details'); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shield-alt fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <span id="count_ssl"></span>/<span class="count-all" id="count_ssls"></span>
                            </div>
                            <div>证书数量</div>
                        </div>
                    </div>
                </div>
                <a href="ssl.php">
                    <div class="panel-footer">
                        <span class="pull-left"><?php echo $lang->I18N('View details'); ?></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="panel panel-danger">
        <div class="list-group">
            <div class="list-group-item">
                <span class="fa fa-paper-plane fa-fw"></span> <b><?php echo $lang->I18N('Shortcuts'); ?></b>&nbsp;
                <a href="settings.php" class="btn btn-info btn-xs">Settings</a>&nbsp;&nbsp;
                <a href="<?php echo $site_url; ?>" class="btn btn-xs btn-info" target="_blank"><?php echo $lang->I18N('home'); ?></a>&nbsp;&nbsp;
                <a href="<?php echo setURL('contact'); ?>" class="btn btn-xs btn-info" target="_blank"><?php echo $lang->I18N('contact'); ?></a>&nbsp;&nbsp;
                <a href="<?php echo setURL('news'); ?>" class="btn btn-xs btn-info" target="_blank"><?php echo $lang->I18N('News'); ?></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">服务器信息</h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><b>服务器时间：</b><?php echo $date; ?></li>
                    <li class="list-group-item"><b>PHP 版本：</b><?php echo PHP_VERSION; ?>-<?php echo ini_get('safe_mode') ? '线程安全' : '非线程安全'; ?></li>
                    <li class="list-group-item"><b>MySQL 版本：</b><?php echo $mysqlversion ?></li>
                    <li class="list-group-item"><b>WEB软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?></li>
                    <li class="list-group-item"><b>操作系统：</b><?php echo php_uname(); ?></li>
                    <li class="list-group-item"><b>POST许可：</b><?php echo ini_get('post_max_size'); ?></li>
                    <li class="list-group-item"><b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">应用信息</h3>
                </div>
                <ul class="list-group text-dark">
                    <li class="list-group-item">当前版本：V<?php echo APP_VERSION; ?> (Build <?php echo APP_BUILD; ?>, DB <?php echo DB_VERSION; ?>）</li>
                    <li class="list-group-item"><?php echo $lang->I18N('App Status'); ?>&nbsp;:&nbsp;<?php if ($SiteConfig['site_status'] == 1) {echo '<span class="label label-success">Live</span>';} elseif ($SiteConfig['site_status'] == 0) {echo '<span class="label label-danger">Maintaince</span>';}?></li>
                    <li class="list-group-item"><?php echo $lang->I18N('App URL'); ?>&nbsp;:&nbsp;<?php echo $site_url; ?></li>
                    <li class="list-group-item">官网网站：<a href="https://uiisc.org/" target="_blank">https://uiisc.org</a></li>
                    <li class="list-group-item">Github：<a href="https://github.com/uiisc/uiisc/" target="_blank">https://github.com/uiisc/uiisc</a></li>
                    <li class="list-group-item">&copy; 2013-<?php echo date("Y") ?> <a href="https://uiisc.org/" target="_blank">UIISC</a>, Powered by <a href="https://crogram.org/" target="_blank">CROGRAM</a></li>
                </ul>
                <ul class="list-group text-dark" id="checkupdate"></ul>
            </div>
        </div>
    </div>
</div>

<?php
require ROOT_ADMIN . '/views/footer.php';
?>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "api/dashboard.php?act=stat",
            dataType: 'json',
            async: true,
            success: function(res) {
                var data = res.data;
                $('#count_client').html(data.count_client);
                $('#count_clients').html(data.count_clients);
                $('#count_account').html(data.count_account);
                $('#count_accounts').html(data.count_accounts);
                $('#count_ssl').html(data.count_ssl);
                $('#count_ssls').html(data.count_ssls);
                $('#count_ticket').html(data.count_ticket);
                $('#count_tickets').html(data.count_tickets);
            }
        });
        // check update
        // $.ajax({
        //     url: '<?php // echo $checkupdate ?>',
        //     type: 'get',
        //     dataType: 'jsonp',
        //     jsonpCallback: 'callback'
        // }).done(function(data){
        //     $("#checkupdate").html(data.msg);
        // });
    });
</script>

</body>
</html>
