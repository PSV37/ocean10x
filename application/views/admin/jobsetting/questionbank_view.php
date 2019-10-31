<?php $this->load->view('admin/components/header'); ?>

<body class="skin-blue" data-baseurl="<?php echo base_url(); ?>">
    <div class="wrapper">
        
    <?php $this->load->view('admin/components/user_profile'); ?>
       
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
            <?php $this->load->view('admin/components/navigation'); ?>
        </section>
        <!-- /.sidebar -->
      </aside>

        <div class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>

            <br/>
            <div class="container-fluid">
               <section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                    <div class="col-md-offset-3">
                        <h3 class="box-title ">Import Question's</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
					<?php 
	if(isset($response)){
		echo $response;
	}
	?>
	<form method='post' action='' enctype="multipart/form-data">
	<div class="panel-body">
		<input type='file' name='file' >
		</div>
		<div class="panel-body">
		<input type='submit' value='Upload' name='upload' class="btn bg-navy">
		</div>
	</form>
                    </div>
					</div>
               
          
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>
</div>

<br />


</div><!-- /.right-side -->
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php $this->load->view('admin/components/footer'); ?>