<?php
if (!defined('IN_CRONLITE')) {
    exit;
}

$PageInfo['rel'] = '<link href="' . $site_url . '/assets/css/bootstrap-table.css" rel="stylesheet" />';

require ROOT_ADMIN . '/views/header.php';
require ROOT_ADMIN . '/views/navbar.php';
require ROOT_ADMIN . '/views/sidebar.php';

?>

<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('Emails List'); ?></li>
    </ol>
    <div id="searchToolbar">
        <form onsubmit="return searchSubmit()" method="GET" class="form-inline">
            <input type="hidden" name="did">
            <div class="form-group">
                <label>搜索</label>
                <input type="text" class="form-control" name="email_id" placeholder="邮件ID" style="width: 80px;" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email_client_id" placeholder="客户ID" style="width: 80px;" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email_to" placeholder="接收人" style="width: 120px;" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email_subject" placeholder="主题">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> 搜索</button>&nbsp;
                <a href="javascript:searchClear()" class="btn btn-default" title="刷新记录列表"><i class="fa fa-repeat"></i> 重置</a>&nbsp;
            </div>
        </form>
    </div>
    <table id="listTable"></table>
</div>

<?php
require ROOT_ADMIN . '/views/footer.php';
?>

<script src="<?php echo $site_cdnpublic; ?>bootstrap-table/1.20.2/bootstrap-table.min.js"></script>
<script src="<?php echo $site_cdnpublic; ?>bootstrap-table/1.20.2/extensions/page-jump-to/bootstrap-table-page-jump-to.min.js"></script>
<script src="<?php echo $site_url; ?>/assets/js/custom.js"></script>
<script>
    $(document).ready(function() {
        updateToolbar();
        const defaultPageSize = 15;
        const pageNumber = typeof window.$_GET['pageNumber'] != 'undefined' ? parseInt(window.$_GET['pageNumber']) : 1;
        const pageSize = typeof window.$_GET['pageSize'] != 'undefined' ? parseInt(window.$_GET['pageSize']) : defaultPageSize;

        $("#listTable").bootstrapTable({
            url: 'api/emails.php?act=list',
            pageNumber: pageNumber,
            pageSize: pageSize,
            classes: 'table table-striped table-hover table-bordered',
            columns: [{
                    field: 'email_id',
                    title: '<?php echo $lang->I18N('Email ID'); ?>',
                    formatter: function(value, row, index) {
                        return '<a href="emails.php?action=view&id=' + value + '">' + value + '</a>';
                    }
                },
                {
                    field: 'email_client_id',
                    title: '<?php echo $lang->I18N('Clients'); ?>',
                    formatter: function(value, row, index) {
                        if (value > 0) {
                            return '<a href="clients.php?action=details&id=' + value + '">' + value + '</a>';
                        }
                        return '-';
                    }
                },
                {
                    field: 'email_subject',
                    title: '<?php echo $lang->I18N('Title'); ?>'
                },
                {
                    field: 'email_to',
                    title: '接收人',
                    formatter: function(value, row, index) {
                        return value || '-';
                    }
                },
                {
                    field: 'email_date',
                    title: '<?php echo $lang->I18N('Date'); ?>'
                },
                {
                    field: 'email_read',
                    title: '<?php echo $lang->I18N('Status'); ?>',
                    formatter: function(value, row, index) {
                        return value == 0 ? '<span class="label label-success">已查看</span>' : '<span class="label label-default">未查看</span>';
                    }
                },
                {
                    field: '',
                    title: '<?php echo $lang->I18N('Action'); ?>',
                    formatter: function(value, row, index) {
                        return '<a href="emails.php?action=view&id=' + row.email_id + '" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?></a>';
                    }
                }
            ]
        })
    });
</script>

</body>
</html>
