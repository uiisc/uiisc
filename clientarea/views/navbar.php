<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo setRouter('index');?>"><?php echo $brandName; ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo setRouter('clientarea'); ?>"><?php echo $lang->I18N('home'); ?></a>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Service&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">My Services</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Order New Services</a></li>
                            <li><a href="#">View Available Addons</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Billing&nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">My Invoices</a></li>
                            <li><a href="#">Add Funds</a></li>
                            <li><a href="#">Mass Payment</a></li>
                            <li><a href="#">Refunds</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Support&nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo setRouter('clientarea', 'tickets'); ?>"><?php echo $lang->I18N('tickets'); ?></a></li>
                            <li><a href="#">Knowledgebase</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?php if (isUserLoggedIn()) { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello,&nbsp;<?php echo ($user->name); ?>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo setRouter('clientarea', 'details'); ?>">Account Details</a></li>
                                <li><a href="<?php echo setRouter('clientarea', 'edit_details'); ?>">Edit Account Details</a></li>
                                <li><a href="<?php echo setRouter('clientarea', 'emails'); ?>">Email History</a></li>
                                <li><a href="<?php echo setRouter('clientarea', 'change_password'); ?>">Change password</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo setRouter('clientarea', 'logout'); ?>"><?php echo $lang->I18N('logout'); ?></a></li>
                            </ul>
                        <?php } else { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $lang->I18N('clientarea'); ?>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo setRouter('clientarea', 'login'); ?>"><?php echo $lang->I18N('login'); ?></a></li>
                                <li><a href="<?php echo setRouter('clientarea', 'register'); ?>"><?php echo $lang->I18N('register'); ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo setRouter('clientarea', 'forget_password'); ?>"><?php echo $lang->I18N('password_lost'); ?></a></li>
                            </ul>
                        <?php } ?>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>