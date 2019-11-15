<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>        
 <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Active Jobs</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Active Jobs</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->             

      	<div class="section lb">
            <div class="container">
               <div class="row">
                <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
                
                <div class="content col-md-9">
	                <div class="x_panel">
		                <div class="x_content">
		                 
		                </div>
	           		</div>
        		</div>

  		</div> <!--end row -->
	</div><!-- end container -->
</div><!-- end section -->

<?php $this->load->view("fontend/layout/footer.php"); ?>
 
 