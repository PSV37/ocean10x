


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
                 <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($singlejob->company_profile_id); ?>" class="job-disc-logo"/>
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
                    <strong>: <?php echo $singlejob->job_level_name; ?></strong></li>
                                   
                    
                  
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="jobinfolist">
                  <li>
                    <h4>Organization:</h4>
                    <strong>: <?php echo $singlejob->company_name;?></strong></li>
                  <li>
                    <h4>Job Type</h4>
                    <strong>: <?php echo $this->job_nature_model->get_job_nature_by_id($singlejob->job_nature);?></strong></li>
                  <!-- <li>
                    <h4>Preferred Age:</h4> 
                    <strong>0 (years)</strong></li> -->
                  <li>
                    <h4>Salary</h4>
                    <strong>: Rs: <?php echo $singlejob->salary_range; ?></strong></li>
                  
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="jobinfolist">
                  <li>
                    <h4>Location</h4>
                    <strong>: <?php echo $singlejob->city_id; ?></strong></li>
                  <li>
                    <h4>Experience</h4>
                    <strong>: <?php echo $singlejob->experience;?></strong></li>
                  <!-- <li>
                    <h4>Preferred Age:</h4> 
                    <strong>0 (years)</strong></li> -->
                  
                </ul>
              </div>
              
              
            </div>
            <div class="jd">
            <h4>Job Description :</h4>
            <p><?php echo $singlejob->job_desc; ?></p>
              </div>
              
              <div class="jd-require">
            <h4>Job Requirement</h4>
            <p><?php echo $singlejob->education; ?></p>
            <div class="panel-body"></div>
            <button class="apply-cv" id="b3">Apply with Ocean cv</button>
              </div>
                     </div>
            
           
           </div>
       </div>
       
       <!-- Footer -->
 
	<!-- ./Footer -->
  </div>  

   <?php $this->load->view("fontend/layout/jobseeker_footer.php"); ?> 
  