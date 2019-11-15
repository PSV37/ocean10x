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
	            <div class="row">
                    <div class="content col-md-8 col-md-offset-2">
                        <div class="userccount">
                            <h5>Your Dashboard</h5>

                            <div class="formpanel">
                                <div class="formrow">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
	                                        <input type="Password" id="password" name="password" class="form-control" placeholder="Password">
	                                    </div>
                                    </div><!-- end row -->
                                </div>
                                 
                               <div class="formrow">
	                               <div class="row">
	                                       <div class="col-md-6 col-sm-12">
	                                            <input type="Password" id="password" name="password" class="form-control" placeholder="Password">
	                                        </div>

	                                         <div class="col-md-6 col-sm-12">
	                                            <input type="Password" name="confirm_password" class="form-control" placeholder="Confirm Password">
	                                        </div>
	                                </div>
                                </div>

                            </div><!-- end post-padding -->
                        </div>
                    </div><!-- end col -->
        		</div>

  		</div> <!--end row -->
	</div><!-- end container -->
</div><!-- end section -->

<?php $this->load->view("fontend/layout/footer.php"); ?>
 
 