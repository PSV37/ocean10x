<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <!-- Page Title start -->
<!-- <div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">View Resume</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>View Resume</span></div>
      </div>
    </div>
  </div>
</div> -->
<!-- Page Title End --> 

               <div class="section lb">
                <div class="container">
                    <div class="row">
                      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                        <div class="content col-md-9">
                            <div class="job-header">
                            <div class="contentbox">
                                        <!-- Header -->
										<center><h4 style="color:#b6bc00;">Resume</h4></center><br/><br/>
                                <header class="row cv-box">
                                        <div class="title col-md-9">
                                            <h3><?php echo $resume->full_name; ?> </h3>
                                            <h4> <?php echo $resume->resume_title; ?></h4>
                                           	<div class="resumetxt">E-mail : <?php echo $resume->email; ?></div>
                                             
                                             <?php if(!empty($resume->present_address)): ?>                                             
                                             <div class="resumetxt">Address: <?php echo $resume->present_address; ?> </div>
                                             <?php endif; ?>       
                                         <!--Home Phone:-->
                                         <?php if(!empty($resume->mobile)): ?>
                                            <div class="resumetxt"> Mobile No: <?php echo $resume->mobile; ?> </div>
                                              <?php endif; ?> 
                                             
                                        </div>
                                    <div class="social col-md-3">
									 <img src="<?php echo base_url() ?>upload/<?php if(!empty($job_seeker_photo->photo_path)) { echo $job_seeker_photo->photo_path;} else { echo "image-notfound.png";} ?>" alt="Photo" style="margin-top:-50px;">
									</div>
                                    
                                </header>

                <div class="cvdisplay">
                <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Career Summery!</h5>
                </header>
                <div class="col-md-9 ">
                   <p class="welcome"><?php echo $resume->js_career_sum; ?> <br>
                </div>
            </article>
            	</div>

          <?php if(!empty($resume->field_sepicalization)): ?>
          	<div class="cvdisplay">
               <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Field of Specialization</h5>
                </header>
                <div class="col-md-9 ">
                   <p class="welcome"><?php echo $resume->field_sepicalization; ?> <br>
                </div>
            </article>
            </div>
          <?php endif; ?>
          <?php if(!empty($resume->skills)): ?>
            <div class="cvdisplay">
               <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Technical Skills</h5>
                </header>
                <div class="col-md-9 ">
                   <p class="welcome"><?php echo $resume->skills; ?> <br>
                </div>
            </article>
            </div>
          <?php endif; ?>
 		
            <!-- Work -->
            <div class="cvdisplay">
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Work Experience</h5>
                </header>
                <div class="col-md-9">
                  <?php if (!empty($experinece_list)): foreach ($experinece_list as $v_experience) : ?>
                 
                 <div class="table-responsive">
                 <table class="table">
                  <tr>
                    <td width="30%"><span class="highlight_text">Company Name:</span></td>
                    <td><?php echo $v_experience->company_profile_id ;?></td>
                  </tr>
                  <tr>
                    <td><span class="highlight_text">Designation:</span></td>
                    <td><?php echo $v_experience->designation_name ;?></td>
                  </tr>
                  <tr>
                    <td><span class="highlight_text">Department:</span></td>
                    <td><?php echo $v_experience->department_name ;?></td>
                  </tr>
                  <tr>
                    <td><span class="highlight_text">Job Level:</span></td>
                    <td><?php echo $this->job_level_model->get_job_level_by_id($v_experience->job_level) ;?></td>
                  </tr>
                  <tr>
                    <td><span class="highlight_text">Duration:</span></td>
                    <td><?php $today=date("Y-m-d"); if($v_experience->end_date=="2017-08-30") {
                      echo date_calculate($v_experience->start_date,$today);
                    }else { echo date_calculate($v_experience->start_date,$v_experience->end_date); }?></td>
                  </tr>
                </table>
                </div>

                                  
                 
              <div class="myresumtxt">  
                <?php if(!empty($v_experience->achievement)): ?>
                     <span class="highlight_text">Achievement:</span> <?php echo $v_experience->achievement ?>  <br>
                     <?php endif; ?>
                     </div>
             <div class="myresumtxt">          
            <?php if(!empty($v_experience->major_activity)): ?>
                      <span class="highlight_text">Major Activity: </span><?php echo $v_experience->major_activity;?> <br>
              <?php endif; ?>
              </div>
              
              <div class="myresumtxt">  
                  <?php if(!empty($v_experience->responsibilities)): ?>
                       <span class="highlight_text">Job Responsibility: </span><?php echo $v_experience->responsibilities;?>  <br>
                      <?php endif; ?>
                </div>
                
                 <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>

             </div>
            </article>
       		</div>
            
            <!-- Education -->
            <div class="cvdisplay">
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Education</h5>
                </header>
                <div class="col-md-9">
                      <?php if (!empty($edcuaiton_list)): foreach ($edcuaiton_list as $v_education) : ?>
                            
                            
                            <div class="table-responsive">
                             <table class="table">
                              <tr>
                                <td width="30%"><span class="highlight_text">Degree:</span></td>
                                <td><?php echo $v_education->education_level_name ; ?></td>
                              </tr>
                              <tr>
                                <td><span class="highlight_text">Specialization:</span></td>
                                <td><?php echo $v_education->education_specialization ; ?></td>
                              </tr>
                              <tr>
                                <td><span class="highlight_text">Institute Name/Board:</span></td>
                                <td><?php echo $v_education->js_institute_name ; ?></td>
                              </tr>
                              <tr>
                                <td><span class="highlight_text">Result:</span></td>
                                <td><?php echo $v_education->js_resut  ; ?></td>
                              </tr>
                              <tr>
                                <td><span class="highlight_text">Passing Year:</span></td>
                                <td><?php echo $v_education->passing_year ; ?>   </td>
                              </tr>
                            </table>
                            </div>
                            
                            
                           
                            
                  <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>

                </div>
            </article>
            </div>

            <!-- Traingin -->
            <div class="cvdisplay">
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Training </h5>
                </header>
                <div class="col-md-9">
			<?php if (!empty($training_list)): foreach ($training_list as $v_training) : ?>
               	
                
                <div class="table-responsive">
                 <table class="table">
                  <tr>
                    <td width="30%"><span class="highlight_text">Training Title:</span></td>
                    <td><?php echo $v_training->training_title; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Training Topic:</span></td>
                    <td><?php echo $v_training->training_topic; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Institute:</span></td>
                    <td><?php echo $v_training->institute; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Country:</span></td>
                    <td><?php echo $v_training->country_name; ?></td>
                  </tr>
				          <tr>
                    <td width="30%"><span class="highlight_text">State:</span></td>
                    <td><?php echo $v_training->state_name; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">City:</span></td>
                    <td><?php echo $v_training->city_name; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Duration:</span></td>
                    <td><?php echo $v_training->duration; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Year:</span></td>
                    <td><?php echo $v_training->training_year; ?></td>
                  </tr>
                </table>
                </div>               
             
               
               <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>                 
                </div>
            </article>
            </div>
            <?php if(!empty($resume->extracurricular)): ?>
              <div class="cvdisplay">
              <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Extra Curricular  Activities</h5>
                </header>
                <div class="col-md-9 ">
                   <p class="welcome"><?php echo $resume->extracurricular; ?> <br>
                </div>
            </article>
            </div>
          <?php endif; ?>
          

         	<!-- Personal Information -->
            <div class="cvdisplay">
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Personal Details </h5>
                </header>
                <div class="col-md-9">
                 
                 
                 <div class="table-responsive">
                 <table class="table">
                  <tr>
                  	<?php if(!empty($resume->father_name)): ?>
                    <td width="30%"><span class="highlight_text">Father Name:</span></td>
                    <td><?php echo $resume->father_name; ?></td>
                    <?php endif; ?>
                  </tr>
                  <tr>
                  	<?php if(!empty($resume->mother_name)): ?>
                    <td width="30%"><span class="highlight_text">Mother Name:</span></td>
                    <td><?php echo $resume->mother_name; ?></td>
                     <?php endif; ?>
                  </tr>
                  <tr>
                  	<?php if($resume->date_of_birth=="0000-00-00"): ?>
                    <?php else: ?> 
                    <td width="30%"><span class="highlight_text">Date of Birth:</span></td>
                    <td><?php echo date("F j Y", strtotime($resume->date_of_birth)); ?></td>
                     <?php endif; ?>
                  </tr>
                  <tr>
                  	<?php if(!empty($resume->nationality)): ?>
                    <td width="30%"><span class="highlight_text">Nationality:</span></td>
                    <td><?php echo $resume->nationality; ?></td>
                    <?php endif; ?>
                  </tr>
                  <tr>
                  	<?php if(!empty($resume->national_id)): ?>
                    <td width="30%"><span class="highlight_text">National ID:</span></td>
                    <td><?php echo $resume->national_id; ?></td>
                    <?php endif; ?>
                  </tr> 
                  <tr>
                  	<?php if(!empty($personal->present_address)): ?>
                    <td width="30%"><span class="highlight_text">Address:</span></td>
                    <td><?php echo $personal->presene_address; ?></td>
                    <?php endif; ?>
                  </tr> 
                  <tr>
                  	<?php if(!empty($js_personal_info->city_name)): ?>
                    <td width="30%"><span class="highlight_text">City:</span></td>
                    <td><?php echo $js_personal_info->city_name; ?></td>
                    <?php endif; ?>
                  </tr>
				   <tr>
                  	<?php if(!empty($js_personal_info->state_name)): ?>
                    <td width="30%"><span class="highlight_text">State:</span></td>
                    <td><?php echo $js_personal_info->state_name; ?></td>
                    <?php endif; ?>
                  </tr> 
				    <tr>
                  	<?php if(!empty($js_personal_info->country_name)): ?>
                    <td width="30%"><span class="highlight_text">Country:</span></td>
                    <td><?php echo $js_personal_info->country_name; ?></td>
                    <?php endif; ?>
                  </tr> 
                </table>
                </div>
                 
               
                 
                </div>
            </article>
            </div>

            <!-- Referenace -->
            <div class="cvdisplay">
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Reference </h5>
                </header>
                <div class="col-md-9">
                  <?php if (!empty($reference_list)): foreach ($reference_list as $v_reference) : ?>
                      
                   
                   <div class="table-responsive">
                 <table class="table">
                  <tr>
                    <td width="30%"><span class="highlight_text">Name:</span></td>
                    <td><?php echo $v_reference->name; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Organization Name:</span></td>
                    <td><?php echo $v_reference->company_profile_id; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Designation:</span></td>
                    <td><?php echo $v_reference->designation_name; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Email:</span></td>
                    <td><?php echo $v_reference->email; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Mobile:</span></td>
                    <td><?php echo $v_reference->mobile; ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><span class="highlight_text">Realtion:</span></td>
                    <td><?php echo $v_reference->relation; ?></td>
                  </tr>
                  
                </table>
                </div>
                  
               
               <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>                 
                </div>
            </article>
            </div>
            
           <!-- <div class="row">
            	<div class="col-md-5"><?php echo get_logo();?></div>
            </div>-->
</div>
                            </div><!-- end post-padding -->
                            
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>