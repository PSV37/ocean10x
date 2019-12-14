<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?> 
<style>
.summary{
	/*border: 1px solid;*/
    border-radius: 6px;
    background: #cbced247;
   	margin: 2px;
   	width: 256px;
    padding: 15px;
}
h6{
	text-align: center;
    margin: 15px;
    font-size: 25px;
}
.career{
	border-radius: 6px;
    background: #cbced247;
   	margin: 2px;
    padding: 15px;
}
.tag_line{
	text-align: unset !important;
}
.title-career{
	font-size: 20px;
	font-style: bold;
}
	    
</style>       
<div style="float: right;" id="smsg" class="alert alert-<?php echo $this->session->flashdata('type');?> alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $this->session->flashdata('Message');?></strong>
</div>

 <!-- Page Title start -->
<!-- <div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Dashboard</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Dashboard</span></div>
      </div>
    </div>
  </div>
</div> -->
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
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  		<h6>45</h6>
		            	  		<p>Who viewed your profile</p>
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<h6>10</h6>
		            	  		<p>Article views</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<h6>100</h6>
		            	  		<p>Search Appearnaces</p>
			           	 	</div>
			           	 	
		             	</div>
					</div>
					<div class="panel-body"></div>

					<div class="row career">
		                <div class="col-md-12">
		                	<div class="col-md-1"><i class="fa fa-user" aria-hidden="true"></i></div>
		                	<div class="col-md-11">
				           	 	<sapn class="title-career"><b>Career Advice</b></sapn> <br><br>
				           	 	<span>Participate in the career advice platform: <a href="#">On</a></span><br>
				           	 	<p class="tag_line">Get career advice by conversing with other LinkedIn users who are leaders in their fields</p><hr>
				           	</div>
		             	</div>
		             	<div class="col-md-12">
		             		<div class="col-md-1"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
		             		<div class="col-md-11">
			           	 		<span class="title-career"><b>Career Interests</b></span><br><br>
			           	 		<span>Let recruiters know you’re open: <a href="#">Off</a></span><br>	
			           	 		<p class="tag_line">Choose the types of opportunities you’d like to be connected with</p><hr>
			           	 	</div>
		             	</div>
		             	<div class="col-md-12">
		             		<div class="col-md-1"><i class="fa fa-money" aria-hidden="true"></i></div>
		             		<div class="col-md-11">
			           	 		<span class="title-career"><b>Salary Insights</b></span><br><br>
			           	 		<p class="tag_line">See how your salary compares to others in the community</p><hr>
			           	 	</div>
		             	</div><br><hr>
					</div>

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
          </div>
                             
        </div><!-- end col -->
      </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->
</div>
  

<?php $this->load->view("fontend/layout/footer.php"); ?>
 
 <script>
	$(document).ready (function(){
		$("#smsg").fadeTo(2000, 500).slideUp(500, function(){
		$("#smsg").slideUp(500);
		});   
	});
 </script>