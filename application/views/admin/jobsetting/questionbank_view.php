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
				<div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-3">
				<a href="https://consultnhire.com/questionimportpattarn.zip">Download Question Import Template</a>
				</div>
				</div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
					<div class="row">
				<div class="col-md-6">
				<span style="color:#00ff00;"><?php 
				if(isset($response)){
					echo $response;
				}
				?></span>
				</div>
				</div>
	<form method='post' action="<?php echo base_url();?>admin/questionbank-import" enctype="multipart/form-data">
	<div class="panel-body">
		<input type='file' name='file' required>
		</div>
			<div class="panel-body">
			<input type="hidden" name="is_admin" value="1" class="form-control">
			</div>		
		<div class="panel-body">
		<input type='submit' value='Import' name='upload' class="btn bg-navy">
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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php $this->load->view('admin/components/footer'); ?>