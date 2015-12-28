<div class="row">
    <div class="col-lg-12">
        <?php if(validation_errors()): ?>
        
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php //echo $this->session->flashdata('info'); ?>
                <?php echo validation_errors(); ?>
            </div>

        <?php endif; ?>
        <h1 class="page-header">User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- Basic Form Elements -->
                <a href="<?php echo site_url('user/search');?>" class="btn btn-primary">Back</a>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_open(); ?>
                        <form role="form">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <?php echo form_close(); ?>
                        </form>
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