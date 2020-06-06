<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!---header---->
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


<!---header end--->

   
<div class="container-fluid">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-3">
            <aside id="left-panel" style="margin-top:75px;
                 margin-left: 14px;height:auto; border-right: 1px solid rgba(240, 240, 240, 0.3);box-shadow: 2px 2px 4px 0px   #00000033;position: fixed;
            z-index: 999;vertical-align:baseline;">
            <div class="inner-left-pannel">
                
                
                <!-- WHAT MOVES START -->
                <div class="my-moving-parts">
                    <div class="my-param-content"></div>
                    <div class="my-normal-content">
                       <div class="inner-tabs-navigation" data-active="menu">
                        </div>
                        <div class="inner-tabs">
                            <div class="account-tab">
                                <div class="language-selection" title="Change language">
                                                <div class="btn-header transparent pull-right dropdown" style="margin-top: -1px;">
                                                    <span><a href="#" class="dropdown-toggle locale" data-toggle="dropdown">
                                                      <i class="flag flag-us"></i> 
                                                         </a>
                                                     </span>
                                                </div>
                                </div>
                            </div>
                            
                            <div class="menu-tab">
                               
                                
                                
                                <nav class="menu-principal">
                                
                                    <ul class="menu-principal-list" style="">
                                         <li class="active">
                                             <a data-dl-view="true" data-dl-title="Dashboard" href="#">
                                            <span class="icon-container">
                                                 <i class="fas fa-tachometer-alt"></i>
                                            </span>
                                            <span class="text item">Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                             <a data-dl-view="true" data-dl-title="My profile" href="/candidate/detail">
                                            <span class="icon-container">
                                                <i class="fas fa-user-alt"></i>
                                           </span>
                                        <span class="text item">My Ocean profil</span>
                                              </a>
                                       </li>
                                       
                                      <li>
                                     <a data-dl-view="true" data-dl-title="Contacts" href="/candidate">
                                       <span class="icon-container">
                                         <i class="fas fa-phone-volume"></i>
                                     </span>
                                        <span class="text item">OcearnHunt Activities</span>
                                     </a>
                                      </li>
                                         <li>
                                         <a data-dl-view="true" data-dl-title="Recruitments" href="/campaign">
                                            <span class="icon-container">
                                              <i class="fas fa-filter"></i>
                                              </span>
                                        <span class="text item">Skill Upgrade</span>
                                          </a>
                                        </li>
                                         <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Become an Ocean champ</span>
                                              </a>
                                         </li>
                                            
                                          
                                         
                                     </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- WHAT MOVES END -->
            </div>
                </aside>
            </div>
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
                <div class="progress-value"><?php echo $profile_total; ?>%</div>
            </div>
      
            
                 <div class="paragraph_p_level">
        <p>Create your own, and see what different functions produce. Get to understand what is really happening. What type of Graph do you want</p> 
        </div>
            </div>
        </div>
        
    </div>
    
    
    </div>
 <?php $this->load->view("fontend/layout/jobseeker_footer.php"); ?>
   
</div>
   
   
   
</body>