<?php 
    $this->load->view('fontend/layout/employee_header.php');
?>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">All CV's</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Import CV's</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employee_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
        		<form method='post' action="<?php echo base_url();?>employee/bulk_upload_cvs" enctype="multipart/form-data">
          		<div class="panel-body">
                <div class="col-md-6">
                  <small>To Import CV's Download CSV Format <a href="<?php echo base_url(); ?>cv_bank_excel/bulk_upload_cv_format.csv" download><strong>Click here To Download</strong></a></small>
                </div>

                <div class="col-md-6">
                  <input type='file' name='file' required class="form-control">

                  <div class="panel-body"></div>
                  <button type="submit" name='upload' class="btn btn-info btn-sm pull-right">Upload Now</button>
                </div>
          		</div>
    			    <!-- <input type='submit' value='Import' name='upload' class="btn btn-info btn-sm pull-right"> -->

             
    	      </form>

          </div>
        </div>
        <!-- end post-padding --> 
      </div>
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
</div>
</div>
<!-- end section --> 