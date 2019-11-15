<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?> 
<style>
.summary{
	border: 1px solid;
    border-radius: 6px;
    height: 100px;
    background: #7bc6ec7d;
}
h6{
	text-align: center;
    margin: 15px;
}
	    
</style>       

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
        <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">
            <h5>Your Dashboard</h5>
           
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">

                <div class="col-md-12">
            	 	<div class="col-md-3 summary">
            	  		<h6>100</h6>
            	  		<p>Who viewed your profile</p>
            	  	</div>
            	  	<div class="col-md-3 summary">
            	  		<h6>100</h6>
            	  		<p>Who viewed your profile</p>
            	  	</div>
	            	<div class="col-md-3 summary">
	            	  	<h6>100</h6>
            	  		<p>Who viewed your profile</p>
	           	 	</div>
	           	 	<div class="col-md-3 summary">
	            	  	<h6>100</h6>
            	  		<p>Who viewed your profile</p>
	           	 	</div>
             	</div>
             	<div class="row">
				    <div class="col summary">
				      1 of 3
				    </div>
				    <div class="col summary">
				      2 of 3
				    </div>
				    <div class="col summary">
				      3 of 3
				    </div>
				</div>

		                  
                </div>
                                          
              </div>
              
            </div>
          </div>
                             
        </div><!-- end col -->
      </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->
</div>
  

<?php $this->load->view("fontend/layout/footer.php"); ?>
 
 