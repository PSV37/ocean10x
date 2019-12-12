<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">All Question's </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Import Question's</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
      		  <form method='post' action="<?php echo base_url();?>employer/questionbank-import" enctype="multipart/form-data">
          		<div class="panel-body">

                <div class="col-md-6">
                  <small>To Import Question's Download Question Format <a href="<?php echo base_url(); ?>questionimportpattarn/Questionbank_pattern.csv" download><strong>Click here To Download</strong></a></small>
                </div>
                <div class="col-md-6">
                  <input type='file' name='file' required class="form-control">
                  <div class="panel-body"></div>
                  <button type="submit" name='upload' class="btn btn-info btn-sm pull-right">Upload Now</button>
                </div>
          		  
          		</div>
        		  <input type="hidden" name="org_id" value="1" class="form-control">
        		<!-- <input type='submit' value='Import' name='upload' class="btn btn-info btn-sm"> -->
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