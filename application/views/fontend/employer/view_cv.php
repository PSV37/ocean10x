<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                

               <div class="section lb">
                <div class="container">
                    <div class="row">
                      
                      <?php $this->load->view('fontend/layout/employer_left.php'); ?>

                        <div class="content col-md-8">
                            <div class="post-padding">
                                <div class="job-title nocover hidden-sm hidden-xs"><h5>View Resume</h5></div>
                                        <!-- Header -->
                                <header class="row cv-box">
                                        <div class="title col-md-7">
                                            <img src="<?php echo base_url() ?>/upload/<?php echo $cv->photo_path; ?>" style="width: 160px"  class="seeker-profile-title" title="That`s me!" alt="My Profile"/>
                                            <div class="profile-title">
                                            <h2><?php echo $cv->full_name; ?></h2>
                                            <h4><?php echo $cv->resume_title; ?></h4>
                                            </div>
                                        </div>
                                    <div class="social offset1 col-md-5">
                                        <ul>
                                            <li><i class="icon-home"></i> Mirpur, Dhaka</li>
                                            <li>Bangladesh</li>
                                            <li><i class="icon-envelope-alt"></i> <?php echo $cv->email; ?></li>
                                            <li><i class="icon-phone"></i><?php echo $cv->mobile; ?></li>
                                        </ul>
                                    </div>  
                                </header>

            <!-- Welcome Text -->
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Career Objective!</h5>
                </header>
                <div class="col-md-9 ">
                    <p class="welcome"><?php echo $cv->js_career_obj; ?> <br>
                </div>
            </article>

                <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Career Summery!</h5>
                </header>
                <div class="col-md-9 ">
                   <p class="welcome"><?php echo $cv->js_career_sum; ?> <br>
                </div>
            </article>

          

            <!-- Education -->
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Education</h5>
                </header>
                <div class="col-md-9">
                      <?php if (!empty($edcuaiton_list)): foreach ($edcuaiton_list as $v_education) : ?>
                            <div class="breadcrumb">
                            <p>
                               <span class="highlight_text"> Degree:</span> <?php echo $v_education->js_degree ; ?>  <br>
                               <span class="highlight_text">Major Group/Subject:</span> <?php echo $v_education->js_group ; ?> <br>
                               <span class="highlight_text">Institute Name/Board:</span><?php echo $v_education->js_institute_name ; ?> <br>
                               <span class="highlight_text">Result:</span><?php echo $v_education->js_resut  ; ?>  <br>
                               <span class="highlight_text">Passing Year:</span> <?php echo $v_education->js_year_of_passing ; ?>               
                            </p>
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

            <!-- Work -->
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Work Experience</h5>
                </header>
                <div class="col-md-9">
                  <?php if (!empty($experinece_list)): foreach ($experinece_list as $v_experience) : ?>
                            <div class="breadcrumb">
              <p>
                  <span class="highlight_text">Company Name:</span> <?php echo $v_experience->company_name ;?> <br>
                  <span class="highlight_text">Designation: </span><?php echo $v_experience->designation ;?> <br> 
                  <span class="highlight_text">Department: </span><?php echo $v_experience->department ;?> <br>            
                  <span class="highlight_text">Job Nature: </span><?php echo $this->job_nature_model->get_job_nature_by_id($v_experience->job_nature) ;?>  <br>       
                  <span class="highlight_text">Job Level: </span><?php echo $this->job_level_model->get_job_level_by_id($v_experience->job_level) ;?>  <br>       
                  <span class="highlight_text">Duration: </span><?php echo date_calculate($v_experience->end_date, $v_experience->start_date) ;?>  <br>       
                  <span class="highlight_text">Addresss: </span><?php echo $v_experience->address ;?>  <br>       
                 </p>
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

            <!-- Traingin -->
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Training </h5>
                </header>
                <div class="col-md-9">
                  <?php if (!empty($training_list)): foreach ($training_list as $v_training) : ?>
                      <div class="breadcrumb">
               <p><span class="highlight_text">Training Title </span><?php echo $v_training->training_title; ?><br>
               <span class="highlight_text">Training Topic </span><?php echo $v_training->training_topic; ?><br>
                <span class="highlight_text">Institute </span><?php echo $v_training->institute; ?><br>
                <span class="highlight_text">Country </span><?php echo $v_training->country; ?><br>
            <span class="highlight_text">Location </span><?php echo $v_training->location; ?><br>
                <span class="highlight_text">Duration </span><?php echo $v_training->duration; ?><br>
               </p>
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


         <!-- Personal Information -->
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Personal Details </h5>
                </header>
                <div class="col-md-9">
                 <div class="breadcrumb">
                <p><span class="highlight_text">Father Name: </span> <?php echo $cv->father_name; ?><br>
                <span class="highlight_text">Mother Name:</span> <?php echo $cv->mother_name; ?><br> 
                <span class="highlight_text">Date of Birth:</span> <?php echo $cv->date_of_birth; ?> <br> 
                <span class="highlight_text">Marital Status::</span> <?php if(!empty($js_personal_info->marital_status))
                                  if($js_personal_info->marital_status=="0") {
                                    echo "Married";
                                    } else {
                                      echo "Unmarried";
                                      } ?> <br> 
                <span class="highlight_text">Religion:</span> Islam <br> 
                <span class="highlight_text">Nationality:</span> Bangladeshi <br> 
                <span class="highlight_text">National ID:</span>  <?php echo $cv->national_id; ?> <br> 
                 </p>
                 </div> 
                </div>
            </article>

                        <!-- Referenace -->
            <article class="row cv-box">
                <header class="col-md-3">
                    <h5>Reference </h5>
                </header>
                <div class="col-md-9">
                  <?php if (!empty($reference_list)): foreach ($reference_list as $v_reference) : ?>
                      <div class="breadcrumb">
               <p><span class="highlight_text">Name: </span><?php echo $v_reference->name; ?><br>
               <span class="highlight_text">Organization Name: </span><?php echo $v_reference->org_name; ?><br>
                <span class="highlight_text">Designation </span><?php echo $v_reference->designation; ?><br>
                <span class="highlight_text">Email: </span><?php echo $v_reference->email; ?><br>
            <span class="highlight_text">Mobile </span><?php echo $v_reference->mobile; ?><br>
                <span class="highlight_text">Realtion </span><?php echo $v_reference->relation; ?><br>
               </p>
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

                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>