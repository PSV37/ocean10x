
<!---header-->
<?php $this->load->view('fontend/layout/employer_new_header.php');?>  

<!---header--->
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<div class="container-fluid main-d">
	<div class="container">
        <div class="col-md-12">
        	<?php $this->load->view('fontend/layout/employer_menu.php'); ?>
            
            <div class="col-lg-6 mid-section">
            <div class="row">           
            <div class="col-md-12 bd-1">
                   
            <div class="dash-box-w">
             <h3 class="heading-dash">My Dashboard</h3>
             
             <div class="col-md-4 card-lb">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-fw fa-download"></i>
                            </div>
                            <span>Saved Job</span>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:2px;">10</span>
                            </a>
                            </div>
                        </div>
              <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                          <i class="fas fa-volume-up fa-fw"></i>
                            </div>
                            <div >Job Alerts</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                 <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-users fa-fw"></i>
                            </div>
                            <div>Profile Views</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div> 
                     
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-bluish o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-fw fa-download"></i>
                            </div>
                            <span>Article Views</span>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">10</span>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-link o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                          <i class="fas fa-volume-up fa-fw"></i>
                            </div>
                            <div>courses Completed</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                          
                        <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-green o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-users fa-fw"></i>
                            </div>
                            <div>News Feed</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                        
                              
                  </div>                
             </div>
             
             <div class="col-md-12 bd-2">
             <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
             </div>
             
             
            </div>
           </div>
           
            <div class="col-md-3 pro-bar">
          
            <h3 class="heading-dash_profile">PROFILE LEVEL</h3>
                <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
      
        	
       			 <div class="paragraph_p_level">
       	
        </div>
        <button class="open-button" onclick="openForm()">Chat</button>
        <div class="chat-popup" id="myForm">
              <form action="/action_page.php" class="form-container">
                <h1>Chat</h1>

                <label for="msg"><b>Message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
              </form>
            </div>
            </div>
            
         </div>
     </div>
</div>   

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>