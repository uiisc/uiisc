<div class="content-wrapper">
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">Hosting Provider</h5>
            <a href="hosting.php?action=add" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th>Key</th>
                    <th>Type</th>
                    <th>Panel URL</th>
                    <th>Package</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td><?php echo $value['api_key']; ?></td>
                        <td><?php echo $value['api_type']; ?></td>
                        <td><?php echo $value['api_cpanel_url']; ?></td>
                        <td><?php echo $value['api_package']; ?></td>
                        <td>
                            <a href="hosting.php?action=edit&id=<?php echo $value['api_id']; ?>" class="btn btn-sm btn-secondary mx-5 btn-rounded"><i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?></a>
                            <a href="hosting.php?action=view&id=<?php echo $value['api_id']; ?>" class="btn btn-sm btn-secondary mx-5 btn-rounded"><i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nothing found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <p class="pb-10"><?php echo $count; ?> Records Found</p>
    </div>
</div>
</div>