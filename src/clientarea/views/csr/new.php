
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 px-5">
            <h5 class="m-0">New CSR</h5>
            <a href="tools.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <div class="row pb-20">
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Your Name</label>
                    <input type="text" id="name" value="<?php echo $ClientInfo['hosting_client_fname'] . ' ' . $ClientInfo['hosting_client_lname']; ?>" class="form-control disabled" required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Email Address</label>
                    <input type="text" id="email" value="<?php echo $ClientInfo['hosting_client_email']; ?>" class="form-control disabled" required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Country Name</label>
                    <input type="text" id="country" value="<?php
if ($ClientInfo['hosting_client_country'] != 'NULL') {
echo $ClientInfo['hosting_client_country'];
} else {
echo 'NULL';
}
?>" class="form-control disabled" required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">State Name</label>
                    <input type="text" id="state" class="form-control disabled" value="<?php echo $ClientInfo['hosting_client_state']; ?>" required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">City Name</label>
                    <input type="text" id="city" value="<?php echo $ClientInfo['hosting_client_city']; ?>" class="form-control disabled"  required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Company Name</label>
                    <input type="text" id="company" value="<?php echo $ClientInfo['hosting_client_company']; ?>" class="form-control disabled"  required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Department</label>
                    <input type="text" id="department" value="IT" class="form-control disabled"  required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Domain Name</label>
                    <input type="text" id="domain" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-5 px-10">
                    <button name="submit" class="btn btn-sm btn-primary" onclick="check_new()">Request CSR</button>
                </div>
            </div>
            <div id="result" class="col-12 mb-10 px-10"></div>
        </div>
    </div>
</div>

<script>
function check_new() {
    var email = $("#email").val();
    var country = $("#country").val();
    var company = $("#company").val();
    var state = $("#state").val();
    var city = $("#city").val();
    var department = $("#department").val();
    var domain = $("#domain").val();
    $.post("controllers/csr/new.php", {domain: domain,email: email,company: company, country: country,state: state,city: city,department: department,submit: ""}, function(data){
        $('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>Results fetched <b>successfully!</b></div>');
        $("#result").html(data);
    });
};
</script>
