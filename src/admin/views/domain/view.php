
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0"><?php echo $PageInfo['title']; ?></h3>
            <a href="index.php" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return');?>
            </a>
        </div>
        <hr />
        <form class="card-body" action="controllers/domain/add.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label required">Add Domain Extension</label>
                    <input type="text" name="domain" id="cudomain" class="form-control" placeholder="eg .example.com">
                </div>
                <div class="col-md-6">
                    <label class="form-label required">Add Domain Extension</label>
                    <button name="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>

        <div class="card-body table-responsive">
            <h4 class="mb-5">Registered Extensions</h4>
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th width="10%">ID</th>
                    <th width="75%">Domain</th>
                    <th width="15%">Action</th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td># <?php echo $value['extension_id']; ?></td>
                        <td><?php echo $value['extension_value']; ?></td>
                        <td>
                            <form action="controllers/domain/delete.php" method="post">
                                <input hidden type="text" name="extension" value="<?php echo $value['extension_value']; ?>" />
                                <button name="submit" class="btn btn-sm btn-secondary btn-rounded"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No domain found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <hr />
        <div class="card-footer"><?php echo $count; ?> Records Founds</div>
    </div>
</div>
</div>
