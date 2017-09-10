<?php
  if(!defined('IN_SYS')) { 
    // exit('禁止访问');
    header("Location:"."index.php");
    exit;
  }
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><?=$title_s?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php"><?php echo $LANG['home']; ?></a></li>
          <li><a href="solution.php"><?php echo $LANG['solution']; ?></a></li>
          <li><a href="contact.php"><?php echo $LANG['contact']; ?></a></li>
          <li><a href="//help.<?=$domain?>"><?php echo $LANG['help']; ?></a></li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Others <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0)"><?php echo $LANG['home']; ?></a></li>
              <li><a href="javascript:void(0)"><?php echo $LANG['tos']; ?></a></li>
              <li class="divider"></li>
              <li class="dropdown-header"><?php echo $LANG['legal_information']; ?></li>
              <li><a href="./legal_terms.php"><?php echo $LANG['tos']; ?></a></li>
              <li><a href="./legal_cancellation-refund.php"><?php echo $LANG['cancellation_refund']; ?></a></li>
              <li><a href="./legal_privacy.php"><?php echo $LANG['privacy_policy']; ?></a></li>
              <li><a href="./legal_payment-methods.php"><?php echo $LANG['payment_methods']; ?></a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./index.php"><?php echo $LANG['home']; ?></a></li>
          <li><a href="./login.php"><?php echo $LANG['login']; ?></a></li>
          <li><a href="./signup.php"><?php echo $LANG['signup']; ?></a></li>
        </ul>
    </div>
  </div>
</nav>
