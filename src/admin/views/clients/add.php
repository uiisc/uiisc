
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="clients.php"><?php echo $lang->I18N('Client List'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('add'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="<?php echo setURL('admin/clients', '', array('action' => 'list')); ?>" class="btn btn-info btn-xs">
                    <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
        </div>
        <div class="panel-body">
            <form id="form-client-add" class="row" onsubmit="return saveSubmit();" method="post">
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('Status'); ?></label>
                    <select class="form-control" name="client_status">
                        <option value="0"><?php echo $lang->I18N('Inactive'); ?></option>
                        <option value="1"><?php echo $lang->I18N('Active'); ?></option>
                        <option value="2"><?php echo $lang->I18N('Suspended'); ?></option>
                    </select>
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('Password'); ?></label>
                    <input type="text" name="client_password" value="123456" class="form-control" placeholder="默认密码 123456">
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label required"><?php echo $lang->I18N('First Name'); ?></label>
                    <input type="text" name="client_fname" value="" class="form-control" required>
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label required"><?php echo $lang->I18N('Last Name'); ?></label>
                    <input type="text" name="client_lname" value="" class="form-control" required>
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label required"><?php echo $lang->I18N('Email Address'); ?></label>
                    <input type="text" name="client_email" value="" class="form-control" required>
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label required"><?php echo $lang->I18N('Phone Number'); ?></label>
                    <input type="text" name="client_phone" value="" class="form-control" required>
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('Billing Address'); ?></label>
                    <input type="text" name="client_address" value="" class="form-control">
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('Company'); ?></label>
                    <input type="text" name="client_company" value="" class="form-control">
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('Country'); ?></label>
                    <input type="text" name="client_country" value="" class="form-control">
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('State'); ?></label>
                    <input type="text" name="client_state" value="" class="form-control">
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('City'); ?></label>
                    <input type="text" name="client_city" value="" class="form-control">
                </div>
                <div class="col-md-6 mb-10">
                    <label class="form-label"><?php echo $lang->I18N('Postal Code'); ?></label>
                    <input type="text" name="client_pcode" value="" class="form-control">
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary btn-sm" onclick="saveSubmit();"><?php echo $lang->I18N('Save') ?></button>
        </div>
    </div>
</div>

<script>
    function saveSubmit() {
        var ii = layer.load(2);
        $.ajax({
            type: 'POST',
            url: 'api/clients.php?act=add',
            data: $("#form-client-add").serialize(),
            dataType: 'json',
            success: function(res) {
                layer.close(ii);
                if (res.code == 200) {
                    layer.alert(res.msg, {
                        icon: 1,
                        closeBtn: false
                    }, function() {
                        if (res.data.client_id) {
                            window.location.href = 'clients.php?action=details&id=' + res.data.client_id;
                        } else {
                            window.location.href = 'clients.php';
                        }
                    });
                } else {
                    layer.alert(res.msg, {
                        icon: 2
                    });
                }
            },
            error: function(res) {
                layer.close(ii);
                layer.msg('服务器错误');
            }
        });
        return false;
    }
</script>
