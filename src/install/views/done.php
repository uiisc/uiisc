<?php

if (!defined('IN_CRONLITE')) {
    exit();
}

require __DIR__ . '/header.php';

?>

<div class="container-fluid" id="login">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="card mx-30" style="opacity: 80%">
                <div class="text-center">
                    <i class="fa fa-info-circle fa-5x icon-text"></i>
                    <h3 class="my-10">Congratulations</h3>
                    <p class="my-5">You have successfully installed UIISC.</p>
                    <p class="my-5">Please click on the button bellow to log into your admin panel. <i class="fa fa-smile"></i></p>
                    <p class="my-5">Don't forget to rename or delete the install folder.
                    <p class="mb-5"><a href="../admin/" class="btn btn-primary">Login Now!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require __DIR__ . '/footer.php';

?>
