<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>    
<style>
li.list-group-item:hover{color:#8ac640;}
.panel-default>.panel-heading{cursor:pointer;background-color:#fff;}

	.panel-default>.panel-heading:hover {
    border-left:solid 3px #89c740;
    border-radius: 0px;
	background-color:#fff;    
	color:#89c740;  
}
.panel-group .panel{margin-bottom:0px;}
   
.list-group-item{cursor:pointer;}      
.panel-title>a{font-size:12px;font-weight:600;}
.panel-title>a:hover{text-decoration:none;}   
.summary {
    background-color: #f4f9fd;
    padding: 20px 32px;
    margin-right: 65px;
    box-shadow: 2px 2px 3px 0px #ece9e9;
	margin-bottom:20px;
}
.summary h6{font-size:25px;}
   
.lb{background-color:#f5f5f585;}
.panel-default {   
    border-color: #dddddd8a;
	
}      
.panel-group .panel+.panel {
   margin-top: 0px;   
}
li.list-group-item {
    background-color: #edeff1;
	font-size: 13px;
}
.summary i{
    float: left;
    margin-right: 25px;
    font-size: 25px;
}  
.userccount p{margin-top:5px;}
.userccount{margin-bottom:20px;}  
</style>
   

    

<div class="section lb">
  <div class="container">                                
                         
    <div class="row">
     <div class="content col-md-3">
  <div id="accordion" class="panel panel-group" role="tablist">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
      <h4 class="panel-title active">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup1" aria-expanded="true" aria-controls="collapseListGroup1"><i class="fa fa-dashboard" aria-hidden="true"></i>&emsp;My Dashboard</a>
      </h4>
    </div>
    <div id="collapseListGroup1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>
        <li class="list-group-item">Second eros</li>
        <li class="list-group-item">Second eros</li>
        <li class="list-group-item">Second eros</li>
        <li class="list-group-item">Second eros</li>   
        <li class="list-group-item">Second eros</li>
      </ul>   
    </div>
  </div>   

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
      <h4 class="panel-title">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup2" aria-expanded="true" aria-controls="collapseListGroup2"><i class="fa fa-pencil" aria-hidden="true"></i>&emsp;My Profile</a>
      </h4>
    </div>
    <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>
        <li class="list-group-item">Second eros</li>
      </ul>
    </div>   
  </div>   

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading3">
      <h4 class="panel-title">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup3" aria-expanded="true" aria-controls="collapseListGroup3"><i class="fad fa-cog" aria-hidden="true"></i>&emsp; My Training</a>
      </h4>
    </div>   
    <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>   
        <li class="list-group-item">Second eros</li>
      </ul>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading3">
      <h4 class="panel-title">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup3" aria-expanded="true" aria-controls="collapseListGroup3"><i class="fad fa-cog" aria-hidden="true"></i>&emsp; Ocean Services</a>
      </h4>
    </div>   
    <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>   
        <li class="list-group-item">Second eros</li>
      </ul>
    </div>
  </div>
</div>
<!-- Accordion wrapper -->
<!-- Accordion wrapper -->
  	 </div>   
     
<script>
// http://stackoverflow.com/questions/12733238/retain-twitter-bootstrap-collapse-state-on-page-refresh-navigation

$(document).ready(function () {
  //when a group is shown, save it as the active accordion group
  $("#accordion").on('shown.bs.collapse', function () {
      var active = $("#accordion .in").attr('id');
      Cookies.set('activeAccordionGroup', active, { expires: 7 });
      alert(active);
  });
  $("#accordion").on('hidden.bs.collapse', function () {
      Cookies.remove('activeAccordionGroup');
  });
  var last = Cookies.get('activeAccordionGroup');
  if (last != null) {
    //remove default collapse settings
    $("#accordion .collapse").removeClass('in');
    //show the account_last visible group
    $("#" + last).addClass("in");
  }
});

</script>     
     
     
     
     
      <div class="content col-md-9">
        <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">
            <h5>My Dashboard</h5>   
                
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Saved Jobs</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Job Alerts</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fad fa-eye"></i><h6>100</h6>
		            	  		<p>Profile Views</p>
			           	 	</div>   
			           	 	  
		             	</div>
                        <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Courses Completed</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Article Views</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fa fa-rss"></i><h6>100</h6>
		            	  		<p>News Feed</p>
			           	 	</div>   
			           	 	
		             	</div>
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
           </div>
           </div>
           
           <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">

            <h5>My Profile</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Ocean Profile</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Job Setting</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fa fa-envelope"></i><h6>100</h6>
		            	  		<p>Cover Letter</p>
			           	 	</div>   
			           	 	  
		             	</div> 
                        
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
            </div>
            </div>
            
            <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">
            <h5>My Trainings</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Ocean Courses</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Skill Upgrade</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fas fa-award"></i><h6>100</h6>
		            	  		<p>Ocean Champ</p>
			           	 	</div>   
			           	 	  
		             	</div>
                        
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
            </div>
            </div> 
            
            
             <div class="userccount">
             <div id="vsphoto" class="tab-pane fade in">
            <h5>Ocean Services</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Resume Writer</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Career Advice</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fad fa-eye"></i><h6>100</h6>
		            	  		<p>PMS</p>
			           	 	</div>   
			           	 	  
		             	</div>
                        
                        
                          <div class="col-md-12">
                          <div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>On Bording</p>   
		            	  	</div>
                            </div>
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
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
 