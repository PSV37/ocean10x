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
 
              <div class="section lb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notfound">
                                <p class="main-title"><span class="c">S</span>ucess</p>
                                <p>Sucessfully apply this training . <br>Please go to <a href="<?php echo base_url(); ?>">Home </a> </p>
                                <a href="<?php echo base_url(); ?>" class="btn btn-custom">Back to Home</a>
                           </div>
                       </div>
                    </div>
                </div><!-- end container -->
            </div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>