
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">Knowledgebase</h5>
            <a href="knowledgebase.php?action=add" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="75%">Subject</th>
                    <th width="10%">Date</th>
                    <th width="10%">Action</th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td>#<?php echo $value['knowledgebase_id']; ?></td>
                        <td><?php echo $value['knowledgebase_subject']; ?></td>
                        <td><?php echo $value['knowledgebase_date']; ?></td>
                        <td>
                            <a href="knowledgebase.php?action=edit&id=<?php echo $value['knowledgebase_id']; ?>" class="btn btn-sm btn-secondary mx-5 btn-rounded"><i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?></a>
                            <a href="knowledgebase.php?action=view&id=<?php echo $value['knowledgebase_id']; ?>" class="btn btn-sm btn-secondary mx-5 btn-rounded"><i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?></a>
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