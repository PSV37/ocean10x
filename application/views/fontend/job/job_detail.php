


<!---header---->

<?php 
    $this->load->view('fontend/layout/new_seeker_header.php');

?> 
<!---header end--->

<div class="container-fluid">
	<div class="container">
        <div class="col-md-12">
        	 <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
     
			
            	<div class="col-md-9 details_box">
                	<div class="job-logo">
                 <img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="job-disc-logo"/>
                    </div>
                     <div class="row">
              <div class="col-md-4">
                <ul class="jobinfolist">
                  <li>
                    <h4>Job Title</h4>
                    <strong>: <?php echo $singlejob->job_title; ?></strong></li>
                  <li>
                    <h4>Job Status</h4>
                    <strong>: <?php if ($singlejob->job_deadline > date('Y-m-d')): echo "open"; else: echo "Expired"; endif; ?></strong></li>
                  <li>
                    <h4>Job Level</h4>
                    <strong>: Medium</strong></li>
                                   
                    
                  
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="jobinfolist">
                  <li>
                    <h4>Organization:</h4>
                    <strong>: Rs.12k-40k</strong></li>
                  <li>
                    <h4>Job Type</h4>
                    <strong>: IT &amp; Telecommunication</strong></li>
                  <!-- <li>
                    <h4>Preferred Age:</h4> 
                    <strong>0 (years)</strong></li> -->
                  <li>
                    <h4>Salary</h4>
                    <strong>:10k</strong></li>
                  
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="jobinfolist">
                  <li>
                    <h4>Location</h4>
                    <strong>: Pune, Bangaluru, Mumbai</strong></li>
                  <li>
                    <h4>Experience</h4>
                    <strong>: 1</strong></li>
                  <!-- <li>
                    <h4>Preferred Age:</h4> 
                    <strong>0 (years)</strong></li> -->
                  
                </ul>
              </div>
              
              
            </div>
            <div class="jd">
            <h4>Job Description :</h4>
            <p>A job description is an internal document that clearly states the essential job requirements, job duties, job responsibilities, and skills required to perform a specific role. A more detailed job description will cover how success is measured in the role so it can be used during performance evaluations.</p>
              </div>
              
              <div class="jd-require">
            <h4>Job Requirement</h4>
            <button class="apply-cv" id="b3">Apply with Ocean cv</button>
              </div>
                     </div>
            
           
           </div>
       </div>
       
       <!-- Footer -->
 <div class="container-fluid end-footer">   
	
    <div class="container">
    <div class="col-md-12 ">
<div class="row">
<div class="col-md-4 p-footer">
<h5>About consultnHire</h5>
					<ul class="list-unstyled quick-links">
						<p>Working with us has many benefits for you, your business and your stakeholders. We are known for our creative, yet professional approach</p>
					</ul>

</div>
<div class="col-md-4 p-footer">
<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;Home</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;Search Jobs</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;Views All Jobs</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;Contact Us</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;report a bug/Abuse</a></li>
					</ul>

</div>
<div class="col-md-4 p-footer">
<h5>About Company</h5>
					<ul class="list-unstyled quick-links ">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;About Company</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;My Account</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;Terms Of Use</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;Help</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-angle-double-right"></i>&emsp;Privacy Commitment</a></li>
					</ul>
</div>

<div class="row">

<div class="footer-icons">

<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-phone-square-alt"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fas fa-envelope-open"></i></a></li>
						
					</ul>
</div>

				
				
			</div>


</div>
</div>
</div>
</div>
	<!-- ./Footer -->
  </div>   
  