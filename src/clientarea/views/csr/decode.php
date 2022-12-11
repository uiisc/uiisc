
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 mx-5">
            <h5 class="m-0">Decode CSR</h5>
            <a href="tools.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <div class="row pb-20">
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Your Name</label>
                    <input type="text" name="name" value="<?php echo $ClientInfo['hosting_client_fname'] . ' ' . $ClientInfo['hosting_client_lname']; ?>" class="form-control disabled" required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Email Address</label>
                    <input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email']; ?>" class="form-control disabled" required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Company Name</label>
                    <input type="text" name="company" value="<?php echo $ClientInfo['hosting_client_company']; ?>" class="form-control disabled"  required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Billing Address</label>
                    <input type="text" name="address" value="<?php echo $ClientInfo['hosting_client_address']; ?>" class="form-control disabled"  required readonly>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-10 px-10">
                    <label class="form-label required">CSR Code</label>
                    <textarea name="csr" style="height: 250px" placeholder="Enter CSR Code..." class="form-control" id="csr_code" required></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-5 px-10">
                    <button name="submit" id="decode" onclick="check_decode()" class="btn btn-sm btn-primary">Decode CSR</button>
                </div>
            </div>
            <div class="col-md-12 mb-10" id="result"></div>
        </div>
    </div>
</div>

<script>
    function check_decode() {
        var csr_code = $("#csr_code").val();
        $.post('controllers/csr/decode.php', { csr: csr_code, submit: ''}, function(data){
            $('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>Results fetched <b>successfully!</b></div>');
            $("#result").html(data);
        });
    };
</script>
