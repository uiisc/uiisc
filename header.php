<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)"><?=$title?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index1.php">Home</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">About <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)">home</a></li>
                    <li><a href="javascript:void(0)">Another action</a></li>
                    <li><a href="javascript:void(0)">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="javascript:void(0)">Separated link</a></li>
                    <li><a href="javascript:void(0)">One more separated link</a></li>
                </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./index.php">Home</a></li>
                <li class="active"><a href="https://cpanel.<?=$domain?>">Login</a></li>
                <li><a href="signup1.php" accesskey="A">Signup</a></li>
            </ul>
        </div>
    </div>
</nav>