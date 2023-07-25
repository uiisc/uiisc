
<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <input type="hidden" value="<?php echo $api_id; ?>" name="api_id" />
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="hosting-provider.php"><?php echo $lang->I18N('Hosting Provider'); ?></a></li>
        <li><a href="<?php echo setURL('admin/hosting-provider', '', array('action' => 'details', 'id' => $api_id)); ?>"><?php echo $lang->I18N('details'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Hostname'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a class="btn btn-primary btn-xs" onclick="add_hostname();">
                    <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th>ID</th>
                    <th><?php echo $lang->I18N('Hosting Provider'); ?></th>
                    <th><?php echo $lang->I18N('Hostname'); ?></th>
                    <th><?php echo $lang->I18N('Action'); ?></th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td><?php echo $value['host_id']; ?></td>
                        <td><?php echo $value['api_id']; ?></td>
                        <td><?php echo $value['host_name']; ?></td>
                        <td>
                            <button class="btn btn-danger btn-xs" onclick="delete_hostname('<?php echo $value['host_id']; ?>');"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No Data Found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <div><?php echo $count; ?> Records Found</div>
        </div>
    </div>
</div>

<script>
    function delete_hostname(host_id) {
        layer.confirm('确定删除 ？', {
            icon: 3,
            btn: ['确定', '取消']
        }, function() {
            var ii = layer.load(2);
            $.ajax({
                type: 'POST',
                url: 'api/hosting-hostname.php?act=delete',
                data: {
                    host_id: host_id
                },
                dataType: 'json',
                success: function(data) {
                    layer.close(ii);
                    if (data.code == 0) {
                        layer.msg('删除成功');
                        setTimeout(function() {
                            window.location.href = window.location.href;
                        }, 1000);
                    } else {
                        layer.alert(data.msg, {
                            icon: 2
                        });
                    }
                },
                error: function(data) {
                    layer.close(ii);
                    layer.msg('服务器错误');
                }
            });
        });
    }
    function add_hostname() {
        layer.open({
            type: 1,
            area: ['350px'],
            closeBtn: 2,
            title: '<?php echo $lang->I18N('Add Hostname'); ?>',
            content: '<div style="padding:15px 15px 0 15px"><p>请输入主机名。</p><div class="form-group"><input class="form-control" type="text" name="content" value="" autocomplete="off" placeholder="请输入主机名 eg .example.com"></div></div>',
            btn: ['<?php echo $lang->I18N('Save'); ?>', '<?php echo $lang->I18N('Cancel'); ?>'],
            yes: function() {
                var content = $("input[name='content']").val();
                if (content == '') {
                    $("input[name='content']").focus();
                    return;
                }
                var ii = layer.load(2, {
                    shade: [0.1, '#fff']
                });
                var api_id = $("input[name='api_id']").val();
                $.ajax({
                    type: 'POST',
                    url: 'api/hosting-hostname.php?act=add',
                    data: {
                        api_id: api_id,
                        hostname: content
                    },
                    dataType: 'json',
                    success: function(data) {
                        layer.close(ii);
                        if (data.code == 0) {
                            layer.alert(data.msg, {
                                icon: 1
                            }, function() {
                                layer.closeAll();
                                window.location.href = window.location.href;
                            });
                        } else {
                            layer.alert(data.msg, {
                                icon: 0
                            });
                        }
                    },
                    error: function(data) {
                        layer.close(ii);
                        layer.msg('服务器错误');
                    }
                });
            }
        });
    }
</script>
