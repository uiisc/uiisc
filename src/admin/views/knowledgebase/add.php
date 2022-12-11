<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">New Knowledgebase</h5>
            <a href="knowledgebase.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <form action="controllers/knowledgebase/add.php" method="post">
            <div class="row pb-20">
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required" for="input_subject">Subject</label>
                        <input type="text" name="subject" id="input_subject" placeholder="knowledgebase subject..." class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Content</label>
                        <textarea name="editor" id="content" placeholder="Enter ticket content..." class="form-control" style="height: 200px;"></textarea> 
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <button name="submit" class="btn btn-sm btn-primary">Create Knowledgebase</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>