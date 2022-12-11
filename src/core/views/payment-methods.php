<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
// $html = file_get_contents('https://ifastnet.com/payment-methods.php');
// preg_match('/<footer[^>]*id="footer"[^>]*>(.*?) <//footer>/si', $html, $match);
?>

<div class="container">
    <div class="page-header">
        <h1 class="text-center"><?php echo $lang->I18N('payment_methods'); ?></a></h1>
        <p class="text-center">Payment methods information</p>
    </div>
</div>
<section class="section-wrap paymentsInfo">
    <div class="container">
        <div class="row">
            <div class="hidden-xs col-sm-12 col-md-12">
                <h2><?php echo $lang->I18N('payment_methods'); ?></h2>
            </div>
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
                    <img src="assets/images/payment/paypal.jpg" border="0" alt="Paypal payments">
                    <img src="assets/images/payment/poweredByWorldPay.gif" border="0" alt="Worldpay payments">
                    <img src="assets/images/payment/2co11.jpg" border="0" alt="2CheckOut payments">
                </div>
                <div class="col-sm-12 col-md-12">
                    <img src="assets/images/payment/visa_debit.gif" border="0" alt="Visa Debit payments supported by WorldPay">
                    <img src="assets/images/payment/visa_electron.gif" border="0" alt="Visa Electron payments supported by WorldPay">
                    <img src="assets/images/payment/mastercard.gif" border="0" alt="Mastercard payments supported by WorldPay">
                    <img src="assets/images/payment/maestro.gif" border="0" alt="Maestro payments supported by WorldPay">
                    <img src="assets/images/payment/AMEX.gif" border="0" alt="American Express payments supported by WorldPay">
                    <img src="assets/images/payment/diners.gif" border="0" alt="Diners payments supported by WorldPay">
                    <img src="assets/images/payment/JCB.gif" border="0" alt="JCB payments supported by WorldPay">
                    <img src="assets/images/payment/laser.gif" border="0" alt="Laser payments supported by WorldPay">
                    <img src="assets/images/payment/ELV.gif" border="0" alt="ELV payments supported by WorldPay">
                </div>
            </div>
        </div>
    </div>
</section>