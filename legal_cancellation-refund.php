<?php
  define('IN_SYS', true);
  require_once ("core.php");
  // $html = file_get_contents('https://ifastnet.com/portal/cancellation-refund.php');
  // preg_match('/<footer[^>]*id="footer"[^>]*>(.*?) <//footer>/si', $html, $match);
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - Cancellation & Refund</title>
    <?php include ("headmate.php"); ?>
</head>
<body>
<?php include ("nav.php"); ?>

<div class="bs-docs-header">
    <div class="container">
        <h1>Cancelation policy &amp; Refund policy</h1>
        <p>Cancelation &amp; refund information</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- <section class="section-wrap title">
            <div class="container">
                <h2 class="text-center">Cancelation policy &amp; Refund policy</h2>
                <p class="text-center">Cancelation &amp; refund information</p>
            </div>
        </section> -->
        <section class="section-wrap cancelationInfo">
            <div class="container">
                <div class="row">
                    <div class="hidden-xs col-sm-12 col-md-12 termsHead"><h1>Cancellation Policy</h1></div>
                    <div class="col-sm-12 col-md-12">
                        <p>IFastNet.com (IFastNet LTD) believes in helping its customers as far as possible, and has
                            therefore a liberal cancellation policy. Under this policy:</p>
                        <ul type="d">
                            <li>Cancellations will be considered only if the request is made within 7 days of placing an
                                order. However, the cancellation request will not be entertained if the orders have been
                                communicated to the vendors/merchants and they have initiated the process of provisioning
                                services.
                            </li>
                            <li>Cancelations must be communicated to Ifastnet.com a minimum of 14 days before the service is
                                due. Failure to cancel before this period is acceptance of renewal of the service.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-wrap refundInfo">
            <div class="container">
                <div class="row">
                    <div class="hidden-xs col-sm-12 col-md-12 termsHead"><h1>Refund Policy</h1></div>
                    <div class="col-sm-12 col-md-12">
                        <p>When you buy our products/services, your purchase is covered by our 7-day money-back guarantee.
                            If you are, for any reason, not entirely happy with your purchase, we will cheerfully issue a
                            full refund. We develop and sell software that we use ourselves every day and have thousands of
                            satisfied customers worldwide, and our support is second to none. That is why we can afford to
                            back our products with this special guarantee.</p>

                        <p>To request a refund, simply contact us with your
                            purchase details within seven (7) days of your purchase. Please include your order number (sent
                            to you via email after ordering) and optionally tell us why you’re requesting a refund – we take
                            customer feedback very seriously and use it to constantly improve our products and quality of
                            service. Refunds are not being provided for services delivered in full such as installation
                            service and provided knowledge base hosting service. Refunds are being processed within a 7 day
                            period.</p>

                        <p>If a service is canceled and a refund requested, the cost incurred of renewing or providing a
                            free domain name (if included with the service being canceled ) will be minused from the refund
                            amount (this could sometimes lead to a negative value).</p>

                        <p class="alert alert-warning"><i class="glyphicon glyphicon-info-sign"></i> Domain name renewal / registration fees and costs are non-refundable.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 terms_policies_menu">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> Other legal information</div>
                            <div class="panel-body">
                                <ul>
                                  <li><a href="./legal_terms.php"><?php echo $LANG['tos']; ?></a></li>
                                  <li class="active"><?php echo $LANG['cancellation_refund']; ?></li>
                                  <li><a href="./legal_privacy.php"><?php echo $LANG['privacy_policy']; ?></a></li>
                                  <li><a href="./legal_payment-methods.php"><?php echo $LANG['payment_methods']; ?></a></li>
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