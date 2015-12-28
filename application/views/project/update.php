<div class="row">
    <div class="col-lg-12">
        <?php if(validation_errors()): ?>
        
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php //echo $this->session->flashdata('info'); ?>
                <?php echo validation_errors(); ?>
            </div>

        <?php endif; ?>
        <h1 class="page-header">Project Update</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- Basic Form Elements -->
                <a href="<?php echo site_url('project/search');?>" class="btn btn-primary">Back</a>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_open(); ?>
                            <div class="form-group">
                                <select name="id_customer" class="form-control">
                                    <option value="">...</option>
                                    <?php foreach ($dataCustomer as $v): ?>
                                        <option value="<?php echo $v['id']; ?>" <?php if($editdata->id_customer == $v['id']){ echo "selected";} ?>><?php echo $v['name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" class="form-control" name="project_name" value="<?php echo $editdata->project_name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Start Project</label>
                                <input type="date" class="form-control" name="start_project" value="<?php echo $editdata->start_project; ?>">
                            </div>
                            <div class="form-group">
                                <label>End Project</label>
                                <input type="date" class="form-control" name="end_project" value="<?php echo $editdata->end_project; ?>">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status" value="<?php echo $editdata->status; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>