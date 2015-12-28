<div class="row">
    <div class="col-lg-12">
		<?php if($this->session->flashdata('info')): ?>
	    	<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $this->session->flashdata('info'); ?>
			</div>
		<?php endif; ?>
        <h1 class="page-header">Project</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?php echo site_url('project/create'); ?>" class="btn btn-primary">Add</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="wrapper">
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Customer</th>
                                <th>Project Name</th>
                                <th>Start Project</th>
                                <th>End Project</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php
                                    // echo "<pre>";
                                    // print_r($data);
                                    // exit(); 
                                 ?>
                            <?php foreach ($data as $v): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $v['id_customer']; ?></td>
                                    <td><?php echo $v['project_name']; ?></td>
                                    <td><?php echo $v['start_project']; ?></td>
                                    <td><?php echo $v['end_project']; ?></td>
                                    <td><?php echo $v['status']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('project/update/' . $v['id']); ?>">Edit</a> || 
                                        <a href="<?php echo site_url('project/delete/' . $v['id']); ?>">Delete</a>
                                    </td>
                                </tr>
	                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>