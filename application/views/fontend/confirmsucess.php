<?php 
$company_profile_id = $this->session->userdata('company_profile_id');
$jobseeker_id = $this->session->userdata('job_seeker_id');
  if ($company_profile_id != null) {
   $this->load->view('fontend/layout/employer_header.php');
  }
  elseif($jobseeker_id != null) {
    $this->load->view('fontend/layout/seeker_header.php');
  } else {
    $this->load->view('fontend/layout/header.php');
  }
?>                
 
<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
        	 <h2 align="center">Success <span>!</span></h2> 
            <p>Your Interview confirmed. <br>
              <?php if(!empty($interview_data))
                foreach ($interview_data as $value) {}
                  
                $job_title = $value['job_title'];
                $interview_date = $value['interview_date'];
                $start_time = $value['start_time'];
                $end_time = $value['end_time'];
                $interview_type = $value['interview_type'];
                $interview_details = $value['interview_details'];
                $message_to_candidate = $value['message_to_candidate'];
                
                $company_profile_id = $value['company_id'];
              ?>
              <br>Here Are the interview details. <br></p>
              <p>Job Title: <?php echo $job_title; ?> </p>
              <p>Interview Date: <?php echo date('d M Y', strtotime($interview_date)); ?> </p>
              <p>Start Time: <?php echo $start_time; ?> </p>
              <p>End Time: <?php echo $end_time; ?> </p>
              <p>Interview Type: <?php echo $interview_type; ?> </p>
              <p>Interview Details: <?php echo $interview_details; ?> </p>
              <p>Message From Company:<br> <?php echo $message_to_candidate; ?> </p>
          
              <br>Please go to <a href="<?php echo base_url(); ?>">Home </a> or search something from search form.</p>
              <div class="backtohome"><a href="<?php echo base_url(); ?>" class="btn btn-custom">Back to Home</a></div>
        </div>
      </div>
    </div>
                  
  </div><!-- end container -->
</div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>