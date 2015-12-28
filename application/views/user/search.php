<div class="row">
    <div class="col-lg-12">
		<?php if($this->session->flashdata('info')): ?>
    	
	    	<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $this->session->flashdata('info'); ?>
			</div>

		<?php endif; ?>
        <h1 class="page-header">User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?php echo site_url('user/create'); ?>" class="btn btn-primary">Add</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="wrapper">
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $no = 1; ?>
                        	<?php foreach ($data as $v): ?>
	                            <tr class="odd gradeX">
	                                <td><?php echo $no++; ?></td>
	                                <td><?php echo $v['id']; ?></td>
	                                <td><?php echo $v['username']; ?></td>
	                                <td><?php echo $v['email']; ?></td>
	                                <td><?php echo $v['password']; ?></td>
	                                <td>
	                                	<a href="<?php echo site_url('user/update/' . $v['id']); ?>">Edit</a> || 
	                                	<a href="<?php echo site_url('user/delete/' . $v['id']); ?>">Delete</a>
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