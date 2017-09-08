<?php
  if(!defined('IN_SYS')) { 
    // exit('禁止访问');
    header("Location:"."index.php");
    exit;
  }
?>
<footer class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div class="navbar-inner navbar-content-center" style="padding-top:15px;">
            <ul class="navbar-left list-inline text-center text-muted credit">
              <li>&copy; 2017 <a href="./index.php"><?=$title_s?></a> &nbsp;&nbsp;&nbsp; Powered By <a href="https://crogram.com" target="blank">Crogram</a> & <a href="https://ifastnet.com" target="blank">iFastNet</a></li>
            </ul>
            <ul class="legal navbar-right list-inline text-center">
                <li class="dropup">
                    <div class="dropdown-toggle" id="changelanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <a href="#"><?php echo $languages[$current_language]; ?></a>
                      <span class="caret"></span>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="changelanguage">
                      <?php foreach($languages as $key=>$value) {
                        echo '<li><a href="javascript://" onclick="change_language(\'',$key,'\')">',$languages[$key],'</a></li>';}
                      ?>
                    </ul>
                </li>
                <li><a href="./contact.php"><?php echo $LANG['contact_us']; ?></a></li>
                <li><a href="//help.<?=$domain?>"><?php echo $LANG['help']; ?></a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/bootstrap/3.3.7/bootstrap.min.js"></script>
<!--<script src="//cdn.bootcss.com/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>-->
<script src="./js/ie10-viewport-bug-workaround.js"></script>
<script src="./js/common.js?_=<?=$static_release?>"></script>
<script type="text/javascript">
  var domain = "<?php echo $lang->getDomain();?>";
  var cur_language = "<?php echo $current_language;?>";
  function change_language(lan) {
    setCookie('lang', lan, 1, '/', domain, false);
    if (cur_language == lan) {
      return;
    }
    <?php if(!$_POST) { ?>
    document.location.reload();
    <?php } ?>
  }
</script>