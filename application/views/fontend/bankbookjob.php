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

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Bank Jobs</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>About Us</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

             
         <div class="section lb">
                <div class="container">
                
                    <div class="all-jobs job-listing clearfix">
                        <div class="job-tab">
                            
                          <div id="hotjob">
                                      <!-- Bottom switcher of slider -->
                                      <ul class="employerList">
                                      <?php  if (!empty($bankbook)): foreach ($bankbook as $v_bankbook) : ?>
                                        <?php $logo=$this->company_profile_model->company_logoby_id($v_bankbook->company_profile_id);?>
                                          <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name">
                                              <a href="<?php echo base_url();?>banksbook/<?php echo $this->company_profile_model->get_slug_name($v_bankbook->company_profile_id) ?>" class="thumbnail fff"><img src="<?php echo base_url() ?>upload/<?php if(!empty($logo)) {echo $logo;} else {echo "notfound.gif";} ?>"></a>
                                          </li>
                                          <?php
                                          endforeach;
                                          ?>
                                          <?php else : ?> 
                                                  <strong>There is no data to display</strong>
                                          <?php endif; ?>
                                      </ul>                 
                              </div>  
               
                        </div><!-- end job-tab -->

                    </div><!-- end alljobs -->
                </div><!-- end container -->
            </div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>