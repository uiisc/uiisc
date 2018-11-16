<?php
  define('IN_SYS', true);
  require_once ("core.php");
  // $html = file_get_contents('https://ifastnet.com/privacy.php');
  // preg_match('/<footer[^>]*id="footer"[^>]*>(.*?) <//footer>/si', $html, $match);
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="utf-8">
    <title><?=$title?> - <?php echo $LANG['privacy_policy']; ?></title>
    <?php include ("headmate.php"); ?>
</head>
<body>
<?php include ("nav.php"); ?>

<!-- <div class="bs-docs-header">
    <div class="container">
    <h1><?php echo $LANG['privacy_policy']; ?></h1>
    <p>Privacy policy information</p>
    </div>
</div> -->

<div class="container">
    <div class="row">
        <section class="section-wrap title">
            <div class="container">
                <h2 class="text-center"><?php echo $LANG['privacy_policy']; ?></h2>
                <p class="text-center">Privacy policy information</p>
            </div>
        </section>
        <section class="section-wrap privacyInfo">
            <div class="container">
                <div class="row">
                    <div class="hidden-xs col-sm-12 col-md-12 termsHead"><h1>Privacy Policy</h1></div>
                    <div class="col-sm-12 col-md-12">
                        <h2>IFastNet LTD Privacy Policy</h2>

                        <p>In an effort to protect our clients' and site visitors privacy and rights, IFastNet LTD has
                            established a Privacy Policy which explains what information we gather on visitors and what we
                            do with information that we gather.</p>

                        <p>This Privacy Policy governs the manner in which IFastNet LTD collects, uses, maintains and
                            discloses information collected from users of this Web site (each, a "User").</p>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <h2>Privacy</h2>

                        <p>Users' privacy is very important to IFastNet LTD. We are committed to safeguarding the
                            information Users entrust to IFastNet LTD.</p>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <h2>The information we collect</h2>

                        <p>IFastNet LTD collects personally identifiable information from Users through online forms for
                            ordering products and services. We may also collect information about how Users use our Web
                            site, for example, by tracking the number of unique views received by the pages of the Web site
                            or the domains from which Users originate. We use "cookies" to track how Users use our Web
                            site.</p>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <h2>How we use information</h2>

                        <p>IFastNet LTD may use personally identifiable information collected through our Web site to
                            contact Users regarding products and services offered by IFastNet LTD and its trusted
                            affiliates, independent contractors and business partners, and otherwise to enhance Users'
                            experience with IFastNet LTD and such affiliates, independent contractors and business partners.
                        </p>

                        <p>At no time will IFastNet LTD's database of users ever be sold to any entity for the purpose of
                            marketing or mailing lists. Personal information will not be sold or otherwise transferred to
                            our business partners without your prior consent, except that we will disclose the information
                            we collect to third parties when, in our good faith judgment, we are obligated to do so under
                            applicable laws.</p>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <h2>Cookies</h2>

                        <p>Cookies are small digital signature files that are stored by your web browser that allow your
                            preferences to be recorded when visiting the website. Also they may be used to track your return
                            visits to the website.</p>

                        <p>3rd party advertising companies may also use cookies for tracking purposes.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 terms_policies_menu">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> Other legal information
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li><a href="./legal_terms.php"><?php echo $LANG['tos']; ?></a></li>
                                    <li><a href="./legal_cancellation-refund.php"><?php echo $LANG['cancellation_refund']; ?></a></li>
                                    <li class="active"><?php echo $LANG['privacy_policy']; ?></li>
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