<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>

<div class="content-wrapper">
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">Add News</h5>
            <a href="news.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
        </div>
        <hr>
        <form action="controllers/news/add.php" method="post">
            <div class="row pb-20">
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required" for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="news subject..." maxlength="255">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required" for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                        <?php foreach ($status_types as $key => $value): ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach;?>
                    </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required" for="content">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="10" maxlength="5000" placeholder="Enter news content..."></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <button name="submit" class="btn btn-sm btn-primary">Create News</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>