<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../cancellation-refund.php");
    exit;
}
// $html = file_get_contents('https://ifastnet.com/portal/cancellation-refund.php');
// preg_match('/<footer[^>]*id="footer"[^>]*>(.*?) <//footer>/si', $html, $match);
?>

<div class="container">
    <div class="page-header">
        <h1 class="text-center"><?php echo I18N('cancellation_refund'); ?></a></h1>
        <p class="text-center">Cancelation &amp; refund information</p>
    </div>
</div>

<section class="section-wrap cancelationInfo">
    <div class="container">
        <div class="row">
            <div class="hidden-xs col-sm-12 col-md-12">
                <h2>Cancellation Policy</h2>
            </div>
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
            <div class="hidden-xs col-sm-12 col-md-12">
                <h1>Refund Policy</h1>
            </div>
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