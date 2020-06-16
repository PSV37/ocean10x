<!---header-->
<?php $this->load->view('fontend/layout/employer_new_header.php');?>  

<!---header--->


<div class="container-fluid main-d">
	<div class="container">
        <div class="col-md-12">
        	<?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      
            <div class="col-md-9 cv-bank-section">
            
            <form action="/action_page.php">
                  <button class="sort-serach" type="submit"><i class="fas fa-search"></i></button>
				  <input type="text" placeholder="Search.." name="search">
   		    </form>
            
           <button class="all-btn sort-active">All</button>
            <button class="all-btn">sort</button>
            
            
            
            
            
            <div class="section">
            <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   supriya
                   </div> 
                    <div class="organization">
                    	Email: supriya@12345
                    </div>
                    <div class="location">
                    	Mobile no: 8767861289
                    </div>
                   
                    <button class="job_dis_btn" onclick="myFunction()">Details</button>
                    <button class="get_cv">get Ocean Profile</button>
                    
                    
                    
                </div>
              <div id="myDIV">
<div class="col-md-12 bg-hide">

<div class="col-md-4">
 							<ul class="jobinfolist">
                              <li>
                                <h4>Year of Experience</h4>
                                <strong>: 3</strong></li>
                              <li>
                                <h4>Current notice period</h4>
                                <strong>: </strong></li>
                              <li>
                                <h4>Job Type</h4>
                                <strong>: Medium</strong></li>
                            </ul>
                            </div>
                            
                            <div class="col-md-4">
 							<ul class="jobinfolist">
                              <li>
                                <h4>Working at current job</h4>
                                <strong>:</strong></li>
                              <li>
                                <h4>Current CTC</h4>
                                <strong>: </strong></li>
                              <li>
                                <h4>Last salary Hike</h4>
                                <strong>: Medium</strong></li>
                            </ul>
                            </div>
                            
                            <div class="col-md-4">
 							<ul class="jobinfolist">
                              <li>
                                <h4>Top Education</h4>
                                <strong>: </strong></li>
                              <li>
                                <h4>Skills</h4>
                                <strong>:</strong></li>
                              <li>
                                <h4>Current work location</h4>
                                <strong>: Medium</strong></li>
                            </ul>
                            </div>

                       </div>     

</div>
			</div>
			
            <div class="section">
            <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   supriya
                   </div> 
                    <div class="organization">
                    	Email: supriya@12345
                    </div>
                    <div class="location">
                    	Mobile no: 8767861289
                    </div>
                   
                    <button class="job_dis_btn" >Details</button>
                    <button class="get_cv">get Ocean Profile</button>
                    
                    
                    
                </div>
              <div id="myDIV">
<div class="col-md-12 bg-hide">
<div class="col-md-4">
 							<ul class="jobinfolist">
                              <li>
                                <h4>Year of Experience</h4>
                                <strong>: 3</strong></li>
                              <li>
                                <h4>Current notice period</h4>
                                <strong>: </strong></li>
                              <li>
                                <h4>Job Type</h4>
                                <strong>: Medium</strong></li>
                            </ul>
                            </div>
                            
                            <div class="col-md-4">
 							<ul class="jobinfolist">
                              <li>
                                <h4>Working at current job</h4>
                                <strong>:</strong></li>
                              <li>
                                <h4>Current CTC</h4>
                                <strong>: </strong></li>
                              <li>
                                <h4>Last salary Hike</h4>
                                <strong>: Medium</strong></li>
                            </ul>
                            </div>
                            
                            <div class="col-md-4">
 							<ul class="jobinfolist">
                              <li>
                                <h4>Top Education</h4>
                                <strong>: </strong></li>
                              <li>
                                <h4>Skills</h4>
                                <strong>:</strong></li>
                              <li>
                                <h4>Current work location</h4>
                                <strong>: Medium</strong></li>
                            </ul>
                            </div>

                       </div>     

</div>
			</div>
			
                
            </div>
		</div>
    </div>
</div>        
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}</script>
