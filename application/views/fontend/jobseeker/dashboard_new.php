<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!---header---->



<!---header end--->
<?php  
                $MyProfile=20;
                $Education=20;
                $Work_Experience=20;
                $certs_training=20;
                $js_photo=20;

                 $jobseeker_id = $this->session->userdata('job_seeker_id');

                 $js_personal_info = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
                 $jsname=$this->Job_seeker_model->jobseeker_name($job_seeker);
                $job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);


                $full_profile_each=$MyProfile/11;
                $Education_each=$Education/4;

               
                // print_r($Corporate_docs_each);die;
                if (isset($job_seeker_photo) && !empty($job_seeker_photo)) {
                    $photo_total = $js_photo;
                }

                if (isset($jsname->full_name) && !empty($jsname->full_name)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->date_of_birth) && !empty($js_personal_info->date_of_birth)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->mobile) && !empty($js_personal_info->mobile)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->present_address) && !empty($js_personal_info->present_address)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->city_name) && !empty($js_personal_info->city_name)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->state_name) && !empty($js_personal_info->state_name)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->country_name) && !empty($js_personal_info->country_name)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->marital_status) && !empty($js_personal_info->marital_status)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->work_permit_usa) && !empty($js_personal_info->work_permit_usa)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->work_permit_countries) && !empty($js_personal_info->work_permit_countries)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($js_personal_info->resume_title) && !empty($js_personal_info->resume_title)) {
                     $profile_details_total += $full_profile_each;
                }

                $edcuaiton_list = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
                if (isset($edcuaiton_list) && !empty($edcuaiton_list)) {
                    $Education_total = $Education;
                }

                $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
                 if (isset($experinece_list) && !empty($experinece_list)) {
                    $Work_Experience_total = $Work_Experience;
                }

                $training_list = $this->Job_training_model->training_list_by_id($jobseeker_id);
                 if (isset($training_list) && !empty($training_list)) {
                    $certs_training_total = $certs_training;
                }

                $profile_total=$photo_total+$profile_details_total+$Education_total+$Work_Experience_total+$certs_training_total;
             
                 ?>

<?php 
    $this->load->view('fontend/layout/new_seeker_header.php');

?>  
   
<div class="container-fluid">
    <div class="container">
        <div class="col-md-12">
    <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
     
            
            <div class="col-md-6 mid-section">
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
                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url(); ?>seeker/my-saved-jobs">
                            <span class="float-left" style="font-size:22px;"><?php echo $saved_jobs; ?></span>
                            
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
                            <span class="float-left" style="font-size:22px;"><?php echo $job_alert; ?></span>
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
                <?php 
                $sr_no=0;
            if (!empty($jobs)): foreach ($jobs as $applicaiton) :

                print_r($applicaiton);
                for ($i=0; $i <sizeof($applicaiton) ; $i++) { 
                    # code...
               
            ?>
            <div class="invi-div">
                            <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton[$i]->company_profile_id); ?>" class="invitation-img"/>
                            <div class="info-invitation">
                                <p class="head-invi"><?php echo $this->job_posting_model->job_title_by_name($applicaiton[$i]->job_post_id); ?></p>
                                <span class="salary-info">Slaray: <?php echo $this->job_posting_model->job_salary_by_id($applicaiton[$i]->job_post_id); ?><span>
                                <p>text test</p>
                                 <div class="detail-b"><a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton[$i]->job_post_id) ?>">Details</a></div>
                                    <div class="last-row-invitation">
                                    <ul>
                                        <li><div class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $applicaiton[$i]->city_id;  ?></div></li>
                                       <li> <div class="year-inv"><i class="fas fa-save"></i>&emsp;<?php echo $applicaiton[$i]->experience;  ?> years</div></li>
                                        <li> <div class="calender-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($applicaiton[$i]->created_at)) { $mtime = time_ago_in_php($applicaiton[$i]->created_at);
                            echo $mtime;} ?></div></li>
                                        <li> <div class="fulltime-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $applicaiton[$i]->job_nature;  ?></div></li>
                                    </ul>
                                    </div>
                            
                                <button class="apply-invi">Apply Now</button>
                            </div>
                            <div class="clear"></div>   
                        </div>
            <!--  -->
                 <?php
                  // $sr_no++;
                   }
              endforeach;
            ?>
            <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
             </div>
             
             
            </div>
           </div>
            <div class="col-md-3 ">
            <div class="progress-bar-left">
            <h3 class="heading-dash_profile">PROFILE LEVEL</h3>
                <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value"><?php echo round($profile_total);?>%</div>
            </div>
      
            
                <!--  <div class="paragraph_p_level">
        <p>Create your own, and see what different functions produce. Get to understand what is really happening. What type of Graph do you want</p> 
        </div> -->
            </div>
        </div>
        
    </div>
    
    
    </div>
    <!-- Footer -->
 
    <!-- ./Footer -->
</div>
   
   <?php $this->load->view("fontend/layout/jobseeker_footer.php"); ?>
   
</body>