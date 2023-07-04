<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
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
                <li class="<?php echo checkIfActive('ssl') ?>">
                    <a href="ssl.php"><i class="fa fa-shield-alt" aria-hidden="true"></i> <?php echo $lang->I18N('SSL Certificates'); ?></a>
                </li>
                <li class="<?php echo checkIfActive('settings'); ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog fa-fw"></i> <?php echo $lang->I18N('Settings'); ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="knowledgebase.php"><i class="fa fa-book fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Knowledgebase'); ?></a></li>
                        <li><a href="news.php"><i class="fa fa-newspaper fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('News List'); ?></a></li>
                        <li><a href="hosting-provider.php"><i class="fa fa-server fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Hosting Provider'); ?></a></li>
                        <li><a href="ssl-provider.php"><i class="fa fa-server fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('SSL Provider'); ?></a></li>
                        <li><a href="domain.php"><i class="fa fa-globe fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('Domain Provider'); ?></a></li>
                        <li><a href="settings.php"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <?php echo $lang->I18N('System Settings'); ?></a></li>
                    </ul>
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
                    <script type="text/javascript">
                        var sel = document.getElementById('theme-selector');
                        sel.className = getThemeClasses(getTheme());
                        sel.onclick = themeSelectorClicked;
                    </script>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    function logout() {
        layer.confirm('确定退出登录 ？', {
            icon: 3,
            btn: ['确定', '取消']
        }, function() {
            var ii = layer.load(2);
            $.ajax({
                type: 'POST',
                url: 'api/logout.php',
                dataType: 'json',
                success: function(data) {
                    layer.close(ii);
                    if (data.code == 0) {
                        layer.msg('退出登录成功');
                        setTimeout(function() {
                            window.location.href = 'login.php';
                        }, 2000);
                    } else {
                        layer.alert(data.msg, {
                            icon: 2
                        });
                    }
                },
                error: function(data) {
                    layer.close(ii);
                    layer.msg('服务器错误');
                }
            });
        });
    }
</script>
