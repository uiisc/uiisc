<?php

if (!defined('IN_CRONLITE')) {
    exit();
}

require __DIR__ . '/header.php';

?>

<div class="container-fluid" id="login">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="card mx-30" style="opacity: 80%">
                <h5 class="text-center my-0">Clientarea</h5><hr>
                <form action="function/Step1.php" method="post">
                    <div class="mb-5">
                        <label class="form-label">Site Name</label>
                        <input type="text" name="site_name" class="form-control" placeholder="Enter Site Name here...">
                    </div>
                    <div class="mb-10">
                        <label class="form-label">Clientarea Brand</label>
                        <input type="text" name="site_brand" class="form-control" placeholder="Enter Brand name here...">
                    </div>
                    <div class="mb-10">
                        <label class="form-label">Clientarea Company</label>
                        <input type="text" name="site_company" class="form-control" placeholder="Enter Company name here...">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Clientarea Path</label>
                        <input type="text" name="site_path" class="form-control" placeholder="Enter Clientarea url here...">
                    </div>
                    <div class="mb-10">
                        <label class="form-label">Clientarea Email</label>
                        <input type="text" name="site_email" class="form-control" placeholder="Enter Clientarea email here...">
                    </div>
                    <div class="mb-0">
                        <input type="submit" name="submit" class="btn btn-primary mb-0" value="Next Step">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/footer.php';?>
