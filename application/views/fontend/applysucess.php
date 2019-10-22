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
            <p>Sucessfully apply this job . <br>
              <?php if(!empty($job_test))
                foreach ($job_test as $value) {}
                $status = $value['is_test_required'];
                $job_id = $value['job_post_id'];
                $company_profile_id = $value['company_profile_id'];
                if($status=='Yes')
                {
              ?>
                <br>If you want's to increase your chance for this job please go through online test. <br><a href="<?php echo base_url(); ?>/exam/index/<?php echo base64_encode($job_id); ?>" class="btn btn-primary">Go Now </a>&nbsp;&nbsp; <a href="<?php echo base_url(); ?>" class="btn btn-primary">Go Later </a>.</p>
            
            <?php }else{ ?>
                <br>Please go to <a href="<?php echo base_url(); ?>">Home </a> or search something from search form.</p>
                <div class="backtohome"><a href="<?php echo base_url(); ?>" class="btn btn-custom">Back to Home</a></div>
            <?php } ?>
        </div>
      </div>
    </div>
                  
  </div><!-- end container -->
</div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>