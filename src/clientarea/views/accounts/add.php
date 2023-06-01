<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 px-5">
            <h5 class="m-0">New Account</h5>
            <a href="accounts.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="row mb-10">
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Your Name</label>
                    <input type="text" name="name" value="<?php echo $ClientInfo['client_fname'] . ' ' . $ClientInfo['client_lname']; ?>" class="form-control disabled" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Your Email</label>
                    <input type="text" name="email" value="<?php echo $ClientInfo['client_email']; ?>" class="form-control disabled" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required"><?php echo $lang->I18N('Phone Number'); ?></label>
                    <input type="text" name="email" value="<?php echo $ClientInfo['client_phone']; ?>" class="form-control disabled" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-10 px-10">
                    <label class="form-label required">Billing Address</label>
                    <input type="text" name="email" value="<?php echo $ClientInfo['client_address']; ?>" class="form-control disabled" readonly>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12 mb-10">
            <div class="mb-10 px-10">
                <div class="tabs">
                    <button class="tab-item btn" data-tab="tab_sub_domain" id="DefaultClicked">Subdomain</button>
                    <button class="tab-item btn" data-tab="tab_custom_domain">Custom Domain</button>
                </div>
                <div id="tab_custom_domain" class="tab-content">
                    <div class="alert alert-secondary my-5">
                        <p>You need to set these nameservers in order to host your domain with us</p>
                        <ul class="mb-0">
                            <li class="mb-0"><?php echo $AccountApi['api_ns_1'] ?></li>
                            <li class="mb-0"><?php echo $AccountApi['api_ns_2'] ?></li>
                        </ul>
                    </div>
                    <label class="form-label required">Custom Domain Name</label>
                    <div class="input-group">
                        <input type="text" id="customdomain" class="form-control" placeholder="Search domain name here...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="check_custom_domain()">Validate</button>
                        </div>
                    </div>
                </div>
                <div id="tab_sub_domain" class="tab-content">
                    <label class="form-label required">Subdomain Name</label>
                    <div class="input-group">
                        <input type="text" id="sudomain" class="form-control" placeholder="Search domain name here...">
                        <div class="input-group-append">
                            <select class="form-control" style="border-radius: 0" id="extension" name="extension">
                            <?php foreach ($ExtensionInfo as $value): ?>
                                <option><?php echo $value['extension_value']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="check_sub_domain()">Validate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12 mb-15">
            <!-- <form action="controllers/accounts/add.php" method="post"> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Hosting Package</label>
                        <input type="text" name="package" value="<?php echo $AccountApi['api_package']; ?>" class="form-control disabled" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Domain Name</label>
                        <input type="text" name="domain" id="validomain" placeholder="Domain will show here..." class="form-control disabled" readonly required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Username</label>
                        <input type="text" name="username" placeholder="(generated automatically)" class="form-control disabled" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" placeholder="Something unique, leave empty to generate random" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <button class="btn btn-primary" onclick="create_account()">Request Account</button>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
    var tabs = document.getElementsByClassName('tab-item')
    var i, tablinks, tabcontent
    for (i = 0; i < tabs.length; i++) {
        tabs[i].onclick = function () {
            var tabu = this.getAttribute('data-tab')
            var tabr = document.getElementById(tabu)
            tabcontent = document.getElementsByClassName('tab-content')
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = 'none'
            }
            tablinks = document.getElementsByClassName('tab-item')
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(' active', '')
            }
            tabr.style.display = 'block'
            this.classList.add('active')
        }
    }
    window.onload = function () {
        document.getElementById('DefaultClicked').click()
    }

    function check_sub_domain() {
        $('#hidden-area').html('');
        var domain = $('#sudomain').val();
        var extensions = $('#extension').val();
        var validomain = domain + extensions;
        $.post('controllers/accounts/validate_domain.php', {domain : validomain, submit: ""}, function(data){
            if (validomain != data) {
                $('#hidden-area').html('<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data+'</div>');
            } else {
                $('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>Domain is available and selected  <b>successfully!</b></div>');
                $('#validomain').val(data);
            }
        });
    };
    function check_custom_domain() {
        $('#hidden-area').html('');
        var domain = $('#customdomain').val();
        $.post('controllers/accounts/validate_domain.php', {domain : domain, submit: ""}, function(data){
            if (domain != data) {
                $('#hidden-area').html('<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data+'</div>');
            } else {
                $('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>Domain is available and selected  <b>successfully!</b></div>');
                $('#validomain').val(data);
            }
        });
    };
    function create_account() {
        $('#hidden-area').html('');
        var domain = $('#sudomain').val();
        var extensions = $('#extension').val();
        var validomain = domain + extensions;
        $.post('controllers/accounts/add.php', {
            domain: validomain,
            api_key: 'ttkl.cf',
            submit: ""
        }, function(data) {
            if (validomain != data) {
                $('#hidden-area').html('<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data+'</div>');
            } else {
                $('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>Domain is available and selected  <b>successfully!</b></div>');
                $('#validomain').val(data);
            }
        });
    };
</script>
