
<style type="text/css">
  .col-md-9.details_box {
    margin-top: 60px;
}
</style>

<!---header---->

<?php 
$company_profile_id = $this->session->userdata('company_profile_id');

$jobseeker_id = $this->session->userdata('job_seeker_id');
$emp_id = $this->session->userdata('emp_id');
if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_new_header.php');

            }

        elseif($jobseeker_id != null) {

             $this->load->view('fontend/layout/new_seeker_header.php');

        } elseif($emp_id != null) {

             $this->load->view('fontend/layout/employee_header.php');
    

    }else
    {
      $this->load->view('fontend/layout/header.php');
    }
    // $this->load->view('fontend/layout/new_seeker_header.php');

?> 
<!---header end--->

<div class="container-fluid">
	<div class="container">
        <div class="col-md-12">

        	 <?php 
           if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_menu.php');

            }

          elseif($jobseeker_id != null) 
          {

               $this->load->view('fontend/layout/seeker_left_menu.php');

          } elseif($emp_id != null) 
          {

               $this->load->view('fontend/layout/employer_menu.php');
      
          }else
          {
            $this->load->view('fontend/layout/employer_menu.php');
          }
               // $this->load->view('fontend/layout/seeker_left_menu.php'); 
        ?>
     
			
            	<div class="col-md-9 details_box">
                	<div>
                 <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($singlejob->company_profile_id); ?>"/>
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
              <?php if (isset($jobseeker_id)) { ?>
                 <div class="jd-require">
                <h4>Job Requirement</h4>
                <p><?php echo $singlejob->education; ?></p>
                <div class="panel-body"></div>
                <a href="#" data-toggle="modal" data-target="#ApplyJob"><button class="apply-cv" id="b3">Apply with Ocean cv</button></a>
                <div class="panel-body"></div>

            </div>
          <?php    } ?>
             
          </div>
            
           
           </div>
       </div>
       
       <!-- Footer -->
 
	<!-- ./Footer -->
  </div>  
<div id="ApplyJob" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Apply Job</h4>
      </div>
      <div class="modal-body">
        <form  class="form-horizontal" action="<?php echo base_url() ?>job/apply_job" method="post" style="padding: 30px;">
          <input type="hidden" name="forward_status" class="form-control" id="forward_status" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['forword_job_status'];
          } }?>" placeholder="">
          <input type="hidden" name="job_apply_id" class="form-control" id="job_apply_id" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['job_apply_id'];
          } }?>" placeholder="">
                   
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">User Name:</label>
            <div class="col-sm-8">
              <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder=""

                   value="<?php if(!empty($jobseeker_id)){ echo $this->Job_seeker_model->jobseeker_name($jobseeker_id);} ?>">
            </div>
          </div>
          <input type="hidden" name="job_seeker_id" value="<?php echo $jobseeker_id ?>">
          <input type="hidden" name="job_post_id" value="<?php echo $singlejob->job_post_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Company Name:</label>
            <div class="col-sm-8">
              <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$singlejob->company_profile_id;
                         echo $this->company_profile_model->company_name($company_id);?>">
            </div>
          </div>
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email"> Expected Salary:</label>
            <div class="col-sm-8">
              <input type="text" name="expected_salary" required class="form-control" id="avaliable" placeholder="Expected Salary"

                   >
            </div>
          </div>
          <?php $test=$singlejob->is_test_required;
            if ($test=='Yes') {
          ?>
          <div><b>Note: This job has a Online Test.</b></div>
          <div class="panel-body"></div>
        <?php }else{} ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
   <?php $this->load->view("fontend/layout/jobseeker_footer.php"); ?> 
  