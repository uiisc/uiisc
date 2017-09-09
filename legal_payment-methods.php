<?php
  define('IN_SYS', true);
  require_once ("core.php");
  // $html = file_get_contents('https://ifastnet.com/payment-methods.php');
  // preg_match('/<footer[^>]*id="footer"[^>]*>(.*?) <//footer>/si', $html, $match);
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - <?php echo $LANG['payment_methods']; ?></title>
    <?php include ("headmate.php"); ?>
</head>
<body>
<?php include ("nav.php"); ?>
<div class="container">
  <div class="row">
    <section class="section-wrap title">
      <div class="container">
        <h2 class="text-center"><?php echo $LANG['payment_methods']; ?></h2>
        <p class="text-center">Payment methods information</p>
      </div>
    </section>
    <section class="section-wrap paymentsInfo">
      <div class="container">
        <div class="row">
          <div class="hidden-xs col-sm-12 col-md-12 termsHead"><h1><?php echo $LANG['payment_methods']; ?></h1></div>
          <div class="col-sm-12 col-md-12">
            <p>We currently accept payments using 3 major payment gateways:</p>
            <ul>
              <li><strong>Paypal</strong> - using credit cards and paypal accounts</li>
              <li><strong>WorldPay</strong> - instant credit cards payments</li>
              <li><strong>2CheckOut</strong> - instant and recurrent credit cards payments as well as paypal payments where countries support it.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="section-wrap sectionPaymentLogos">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12">
              <img src="./images/payment/paypal.jpg" border="0" alt="Paypal payments">
              <img src="./images/payment/poweredByWorldPay.gif" border="0" alt="Worldpay payments">
              <img src="./images/payment/2co11.jpg" border="0" alt="2CheckOut payments">
            </div>
            <div class="col-sm-12 col-md-12">
              <img src="./images/payment/visa_debit.gif" border="0" alt="Visa Debit payments supported by WorldPay">
              <img src="./images/payment/visa_electron.gif" border="0" alt="Visa Electron payments supported by WorldPay">
              <img src="./images/payment/mastercard.gif" border="0" alt="Mastercard payments supported by WorldPay">
              <img src="./images/payment/maestro.gif" border="0" alt="Maestro payments supported by WorldPay">
              <img src="./images/payment/AMEX.gif" border="0" alt="American Express payments supported by WorldPay">
              <img src="./images/payment/diners.gif" border="0" alt="Diners payments supported by WorldPay">
              <img src="./images/payment/JCB.gif" border="0" alt="JCB payments supported by WorldPay">
              <img src="./images/payment/laser.gif" border="0" alt="Laser payments supported by WorldPay">
              <img src="./images/payment/ELV.gif" border="0" alt="ELV payments supported by WorldPay">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-wrap">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 terms_policies_menu">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="glyphicon glyphicon-list-alt"></i> Other legal information
              </div>
              <div class="panel-body">
                <ul>
                  <li><a href="./legal_terms.php"><?php echo $LANG['tos']; ?></a></li>
                  <li><a href="./legal_cancellation-refund.php"><?php echo $LANG['cancellation_refund']; ?></a></li>
                  <li><a href="./legal_privacy.php"><?php echo $LANG['privacy_policy']; ?></a></li>
                  <li class="active"><?php echo $LANG['payment_methods']; ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<?php include ("footer.php"); ?>
</body>
</html>