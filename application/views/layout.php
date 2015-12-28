<?php $this->load->view('head'); ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<?php $this->load->view('top_navbar'); ?>
            
			<?php $this->load->view('side_navbar'); ?>
        </nav>

        <div id="page-wrapper">
			<?php $this->load->view($content); ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<?php $this->load->view('footer'); ?>
</body>

</html>
