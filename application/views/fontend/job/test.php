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
               


<div class="container">
   <div class="single-job">
         <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 single-job-bgcolor">
              
                 <div class="ad-item job-ad-item">
                <div class="item-info">
                  <div class="ad-info">
                    <span><a href="#" class="title"><?php echo $singlejob->job_title; ?></a> </span>
                    <div class="ad-meta">
                      <ul>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US</a></li>
                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                        <li><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</li>
                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i><?php echo $this->job_category_model->get_job_category_by_id($singlejob->job_category);?></a></li>
                      </ul>
                    </div><!-- ad-meta -->                  
                  </div><!-- ad-info -->
                </div><!-- item-info -->   
              </div>

            <div class="button">
              <a href="#" class="btn btn-success">Apply For This Job</a>
              <a href="#" class="btn btn-success">Register</a>
            </div>

                  <div class="job_des">
                     <?php echo $singlejob->job_desc; ?>
                     </div>
                   
                     <div class="co-md-12 col-sm-12">
                             <?php 
                             echo $jobseeker_id;
                             if($jobseeker_id==null): ?>
                                    <div class="apply text-center">
                                        <a class="btn btn-success"  href="<?php echo base_url(); ?>seeker-login">Login To Apply</a>
                                    </div>  
                                    <?php else: ?>
                                      <div class="apply text-center">
                                        <a class="btn btn-success"  data-toggle="modal" data-target="#ApplyJob" href="#">Apply Online</a>
                                    </div>
                                    <?php endif; ?>  
                                    </div>             
                               <div class="guide text-center">
                               </div>

                                <div class="company-info">
                                    <div class="information">
                                        <h5>Company Information</h5>
                                       
                                            <span><?php  $company_info=$this->company_profile_model->get($singlejob->company_profile_id); echo $company_info->company_info; ?> </span>
                                        
                                            <span>Web : <a href="<?php echo $company_info->company_url; ?>" target="_blank"><?php echo $company_info->company_url; ?></a></span>

                                        
                                    </div>
                                    
                                </div>
                            </div>
                                </div><!-- end col -->                                                             

                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <div class="adbanners"><img src="images/banner.jpg"></div>
                                    <div class="adbanners"><img src="images/banner.jpg"></div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end job-tab -->
                    </div><!-- end single-job -->

                </div>

                <!-- Modal -->
<div id="ApplyJob" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Apply Job</h4>
      </div>
      <div class="modal-body">
         <form  class="form-horizontal" action="<?php echo base_url() ?>/job/apply_job" method="post" style="padding: 30px;">


               <div class="form-group">
                <label class="control-label col-sm-4" for="email">User Name:</label>
                <div class="col-sm-8">
                  <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder=""
                   value="<?php echo $this->job_seeker_model->jobseeker_name($jobseeker_id); ?>">
                </div>
              </div>
              <input type="hidden" name="job_seeker_id" value="<?php echo $jobseeker_id ?>">
              <input type="hidden" name="job_post_id" value="<?php echo $singlejob->job_post_id; ?>">

              <div class="form-group">
                <label class="control-label col-sm-4" for="email">Company Name:</label>
                <div class="col-sm-8">
                  <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder=""
                   value="<?php
                   $company_id=$singlejob->company_profile_id;
                         echo $this->company_profile_model->company_name($company_id);
                       ?>">
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



           <button type="submit" class="btn btn-default">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


 <?php $this->load->view("fontend/layout/footer.php"); ?>