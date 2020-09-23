<?php 
  $this->load->view('fontend/layout/new_seeker_header.php');
  
  ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/calender.css">
<style>
  .nav-tabs{border-bottom:solid 1px #48827f30 !important;}
  .edit{float: right;font-size:12px;cursor: pointer;margin-right:15px;font-size:14px;font-weight:700;padding:2px 10px;border-radius:13px;}
  .edit:hover{background-color:#ececec;padding:2px 10px;border-radius:13px;}
  li.bullet {
  margin-bottom: 13px;
  padding-bottom: 10px;
  background-color: aliceblue;    
  padding: 20px 10px;
  list-style-type: none;
  margin-left: -40px;
  border-radius: 3px;
  font-size: 18px;
  margin-bottom: 10px;
  padding-bottom: 10px;
  }
  .nav-tabs>li {
  margin-right: 20px;
  width: 129px;
  text-align: center;
  border: solid 2px #18c5bd;
  border-radius: 30px;    
  }
  .nav>li>a {
  position: relative;
  display: block;
  padding:6px 15px !important;
  color: #18c5bd;       
  font-size: 12px;
  }
  ul#select2-dept_id-results {
  margin-top: 30px;
  }
  input.select2-search__field {
  display: inline-block;
  border-radius: 0px;
  }
  label {
  font-weight: 100;
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
  .icon-info {
    margin-left: 40px;
    margin-bottom: 20px;
}
.jobinfolist li h4 {
    font-size: 12px;
    display: inline-block;
    font-weight: 700;
    width: 40%;
    float: left;
}
.jobinfolist li strong {
    color: #747575;
    font-weight: 400;
    font-size: 13px;
    float: left;
    width: 54%;
    line-height: 18px;
    margin-top: 7px;
    /* margin-left: 179px; */
}
</style>
<!---header end--->
<div class="container-fluid">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
      <?php  $job_seeker=$this->session->userdata('job_seeker_id'); 
        $activetab = $this->session->userdata('activetab');
        ?>
      <div class="col-md-9 profile-section" style="border-radius:13px;margin-top:83px;">
        <div class="profile-tabs">
          <ul class="nav nav-tabs profile-nav ">
            <li <?php if ($activetab == 'update_personalinfo') {
              ?> class="active" <?php } ?> ><a data-toggle="tab" href="#home">My Profile</a></li>
            <li <?php if ($activetab == 'update_skills') {
              ?> class="active" <?php
              } ?> ><a data-toggle="tab" href="#menu5">Education</a></li>
            <li><a data-toggle="tab" href="#menu2">Skills</a></li>
            <li><a data-toggle="tab" href="#menu3">Work Experience</a></li>
            <li><a data-toggle="tab" href="#menu4">Certs & Trainning</a></li>
          </ul>
        </div>
        <div class="tab-content">
          <div id="menu2" class="tab-pane fade">
            <div class="education_header" style="position:relative;">
              <img src="https://www.sassm.in/education/images/blog-header.jpg" style="width:100%;position:relative;height:65px;">
              <div class="icon-education" style="position:absolute;bottom:23px;right:53%;">
                <i class="fas fa-graduation-cap edu-i"></i>
              </div>
            </div>
            <ul>
              <?php  $designation = $this->Master_model->getMaster('designation',$where=false);
                $department = $this->Master_model->getMaster('department',$where=false); ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" data-keyboard="true" data-target="#myModal25">skills</a>
                <div class="modal fade" id="myModal25" tabindex='-1' role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Skills</h4>
                      </div>
                      <div class="modal-body">
                        <form id="Updateskill-info" class="form-horizontal allowalphabates" action="<?php echo base_url('job_seeker/update_skills');?>" method="post" style="padding: 30px;">
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Skills:</label>
                            <div class="col-sm-9">
                              <input type="text" name="skills" class="form-control" id="tokenfield" placeholder="Enter Your Skills"
                                value="<?php  
                                  if(!empty($js_skills)){
                                    $skill="";
                                    for($i=0;$i<sizeof($js_skills);$i++){
                                      if($i==0){
                                      $skill=$skill.$js_skills[$i]['skills'];
                                      }else{
                                        $skill=$skill.','.$js_skills[$i]['skills'];
                                      }
                                    }
                                    echo $skill;
                                  }
                                               ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal25"><i class="fa fa-plus" aria-hidden="true"></i></a></span>  
              </li>
            </ul>
            <div class="col-md-12 bd-2">
              <?php 
                $js_skills = $this->Master_model->getMaster('job_seeker_skills',$where_skill);
                 
                
                        if (!empty($js_skills)):
                      
                      ?>
              <div class="invi-div">
                <div class="info-invitation">
                  <span style="float: right;font-size:12px;cursor: pointer;"> <a href="#" data-toggle="modal" data-target="#Updateskills" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </span>
                  <p>Skills: <?php  
                    if(!empty($js_skills)){
                      $skill="";
                      for($i=0;$i<sizeof($js_skills);$i++){
                        if($i==0){
                        $skill=$skill.$js_skills[$i]['skills'];
                        }else{
                          $skill=$skill.','.$js_skills[$i]['skills'];
                        }
                      }
                      echo $skill;
                    }
                    ?></p>
                  <!-- <button class="apply-invi">Apply Now</button> -->
                </div>
                <div class="clear"></div>
              </div>
              <?php else : ?> 
              <div>
                <strong>There is no data to display</strong>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div id="Updateskills" class="modal fade" tabindex='-1' role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Update Skills</h4>
                </div>
                <div class="modal-body">
                  <form id="Updateskill-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_skills');?>" method="post" style="padding: 30px;">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Skills:</label>
                      <div class="col-sm-9">
                        <input type="text" name="skills" class="form-control" id="tokenfield" placeholder="Enter Your Skills"
                          value="<?php  
                            if(!empty($js_skills)){
                              $skill="";
                              for($i=0;$i<sizeof($js_skills);$i++){
                                if($i==0){
                                $skill=$skill.$js_skills[$i]['skills'];
                                }else{
                                  $skill=$skill.','.$js_skills[$i]['skills'];
                                }
                              }
                              echo $skill;
                            }
                                         ?>">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="menu5" class="tab-pane fade">
            <div class="education_header" style="position:relative;">
              <img src="https://www.sassm.in/education/images/blog-header.jpg" style="width:100%;position:relative;height:65px;">
              <div class="icon-education" style="position:absolute;bottom:23px;right:53%;">
                <i class="fas fa-graduation-cap edu-i"></i>
              </div>
            </div>
            <ul style="margin-top:50px;">
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '1';
                 $education_data = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                $where['edu_level_id'] = '1';
                $phdspecial = $this->Master_model->getMaster('education_specialization',$where);
                ?>
              <li class="bullet">
                <a href="#" value='1' id="ed" <?php if (isset($education_data) && empty($education_data)) { ?> style="color: red;"
                  <?php  } ?> data-toggle="modal" data-target="#myModal">Ph.d / Doctorate</a>
                <div class="modal fade" id="myModal" tabindex='-1' role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button"   class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ph.d / Doctorate</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
                          <input type="hidden" name="js_education_id" value="<?php echo $education_data[0]->js_education_id; ?>">
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Education <span class="required">*</span></label>
                              <select name="education_level_id" id="edu_id" class="form-control department select2" >
                                <option value="">Select</option>
                                <option value="1">Ph.D / Doctorate</option>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Specialization <span class="required">*</span></label>
                              <select name="specialization_id" id="specialize_id" class="form-control department select2">
                                <option value="">Select</option>
                                <?php foreach($phdspecial as $edu_special){?>
                                <option value="<?php echo $edu_special['id']; ?>"<?php if(!empty($education_data)) if($education_data[0]->specialization_id==$edu_special['id']) echo "selected";?>><?php echo $edu_special['education_specialization']; ?></option>
                                <?php } ?>
                                <!-- <option value="6">Computer SC.</option> -->
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">University / Name of Institution <span class="required">*</span></label>
                              <input type="text" name="js_institute_name" class="form-control allowalphabates" id="js_institute_name" placeholder="Enter Institute Name" required value="<?php if(!empty($education_data)) echo $education_data[0]->js_institute_name; ?>">
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Course Type <span class="required">*</span></label>
                              <?php foreach($course as $courses){?>
                              <input type="radio" name="education_type_id" required id="education_type_id" value="<?php echo $courses['education_type_id']; ?>"<?php if(!empty($education_data)) if($education_data[0]->education_type_id==$courses['education_type_id']) echo "checked";?> style="margin: 0 1px;"> <?php echo $courses['education_type']; ?>
                              <?php } ?>                    
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="pwd">Year of Completion <span class="required">*</span></label>
                              <select name="js_year_of_passing" id="comp" class="form-control" required="">
                                <?php
                                  $currently_selected = date('Y'); 
                                  $earliest_year = 1940; 
                                  $latest_year = date('Y'); 
                                  foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                  ?>
                                <option value="<?php echo $i; ?>"<?php if(!empty($education_data)) if($education_data[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Score <span class="required">*</span></label>
                              <input type="text" name="js_resut" class="form-control allownumericwithoutdecimal" placeholder="Enter Score" value="<?php if(!empty($education_data)) echo $education_data[0]->js_resut; ?>" onkeypress="javascript:return isNumber1(event)" required>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" value='1' onclick="get_specialization(this.value);"  data-target="#myModal">Edit</a></span> 
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '2';
                 $education_data2 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                $where['edu_level_id'] = '2';
                $pgdspecial = $this->Master_model->getMaster('education_specialization',$where);
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data2) && empty($education_data2)) { ?> style="color: red;"
                  <?php  } ?>  data-target="#myModal1">Masters / Post-Graduation</a>
                <div class="modal fade" id="myModal1" tabindex='-1' role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Masters / Post-Graduation</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <div class="modal-body education_frm">
                          <form id="Masters" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
                            <input type="hidden" name="js_education_id" value="<?php echo $education_data2[0]->js_education_id; ?>">
                            <div class="form-group">
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                                <label class="control-label" for="email">Education <span class="required">*</span></label>
                                <select name="education_level_id" id="educ_id" class="form-control department select2" >
                                  <option value="">Select</option>
                                  <option value="2">Masters/Post-Graduation</option>
                                </select>
                              </div>
                              <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                                <label class="control-label" for="email">Specialization <span class="required">*</span></label>
                                <select name="specialization_id" id="spec_id" class="form-control department select2" >
                                  <option value="">Select</option>
                                  <option value="">Select One</option>
                                  <?php foreach($pgdspecial as $edu_special){?>
                                  <option value="<?php echo $edu_special['id']; ?>"<?php if(!empty($$education_data2)) if($$education_data2[0]->specialization_id==$edu_special['id']) echo "selected";?>><?php echo $edu_special['education_specialization']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                                <label class="control-label" for="email">University / Name of Institution <span class="required">*</span></label>
                                <input type="text" name="js_institute_name" class="form-control allowalphabates" id="js_institute_name" placeholder="Enter Institute Name"  value="<?php if(!empty($education_data)) echo $education_data2[0]->js_institute_name; ?>">
                              </div>
                              <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                                <label class="control-label" for="email">Course Type <span class="required">*</span></label>
                                <?php foreach($course as $courses){?>
                                <input type="radio" name="education_type_id" required id="education_type_id" value="<?php echo $courses['education_type_id']; ?>"<?php if(!empty($education_data2)) if($education_data2[0]->education_type_id==$courses['education_type_id']) ;?> style="margin: 0 1px;"> <?php echo $courses['education_type']; ?>
                                <?php } ?>                   
                              </div>
                              <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                                <label class="control-label" for="pwd">Year of Completion <span class="required">*</span></label>
                                <select name="js_year_of_passing" id="ddl_id" class="form-control department select2" required="">
                                  <option value="">Select Completion Year</option>
                                  <?php
                                    $currently_selected = date('Y'); 
                                    $earliest_year = 1940; 
                                    $latest_year = date('Y'); 
                                    foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                    ?>
                                  <option value="<?php echo $i; ?>"<?php if(!empty($education_data2)) if($education_data2[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-sm-1"></div>
                            </div>
                            <!--  <div class="form-group">
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                              <label class="control-label" for="email">Grading System</label>
                               <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
                                 <option value="">Select Grading System</option>
                                 <option value="Scale 10 Grading System">Scale 10 Grading System</option>
                                 <option value="Scale 4 Grading System">Scale 4 Grading System</option>
                                 <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
                                 <option value="Course Requires a Pass">Course Requires a Pass</option>
                               </select>
                              </div>
                              <div class="col-sm-1"></div>
                              </div> -->
                            <!-- <div class="form-group" id="comp_name" style="display:none;"> -->
                            <div class="form-group">
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                                <label class="control-label" for="email">Score <span class="required">*</span></label>
                                <input type="text" name="js_resut" class="form-control allownumericwithoutdecimal" placeholder="Enter Score" value="<?php if(!empty($education_data2)) echo $education_data2[0]->js_resut; ?>" onkeypress="javascript:return isNumber1(event)" required>
                              </div>
                              <div class="col-sm-1"></div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal1">Edit</a></span>  
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '3';
                 $education_data3 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                  $where['edu_level_id'] = '3';
                $gddspecial = $this->Master_model->getMaster('education_specialization',$where);
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data3) && empty($education_data3)) { ?> style="color: red;"
                  <?php  } ?> data-target="#myModal2">Graduation / Diploma</a>
                <div class="modal fade" tabindex='-1' id="myModal2" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Graduation / Diploma</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <form id="Graduation" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
                          <input type="hidden" name="js_education_id" value="<?php echo $education_data3[0]->js_education_id; ?>">
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Education <span class="required">*</span></label>
                              <select name="education_level_id" id="edu_lev_id" class="form-control department select2" required="">
                                <option value="">Select</option>
                                <option value="3">Graduation/Diploma</option>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Specialization <span class="required">*</span></label>
                              <select name="specialization_id" id="specialization_id" class="form-control department select2">
                                <option value="">Select</option>
                                <?php foreach($gddspecial as $edu_special){?>
                                <option value="<?php echo $edu_special['id']; ?>"<?php if(!empty($education_data3)) if($education_data3[0]->specialization_id==$edu_special['id']) echo "selected";?>><?php echo $edu_special['education_specialization']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">University&emsp;/&emsp;Name of Institution <span class="required">*</span></label>
                              <input type="text" name="js_institute_name" class="form-control allowalphabates" id="js_institute_name" placeholder="Enter Institute Name" required value="<?php if(!empty($education_data3)) echo $education_data3[0]->js_institute_name; ?>">
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Course Type <span class="required">*</span></label>
                              <?php foreach($course as $courses){?>
                              <input type="radio" name="education_type_id" required id="education_type_id" value="<?php echo $courses['education_type_id']; ?>"<?php if(!empty($education_data3)) if($education_data3[0]->education_type_id==$courses['education_type_id']) echo "checked";?> style="margin: 0 1px;"> <?php echo $courses['education_type']; ?>
                              <?php } ?>                    
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="pwd">Year of Completion <span class="required">*</span></label>
                              <select name="js_year_of_passing" id="ddly" class="form-control department select2" required="">
                                <option value="">Select Completion Year</option>
                                <?php
                                  $currently_selected = date('Y'); 
                                  $earliest_year = 1940; 
                                  $latest_year = date('Y'); 
                                  foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                  ?>
                                <option value="<?php echo $i; ?>"<?php if(!empty($education_data3)) if($education_data3[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <!--  <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                            <label class="control-label" for="email">Grading System</label>
                             <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
                               <option value="">Select Grading System</option>
                               <option value="Scale 10 Grading System">Scale 10 Grading System</option>
                               <option value="Scale 4 Grading System">Scale 4 Grading System</option>
                               <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
                               <option value="Course Requires a Pass">Course Requires a Pass</option>
                             </select>
                            </div>
                            <div class="col-sm-1"></div>
                            </div> -->
                          <!-- <div class="form-group" id="comp_name" style="display:none;"> -->
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Score <span class="required">*</span></label>
                              <input type="text" name="js_resut" class="form-control allownumericwithoutdecimal" placeholder="Enter Score" value="<?php if(!empty($education_data3)) echo $education_data3[0]->js_resut; ?>" onkeypress="javascript:return isNumber1(event)" required>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal2">Edit</a></span>  
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '4';
                 $education_data4 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                // print_r($education_data);die;
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data4) && empty($education_data4)) { ?> style="color: red;"
                  <?php  } ?> data-target="#myModal3">12th</a>
                <div class="modal fade" tabindex='-1' id="myModal3" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">12th</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <form id="twelfth" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
                          <input type="hidden" name="js_education_id" value="<?php echo $education_data4[0]->js_education_id; ?>">
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Education <span class="required">*</span></label>
                              <select name="education_level_id" id="edu_lev_id" class="form-control department select2" >
                                <option value="">Select</option>
                                <option value="4">12th</option>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="pwd">Year of Completion <span class="required">*</span></label>
                              <select name="js_year_of_passing" id="ddlyr" class="form-control department select2" required="">
                                <option value="">Select Completion Year</option>
                                <?php
                                  $currently_selected = date('Y'); 
                                  $earliest_year = 1940; 
                                  $latest_year = date('Y'); 
                                  foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                  ?>
                                <option value="<?php echo $i; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Board <span class="required">*</span></label>
                              <select name="board_id" id="brd_id" class="form-control">
                                <option value="">Select Board</option>
                                <!-- <option value="1">CBSE</option>
                                  <option value="2">CISCE(ICSE/ISC)</option>
                                  <option value="3">Diploma</option>
                                  <option value="4">National Open School</option>
                                  <option value="7">IB(International Baccalaureate)</option> -->
                                <?php foreach($schoolboard as $boards){?>
                                <option value="<?php echo $boards['schoolboard_id']; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->board_id==$boards['schoolboard_id']) echo "selected";?>><?php echo $boards['schoolboard_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">School Medium <span class="required">*</span></label>
                              <select name="schoolmedium_id" id="schmed_id" class="form-control department select2">
                                <option value="">Select</option>
                                <?php foreach($schoolmedium as $medium){?>
                                <option value="<?php echo $medium['schoolmedium_id']; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->schoolmedium_id==$medium['schoolmedium_id']) echo "selected";?>><?php echo $medium['school_medium']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Total Score <span class="required">*</span></label>
                              <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control allownumericwithoutdecimal" value="<?php if(!empty($education_data4)) echo $education_data4[0]->totalmarks_id; ?>" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a  href="#" data-toggle="modal" data-target="#myModal3">Edit</a></span> 
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '5';
                 $education_data5 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                // print_r($education_data);die;
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data5) && empty($education_data5)) { ?> style="color: red;"
                  <?php  } ?> data-target="#myModal4">10th</a>
                <div class="modal fade" tabindex='-1' id="myModal4" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">10th</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <form id="tenth" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
                          <input type="hidden" name="js_education_id" value="<?php echo $education_data5[0]->js_education_id; ?>">
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Education <span class="required">*</span></label>
                              <select name="education_level_id" id="education_id" class="form-control department select2" required="">
                              <!--<select name="education_level_id" id="education_level_id" class="form-control department select2" required="">-->
                                <option value="">Select</option>
                                <option value="5">10th</option>  
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="pwd">Year of Completion <span class="required">*</span></label>
                              <select name="js_year_of_passing" id="year_id" class="form-control department select2" required="">
                              <!--<select name="js_year_of_passing" id="ddlYear" class="form-control department select2" required="">-->
                                <option value="">Select Completion Year</option>
                                <?php
                                  $currently_selected = date('Y'); 
                                  $earliest_year = 1940; 
                                  $latest_year = date('Y'); 
                                  foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                  ?>
                                <option value="<?php echo $i; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Board <span class="required">*</span></label>
                              <select name="board_id" id="board_id" class="form-control department select2">
                                <option value="">Select Board</option>
                                <?php foreach($schoolboard as $boards){?>
                                <option value="<?php echo $boards['schoolboard_id']; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->board_id==$boards['schoolboard_id']) echo "selected";?>><?php echo $boards['schoolboard_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">School Medium <span class="required">*</span></label>
                              <select name="schoolmedium_id" id="schoolmedium_id" class="form-control department select2">
                                <option value="">Select Medium</option>
                                <?php foreach($schoolmedium as $medium){?>
                                <option value="<?php echo $medium['schoolmedium_id']; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->schoolmedium_id==$medium['schoolmedium_id']) echo "selected";?>><?php echo $medium['school_medium']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Total Score <span class="required">*</span></label>
                              <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control allownumericwithoutdecimal" value="<?php if(!empty($education_data5)) echo $education_data5[0]->totalmarks_id; ?>" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal4">Edit</a></span>  
              </li>
            </ul>
          </div>
          <div id="home" class="tab-pane fade in active">
            <div class="header-p-img" style="position:relative;">
              <img src="https://www.sassm.in/education/images/blog-header.jpg" style="width:100%; height:140px;position:relative;margin-bottom:140px;">
             
              <?php  $job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id); ?>
            
              <form id="profile-info" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url('job_seeker/save_profile_details');?>" method="post" style="padding: 30px;"  >
                <div class="text-center" style="position:absolute;top:50px;left:-50px;">
                  <img src="<?php echo base_url() ?>upload/<?php if(!empty($job_seeker_photo->photo_path)) { echo $job_seeker_photo->photo_path;} else { echo "image-notfound.png";} ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                  <h6>Upload a different photo...</h6>
                  <input type="file" class="text-center center-block file-upload" name="js_photo">
                </div>
             
                <div class="row">
                  <span class="edit"><a href="#" data-toggle="modal" data-target="#myModal50">Edit</a></span> 
                </div>
               
                <div  class="icon-info">
                <li class="left-icon-title"><i class="fa fa-envelope"></i></li>
                <li class="right-icon-title"> &emsp;<?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?></li>
               <li class="left-icon-title"><i class="fa fa-phone-alt"></i></li>
                <li class="right-icon-title"> &emsp; <strong>: <?php echo $js_personal_info->country_code.'- '.$js_personal_info->mobile; ?></strong></li>
                <!-- <li class="left-icon-title"><i class="fa fa-envelope"></i></li>
                <li class="right-icon-title"> &emsp; <strong>: <?php echo $js_personal_info->country_code.'- '.$js_personal_info->mobile; ?></strong></li> -->
                  </div><br>
                   <div class="row">
                  <div class="col-md-6">
                    <ul class="jobinfolist">
                     
                      <li>
                        <h4>Date of Birth</h4>
                        <strong>: <?php if($js_personal_info->date_of_birth=="0000-00-00") {
                          echo "";
                          } else {
                              echo date('d-m-Y',strtotime($js_personal_info->date_of_birth)); 
                              if($js_personal_info->dob_visiblity=="Yes") {
                                echo "  (Birthday not visible to my network)";
                              }else{
                                echo "  (Birthday visible to my network)";
                              }
                          }
                          ?></strong>
                      </li>
                    
                      <li>
                        <h4>Alternate phone no</h4>
                        <strong>: <?php echo $js_personal_info->alternatecountry_code.'- '.$js_personal_info->alternatemobile; ?></strong>
                      </li>
                       <li>
                        <h4>My Tagline</h4>
                        <strong>: <?php if(!empty($js_personal_info->resume_title))
                          echo $js_personal_info->resume_title; ?></strong>
                      </li>
                    <li>
                        <h4>Website</h4>
                        <strong>: <?php if(!empty($js_personal_info->website))
                          echo $js_personal_info->website; ?></strong>
                      </li>
                     
                     
                    </ul>
                  </div>
                 
                  <div class="col-md-6">
                    <ul class="jobinfolist">
                        <li>
                        <h4>Marital Status</h4>
                        <strong>: <?php if(!empty($js_personal_info->marital_status))
                          echo $js_personal_info->marital_status; ?></strong>
                      </li>
                    <li>
                        <h4>Work premit for USA</h4>
                        <strong>: <?php if(!empty($js_personal_info->work_permit_usa))
                          echo $js_personal_info->work_permit_usa; ?></strong>
                      </li>
                      <li>
                        <h4>Work premit for Other Country</h4>
                        <strong>: <?php if(!empty($js_personal_info->work_permit_countries))
                          echo $js_personal_info->work_permit_countries; ?></strong>
                      </li>
                    </ul>
                  </div>
                </div><br>

                      <h4>Address:</h4>
                        <strong><?php echo $js_personal_info->present_address; ?> , <?php echo $js_personal_info->city_name; ?> , <?php echo $js_personal_info->state_name; ?> , <?php echo $js_personal_info->country_name; ?></strong>
                        <br>
                    
                <div class="row">
                  <div class="col-md-6">
                    <div class="uplode-resume">
                      <label for="avatarInput">Upload Resume</label>
                      <input type="file" class="form-control" id="txt_resume" name="txt_resume" style="    min-width: 80%;" >
                      <input type="hidden" class="form-control" id="" name="oldresume" value="<?php if(!empty($job_seeker_resume['resume'])){echo $job_seeker_resume['resume'];} ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="avatarInput">Current Resume</label><br><br>
                    <?php if(!empty($job_seeker_resume['resume'])) { ?>
                    <span><a href="<?php echo  base_url(); ?>upload/Resumes/<?php if(!empty($job_seeker_resume['resume'])){echo $job_seeker_resume['resume'];} ?>" title='Download Your Attached Resume' download><?php if(!empty($job_seeker_resume['resume'])){echo $job_seeker_resume['resume'];} ?></a></span>
                    <?php } else{ ?>
                    <span>No Resume </span>
                    <?php  } ?>
                  </div>
                </div>
                <div class="Profile-summery">
                  <h4>Profile summery</h4>
                  <textarea name="profile_summary" id="profile_summary" class="form-control" placeholder="Profile Summary" rows="5"></textarea>
                  <p>Add or link to external documents, photos, sites, videos, and presentations.</p>
                </div>
                <div class="col-md-12 resume-link">
                  <div class="col-md-6">
                    <label for="avatarInput">Upload Media</label>
                    <input type="file" class="form-control" id="txt_media" name="txt_media">
                    <input type="hidden" class="form-control" id="" name="oldmedia" value="">
                    <p style="font-size:12px;margin-top:10px;">Supported Formats: doc, docx, rtf, pdf, gif, jpg, png, ppt, pps, pptx, ppsx, pot, potx, upto 100 MB</p>
                    <br>
                  </div>
                  <div class="col-md-6">
                    <label for="avatarInput">Media Link</label>
                    <input type="text" class="form-control" id="txt_link" name="txt_link" value="">
                  </div>
                  <button class="save-apply-btn">save</button>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade" tabindex='-1' id="myModal50" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Personal Information</h4>
                </div>
                <div class="modal-body">
                  <form id="js" class="form-horizontal " action="<?php echo base_url('job_seeker/update_personalinfo');?>" method="post" style="padding: 30px;">
                   <input type="hidden" value="<?php echo $js_personal_info->job_personal_info_id; ?>" name="js_personal_info_id">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control allowalphabates" id="edit_company_profile_id"  name="full_name" value="<?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?>"  >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Date of Birth <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="dob" id="dob" value="<?php echo date('d-m-Y', strtotime($js_personal_info->date_of_birth));?>" placeholder="DD-MM-YYYY">
                        <input type="checkbox" required name="dobmake_public" value="No"<?php if($js_personal_info->dob_visiblity=='No') {echo 'checked'; }else{}?>  > Birthday not visible to my network
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Primary Phone No:</label>
                      <div class="col-sm-9">
                        <div class="col-md-12">
                          <div class="col-md-6">
                            
                         
                          <select id="country" name="country_code" class="form-control department select2" tabindex="-1" aria-hidden="true">
                            <!-- <option value="">Select</option> -->
                            <option><?php echo $js_personal_info->country_code?></option>
                            <option value="AD - Andorra (+376)">AD - Andorra (+376)</option>
                            <option value="AE - United Arab Emirates (+971)">AE - United Arab Emirates (+971)</option>
                            <option value="AF - Afghanistan (+93)">AF - Afghanistan (+93)</option>
                            <option value="AG - Antigua And Barbuda (+1268)">AG - Antigua And Barbuda (+1268)</option>
                            <option value="AI - Anguilla (+1264)">AI - Anguilla (+1264)</option>
                            <option value="AL - Albania (+355)">AL - Albania (+355)</option>
                            <option value="AM - Armenia (+374)">AM - Armenia (+374)</option>
                            <option value="AN - Netherlands Antilles (+599)">AN - Netherlands Antilles (+599)</option>
                            <option value="AO - Angola (+244)">AO - Angola (+244)</option>
                            <option value="AQ - Antarctica (+672)">AQ - Antarctica (+672)</option>
                            <option value="AR - Argentina (+54)">AR - Argentina (+54)</option>
                            <option value="AS - American Samoa (+1684)">AS - American Samoa (+1684)</option>
                            <option value="AT - Austria (+43)">AT - Austria (+43)</option>
                            <option value="AU - Australia (+61)">AU - Australia (+61)</option>
                            <option value="AW - Aruba (+297)">AW - Aruba (+297)</option>
                            <option value="AZ - Azerbaijan (+994)">AZ - Azerbaijan (+994)</option>
                            <option value="BA - Bosnia And Herzegovina (+387)">BA - Bosnia And Herzegovina (+387)</option>
                            <option value="BB - Barbados (+1246)">BB - Barbados (+1246)</option>
                            <option value="BD - Bangladesh (+880)">BD - Bangladesh (+880)</option>
                            <option value="BE - Belgium (+32)">BE - Belgium (+32)</option>
                            <option value="BF - Burkina Faso (+226)">BF - Burkina Faso (+226)</option>
                            <option value="BG - Bulgaria (+359)">BG - Bulgaria (+359)</option>
                            <option value="BH - Bahrain (+973)">BH - Bahrain (+973)</option>
                            <option value="BI - Burundi (+257)">BI - Burundi (+257)</option>
                            <option value="BJ - Benin (+229)">BJ - Benin (+229)</option>
                            <option value="BL - Saint Barthelemy (+590)">BL - Saint Barthelemy (+590)</option>
                            <option value="BM - Bermuda (+1441)">BM - Bermuda (+1441)</option>
                            <option value="BN - Brunei Darussalam (+673)">BN - Brunei Darussalam (+673)</option>
                            <option value="BO - Bolivia (+591)">BO - Bolivia (+591)</option>
                            <option value="BR - Brazil (+55)">BR - Brazil (+55)</option>
                            <option value="BS - Bahamas (+1242)">BS - Bahamas (+1242)</option>
                            <option value="BT - Bhutan (+975)">BT - Bhutan (+975)</option>
                            <option value="BW - Botswana (+267)">BW - Botswana (+267)</option>
                            <option value="BY - Belarus (+375)">BY - Belarus (+375)</option>
                            <option value="BZ - Belize (+501)">BZ - Belize (+501)</option>
                            <option value="CA - Canada (+1)">CA - Canada (+1)</option>
                            <option value="CC - Cocos (keeling) Islands (+61)">CC - Cocos (keeling) Islands (+61)</option>
                            <option value="CD - Congo, The Democratic Republic Of The (+243)">CD - Congo, The Democratic Republic Of The (+243)</option>
                            <option value="CF - Central African Republic (+236)">CF - Central African Republic (+236)</option>
                            <option value="CG - Congo (+242)">CG - Congo (+242)</option>
                            <option value="CH - Switzerland (+41)">CH - Switzerland (+41)</option>
                            <option value="CI - Cote D Ivoire (+225)">CI - Cote D Ivoire (+225)</option>
                            <option value="CK - Cook Islands (+682)">CK - Cook Islands (+682)</option>
                            <option value="CL - Chile (+56)">CL - Chile (+56)</option>
                            <option value="CM - Cameroon (+237)">CM - Cameroon (+237)</option>
                            <option value="CN - China (+86)">CN - China (+86)</option>
                            <option value="CO - Colombia (+57)">CO - Colombia (+57)</option>
                            <option value="CR - Costa Rica (+506)">CR - Costa Rica (+506)</option>
                            <option value="CU - Cuba (+53)">CU - Cuba (+53)</option>
                            <option value="CV - Cape Verde (+238)">CV - Cape Verde (+238)</option>
                            <option value="CX - Christmas Island (+61)">CX - Christmas Island (+61)</option>
                            <option value="CY - Cyprus (+357)">CY - Cyprus (+357)</option>
                            <option value="CZ - Czech Republic (+420)">CZ - Czech Republic (+420)</option>
                            <option value="DE - Germany (+49)">DE - Germany (+49)</option>
                            <option value="DJ - Djibouti (+253)">DJ - Djibouti (+253)</option>
                            <option value="DK - Denmark (+45)">DK - Denmark (+45)</option>
                            <option value="DM - Dominica (+1767)">DM - Dominica (+1767)</option>
                            <option value="DO - Dominican Republic (+1809)">DO - Dominican Republic (+1809)</option>
                            <option value="DZ - Algeria (+213)">DZ - Algeria (+213)</option>
                            <option value="EC - Ecuador (+593)">EC - Ecuador (+593)</option>
                            <option value="EE - Estonia (+372)">EE - Estonia (+372)</option>
                            <option value="EG - Egypt (+20)">EG - Egypt (+20)</option>
                            <option value="ER - Eritrea (+291)">ER - Eritrea (+291)</option>
                            <option value="ES - Spain (+34)">ES - Spain (+34)</option>
                            <option value="ET - Ethiopia (+251)">ET - Ethiopia (+251)</option>
                            <option value="FI - Finland (+358)">FI - Finland (+358)</option>
                            <option value="FJ - Fiji (+679)">FJ - Fiji (+679)</option>
                            <option value="FK - Falkland Islands (malvinas) (+500)">FK - Falkland Islands (malvinas) (+500)</option>
                            <option value="FM - Micronesia, Federated States Of (+691)">FM - Micronesia, Federated States Of (+691)</option>
                            <option value="FO - Faroe Islands (+298)">FO - Faroe Islands (+298)</option>
                            <option value="FR - France (+33)">FR - France (+33)</option>
                            <option value="GA - Gabon (+241)">GA - Gabon (+241)</option>
                            <option value="GB - United Kingdom (+44)">GB - United Kingdom (+44)</option>
                            <option value="GD - Grenada (+1473)">GD - Grenada (+1473)</option>
                            <option value="GE - Georgia (+995)">GE - Georgia (+995)</option>
                            <option value="GH - Ghana (+233)">GH - Ghana (+233)</option>
                            <option value="GI - Gibraltar (+350)">GI - Gibraltar (+350)</option>
                            <option value="GL - Greenland (+299)">GL - Greenland (+299)</option>
                            <option value="GM - Gambia (+220)">GM - Gambia (+220)</option>
                            <option value="GN - Guinea (+224)">GN - Guinea (+224)</option>
                            <option value="GQ - Equatorial Guinea (+240)">GQ - Equatorial Guinea (+240)</option>
                            <option value="GR - Greece (+30)">GR - Greece (+30)</option>
                            <option value="GT - Guatemala (+502)">GT - Guatemala (+502)</option>
                            <option value="GU - Guam (+1671)">GU - Guam (+1671)</option>
                            <option value="GW - Guinea-bissau (+245)">GW - Guinea-bissau (+245)</option>
                            <option value="GY - Guyana (+592)">GY - Guyana (+592)</option>
                            <option value="HK - Hong Kong (+852)">HK - Hong Kong (+852)</option>
                            <option value="HN - Honduras (+504)">HN - Honduras (+504)</option>
                            <option value="HR - Croatia (+385)">HR - Croatia (+385)</option>
                            <option value="HT - Haiti (+509)">HT - Haiti (+509)</option>
                            <option value="HU - Hungary (+36)">HU - Hungary (+36)</option>
                            <option value="ID - Indonesia (+62)">ID - Indonesia (+62)</option>
                            <option value="IE - Ireland (+353)">IE - Ireland (+353)</option>
                            <option value="IL - Israel (+972)">IL - Israel (+972)</option>
                            <option value="IM - Isle Of Man (+44)">IM - Isle Of Man (+44)</option>
                            <option value="IN - India (+91)">IN - India (+91)</option>
                            <option value="IQ - Iraq (+964)">IQ - Iraq (+964)</option>
                            <option value="IR - Iran, Islamic Republic Of (+98">IR - Iran, Islamic Republic Of (+98)</option>
                            <option value="IS - Iceland (+354)">IS - Iceland (+354)</option>
                            <option value="IT - Italy (+39)">IT - Italy (+39)</option>
                            <option value="JM - Jamaica (+1876)">JM - Jamaica (+1876)</option>
                            <option value="JO - Jordan (+962)">JO - Jordan (+962)</option>
                            <option value="JP - Japan (+81)">JP - Japan (+81)</option>
                            <option value="KE - Kenya (+254)">KE - Kenya (+254)</option>
                            <option value="KG - Kyrgyzstan (+996)">KG - Kyrgyzstan (+996)</option>
                            <option value="KH - Cambodia (+855)">KH - Cambodia (+855)</option>
                            <option value="KI - Kiribati (+686)">KI - Kiribati (+686)</option>
                            <option value="KM - Comoros (+269)">KM - Comoros (+269)</option>
                            <option value="KN - Saint Kitts And Nevis (+1869)">KN - Saint Kitts And Nevis (+1869)</option>
                            <option value="KP - Korea Democratic Peoples Republic Of (+850)">KP - Korea Democratic Peoples Republic Of (+850)</option>
                            <option value="KR - Korea Republic Of (+82)">KR - Korea Republic Of (+82)</option>
                            <option value="KW - Kuwait (+965)">KW - Kuwait (+965)</option>
                            <option value="KY - Cayman Islands (+1345)">KY - Cayman Islands (+1345)</option>
                            <option value="KZ - Kazakstan (+7)">KZ - Kazakstan (+7)</option>
                            <option value="LA - Lao Peoples Democratic Republic (+856)">LA - Lao Peoples Democratic Republic (+856)</option>
                            <option value="LB - Lebanon (+961)">LB - Lebanon (+961)</option>
                            <option value="LC - Saint Lucia (+1758)">LC - Saint Lucia (+1758)</option>
                            <option value="LI - Liechtenstein (+423)">LI - Liechtenstein (+423)</option>
                            <option value="LK - Sri Lanka (+94)">LK - Sri Lanka (+94)</option>
                            <option value="LR - Liberia (+231)">LR - Liberia (+231)</option>
                            <option value="LS - Lesotho (+266)">LS - Lesotho (+266)</option>
                            <option value="LT - Lithuania (+370)">LT - Lithuania (+370)</option>
                            <option value="LU - Luxembourg (+352)">LU - Luxembourg (+352)</option>
                            <option value="LV - Latvia (+371)">LV - Latvia (+371)</option>
                            <option value="LY - Libyan Arab Jamahiriya (+218)">LY - Libyan Arab Jamahiriya (+218)</option>
                            <option value="MA - Morocco (+212)">MA - Morocco (+212)</option>
                            <option value="MC - Monaco (+377)">MC - Monaco (+377)</option>
                            <option value="MD - Moldova, Republic Of (+373)">MD - Moldova, Republic Of (+373)</option>
                            <option value="ME - Montenegro (+382)">ME - Montenegro (+382)</option>
                            <option value="MF - Saint Martin (+1599)">MF - Saint Martin (+1599)</option>
                            <option value="MG - Madagascar (+261)">MG - Madagascar (+261)</option>
                            <option value="MH - Marshall Islands (+692)">MH - Marshall Islands (+692)</option>
                            <option value="MK - Macedonia, The Former Yugoslav Republic Of (+389)">MK - Macedonia, The Former Yugoslav Republic Of (+389)</option>
                            <option value="ML - Mali (+223)">ML - Mali (+223)</option>
                            <option value="MM - Myanmar">MM - Myanmar (+95)</option>
                            <option value="MN - Mongolia (+976)">MN - Mongolia (+976)</option>
                            <option value="MO - Macau (+853)">MO - Macau (+853)</option>
                            <option value="MP - Northern Mariana Islands (+1670)">MP - Northern Mariana Islands (+1670)</option>
                            <option value="MR - Mauritania (+222)">MR - Mauritania (+222)</option>
                            <option value="MS - Montserrat (+1664)">MS - Montserrat (+1664)</option>
                            <option value="MT - Malta (+356)">MT - Malta (+356)</option>
                            <option value="MU - Mauritius (+230)">MU - Mauritius (+230)</option>
                            <option value="MV - Maldives (+960)">MV - Maldives (+960)</option>
                            <option value="MW">MV - Maldives (+960)</option>
                            <option value="MX - Mexico (+52)">MX - Mexico (+52)</option>
                            <option value="MY - Malaysia (+60)">MY - Malaysia (+60)</option>
                            <option value="MZ - Mozambique (+258)">MZ - Mozambique (+258)</option>
                            <option value="NA - Namibia (+264)">NA - Namibia (+264)</option>
                            <option value="NC - New Caledonia (+687)">NC - New Caledonia (+687)</option>
                            <option value="NE - Niger (+227)">NE - Niger (+227)</option>
                            <option value="NG - Nigeria (+234)">NG - Nigeria (+234)</option>
                            <option value="NI - Nicaragua (+505)">NI - Nicaragua (+505)</option>
                            <option value="NL - Netherlands (+31)">NL - Netherlands (+31)</option>
                            <option value="NO - Norway (+47)">NO - Norway (+47)</option>
                            <option value="NP - Nepal (+977)">NP - Nepal (+977)</option>
                            <option value="NR - Nauru (+674)">NR - Nauru (+674)</option>
                            <option value="NU - Niue (+683)">NU - Niue (+683)</option>
                            <option value="NZ - New Zealand (+64)">NZ - New Zealand (+64)</option>
                            <option value="OM - Oman (+968)">OM - Oman (+968)</option>
                            <option value="PA - Panama (+507)">PA - Panama (+507)</option>
                            <option value="PE - Peru (+51)">PE - Peru (+51)</option>
                            <option value="PF - French Polynesia (+689)">PF - French Polynesia (+689)</option>
                            <option value="PG - Papua New Guinea (+675)">PG - Papua New Guinea (+675)</option>
                            <option value="PH - Philippines (+63)">PH - Philippines (+63)</option>
                            <option value="PK - Pakistan (+92)">PK - Pakistan (+92)</option>
                            <option value="PL - Poland (+48)">PL - Poland (+48)</option>
                            <option value="PM - Saint Pierre And Miquelon (+508)">PM - Saint Pierre And Miquelon (+508)</option>
                            <option value="PN - Pitcairn (+870)">PN - Pitcairn (+870)</option>
                            <option value="PR - Puerto Rico (+1)">PR - Puerto Rico (+1)</option>
                            <option value="PT - Portugal (+351)">PT - Portugal (+351)</option>
                            <option value="PW - Palau (+680)">PW - Palau (+680)</option>
                            <option value="PY - Paraguay (+595">PY - Paraguay (+595)</option>
                            <option value="QA - Qatar (+974)">QA - Qatar (+974)</option>
                            <option value="RO - Romania (+40)">RO - Romania (+40)</option>
                            <option value="RS - Serbia (+381)">RS - Serbia (+381)</option>
                            <option value="RU - Russian Federation (+7)">RU - Russian Federation (+7)</option>
                            <option value="RW - Rwanda (+250)">RW - Rwanda (+250)</option>
                            <option value="SB - Solomon Islands (+677)">SA - Saudi Arabia (+966)</option>
                            <option value="SB">SB - Solomon Islands (+677)</option>
                            <option value="SC - Seychelles (+248)">SC - Seychelles (+248)</option>
                            <option value="SD - Sudan (+249)">SD - Sudan (+249)</option>
                            <option value="SE - Sweden (+46)">SE - Sweden (+46)</option>
                            <option value="SG - Singapore (+65)">SG - Singapore (+65)</option>
                            <option value="SH - Saint Helena (+290)">SH - Saint Helena (+290)</option>
                            <option value="SI - Slovenia (+386)">SI - Slovenia (+386)</option>
                            <option value="SK - Slovakia (+421)">SK - Slovakia (+421)</option>
                            <option value="SL - Sierra Leone (+232)">SL - Sierra Leone (+232)</option>
                            <option value="SM - San Marino (+378)">SM - San Marino (+378)</option>
                            <option value="SN - Senegal (+221)">SN - Senegal (+221)</option>
                            <option value="SO - Somalia (+252)">SO - Somalia (+252)</option>
                            <option value="SR - Suriname (+597)">SR - Suriname (+597)</option>
                            <option value="ST - Sao Tome And Principe (+239)">ST - Sao Tome And Principe (+239)</option>
                            <option value="SV - El Salvador (+503)">SV - El Salvador (+503)</option>
                            <option value="SY - Syrian Arab Republic (+963)">SY - Syrian Arab Republic (+963)</option>
                            <option value="SZ - Swaziland (+268)">SZ - Swaziland (+268)</option>
                            <option value="TC - Turks And Caicos Islands (+1649)">TC - Turks And Caicos Islands (+1649)</option>
                            <option value="TD - Chad (+235)">TD - Chad (+235)</option>
                            <option value="TG - Togo (+228)">TG - Togo (+228)</option>
                            <option value="TH - Thailand (+66)">TH - Thailand (+66)</option>
                            <option value="TJ - Tajikistan (+992)">TJ - Tajikistan (+992)</option>
                            <option value="TK - Tokelau (+690)">TK - Tokelau (+690)</option>
                            <option value="TL - Timor-leste (+670)">TL - Timor-leste (+670)</option>
                            <option value="TM - Turkmenistan (+993)">TM - Turkmenistan (+993)</option>
                            <option value="TN - Tunisia (+216)">TN - Tunisia (+216)</option>
                            <option value="TO - Tonga (+676)">TO - Tonga (+676)</option>
                            <option value="TR - Turkey (+90)">TR - Turkey (+90)</option>
                            <option value="TT - Trinidad And Tobago (+1868)">TT - Trinidad And Tobago (+1868)</option>
                            <option value="TV - Tuvalu (+688)">TV - Tuvalu (+688)</option>
                            <option value="TW - Taiwan, Province Of China (+886)">TW - Taiwan, Province Of China (+886)</option>
                            <option value="TZ - Tanzania, United Republic Of (+255)">TZ - Tanzania, United Republic Of (+255)</option>
                            <option value="UA - Ukraine (+380)">UA - Ukraine (+380)</option>
                            <option value="UG - Uganda (+256)">UG - Uganda (+256)</option>
                            <option value="US - United States (+1)">US - United States (+1)</option>
                            <option value="UY - Uruguay (+598)">UY - Uruguay (+598)</option>
                            <option value="UZ - Uzbekistan (+998)">UZ - Uzbekistan (+998)</option>
                            <option value="VA - Holy See (vatican City State) (+39)">VA - Holy See (vatican City State) (+39)</option>
                            <option value="VC - Saint Vincent And The Grenadines (+1784)">VC - Saint Vincent And The Grenadines (+1784)</option>
                            <option value="VE - Venezuela (+58)">VE - Venezuela (+58)</option>
                            <option value="VG - Virgin Islands, British (+1284)">VG - Virgin Islands, British (+1284)</option>
                            <option value="VI - Virgin Islands, U.s. (+1340)">VI - Virgin Islands, U.s. (+1340)</option>
                            <option value="VN - Viet Nam (+84)">VN - Viet Nam (+84)</option>
                            <option value="VU - Vanuatu (+678)">VU - Vanuatu (+678)</option>
                            <option value="WF - Wallis And Futuna (+681)">WF - Wallis And Futuna (+681)</option>
                            <option value="WS - Samoa (+685)">WS - Samoa (+685)</option>
                            <option value="XK - Kosovo (+381)">XK - Kosovo (+381)</option>
                            <option value="YE - Yemen (+967)">YE - Yemen (+967)</option>
                            <option value="YT - Mayotte (+262)">YT - Mayotte (+262)</option>
                            <option value="ZA - South Africa (+27)">ZA - South Africa (+27)</option>
                            <option value="ZM - Zambia (+260)">ZM - Zambia (+260)</option>
                            <option value="ZW - Zimbabwe (+263)">ZW - Zimbabwe (+263)</option>
                          </select>
                       </div>
                       <!--  <label class="control-label col-sm-3" for="email"></label> -->
                        <div class="col-md-6">
                          <input name="mobile" type="text"  class="form-control allowphonenumber" required maxlength="10" id="number" value="<?php if (!empty($js_personal_info->mobile)) {
                            echo $js_personal_info->mobile;}
                            ?>">&nbsp;<span id="errmsg"></span>
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Alternate Phone No:</label>
                      <div class="col-sm-9">
                        <div class="col-md-12">
                          <div class="col-md-6">
                          <select id="alt_country" name="alternatecountry_code" class="form-control department select2" >
                            <option><?php echo $js_personal_info->alternatecountry_code?></option>
                            <option value="AD - Andorra (+376)">AD - Andorra (+376)</option>
                            <option value="AE - United Arab Emirates (+971)">AE - United Arab Emirates (+971)</option>
                            <option value="AF - Afghanistan (+93)">AF - Afghanistan (+93)</option>
                            <option value="AG - Antigua And Barbuda (+1268)">AG - Antigua And Barbuda (+1268)</option>
                            <option value="AI - Anguilla (+1264)">AI - Anguilla (+1264)</option>
                            <option value="AL - Albania (+355)">AL - Albania (+355)</option>
                            <option value="AM - Armenia (+374)">AM - Armenia (+374)</option>
                            <option value="AN - Netherlands Antilles (+599)">AN - Netherlands Antilles (+599)</option>
                            <option value="AO - Angola (+244)">AO - Angola (+244)</option>
                            <option value="AQ - Antarctica (+672)">AQ - Antarctica (+672)</option>
                            <option value="AR - Argentina (+54)">AR - Argentina (+54)</option>
                            <option value="AS - American Samoa (+1684)">AS - American Samoa (+1684)</option>
                            <option value="AT - Austria (+43)">AT - Austria (+43)</option>
                            <option value="AU - Australia (+61)">AU - Australia (+61)</option>
                            <option value="AW - Aruba (+297)">AW - Aruba (+297)</option>
                            <option value="AZ - Azerbaijan (+994)">AZ - Azerbaijan (+994)</option>
                            <option value="BA - Bosnia And Herzegovina (+387)">BA - Bosnia And Herzegovina (+387)</option>
                            <option value="BB - Barbados (+1246)">BB - Barbados (+1246)</option>
                            <option value="BD - Bangladesh (+880)">BD - Bangladesh (+880)</option>
                            <option value="BE - Belgium (+32)">BE - Belgium (+32)</option>
                            <option value="BF - Burkina Faso (+226)">BF - Burkina Faso (+226)</option>
                            <option value="BG - Bulgaria (+359)">BG - Bulgaria (+359)</option>
                            <option value="BH - Bahrain (+973)">BH - Bahrain (+973)</option>
                            <option value="BI - Burundi (+257)">BI - Burundi (+257)</option>
                            <option value="BJ - Benin (+229)">BJ - Benin (+229)</option>
                            <option value="BL - Saint Barthelemy (+590)">BL - Saint Barthelemy (+590)</option>
                            <option value="BM - Bermuda (+1441)">BM - Bermuda (+1441)</option>
                            <option value="BN - Brunei Darussalam (+673)">BN - Brunei Darussalam (+673)</option>
                            <option value="BO - Bolivia (+591)">BO - Bolivia (+591)</option>
                            <option value="BR - Brazil (+55)">BR - Brazil (+55)</option>
                            <option value="BS - Bahamas (+1242)">BS - Bahamas (+1242)</option>
                            <option value="BT - Bhutan (+975)">BT - Bhutan (+975)</option>
                            <option value="BW - Botswana (+267)">BW - Botswana (+267)</option>
                            <option value="BY - Belarus (+375)">BY - Belarus (+375)</option>
                            <option value="BZ - Belize (+501)">BZ - Belize (+501)</option>
                            <option value="CA - Canada (+1)">CA - Canada (+1)</option>
                            <option value="CC - Cocos (keeling) Islands (+61)">CC - Cocos (keeling) Islands (+61)</option>
                            <option value="CD - Congo, The Democratic Republic Of The (+243)">CD - Congo, The Democratic Republic Of The (+243)</option>
                            <option value="CF - Central African Republic (+236)">CF - Central African Republic (+236)</option>
                            <option value="CG - Congo (+242)">CG - Congo (+242)</option>
                            <option value="CH - Switzerland (+41)">CH - Switzerland (+41)</option>
                            <option value="CI - Cote D Ivoire (+225)">CI - Cote D Ivoire (+225)</option>
                            <option value="CK - Cook Islands (+682)">CK - Cook Islands (+682)</option>
                            <option value="CL - Chile (+56)">CL - Chile (+56)</option>
                            <option value="CM - Cameroon (+237)">CM - Cameroon (+237)</option>
                            <option value="CN - China (+86)">CN - China (+86)</option>
                            <option value="CO - Colombia (+57)">CO - Colombia (+57)</option>
                            <option value="CR - Costa Rica (+506)">CR - Costa Rica (+506)</option>
                            <option value="CU - Cuba (+53)">CU - Cuba (+53)</option>
                            <option value="CV - Cape Verde (+238)">CV - Cape Verde (+238)</option>
                            <option value="CX - Christmas Island (+61)">CX - Christmas Island (+61)</option>
                            <option value="CY - Cyprus (+357)">CY - Cyprus (+357)</option>
                            <option value="CZ - Czech Republic (+420)">CZ - Czech Republic (+420)</option>
                            <option value="DE - Germany (+49)">DE - Germany (+49)</option>
                            <option value="DJ - Djibouti (+253)">DJ - Djibouti (+253)</option>
                            <option value="DK - Denmark (+45)">DK - Denmark (+45)</option>
                            <option value="DM - Dominica (+1767)">DM - Dominica (+1767)</option>
                            <option value="DO - Dominican Republic (+1809)">DO - Dominican Republic (+1809)</option>
                            <option value="DZ - Algeria (+213)">DZ - Algeria (+213)</option>
                            <option value="EC - Ecuador (+593)">EC - Ecuador (+593)</option>
                            <option value="EE - Estonia (+372)">EE - Estonia (+372)</option>
                            <option value="EG - Egypt (+20)">EG - Egypt (+20)</option>
                            <option value="ER - Eritrea (+291)">ER - Eritrea (+291)</option>
                            <option value="ES - Spain (+34)">ES - Spain (+34)</option>
                            <option value="ET - Ethiopia (+251)">ET - Ethiopia (+251)</option>
                            <option value="FI - Finland (+358)">FI - Finland (+358)</option>
                            <option value="FJ - Fiji (+679)">FJ - Fiji (+679)</option>
                            <option value="FK - Falkland Islands (malvinas) (+500)">FK - Falkland Islands (malvinas) (+500)</option>
                            <option value="FM - Micronesia, Federated States Of (+691)">FM - Micronesia, Federated States Of (+691)</option>
                            <option value="FO - Faroe Islands (+298)">FO - Faroe Islands (+298)</option>
                            <option value="FR - France (+33)">FR - France (+33)</option>
                            <option value="GA - Gabon (+241)">GA - Gabon (+241)</option>
                            <option value="GB - United Kingdom (+44)">GB - United Kingdom (+44)</option>
                            <option value="GD - Grenada (+1473)">GD - Grenada (+1473)</option>
                            <option value="GE - Georgia (+995)">GE - Georgia (+995)</option>
                            <option value="GH - Ghana (+233)">GH - Ghana (+233)</option>
                            <option value="GI - Gibraltar (+350)">GI - Gibraltar (+350)</option>
                            <option value="GL - Greenland (+299)">GL - Greenland (+299)</option>
                            <option value="GM - Gambia (+220)">GM - Gambia (+220)</option>
                            <option value="GN - Guinea (+224)">GN - Guinea (+224)</option>
                            <option value="GQ - Equatorial Guinea (+240)">GQ - Equatorial Guinea (+240)</option>
                            <option value="GR - Greece (+30)">GR - Greece (+30)</option>
                            <option value="GT - Guatemala (+502)">GT - Guatemala (+502)</option>
                            <option value="GU - Guam (+1671)">GU - Guam (+1671)</option>
                            <option value="GW - Guinea-bissau (+245)">GW - Guinea-bissau (+245)</option>
                            <option value="GY - Guyana (+592)">GY - Guyana (+592)</option>
                            <option value="HK - Hong Kong (+852)">HK - Hong Kong (+852)</option>
                            <option value="HN - Honduras (+504)">HN - Honduras (+504)</option>
                            <option value="HR - Croatia (+385)">HR - Croatia (+385)</option>
                            <option value="HT - Haiti (+509)">HT - Haiti (+509)</option>
                            <option value="HU - Hungary (+36)">HU - Hungary (+36)</option>
                            <option value="ID - Indonesia (+62)">ID - Indonesia (+62)</option>
                            <option value="IE - Ireland (+353)">IE - Ireland (+353)</option>
                            <option value="IL - Israel (+972)">IL - Israel (+972)</option>
                            <option value="IM - Isle Of Man (+44)">IM - Isle Of Man (+44)</option>
                            <option value="IN - India (+91)">IN - India (+91)</option>
                            <option value="IQ - Iraq (+964)">IQ - Iraq (+964)</option>
                            <option value="IR - Iran, Islamic Republic Of (+98">IR - Iran, Islamic Republic Of (+98)</option>
                            <option value="IS - Iceland (+354)">IS - Iceland (+354)</option>
                            <option value="IT - Italy (+39)">IT - Italy (+39)</option>
                            <option value="JM - Jamaica (+1876)">JM - Jamaica (+1876)</option>
                            <option value="JO - Jordan (+962)">JO - Jordan (+962)</option>
                            <option value="JP - Japan (+81)">JP - Japan (+81)</option>
                            <option value="KE - Kenya (+254)">KE - Kenya (+254)</option>
                            <option value="KG - Kyrgyzstan (+996)">KG - Kyrgyzstan (+996)</option>
                            <option value="KH - Cambodia (+855)">KH - Cambodia (+855)</option>
                            <option value="KI - Kiribati (+686)">KI - Kiribati (+686)</option>
                            <option value="KM - Comoros (+269)">KM - Comoros (+269)</option>
                            <option value="KN - Saint Kitts And Nevis (+1869)">KN - Saint Kitts And Nevis (+1869)</option>
                            <option value="KP - Korea Democratic Peoples Republic Of (+850)">KP - Korea Democratic Peoples Republic Of (+850)</option>
                            <option value="KR - Korea Republic Of (+82)">KR - Korea Republic Of (+82)</option>
                            <option value="KW - Kuwait (+965)">KW - Kuwait (+965)</option>
                            <option value="KY - Cayman Islands (+1345)">KY - Cayman Islands (+1345)</option>
                            <option value="KZ - Kazakstan (+7)">KZ - Kazakstan (+7)</option>
                            <option value="LA - Lao Peoples Democratic Republic (+856)">LA - Lao Peoples Democratic Republic (+856)</option>
                            <option value="LB - Lebanon (+961)">LB - Lebanon (+961)</option>
                            <option value="LC - Saint Lucia (+1758)">LC - Saint Lucia (+1758)</option>
                            <option value="LI - Liechtenstein (+423)">LI - Liechtenstein (+423)</option>
                            <option value="LK - Sri Lanka (+94)">LK - Sri Lanka (+94)</option>
                            <option value="LR - Liberia (+231)">LR - Liberia (+231)</option>
                            <option value="LS - Lesotho (+266)">LS - Lesotho (+266)</option>
                            <option value="LT - Lithuania (+370)">LT - Lithuania (+370)</option>
                            <option value="LU - Luxembourg (+352)">LU - Luxembourg (+352)</option>
                            <option value="LV - Latvia (+371)">LV - Latvia (+371)</option>
                            <option value="LY - Libyan Arab Jamahiriya (+218)">LY - Libyan Arab Jamahiriya (+218)</option>
                            <option value="MA - Morocco (+212)">MA - Morocco (+212)</option>
                            <option value="MC - Monaco (+377)">MC - Monaco (+377)</option>
                            <option value="MD - Moldova, Republic Of (+373)">MD - Moldova, Republic Of (+373)</option>
                            <option value="ME - Montenegro (+382)">ME - Montenegro (+382)</option>
                            <option value="MF - Saint Martin (+1599)">MF - Saint Martin (+1599)</option>
                            <option value="MG - Madagascar (+261)">MG - Madagascar (+261)</option>
                            <option value="MH - Marshall Islands (+692)">MH - Marshall Islands (+692)</option>
                            <option value="MK - Macedonia, The Former Yugoslav Republic Of (+389)">MK - Macedonia, The Former Yugoslav Republic Of (+389)</option>
                            <option value="ML - Mali (+223)">ML - Mali (+223)</option>
                            <option value="MM - Myanmar">MM - Myanmar (+95)</option>
                            <option value="MN - Mongolia (+976)">MN - Mongolia (+976)</option>
                            <option value="MO - Macau (+853)">MO - Macau (+853)</option>
                            <option value="MP - Northern Mariana Islands (+1670)">MP - Northern Mariana Islands (+1670)</option>
                            <option value="MR - Mauritania (+222)">MR - Mauritania (+222)</option>
                            <option value="MS - Montserrat (+1664)">MS - Montserrat (+1664)</option>
                            <option value="MT - Malta (+356)">MT - Malta (+356)</option>
                            <option value="MU - Mauritius (+230)">MU - Mauritius (+230)</option>
                            <option value="MV - Maldives (+960)">MV - Maldives (+960)</option>
                            <option value="MW">MV - Maldives (+960)</option>
                            <option value="MX - Mexico (+52)">MX - Mexico (+52)</option>
                            <option value="MY - Malaysia (+60)">MY - Malaysia (+60)</option>
                            <option value="MZ - Mozambique (+258)">MZ - Mozambique (+258)</option>
                            <option value="NA - Namibia (+264)">NA - Namibia (+264)</option>
                            <option value="NC - New Caledonia (+687)">NC - New Caledonia (+687)</option>
                            <option value="NE - Niger (+227)">NE - Niger (+227)</option>
                            <option value="NG - Nigeria (+234)">NG - Nigeria (+234)</option>
                            <option value="NI - Nicaragua (+505)">NI - Nicaragua (+505)</option>
                            <option value="NL - Netherlands (+31)">NL - Netherlands (+31)</option>
                            <option value="NO - Norway (+47)">NO - Norway (+47)</option>
                            <option value="NP - Nepal (+977)">NP - Nepal (+977)</option>
                            <option value="NR - Nauru (+674)">NR - Nauru (+674)</option>
                            <option value="NU - Niue (+683)">NU - Niue (+683)</option>
                            <option value="NZ - New Zealand (+64)">NZ - New Zealand (+64)</option>
                            <option value="OM - Oman (+968)">OM - Oman (+968)</option>
                            <option value="PA - Panama (+507)">PA - Panama (+507)</option>
                            <option value="PE - Peru (+51)">PE - Peru (+51)</option>
                            <option value="PF - French Polynesia (+689)">PF - French Polynesia (+689)</option>
                            <option value="PG - Papua New Guinea (+675)">PG - Papua New Guinea (+675)</option>
                            <option value="PH - Philippines (+63)">PH - Philippines (+63)</option>
                            <option value="PK - Pakistan (+92)">PK - Pakistan (+92)</option>
                            <option value="PL - Poland (+48)">PL - Poland (+48)</option>
                            <option value="PM - Saint Pierre And Miquelon (+508)">PM - Saint Pierre And Miquelon (+508)</option>
                            <option value="PN - Pitcairn (+870)">PN - Pitcairn (+870)</option>
                            <option value="PR - Puerto Rico (+1)">PR - Puerto Rico (+1)</option>
                            <option value="PT - Portugal (+351)">PT - Portugal (+351)</option>
                            <option value="PW - Palau (+680)">PW - Palau (+680)</option>
                            <option value="PY - Paraguay (+595">PY - Paraguay (+595)</option>
                            <option value="QA - Qatar (+974)">QA - Qatar (+974)</option>
                            <option value="RO - Romania (+40)">RO - Romania (+40)</option>
                            <option value="RS - Serbia (+381)">RS - Serbia (+381)</option>
                            <option value="RU - Russian Federation (+7)">RU - Russian Federation (+7)</option>
                            <option value="RW - Rwanda (+250)">RW - Rwanda (+250)</option>
                            <option value="SB - Solomon Islands (+677)">SA - Saudi Arabia (+966)</option>
                            <option value="SB">SB - Solomon Islands (+677)</option>
                            <option value="SC - Seychelles (+248)">SC - Seychelles (+248)</option>
                            <option value="SD - Sudan (+249)">SD - Sudan (+249)</option>
                            <option value="SE - Sweden (+46)">SE - Sweden (+46)</option>
                            <option value="SG - Singapore (+65)">SG - Singapore (+65)</option>
                            <option value="SH - Saint Helena (+290)">SH - Saint Helena (+290)</option>
                            <option value="SI - Slovenia (+386)">SI - Slovenia (+386)</option>
                            <option value="SK - Slovakia (+421)">SK - Slovakia (+421)</option>
                            <option value="SL - Sierra Leone (+232)">SL - Sierra Leone (+232)</option>
                            <option value="SM - San Marino (+378)">SM - San Marino (+378)</option>
                            <option value="SN - Senegal (+221)">SN - Senegal (+221)</option>
                            <option value="SO - Somalia (+252)">SO - Somalia (+252)</option>
                            <option value="SR - Suriname (+597)">SR - Suriname (+597)</option>
                            <option value="ST - Sao Tome And Principe (+239)">ST - Sao Tome And Principe (+239)</option>
                            <option value="SV - El Salvador (+503)">SV - El Salvador (+503)</option>
                            <option value="SY - Syrian Arab Republic (+963)">SY - Syrian Arab Republic (+963)</option>
                            <option value="SZ - Swaziland (+268)">SZ - Swaziland (+268)</option>
                            <option value="TC - Turks And Caicos Islands (+1649)">TC - Turks And Caicos Islands (+1649)</option>
                            <option value="TD - Chad (+235)">TD - Chad (+235)</option>
                            <option value="TG - Togo (+228)">TG - Togo (+228)</option>
                            <option value="TH - Thailand (+66)">TH - Thailand (+66)</option>
                            <option value="TJ - Tajikistan (+992)">TJ - Tajikistan (+992)</option>
                            <option value="TK - Tokelau (+690)">TK - Tokelau (+690)</option>
                            <option value="TL - Timor-leste (+670)">TL - Timor-leste (+670)</option>
                            <option value="TM - Turkmenistan (+993)">TM - Turkmenistan (+993)</option>
                            <option value="TN - Tunisia (+216)">TN - Tunisia (+216)</option>
                            <option value="TO - Tonga (+676)">TO - Tonga (+676)</option>
                            <option value="TR - Turkey (+90)">TR - Turkey (+90)</option>
                            <option value="TT - Trinidad And Tobago (+1868)">TT - Trinidad And Tobago (+1868)</option>
                            <option value="TV - Tuvalu (+688)">TV - Tuvalu (+688)</option>
                            <option value="TW - Taiwan, Province Of China (+886)">TW - Taiwan, Province Of China (+886)</option>
                            <option value="TZ - Tanzania, United Republic Of (+255)">TZ - Tanzania, United Republic Of (+255)</option>
                            <option value="UA - Ukraine (+380)">UA - Ukraine (+380)</option>
                            <option value="UG - Uganda (+256)">UG - Uganda (+256)</option>
                            <option value="US - United States (+1)">US - United States (+1)</option>
                            <option value="UY - Uruguay (+598)">UY - Uruguay (+598)</option>
                            <option value="UZ - Uzbekistan (+998)">UZ - Uzbekistan (+998)</option>
                            <option value="VA - Holy See (vatican City State) (+39)">VA - Holy See (vatican City State) (+39)</option>
                            <option value="VC - Saint Vincent And The Grenadines (+1784)">VC - Saint Vincent And The Grenadines (+1784)</option>
                            <option value="VE - Venezuela (+58)">VE - Venezuela (+58)</option>
                            <option value="VG - Virgin Islands, British (+1284)">VG - Virgin Islands, British (+1284)</option>
                            <option value="VI - Virgin Islands, U.s. (+1340)">VI - Virgin Islands, U.s. (+1340)</option>
                            <option value="VN - Viet Nam (+84)">VN - Viet Nam (+84)</option>
                            <option value="VU - Vanuatu (+678)">VU - Vanuatu (+678)</option>
                            <option value="WF - Wallis And Futuna (+681)">WF - Wallis And Futuna (+681)</option>
                            <option value="WS - Samoa (+685)">WS - Samoa (+685)</option>
                            <option value="XK - Kosovo (+381)">XK - Kosovo (+381)</option>
                            <option value="YE - Yemen (+967)">YE - Yemen (+967)</option>
                            <option value="YT - Mayotte (+262)">YT - Mayotte (+262)</option>
                            <option value="ZA - South Africa (+27)">ZA - South Africa (+27)</option>
                            <option value="ZM - Zambia (+260)">ZM - Zambia (+260)</option>
                            <option value="ZW - Zimbabwe (+263)">ZW - Zimbabwe (+263)</option>
                          </select>
                        </div>
                        <!-- <label class="control-label col-sm-3" for="email"></label> -->
                        <div class="col-md-6">
                          <input name="alternatemobile" type="text"  class="form-control allowphonenumber" required maxlength="10" id="number" value="<?php if (!empty($js_personal_info->alternatemobile)) {
                            echo $js_personal_info->mobile;}
                            ?>">&nbsp;<span id="errmsg"></span>
                        </div>
                      </div>
                      </div>
                    </div>
                    <!--<div class="form-group">
                      <label class="control-label col-sm-3" for="email">Job Level</label>
                      <div class="col-sm-9">
                          <select name="job_level" class="form-control" id="job_level" >
                                                   </select>
                      </div>
                      </div>-->
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Present Address:</label>
                      <div class="col-sm-9">
                        <textarea name="present_address" class="form-control ckeditor" rows="5" id="comment" ><?php 
                          if (!empty($js_personal_info->present_address)) {
                            echo $js_personal_info->present_address;
                            }
                          ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Country <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <select name="country_id" class="form-control" onchange="getStates(this.value)" required="">
                          <option value="">Select Country</option>
                          <?php foreach($country as $key){?>
                          <option value="<?php echo $key['country_id']; ?>"<?php if($js_personal_info->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">State <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <select name="state_id" class="form-control" onchange="getCitys(this.value)">
                          <option value="">Select State</option>
                          <?php foreach($state as $val){?>
                          <option value="<?php echo $val['state_id']; ?>"<?php if($js_personal_info->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">City <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <select name="city_id" id="city_id" class="form-control" onchange="getStates(this.value)">
                          <option value="">Select City</option>
                          <?php foreach($city as $valu){?>
                          <option value="<?php echo $valu['id']; ?>"<?php if($js_personal_info->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Pincode <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="pincode" id="seeker_pincode" class="form-control allownumericwithoutdecimal" maxlength="6"  value="<?php
                          if (!empty($js_personal_info->pincode)) {
                            echo $js_personal_info->pincode;
                            }
                          ?>" required onkeypress="return isNumber(event)">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">My Tagline</label>
                      <div class="col-sm-9">
                        <input id="resDate_1" class=" form-control"  name="tagline" placeholder="Enter Your Tagline" value="<?php 
                          if (!empty($js_personal_info->resume_title)) {
                            echo $js_personal_info->resume_title;
                            }
                          ?>" >
                        <!--disabled="disabled" -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Marital Status</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="matrial_status" id="matrial_status">
                          <option value="">Select Marital Status</option>
                          <option value="Single/unmarried"<?php if($js_personal_info->marital_status=='Single/unmarried'){echo 'selected';} ?>>Single/unmarried</option>
                          <option value="Married"<?php if($js_personal_info->marital_status=='Married'){echo 'selected';} ?>>Married</option>
                          <option value="Widowed"<?php if($js_personal_info->marital_status=='Widowed'){echo 'selected';} ?>>Widowed</option>
                          <option value="Divorded"<?php if($js_personal_info->marital_status=='Divorded'){echo 'selected';} ?>>Divorced</option>
                          <option value="Separated"<?php if($js_personal_info->marital_status=='Separated'){echo 'selected';} ?>>Separated</option>
                          <option value="Other"<?php if($js_personal_info->marital_status=='Other'){echo 'selected';} ?>>Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Work Permit for USA</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="work_permit_usa" id="work_permit_usa">
                          <option value="">Select Work Permit</option>
                          <option value="Have H1 Visa"<?php if($js_personal_info->work_permit_usa=='Have H1 Visa'){echo 'selected';} ?>>Have H1 Visa</option>
                          <option value="Need H1 Visa"<?php if($js_personal_info->work_permit_usa=='Need H1 Visa'){echo 'selected';} ?>>Need H1 Visa</option>
                          <option value="TN Permit Holder"<?php if($js_personal_info->work_permit_usa=='TN Permit Holder'){echo 'selected';} ?>>TN Permit Holder</option>
                          <option value="Green Card Holder"<?php if($js_personal_info->work_permit_usa=='Green Card Holder'){echo 'selected';} ?>>Green Card Holder</option>
                          <option value="US Citizen"<?php if($js_personal_info->work_permit_usa=='US Citizen'){echo 'selected';} ?>>US Citizen</option>
                          <option value="Authorized to work in US"<?php if($js_personal_info->work_permit_usa=='Authorized to work in US'){echo 'selected';} ?>>Authorized to work in US</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Work Permit for Other Countries</label>
                      <div class="col-sm-9">
                        <input type="text" name="other_country_work_permit" class="form-control" id="tokenfield" placeholder="You can choose upto 3 Countries" value="<?php
                          if (!empty($js_personal_info->work_permit_countries)) {
                            echo $js_personal_info->work_permit_countries;
                            }
                          ?>">
                        <!--p>You can choose upto 3 Countries</p-->
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Website (Personal / Company / Blog / Other)</label>
                      <div class="col-sm-9">
                        <input type="text" name="website" class="form-control" placeholder="Enter Your Website (Personal / Company / Blog / Other)" value="<?php
                          if (!empty($js_personal_info->website)) {
                            echo $js_personal_info->website;
                            }
                          ?>">
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                      <div class="col-sm-9">
                       <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
                      </div>
                      </div>-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="menu1" class="tab-pane fade">
            <div class="education_header" style="position:relative;">
              <img src="" style="width:100%;position:relative;">
              <div class="icon-education" style="position:absolute;bottom:23px;right:53%;">
                <i class="fas fa-graduation-cap edu-i"></i>
              </div>
            </div>
            <ul style="margin-top:50px;">
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '1';
                 $education_data = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                // print_r($education_data);die;
                ?>
              <li class="bullet">
                <a href="#" value='1' id="ed" <?php if (isset($education_data) && empty($education_data)) { ?> style="color: red;"
                  <?php  } ?> data-toggle="modal" data-target="#myModal">Ph.d / Doctorate</a>
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button"   class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ph.d / Doctorate</h4>
                      </div>
                      <div class="modal-body education_frm">
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" value='1' onclick="get_specialization(this.value);"  data-target="#myModal">Edit</a></span> 
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '2';
                 $education_data2 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                // print_r($education_data);die;
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data2) && empty($education_data2)) { ?> style="color: red;"
                  <?php  } ?>  data-target="#myModal1">Masters / Post-Graduation</a>
                <div class="modal fade" id="myModal1" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Masters / Post-Graduation</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <div class="modal-body education_frm">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal1">Edit</a></span>  
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '3';
                 $education_data3 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                // print_r($education_data);die;
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data3) && empty($education_data3)) { ?> style="color: red;"
                  <?php  } ?> data-target="#myModal2">Graduation / Diploma</a>
                <div class="modal fade" id="myModal2" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Graduation / Diploma</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <option value="">Select Grading System</option>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal2">Edit</a></span>  
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '4';
                 $education_data4 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                // print_r($education_data);die;
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data4) && empty($education_data4)) { ?> style="color: red;"
                  <?php  } ?> data-target="#myModal3">12th</a>
                <div class="modal fade" id="myModal3" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">12th</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <form id="twelfth" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
                          <input type="hidden" name="js_education_id" value="<?php echo $education_data4[0]->js_education_id; ?>">
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Education <span class="required">*</span></label>
                              <select name="education_level_id" id="education_level_id" class="form-control department select2">
                                <option value="">Select</option>
                                <option value="4">12th</option>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="pwd">Year of Completion <span class="required">*</span></label>
                              <select name="js_year_of_passing" id="ddlYear" class="form-control department select2" required="">
                                <option value="">Select Completion Year</option>
                                <?php
                                  $currently_selected = date('Y'); 
                                  $earliest_year = 1940; 
                                  $latest_year = date('Y'); 
                                  foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                  ?>
                                <option value="<?php echo $i; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Board <span class="required">*</span></label>
                              <select name="board_id" id="bd" class="form-control">
                                <option value="">Select Board</option>
                                <!-- <option value="1">CBSE</option>
                                  <option value="2">CISCE(ICSE/ISC)</option>
                                  <option value="3">Diploma</option>
                                  <option value="4">National Open School</option>
                                  <option value="7">IB(International Baccalaureate)</option> -->
                                <?php foreach($schoolboard as $boards){?>
                                <option value="<?php echo $boards['schoolboard_id']; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->board_id==$boards['schoolboard_id']) echo "selected";?>><?php echo $boards['schoolboard_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">School Medium <span class="required">*</span></label>
                              <select name="schoolmedium_id" id="schoolmedium_id" class="form-control">
                                <?php foreach($schoolmedium as $medium){?>
                                <option value="<?php echo $medium['schoolmedium_id']; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->schoolmedium_id==$medium['schoolmedium_id']) echo "selected";?>><?php echo $medium['school_medium']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Total Score <span class="required">*</span></label>
                              <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control" value="<?php if(!empty($education_data4)) echo $education_data4[0]->totalmarks_id; ?>" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a  href="#" data-toggle="modal" data-target="#myModal3">Edit</a></span> 
              </li>
              <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                $seeker_edu_level_id = '5';
                 $education_data5 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                // print_r($education_data);die;
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" <?php if (isset($education_data5) && empty($education_data5)) { ?> style="color: red;"
                  <?php  } ?> data-target="#myModal4">10th</a>
                <div class="modal fade" id="myModal4" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">10th</h4>
                      </div>
                      <div class="modal-body education_frm">
                        <form id="tenth" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
                          <input type="hidden" name="js_education_id" value="<?php echo $education_data5[0]->js_education_id; ?>">
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Education<span class="required">*</span></label>
                              <select name="education_level_id" id="educ_lvl_id" class="form-control department select2">
                                <option value="">Select</option>
                                <option value="5">10th</option>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
                              <select name="js_year_of_passing" id="ddlYear" class="form-control department select2" required="">
                                <option value="">Select Completion Year</option>
                                <?php
                                  $currently_selected = date('Y'); 
                                  $earliest_year = 1940; 
                                  $latest_year = date('Y'); 
                                  foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                  ?>
                                <option value="<?php echo $i; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Board<span class="required">*</span></label>
                              <select name="board_id" id="board_id" class="form-control">
                                <option value="">Select Board</option>
                                <?php foreach($schoolboard as $boards){?>
                                <option value="<?php echo $boards['schoolboard_id']; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->board_id==$boards['schoolboard_id']) echo "selected";?>><?php echo $boards['schoolboard_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">School Medium<span class="required">*</span></label>
                              <select name="schoolmedium_id" id="schoolmedium_id" class="form-control">
                                <option value="">Select Medium</option>
                                <?php foreach($schoolmedium as $medium){?>
                                <option value="<?php echo $medium['schoolmedium_id']; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->schoolmedium_id==$medium['schoolmedium_id']) echo "selected";?>><?php echo $medium['school_medium']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <label class="control-label" for="email">Total Score<span class="required">*</span></label>
                              <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control" value="<?php if(!empty($education_data5)) echo $education_data5[0]->totalmarks_id; ?>" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal4">Edit</a></span>  
              </li>
            </ul>
          </div>
          <div id="menu3" class="tab-pane fade">
            <div class="education_header" style="position:relative;">
              <img src="https://www.sassm.in/education/images/blog-header.jpg" style="width:100%;position:relative;height:65px;">
              <div class="icon-education" style="position:absolute;bottom:23px;right:53%;">
                <i class="fas fa-graduation-cap edu-i"></i>
              </div>
            </div>
            <ul>
              <?php  $designation = $this->Master_model->getMaster('designation',$where=false);
                $department = $this->Master_model->getMaster('department',$where=false); ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" data-target="#myModal5">Work Experience</a>
                <div class="modal fade" id="myModal5" tabindex='-1' role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Work Experience</h4>
                      </div>
                      <div class="modal-body">
                        <form id="work_experience" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
                          <input type="hidden" name="js_experience_id" value=""> 
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Company Name:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control allowalphabates" id="edit_company_profile_id" required name="company_profile_id" value="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Designation:</label>
                            <div class="col-sm-9">
                              <select name="designation_id" class="form-control department select2">
                                <option value="">Select</option>
                                <?php foreach($designation as $keys){?>
                                <option value="<?php echo $keys['designation_id']; ?>"><?php echo $keys['designation_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Department:</label>
                            <div class="col-sm-9">
                              <select name="dept_id" class="form-control department select2">
                                <option value="">Select Department</option>
                                <?php foreach($department as $dept){?>
                                <option value="<?php echo $dept['dept_id']; ?>"<?php if($experinece->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Start Date:</label>
                            <div class="col-sm-9"><input class="datepicker form-control" id="start_date_picker"  name="start_date" value="">
                              <label><input type="checkbox" id="upChkDisable_2" onclick="disableUpperDP('2')" >  Current Job</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">End Date:</label>
                            <div class="col-sm-9"> <input id="resDate_2" class="datepicker form-control"  name="end_date" value="" disabled="disabled">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Job Location</label>
                            <div class="col-sm-9">
                              <input type="text" name="address" class="form-control allowalphabatescomma" id="job_area" value="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Salary:</label>
                            <div class="col-sm-9">
                              <input type="text" name="js_career_salary" class="form-control allownumericwithoutdecimal" id="js_career_salary" placeholder="Salary" value="25,000">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                            <div class="col-sm-9">
                              <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">My Achievement  </label>
                            <div class="col-sm-9">
                              <textarea name="achievement" class="form-control" rows="5" id="achievement"></textarea>
                            </div>
                          </div>
                          <!-- <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                            <div class="col-sm-9">
                             <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
                            </div>
                            </div>-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal5"><i class="fa fa-plus" aria-hidden="true"></i></a></span>  
              </li>
            </ul>
            <div class="col-md-12 bd-2">
              <?php 
                $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
                // print_r($experinece_list);
                        $sr_no=0;
                    if (!empty($experinece_list)): foreach ($experinece_list as $v_experience) :
                
                        // print_r($applicaiton);
                        // for ($i=0; $i <sizeof($v_experience) ; $i++) { 
                            # code...
                       
                    ?>
              <div class="invi-div">
                <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton[$i]->company_profile_id); ?>" class="invitation-img"/>
                <div class="info-invitation">
                  <p class="head-invi">Compnay Name:<?php echo $v_experience->company_profile_id; ?></p>
                  <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#EditExperience<?php echo $v_experience->js_experience_id; ?>" onclick="javascript:disableDP('<?php echo $key ?>')"class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>
                  <span class="salary-info">Designation: <?php echo $this->job_posting_model->job_salary_by_id($applicaiton[$i]->job_post_id); ?></span>
                  <p>Department: <?php echo $v_experience->department_name; ?></p>
                  <p>Duration: <?php $today=date("Y-m-d"); if($v_experience->end_date=="2017-08-30") {
                    echo date_calculate($v_experience->start_date,$today);
                    }else { echo date_calculate($v_experience->start_date,$v_experience->end_date); }?></p>
                  <p>My Responsibilities: <?php echo $v_experience->responsibilities ; ?></p>
                  <p>My Achievement: <?php echo $v_experience->achievement; ?></p>
                  <!-- <button class="apply-invi">Apply Now</button> -->
                </div>
                <div class="clear"></div>
              </div>
              <?php
                // $sr_no++;
                 // }
                endforeach;
                ?>
              <?php else : ?> 
              <div>
                <strong>There is no data to display</strong>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php $count=1; foreach ($experinece_list as $v_experience): ?>
          <div id="EditExperience<?php echo $v_experience->js_experience_id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">
              <?php
                $experinece = $this->Job_seeker_experience_model->get($v_experience->js_experience_id);
                           
                
                ?>
              <!--<div class="modal fade" id="myModal5" role="dialog">
                <div class="modal-dialog modal-md">-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Work Experience</h4>
                </div>
                <div class="modal-body">
                  <form id="work_experience1" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
                    <input type="hidden" name="js_experience_id" value="<?php echo $v_experience->js_experience_id; ?>">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Company Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control allowalphabates" id="edit_company_profile_id" required name="company_profile_id" value="<?php if (!empty($experinece->company_profile_id)) { echo $experinece->company_profile_id;} ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Designation:</label>
                      <div class="col-sm-9">
                        <select name="designation_id" class="form-control">
                          <?php foreach($designation as $keys){?>
                          <option value="<?php echo $keys['designation_id']; ?>"<?php if($experinece->designation_id==$keys['designation_id']){ echo "selected"; }?>><?php echo $keys['designation_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Department:</label>
                      <div class="col-sm-9">
                        <select name="dept_id" class="form-control">
                          <option value="">Select Department</option>
                          <?php foreach($department as $dept){?>
                          <option value="<?php echo $dept['dept_id']; ?>"<?php if($experinece->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Start Date:</label>
                      <div class="col-sm-9"><input class="datepicker form-control" id="start_date_picker1"  name="start_date" value="<?php if (!empty($experinece->start_date)) { echo date('d-m-Y',strtotime($experinece->start_date)); } ?>">
                        <label><input type="checkbox" id="upChkDisable_3" onclick="disableUpperDP('3')">  Current Job</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">End Date:</label>
                      <div class="col-sm-9"><input id="resDate_3" class="datepicker form-control"  name="end_date" value="<?php if (!empty($experinece->end_date)) { echo date('d/m/Y',strtotime($experinece->end_date)); }else{ echo "";} ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Job Location</label>
                      <div class="col-sm-9">
                        <input type="text" name="address" class="form-control allowalphabatescomma" id="job_area" value="<?php 
                          if (!empty($experinece->address)) {
                            echo $experinece->address;
                            }
                          ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Salary:</label>
                      <div class="col-sm-9">
                        <input type="text" name="js_career_salary" class="form-control allownumericwithoutdecimal" id="js_career_salary" placeholder="Salary" value="<?php if (!empty($experinece->js_career_salary)) {
                          echo $experinece->js_career_salary;
                          }
                          ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                      <div class="col-sm-9">
                        <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities"><?php 
                          if (!empty($experinece->responsibilities)) {
                            echo $experinece->responsibilities;
                            } ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">My Achievement  </label>
                      <div class="col-sm-9">
                        <textarea name="achievement" class="form-control" rows="5" id="achievement"><?php
                          if (!empty($experinece->achievement )) {
                            echo $experinece->achievement ;
                            }
                          ?></textarea>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                      <div class="col-sm-9">
                       <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
                      </div>
                      </div>-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php  $count++; ?>
          <?php endforeach;?>
          <div id="menu4" class="tab-pane fade">
            <div class="education_header" style="position:relative;">
              <img src="https://www.sassm.in/education/images/blog-header.jpg" style="width:100%;position:relative;height:65px;">
              <div class="icon-education" style="position:absolute;bottom:23px;right:53%;">
                <i class="fas fa-graduation-cap edu-i"></i>
              </div>
            </div>
            <ul>
              <?php 
                $jobseeker_id = $this->session->userdata('job_seeker_id');
                $training_list = $this->Job_training_model->training_list_by_id($jobseeker_id);
                $passingyear = $this->Master_model->getMaster('passingyear',$where=false);
                ?>
              <li class="bullet">
                <a href="#" data-toggle="modal" data-target="#myModal7">My Trannings</a>
                <div class="modal fade" id="myModal7" tabindex='-1' role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Trainnings</h4>
                      </div>
                      <div class="modal-body">
                        <form id="my-trainings" class="form-horizontal" action="<?php echo base_url('job_seeker/update_training');?>" method="post" style="padding: 30px;">
                          <div class="form-group">
                            <input type="hidden" value="155" name="job_training_id">
                            <label class="control-label col-sm-3" for="email">Training Title</label>
                            <div class="col-sm-9">
                              <select name="training_title" id="training_title" class="form-control department select2" onchange="check_other(this.value)">
                                <option value="">Select Training title</option>
                                <?php foreach($training as $key){?>
                                <option value="<?php echo $key['name']; ?>"<?php if($training_list->training_title==$key['name']){ echo "selected"; }?>><?php echo $key['name']; ?></option>
                                <?php } ?>
                                <option value="other">Other</option>
                              </select>
                              <input type="hidden" name="training_title" class="form-control" id="training_title1" placeholder="Training Title" value="CCNA1"> 
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Training Topic</label>
                            <div class="col-sm-9">
                              <input type="text" name="training_topic" class="form-control allowalphabates" id="training_topic" placeholder="Training Topic" value="CCNA">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Institute</label>
                            <div class="col-sm-9">
                              <input type="text" name="institute" class="form-control allowalphabates" id="institute" placeholder="Institiute Name" value="CCNA">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Country</label>
                            <div class="col-sm-9">
                              <select name="country_id" id="country_id" class="form-control department select2" onchange="getStates(this.value)">
                                <option value="">Select Country</option>
                                <?php foreach($country as $key){?>
                                <option value="<?php echo $key['country_id']; ?>"<?php if($training_list->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">State</label>
                            <div class="col-sm-9">
                              <select name="state_id" id="state_id" class="form-control department select2" onchange="getCitys(this.value)">
                                <option value="">Select Country First</option>
                                <!--   <?php foreach($state as $val){?>
                                  <option value="<?php echo $val['state_id']; ?>"<?php if($training_list->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                                  <?php } ?> -->
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">City</label>
                            <div class="col-sm-9">
                              <select name="city_id" id="city_id" class="form-control department select2">
                                <option value="">Select State First</option>
                                <!--      <?php foreach($city as $valu){?>
                                  <option value="<?php echo $valu['id']; ?>"<?php if($training_list->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                                  <?php } ?> -->
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Duration</label>
                            <div class="col-sm-9">
                              <input name="duration" type="text" class="form-control allownumericwithdecimal" id="duration" placeholder=" 1 years 2 month" value="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Training Years</label>
                            <div class="col-sm-9">
                              <select name="training_year" id="training_year" class="form-control department select2">
                                <option value="">Select</option>
                                <?php foreach($passingyear as $traning){?>
                                <option value="<?php echo $traning['passing_id']; ?>"<?php if($training_list->training_year==$traning['passing_id']){ echo "selected"; }?>><?php echo $traning['passing_year']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal7"><i class="fa fa-plus"></i></a></span>  
              </li>
            </ul>
            <div class="col-md-12 bd-2">
              <?php 
                // print_r($experinece_list);
                        $sr_no=0;
                    if (!empty($training_list)): foreach ($training_list as $v_training) : 
                
                     // print_r($training_list);
                            # code...
                       
                    ?>
              <div class="invi-div">
                <!-- <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton[$i]->company_profile_id); ?>" class="invitation-img"/> -->
                <div class="info-invitation">
                  <div class="row">
                    <div class="col-sm-6">
                      <p></p>
                      <p >Training Title: <span class="salary-info"> <?php echo $v_training->training_title; ?></span></p>
                      <p >Training Institute:<span class="salary-info">  <?php echo $v_training->institute; ?></span> </p>
                      <p >State: <span class="salary-info">  <?php echo $v_experience->achievement; ?></span></p>
                      <p >Duration: <span class="salary-info"> <?php echo $v_training->duration; ?></span></p>
                    </div>
                    <div class="col-sm-6">
                      <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#UdpateTraining<?php  echo $v_training->js_training_id; ?>" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a></span>
                      <p  >Training Topic: <span class="salary-info">  <?php echo $v_training->training_topic; ?></span></p>
                      <p >Country: <span class="salary-info">  <?php echo $v_training->country_name; ?></span></p>
                      <p >City:  <span class="salary-info"> <?php echo $v_training->city_name; ?></span></p>
                      <p >Year:  <span class="salary-info"> <?php echo $v_training->passing_year; ?></span></p>
                    </div>
                  </div>
                  <!-- <button class="apply-invi">Apply Now</button> -->
                </div>
                <div class="clear"></div>
              </div>
              <!--  -->
              <?php
                // $sr_no++;
                 // }
                endforeach;
                ?>
              <?php else : ?> 
              <div>
                <strong>There is no data to display</strong>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php foreach($training_list as $v_training): ?>
          <div id="UdpateTraining<?php echo $v_training->js_training_id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">
              <?php
                $training_list=$this->Job_training_model->get($v_training->js_training_id); 
                
                ?>    
              <!-- <div class="modal fade" id="myModal7" role="dialog"> -->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">My Trainings</h4>
                </div>
                <div class="modal-body">
                  <form id="UpdateEducational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_training');?>" method="post" style="padding: 30px;">
                    <div class="form-group">
                      <input type="hidden" value="155" name="job_training_id">
                      <label class="control-label col-sm-3" for="email">Training Title</label>
                      <div class="col-sm-9">
                        <select name="training_title" id="training_title" class="form-control" onchange="check_other(this.value)">
                          <option value="">Select Training title</option>
                          <?php foreach($training as $key){?>
                          <option value="<?php echo $key['name']; ?>"<?php if($training_list->training_title==$key['name']){ echo "selected"; }?>><?php echo $key['name']; ?></option>
                          <?php } ?>
                          <option value="other">Other</option>
                          <input type="hidden" name="training_title" class="form-control" id="training_title1" placeholder="Training Title"
                            value="<?php
                              if (!empty($training_list->training_title)) {
                                echo $training_list->training_title;
                                }
                              ?>"> 
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Training Topic:</label>
                      <div class="col-sm-9">
                        <input type="text" name="training_topic" class="form-control" id="training_topic" placeholder="Training Topic" value="<?php
                          if (!empty($training_list->training_topic)) {
                            echo $training_list->training_topic;
                            }
                          ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Institute:</label>
                      <div class="col-sm-9">
                        <input type="text" name="institute" class="form-control" id="institute" placeholder="Institiute Name" value="<?php
                          if (!empty($training_list->institute)) {
                            echo $training_list->institute;
                            }
                          ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Country:</label>
                      <div class="col-sm-9">
                        <select name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                          <option value="">Select Country</option>
                          <?php foreach($country as $key){?>
                          <option value="<?php echo $key['country_id']; ?>"<?php if($training_list->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">State:</label>
                      <div class="col-sm-9">
                        <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                          <option value="">Select Country First</option>
                          <?php foreach($state as $val){?>
                          <option value="<?php echo $val['state_id']; ?>"<?php if($training_list->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">City:</label>
                      <div class="col-sm-9">
                        <select name="city_id" id="city_id" class="form-control">
                          <option value="">Select State First</option>
                          <?php foreach($city as $valu){?>
                          <option value="<?php echo $valu['id']; ?>"<?php if($training_list->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Duration:</label>
                      <div class="col-sm-9">
                        <input name="duration" type="text" class="form-control" id="duration" placeholder=" 1 years 2 month" value="<?php
                          if (!empty($training_list->duration)) {
                            echo $training_list->duration;
                            }
                          ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Training Years:</label>
                      <div class="col-sm-9">
                        <select name="training_year" id="training_year" class="form-control">
                          <?php foreach($passingyear as $traning){?>
                          <option value="<?php echo $traning['passing_id']; ?>"<?php if($training_list->training_year==$traning['passing_id']){ echo "selected"; }?>><?php echo $traning['passing_year']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php  $count++; ?>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("fontend/layout/jobseeker_footer.php"); ?>
</div>
<script>
  $(function() {
  
  // $('#date').datepicker({
  //   dateFormat: 'dd-mm-yy',
  //   altField: '#thealtdate',
  //   altFormat: 'dd-mm-yyyy',
  //   defaultDate: null
  // });
  /*var max_experience = $("#max_experience").val();
  
  for(var i =1; i < max_experience; i++){
  if($('#resDate_'+i).val()==''  || $('#resDate_+'+i).val()==null){
  
  $('#upChkDisable_'+i).attr("checked","true");
  $('#resDate_'+i).val('Continue');
   $('#resDate_'+i).attr('disabled',"disabled");
  }
  else{
   alert('error');
  }
  }*/
  
  });
  function disableAddDP() {
  $("#end_date").attr("disabled", $("#chkDisable").is(":checked")).val("Continue");
  }   
  
  function disableDP(i) {
  //alert($('#resDate_'+i).val());
  if($('#resDate_'+i).val()==''  || $('#resDate_'+i).val()==null){
  
  $('#upChkDisable_'+i).attr("checked","true");
  $('#resDate_'+i).val('Continue');
   $('#resDate_'+i).attr('disabled',"disabled");
  }
  
  }  
  
  
  
  function disableUpperDP(count) {
  
  // alert($("#upChkDisable_"+count).is(":checked"));
  alert(count);
  $("#resDate_"+count).attr("disabled", $("#upChkDisable_"+count).is(":checked"));
  if($("#upChkDisable_"+count).is(":checked")){
  $('#resDate_'+count).val("Continue");
  } else {
   $('#resDate_'+count).val("");
  }
  }
  
  
</script>
<script>
  function getStates(id){
  if(id){
          $.ajax({
              type:'POST',
              url:'<?php echo base_url();?>Job_seeker/getstate',
              data:{id:id},
              success:function(res){
                  $('#state_id').html(res);
              }
      
          }); 
        }
  
   }
  
  function getCitys(id){
  if(id){
          $.ajax({
              type:'POST',
              url:'<?php echo base_url();?>Job_seeker/getcity',
              data:{id:id},
              success:function(res){
                  $('#city_id').html(res);
              }
      
          }); 
        }
  
   }
   
  //  function getStatess(id){
  // if(id){
  //           $.ajax({
  //               type:'POST',
  //               url:'<?php echo base_url();?>Job_seeker/getstate',
  //               data:{id:id},
  //               success:function(res){
  //                   $('#state1_id').html(res);
  //               }
      
  //           }); 
  //         }
  
  //   }
   
  //  function getCityss(id){
  // if(id){
  //           $.ajax({
  //               type:'POST',
  //               url:'<?php echo base_url();?>Job_seeker/getcity',
  //               data:{id:id},
  //               success:function(res){
  //                   $('#city1_id').html(res);
  //               }
      
  //           }); 
  //         }
  
  //   }
   
  $(document).ready(function(){
  
  function getStates_load(){
      var id = $('#country_id').val();
  
      if(id){
          $.ajax({
              type:'POST',
              url:'<?php echo base_url();?>Job_seeker/getstate',
              data:{id:id},
              success:function(res){
                  $('#state_id').html(res);
                  $('#state_id').val(<?php echo $js_personal_info->state_id; ?>);
                   getCitys_load(<?php echo $js_personal_info->state_id; ?>);
              }
              
          }); 
        }
  
     }
  
  function getCitys_load(id){
    //var id = $('#state_id').val();
    // alert(id);
      if(id){
          $.ajax({
              type:'POST',
              url:'<?php echo base_url();?>Job_seeker/getcity',
              data:{id:id},
              success:function(res){
                  $('#city_id').html(res);
                  $('#city_id').val(<?php echo $js_personal_info->city_id; ?>);
              }
              
          }); 
        }
  
     }
  
  // function getStates_load_permant(){
  //     var id = $('#country1_id').val();
  
  //     if(id){
  //         $.ajax({
  //             type:'POST',
  //             url:'<?php echo base_url();?>Job_seeker/getstate',
  //             data:{id:id},
  //             success:function(res){
  //                 $('#state1_id').html(res);
  //                 $('#state1_id').val(<?php echo $js_personal_info->state_id; ?>);
  //                  getCitys_load_permant(<?php echo $js_personal_info->state_id; ?>);
  //             }
              
  //         }); 
  //       }
  
  //    }
  
  // function getCitys_load_permant(id){
  //   //var id = $('#state_id').val();
  //   // alert(id);
  //     if(id){
  //         $.ajax({
  //             type:'POST',
  //             url:'<?php echo base_url();?>Job_seeker/getcity',
  //             data:{id:id},
  //             success:function(res){
  //                 $('#city1_id').html(res);
  //                 $('#city1_id').val(<?php echo $js_personal_info->city_id; ?>);
  //             }
              
  //         }); 
  //       }
  
  //    }
  
  getCitys_load();
  getStates_load();
  // getCitys_load_permant();
  // getStates_load_permant();
  });
  
</script>        
<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/search.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>
<script type="text/javascript">
  // Personal Info
  $( document ).ready( function () {
  
  $("#js").validate (  
  
  {
  
  rules:{
  
  'full_name':{
  minlength: 3,
  namespace_regex: true
  },
  
  'date_of_birth':{
  required:true
  
  },
  
  'dobmake_public':{
  required:true
  
  },
  
  'country_code':{
  //phonenumber_regex: true
  }, 
  
  'mobile':{
  maxlength:10
  //phonenumber_regex: true
  }, 
  
  'alternatecountry_code':{
  //twodigit_regex: true
  //email: true
  },
  
  
  'alternatemobile':{
  maxlength:10
  //email: true
  },
  
  'present_address':{ 
  //required:true               
  //minlength:10,        
  //maxlength:10,
  },
  
  
  'country_id':{
  //required:true
  //namespace_regex: true 
  //url: true
  },
  
  
  'state_id':{
  required:true
  //current_work_location_regex: true
  // /companypincode_regex: true
  
  },
  
  
  
  'city_id':{
  required:true
  //twodecimal_regex: true
  // /companypincode_regex: true
  
  },
  
  
  'pincode':{
  required:true,
  companypincode_regex: true,
  maxlength:6
  //current_work_location_regex: true
  // /companypincode_regex: true
  },
  
  'tagline':{
  //required: true
  // /companypincode_regex: true
  },  
  
  'matrial_status':{
  // /companypincode_regex: true
  },
  
  'work_permit_usa':{
  // /companypincode_regex: true
  },
  
  'other_country_work_permit':{
  // /companypincode_regex: true
  },
  
  'website':{
  //twodecimal_regex: true
  // /companypincode_regex: true
  }
  
  },
  
  messages:{
  
  'full_name':{
  //required: "Must Fill !",
  minlength: "Please type atleast 3 characters!",
  namespace_regex: "Please type only alphabets"
  },
  
  'date_of_birth':{
  required: "Must Fill !",
  matches: "Didn't match!",      
  minlength: "Please Enter 10 digit phone numbers!",        
  maxlength: "Maximum length 10 digits!"
  },
  
  'dobmake_public':{
  required: "Must Fill !",
  },
  
  'country_code':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'mobile':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'alternatecountry_code':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  'alternatemobile':{
  email: "Please enter a valid email address!",
  remote: "The email is already in use by another user!"
  },
  
  'present_address' :{
  // required: "Must Fill !"
  //email: "Please enter a valid email address!",
  //remote: "The email is already in use by another user!"
  },
  
  'country_id':{
  },
  
  'state_id':{
  required: "Must Fill !",
  minlength: "Choose a username of at least 4 letters!",
  username_regex: "You have used invalid characters. Are permitted only letters numbers!",
  remote: "The useername is already in use by another user!"
  },
  
  'mobile':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'alternatecountry_code':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  'alternatemobile':{
  email: "Please enter a valid email address!",
  remote: "The email is already in use by another user!"
  },
  
  'present_address' :{
  email: "Please enter a valid email address!",
  remote: "The email is already in use by another user!"
  },
  
  'country_id':{
  required: "Must Fill !",
  },
  
  'state_id':{
  required: "Must Fill !",
  minlength: "Choose a username of at least 4 letters!",
  username_regex: "You have used invalid characters. Are permitted only letters numbers!",
  remote: "The useername is already in use by another user!"
  },
  
  'city_id' :{
  required: "Must Fill !",
  email: "Please enter a valid email address!",
  remote: "The email is already in use by another user!"
  },
  
  'pincode':{
  required: "Must Fill !"
  },
  
  'tagline':{
  //required: "Must Fill !",
  minlength: "Choose a username of at least 4 letters!",
  username_regex: "You have used invalid characters. Are permitted only letters numbers!",
  remote: "The useername is already in use by another user!"
  },
  
  'matrial_status':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'work_permit_usa':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  'other_country_work_permit':{
  email: "Please enter a valid email address!",
  remote: "The email is already in use by another user!"
  },
  
  'website' :{
  email: "Please enter a valid email address!",
  remote: "The email is already in use by another user!"
  }
  
  
  }
  
  });
  
  });
  
  
  
  $( document ).ready( function () {
  
  $("#Educational-info").validate (  
  
  {
  
  rules:{
  
  'education_level_id':{
  required:true
  //namespace_regex: true
  },
  
  'specialization_id':{
  //email_regex: true
  required:true
  },
  
  
  'js_institute_name':{
  required:true
  //phonenumber_regex: true
  }, 
  
  'education_type_id':{
  required:true
  //twodigit_regex: true
  //email: true
  },
  
  
  'js_year_of_passing':{
  required:true
  //maxlength:3
  //email: true
  },
  
  'js_resut':{   
  required:true             
  //minlength:10,        
  //maxlength:10,
  },
  
  },
  
  messages:{
  
  'education_level_id':{
  
  required: "Must Fill !"
  },
  
  'specialization_id':{
  required: "Must Fill !"
  },
  
  'js_institute_name':{
  required: "Must Fill !"
  },
  
  'education_type_id':{
  required: "Must Fill !"
  },
  
  'js_year_of_passing':{
  required: "Must Fill !"
  },
  
  'js_resut':{
  required: "Must Fill !"
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  }
  
  });
  
  });
  
  
  $( document ).ready( function () {
  
  $("#Masters").validate (  
  
  {
  
  rules:{
  
  'education_level_id':{
  required:true
  //minlength: 3,
  //namespace_regex: true
  },
  
  'specialization_id':{
  required:true
  //email_regex: true
  },
  
  
  'js_institute_name':{
  required: true
  //phonenumber_regex: true
  }, 
  
  'education_type_id':{
  required: true
  //twodigit_regex: true
  //email: true
  },
  
  
  'js_year_of_passing':{
  required: true
  //maxlength:3
  //email: true
  },
  
  'js_resut':{            
  required: true    
  //minlength:10,        
  //maxlength:10,
  },
  
  },
  
  messages:{
  
  'education_level_id':{
  required: "Must Fill !"
  },
  
  'specialization_id':{
  required: "Must Fill !"
  
  },
  
  'js_institute_name':{
  required: "Must Fill !"
  
  },
  
  'education_type_id':{
  required: "Must Fill !"
  
  },
  
  'js_year_of_passing':{
  required: "Must Fill !"
  },
  
  'js_resut':{
  required: "Must Fill !"
  },
  
  
  }
  
  });
  
  });
  
  $( document ).ready( function () {
  
  $("#Graduation").validate (  
  
  {
  
  rules:{
  
  'specialization_id':{
  required: true
  },
  
  'js_institute_name':{
  required: true
  },
  
  
  'education_type_id':{
  required: true
  }, 
  
  
  'js_year_of_passing':{
  required: true//email: true
  },
  
  'js_resut':{ 
  required: true               
  
  },
  
  },
  
  messages:{
  
  'education_level_id':{
  required: "Must Fill !",
  
  },
  
  'specialization_id':{
  required: "Must Fill !",
  
  },
  
  'js_institute_name':{
  required: "Must Fill !",
  
  },
  'education_type_id':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'js_year_of_passing':{
  required: "Must Fill !",
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'js_resut':{
  required: "Must Fill !"
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  }
  
  });
  
  });
  
  $( document ).ready( function () {
  
  $("#twelfth").validate (  
  
  {
  
  rules:{
  
  'education_level_id':{
  required: true
  },
  
  'js_year_of_passing':{
  required: true
  },
  
  
  'board_id':{
  required: true
  }, 
  
  'schoolmedium_id':{
  required: true
  },
  
  
  'totalmarks_id':{
  required:true
  },
  
  
  
  },
  
  messages:{
  
  'education_level_id':{
  required: "Must Fill !"
  },
  
  'js_year_of_passing':{
  required: "Must Fill !"
  },
  
  'board_id':{
  required: "Must Fill !"
  },
  
  'schoolmedium_id':{
  required: "Must Fill !"
  },
  
  'totalmarks_id':{
  required: "Must Fill !"
  },
  
  
  }
  
  });
  
  });
  
  
  $( document ).ready( function () {
  
  $("#tenth").validate (  
  
  {
  
  rules:{
  
  'education_level_id':{
  required: true
  },
  
  'js_year_of_passing':{
  required: true
  },
  
  
  'board_id':{
  required: true
  }, 
  
  'schoolmedium_id':{
  required: true
  //twodigit_regex: true
  //email: true
  },
  
  
  'totalmarks_id':{
  required: true
  
  //email: true
  },
  
  
  
  },
  
  messages:{
  
  'education_level_id':{
  required: "Must Fill !",
  minlength: "Please type atleast 3 characters!",
  namespace_regex: "Please type only alphabets"
  },
  
  'js_year_of_passing':{
  required: "Must Fill !",
  matches: "Didn't match!",      
  minlength: "Please Enter 10 digit phone numbers!",        
  maxlength: "Maximum length 10 digits!"
  },
  
  'board_id':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'schoolmedium_id':{
  required: "Must Fill !",
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'totalmarks_id':{
  required: "Must Fill !"
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  }
  
  });
  
  });
  
  
  $( document ).ready( function () {
  
  $("#Updateskill-info").validate (  
  
  {
  
  rules:{
  
  'skills':{
  required: true,
  minlength: 3,
  namespace_regex: true
  },
  
  },
  
  messages:{
  
  'skills':{
  required: "Must Fill !",
  minlength: "Please type atleast 3 characters!",
  namespace_regex: "Please type only alphabets"
  },
  
  }
  
  });
  
  });
  
  
  $( document ).ready( function () {
  
  $("#work_experience").validate (  
  
  {
  
  rules:{
  
  'company_profile_id':{
  minlength: 3,
  namespace_regex: true
  },
  
  'designation_id':{
  //email_regex: true
  },
  
  
  'dept_id':{
  //phonenumber_regex: true
  }, 
  
  'start_date':{
  //twodigit_regex: true
  //email: true
  },
  
  
  'end_date':{
  //maxlength:3
  //email: true
  },
  
  'js_career_salary':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  'responsibilities':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  'achievement':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  },
  
  messages:{
  
  'company_profile_id':{
  required: "Must Fill !",
  minlength: "Please type atleast 3 characters!",
  namespace_regex: "Please type only alphabets"
  },
  
  'designation_id':{
  required: "Must Fill !",
  matches: "Didn't match!"
  },
  
  'dept_id':{
  //required: "Must Fill !",
  
  },
  
  'start_date':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'end_date':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  'js_career_salary':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'responsibilities':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'achievement':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  }
  
  });
  
  });
  
  $( document ).ready( function () {
  
  $("#work_experience1").validate (  
  
  {
  
  rules:{
  
  'company_profile_id':{
  minlength: 3,
  namespace_regex: true
  },
  
  'designation_id':{
  //email_regex: true
  },
  
  
  'dept_id':{
  //phonenumber_regex: true
  }, 
  
  'start_date':{
  //twodigit_regex: true
  //email: true
  },
  
  
  'end_date':{
  //maxlength:3
  //email: true
  },
  
  'js_career_salary':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  'responsibilities':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  'achievement':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  },
  
  messages:{
  
  'company_profile_id':{
  required: "Must Fill !",
  minlength: "Please type atleast 3 characters!",
  namespace_regex: "Please type only alphabets"
  },
  
  'designation_id':{
  required: "Must Fill !",
  matches: "Didn't match!",      
  minlength: "Please Enter 10 digit phone numbers!",        
  maxlength: "Maximum length 10 digits!"
  },
  
  'dept_id':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'start_date':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'end_date':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  'js_career_salary':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'responsibilities':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'achievement':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  }
  
  });
  
  });
  
  $( document ).ready( function () {
  
  $("#my-trainings").validate (  
  
  {
  
  rules:{
  
  'training_title':{
  minlength: 3,
  namespace_regex: true
  },
  
  'training_topic':{
  
  },
  
  
  'institute':{
  
  }, 
  
  'country_id':{
  //twodigit_regex: true
  //email: true
  },
  
  
  'state_id':{
  maxlength:3
  //email: true
  },
  
  'city_id':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  'duration':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  'training_year':{                
  //minlength:10,        
  //maxlength:10,
  },
  
  },
  
  messages:{
  
  'training_title':{
  required: "Must Fill !",
  minlength: "Please type atleast 3 characters!",
  namespace_regex: "Please type only alphabets"
  },
  
  'training_topic':{
  required: "Must Fill !",
  matches: "Didn't match!",      
  minlength: "Please Enter 10 digit phone numbers!",        
  maxlength: "Maximum length 10 digits!"
  },
  
  'institute':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'country_id':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'state_id':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  'city_id':{
  required: "Must Fill !",
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  },
  
  'duration':{
  maxlength: "Choose a company name of at least 14 letters!"
  },
  
  'training_year':{
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  //remote: "The username is already in use by another user!"
  },
  
  
  }
  
  });
  
  });
  
  $( document ).ready( function () {
  
  $("#profile-info").validate (  
  
  {
  
  rules:{
  
  'txt_link':{
  required: true,
  url: true
  },
  
  'dob':  {
  required: true,
  dateFormat: true
  //required: true
  //email_regex: true
  }
  
  
  },
  
  messages:{
  
  'txt_link':{
  url: "Please type valid url"
  
  },
  
  'dob':{
  required: "Must Fill !",
  dateFormat: 'Please type as per the date format'
  },
  
  }
  
  });
  
  });
  
</script>
<script >
  $.validator.addMethod("namespace_regex", function(value, element) {
  return this.optional(element) || /^[a-zA-Z ]*$/.test(value);  
  }, "Please choose only alphabets");
  
  
  
  $.validator.addMethod("email_regex", function(value, element) {
  return this.optional(element) || /^\w.+@[a-z-A-Z_]+?\.[a-zA-Z\-][\w-]{2,3}$/.test(value);
  }, "Please type valid Email");
  
  
  $.validator.addMethod("current_job_desig_regex", function(value, element) {
  return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/.test(value);
  }, "Please choose only alphabets");
  
  
  
  $.validator.addMethod("current_work_location_regex", function(value, element) {
  
  return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/.test(value);
    
  }, "Please choose only alphabets");
  
  
  $.validator.addMethod("phonenumber_regex", function(value, element) {
  
  return this.optional(element) || /^[1-9]{1}[0-9]{9}$/.test(value);
    
  }, "Please type 10 digit mobile number");
  
  
    $.validator.addMethod("twodigit_regex", function(value, element) {
  
  return this.optional(element) || /^[0-9]{1,2}$/.test(value);
    
  }, "Please type only two numbers");
  
  
  
  $.validator.addMethod("onedigit_regex", function(value, element) {
  
  return this.optional(element) || /^[0-9]{1,2}[:.,-]?$/.test(value);
    
  }, "Please type only one number");
  
  
  
  $.validator.addMethod("twodecimal_regex", function(value, element) {
  
  return this.optional(element) || /^\d{1,3}(\.\d{0,2})?$/.test(value);
    
  }, "Please type only two decimal numbers");
  
  
  
  $.validator.addMethod("companyname_regex", function(value, element) {
  
  return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/i.test(value);
  
  }, "Please choose only alphabets");
  
  
  $.validator.addMethod("contactname_regex", function(value, element) {
  
  return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
    
  }, "Please choose only alphabets");
  
  
  
  $.validator.addMethod("contpersonlevel_regex", function(value, element) {
  
  return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
  
  }, "Please choose only alphabets");
  
  
  $.validator.addMethod("companypincode_regex", function(value, element) {
  
  return this.optional(element) || /^[1-9][0-9][0-9][0-9][0-9][0-9]$/.test(value);
  
  }, "Please Enter 6 digits Pincode");
  
  $.validator.addMethod("dateFormat",
    function(value, element) {
        return value.match(/^dd?-dd?-dd$/);
    },
    "Please enter a date in the format dd-mm-yyyy.");
  
</script>
<script>
  
</script>
<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/search.js"></script>
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
  $('.select2').select2();
  // $("#dept_id").select2( {
  //   placeholder: "Select Department",
  //   allowClear: true
  //   } );
</script>
<script>
  $(".allowphonenumber").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace("^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$"));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
  
  
  //(^[ A-Za-z0-9_@./#&+-]*$)
  
  
  
  $(".allownumericwithoutdecimal").on("input", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^\d]+/, ""));
   if ((evt.which < 48 || evt.which > 57)) 
    {
    evt.preventDefault();
    }
  });
  
  
  
  $(".allowalphabatescomma").keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z, \s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        return false;
        }
    });
  
   $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
           //this.value = this.value.replace(/[^0-9\.]/g,'');
    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
           if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
               event.preventDefault();
           }
       });
  
  $(".allowalphabatesspace").keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z ]*$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        return false;
        }
    });
  $(".allowalphabates").keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z ]*$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        return false;
        }
    });
  
  
</script>
<script>
  // $(function() { 
       
      //  $("#my_date_picker").datepicker({ yearRange: '1900:'+ curr_year, changeMonth:true, changeYear:true, maxDate: '-1d'});
      // });    
  
        
</script>
<script> 
  //$(function(){
  //$("#start_date_picker").datepicker({ dateFormat: 'yy-mm-dd' });
   //  }); 
  $(document).ready(function () {
        var today = new Date();
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true,
            endDate: "today",
            maxDate: today
        }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
  
  
        $('.datepicker').keyup(function () {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });
    });
</script>
<script> 
  $(function(){
  $("#start_date_picker1").datepicker({ dateFormat: 'yy-mm-dd' });
     }); 
  
</script>
<!---script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
  $(document).ready(function(){
  var opts={
    delay: { show: 500, hide: 100 },
    animation: true,
    container: 'body',
    placement: 'right',
    trigger: 'focus'
  };
  $('[data-toggle="tooltip"]').tooltip(opts);
  });
  
  
  // <!-- bootstrap datepicker plugin -->
  
  $(document).ready(function(){
     var date_input=$('input[name="dob"]'); //our date input has the name "date"
     var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
     var options={
       autofocus: false,
       format: 'dd-mm-yyyy',
       container: container,
       todayHighlight: true,
       defaultViewDate: {year:1970,month:1,day:1},
       startView: 'decade',
       endDate: '0d',
       autoclose: true,
     };
     date_input.datepicker(options);
  });
   
  // <!-- Form validation code - depends on jquery.validate plugin -->
  
  //$.validator.setDefaults( {
  //submitHandler: function () {
    //alert( "submitted!" );
  // }
  // } );
  
  $.validator.addMethod( "pattern", function( value, element, param ) {
    if ( this.optional( element ) ) {
      return true;
    }
    if ( typeof param === "string" ) {
      param = new RegExp( "^(?:" + param + ")$" );
    }
    return param.test( value );
  }, "Invalid format." );
  
  $( document ).ready( function () {
  $( "#signup" ).validate( {
    rules: {
      username: {
        required: true,
        pattern: /^\w{3,25}$/,
        remote: "/ajaxstuff/is_username_available"
      },
      first_name: {
        required: true,
        pattern: /^[a-zA-Z]{1,35}$/
      },
      last_name: {
        required: true,
        pattern: /^[a-zA-Z]{1,}[a-zA-Z\'\-]{0,34}$/
      },
      dob: {
        required: true,
        pattern: /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
        remote: "/ajaxstuff/is_user_13"
      },
      email: {
        required: true,
        email: true,
        remote: "/ajaxstuff/is_email_available"
      },
      email2: {
        required: true,
        email: true,
        equalTo: "#email"
      },
      password: {
        required: true,
        pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s)[a-zA-Z0-9]{8,}$/
      },
      password2: {
        required: true,
        equalTo: "#password"
      }
    },
    messages: {
      username: {
        required: "Please enter your username - it has to be unique!",
        pattern: "Please try again your input does not match the rules",
        remote: "This username is already taken, please choose another one"
      },
      first_name: {
        required: "Please enter your first name",
        pattern: "Please try again your input does not match the rules"
      },
      last_name: {
        required: "Please enter your last or family name",
        pattern: "Please try again your input does not match the rules"
      },
      dob: {
        required: "Please select your date of birth",
        pattern: "The date might not match our format, please try again", 
        remote: "We are sorry you have to be over 13 years of age to take part in this website"
      },
      email: {
        required: "Please enter a unique email address for the site",
        email: "Please enter a valid email",
        remote: "This email is already taken, please choose another one"
      },
      email2: {
        required: "Please re-enter the same email as above",
        equalTo: "Please ensure your emails match"
      },
      password: {
        required: "Please enter a password",
        pattern: "Please try again your input does not match the rules"
      },
      password2: {
        required: "Please re-enter the same password as above",
        equalTo: "Please ensure your passwords match"
      }
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "help-block" );
  
      // Add `has-feedback` class to the parent div.form-group
      // in order to add icons to inputs
      element.parents( ".col-sm-10" ).addClass( "has-feedback" );
  
      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.parent( "label" ) );
      } else {
        error.insertAfter( element );
      }
  
      // Add the span element, if doesn't exists, and apply the icon classes to it.
      if ( element.nextAll( "span" ).length===0 )
  {
        $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
      }
    },
    success: function ( label, element ) {
      // Add the span element, if doesn't exists, and apply the icon classes to it.
      if ( element.nextAll( "span" ).length===0 )
  {
        $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
      $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
    },
    unhighlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
      $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
    }
  } );
  } );
  
  
  
</script>