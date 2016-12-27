<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)"><?=$title_s?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php" data-i18n="home">Home</a></li>
                <li><a href="product.php" data-i18n="production">Product</a></li>
                <li><a href="contact.php" data-i18n="contact">Contact</a></li>
                <li><a href="//help.<?=$domain?>" data-i18n="help">Help</a></li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Others <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="javascript:void(0)" data-i18n="home">home</a></li>
                        <li><a href="javascript:void(0)" data-i18n="other">Another action</a></li>
                        <li><a href="javascript:void(0)" data-i18n="home">Something else here</a></li>
                        <li><a href="javascript:void(0)" onclick="turnPage('http://www.baidu.com')" data-i18n="tos">Terms of service</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header" data-i18n="legal_information">Legal Information</li>
                        <li><a href="./legal_terms.php" data-i18n="tos">Terms of Service</a></li>
                        <li><a href="./legal_cancellation-refund.php" data-i18n="cancellation_refund">Cancellation & Refund</a></li>
                        <li><a href="./legal_privacy.php" data-i18n="privacy_policy">Privacy Policy</a></li>
                        <li><a href="./legal_payment-methods.php" data-i18n="payment_methods">Payment Methods & Information</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./index.php" data-i18n="home">Home</a></li>
                <li><a href="./login.php" data-i18n="login">Login</a></li>
                <li><a href="./signup.php" data-i18n="signup">Signup</a></li>
            </ul>
        </div>
    </div>
</nav>
