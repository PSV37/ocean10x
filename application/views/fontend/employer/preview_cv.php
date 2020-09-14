<?php 
  $company_profile_id = $this->session->userdata('company_profile_id');
  
   $this->load->view('fontend/layout/employer_new_header.php');
   
  ?>
<style>
  .card {
  position: relative;
  height: auto;
  width: 100%;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transition: all 600ms;
  transition: all 600ms;
  border-radius:13px;
  padding:0px;
  margin-top:75px;
  }
  .card div {
  background: #FFF;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  border-radius: 13px;
  height: auto;
  }
  .card .back {
  background: #222;
  -webkit-transform: rotateX(180deg);
  transform: rotateX(180deg);
  }
  input {
  display: none;
  }
  /*
  :checked + .card {
  transform: rotateX(180deg);
  -webkit-transform: rotateX(180deg);
  }
  */
  .active-job {
  margin-top:168px;
  }
  .dropdown-menu>li>a{padding:3px 20px;}
  .front{padding:11px;height:264px;}
  .job-info {
  margin-left: 55px;
  margin-top:-4px;
  }
  li.left-title {
  list-style-type: none;
  float: left;
  font-size: 12px;
  font-weight: 100;
  width:fit-content;
  height:15px;
  }
  li.right-title {
  list-style-type: none;
  font-size: 12px;
  font-weight: 100;
  width:310px;
  }
  .icon-info {
  margin-left: 60px;
  margin-bottom: 60px;
  width: fit-content;
  }
  li.left-icon-title{
  list-style-type: none;
  float: left;
  }
  .left-icon-title i{color:#18c5bd;}
  li.right-icon-title {
  list-style-type: none;
  float: left;
  margin-right: 20px;
  font-weight:100;
  }
  .front .dropdown {
  top: -8px;
  width: 63px;
  position: absolute;
  right: 0px;
  }
  .detail-btn{
  background-color: #fff;
  padding: 3px 19px;
  border-radius: 20px;
  background-color: #18c5bd;
  border: none;
  color: #fff;
  font-weight: 100;
  margin-top:10px;
  float:right;}
  .detail-btn:hover{
  background-color:#107773;
  transition:0.8s; 
  }
  .following-info {
  float: left;
  line-height:30px;
  }
  .following-info2 {
  margin-left:256px;
  line-height:30px;
  }
  .active-span{
  position: absolute;
  top: 12px;
  left: 405px;
  background-color: #8BC34A;
  padding: 1px 17px;
  border-radius: 9px;
  color: #fff;
  font-size: 11px;
  }
  .following-info3 {
  float: right;
  margin-top: -90px;
  line-height: 30px;
  }
  .skils_benifit {
  margin-top: 25px;
  list-style-type: none;
  }
  li.left-title_seperate {
  float: left;
  width: 58px;
  font-size: 13px;
  color: #3c3c3c;
  }
  :checked + span {
  background: #18c5bd !important;
  display: inline-block;
  width: 100%;
  color: #fff;
  padding: 4px 15px;
  border-radius: 30px;
  cursor:pointer;
  }
  .btn-default1:not(:checked) + span {
  padding: 4px 15px;
  border-radius: 30px;
  background: #e4e2e2;
  /* padding: 8px 0; */
  width: 100%;
  border-radius: 10px;
  cursor: pointer;
  }
  .left-title_detail{
  width: 152px;
  font-size: 13px;
  list-style-type: none;
  float:left;
  height:auto;
  }
  .right-title_detail{width:100%;list-style-type:none;}
  button.back_btn {
  padding: 5px 35px;
  border-radius: 30px;
  border: none;
  background-color: #18c5bd;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  }
  button.back_btn:hover{
  background-color: #11a59e;
  box-shadow: 2px 2px 3px #ceccccba;
  transition:0.5s;
  }
  button.edit_btn {
  padding: 5px 35px;
  border-radius: 30px;
  border: none;
  background-color: #18c5bd;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  margin-left: 10px;
  } 
  button.edit_btn:hover{
  background-color: #11a59e;
  box-shadow: 2px 2px 3px #ceccccba;
  transition:0.5s;
  } 
  button.Postjob_btn {
  padding: 5px 35px;
  border-radius: 30px;
  border: none;
  background-color: #18c5bd;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  margin-left:10px;
  }
  button.Postjob_btn:hover{
  background-color: #11a59e;
  box-shadow: 2px 2px 3px #ceccccba;
  transition:0.5s;
  } 
  .preview_btns {
  text-align: end;
  margin: 20px 0px 0px 0px;
  }
  li.right-title_seperate {
  margin-left: 58px;
  }
  span.select2-results {
  margin-top: 30px;
  }
  p.right-title_detail {
  white-space: pre-wrap;
  }
</style>
<div class="container-fluid main-d">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <div class="col-md-9">
        <div class="card">
          <div class="section lb">
            <div class="container">
              <div class="row">
                <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
                <div class="content col-md-9">
                  <div class="job-header">
                    <div class="contentbox">
                      <!-- Header -->
                      <center>
                        <h4 style="color:#b6bc00;">Resume</h4>
                      </center>
                      <br/><br/>
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
                  </div>
                  <!-- end post-padding -->
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->  
            </div>
            <!-- end container -->
          </div>
          <!-- end section -->
        </div>
      </div>
    </div>
  </div>
</div>