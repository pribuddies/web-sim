
<?php $this->load->view('head'); ?>

<body>
    <div class="container">
		<?php echo form_open('auth/cek_login'); ?>
	        <h2 class="form-signin-heading">Please sign in</h2>
    	
    	    <label for="inputEmail" class="sr-only">Username</label>
	        <input name="username" type="text" class="form-control" placeholder="Username" required="" autofocus="">
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input name="password" type="password" class="form-control" placeholder="Password" required="">

        	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<?php echo form_close(); ?>

    </div> <!-- /container -->
</body></html>