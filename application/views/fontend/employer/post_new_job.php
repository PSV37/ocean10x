
<?php 
   $company_profile_id = $this->session->userdata('company_profile_id');
   
    $this->load->view('fontend/layout/employer_new_header.php');
    
    // print_r($this->session->userdata());die;
   ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/calender.css">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/jquery-ui.css"  type="text/css" />
<style>
   .required
   {
   color: red;
   }
   label.control-label {
   margin-top: 15px;
   }
   div#next {
   float: right;
   margin-right: 4px;
   }
   .form-group {
   margin-bottom: 26px;
   }
   .star-text {
   width: 53%;
   margin-top: 32px;   
   }
   .post-job{border-radius:13px;margin-top:39px;}
   .button{border:none;}
   #svg_form_time {
   height: 15px;
   max-width: 80%;
   margin: 20px auto 20px;
   display: block;
   }
   @media only screen and (max-width: 320px){
   .myfields ul {
   margin-left: -10px !important;
   }
   }
   @media only screen and (max-width: 375px){
   .myfields ul {
   width: 267px !important;
   margin-left: 19px;
   }
   .star-text {
   width: 50%;
   margin-top: 13px;
   margin-left: 6px;
   }
   }
   @media only screen and (max-width: 500px){
   .rate {
   float: none !important;
   padding: 0px !important;
   width: 157px !important;
   margin: 0 auto !important;
   }
   [type="checkbox"] + span {
   padding: 10px 7px !important;
   }
   .myfields ul {
   float: left !important;
   width: 167px; 
   }
   .btn-default1:not(:checked) + span {
   padding: 17px 10px !important;
   width: 154px !important;
   border-radius: 4px !important;
   }
   .btn-default1:input(:checked){
   padding: 17px 10px !important;
   width: 154px !important;
   border-radius: 4px !important; 
   }
   .myfields {
   margin-left: 5px !important;
   margin-top: 26px !important;
   }
   :checked + span {
   padding: 17px 10px !important;
   width: 154px !important;
   border-radius: 4px !important; 
   }
   }
   .myfields > input:checked ~ label {
   color: #2ea148;    
   }
   .myfields:not(:checked) > label:hover,
   .myfields:not(:checked) > label:hover ~ label {
   color: #2ea148;  
   }
   .myfields > label:hover + input:checked,
   .myfields > label:hover ~ label,
   .myfields > label:hover ~ input:checked ,
   .myfields > label:hover ~ label ~ input:checked ,
   .myfields > input:checked ~ label ~ label:hover  {
   color: #2ea148;
   }
   input[type="checkbox"] {
   margin: 4px 0 0;
   margin-top: 1px \9;
   line-height: normal;
   display: none;
   }
   .btn-default1:not(:checked) + span {
   background: #e4e2e2;
   /*padding: 8px 0;*/
   width: 100%;
   border-radius: 10px;
   cursor: pointer;
   }
   .btn-bottom_3 {
   float: right;
   margin-right: 47px;
   }
   /*.btn-default1:input(:checked){
   background-color: red;
   }*/
   .star-rating .fa-star{color: green;}
   }
   /*example*/
   label {
   position:relative;   
   cursor:pointer;
   }
   /*label [type="checkbox"] {
   display:none;
   }*/
   [type="checkbox"] + span {
   display:inline-block;
   padding:1em;
   border-radius: 10px;
   cursor: pointer;
   }
   /*.btn-default1:not(:checked) + span:hover {
   background-color: #2ea148 !important;
   }*/
   :checked + span {
   background:#18c5bd !important;
   display:inline-block; 
   width: 100%;
   color: #fff;   
   }
   [type="checkbox"][disabled] + span {
   background:#f00;  
   }
   section {
   padding: 5px 45px 25px !important;
   }
   input{
   border-radius: 4px;
   border: 1px solid lightgrey;
   display: inline-block;
   }
   span.options_beni {
   background: #18c5bd !important;
   display: inline-block;
   color: #fff;
   padding: 5px 12px !important;   
   font-size: 11px;
   border-radius:13px !important; }
   div#ui-datepicker-div {
   position: absolute;
   top: 333px;
   left: 1017.75px;
   z-index: 1;
   /*display: block;*/
   }
   button#check-btn {
   margin-left: 0px;
   height: 34px;
   }
   .btn-default1 {
   color: #fff;
   background-color: #18c5bd;
   border: none;
   border-radius: 13px;
   width: 75px;
   height: 21px;
   }
   .select2-container .select2-selection--single{
   height:34px !important;
   }
   /*.select2-container--default .select2-selection--single{
   border: 1px solid #ccc !important; 
   border-radius: 0px !important; 
   }*/
   input.select2-search__field {
   display: inline-block;
   border-radius: 0px;
   margin-top: 0px;
   color: black;
   }
   /*ul#select2-job_category-results {
   margin-top: 27px;
   }*/
   a.ui-state-default.ui-state-highlight.ui-state-active {
   background: #18c5bd;
   color: black;
   }
   textarea#jd {
   width:100%;
   display:block;
   max-width:100%;
   line-height:1.5;
   padding:15px 15px 30px;
   border-radius:3px;
   font:13px Tahoma, cursive;
   transition:box-shadow 0.5s ease;
   height:30%;
   }
   div#ui-datepicker-div {
   margin-left: -22px;
   }
   a.ui-state-default.ui-state-active {
   background: #70ece7;
   color: black;
   }
   a.ui-state-default.ui-state-highlight {
   background: #18c5bd;
   color: black;
   }
   .ui-autocomplete {
   max-height: 100px;
   overflow-y: auto;
   /* prevent horizontal scrollbar */
   overflow-x: hidden;
   }
   /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
   * html .ui-autocomplete {
   height: 100px;
   }
   span.select2-results {
   margin-top: 30px;
   }
   span.select2-selection.select2-selection--single {
   border-radius: 4px;
   }
   #edu_txt {
   margin-left:  160px;
   margin-top: -30px;
   background: none;
   border: none;
   }
   div#other_skills {
   margin-top: 10;
   }
   div#errorbox {
   margin-top: 25px;
    /*font-weight: bold;*/
   color: red;
   }
   p#or {
   /* margin-left: 141px; */
   margin-top: 15px;
   font-weight: bold;
   /* text-align: center; */
   }
   .error {
      color: red;
      /*background-color: #acf;*/
   }
</style>
<!---header--->
<!--form id="form_register"-->
<div class="container-fluid main-d">
   <div class="container">
      <div class="dropdown">
         <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
         <span class="caret"></span></button>
         <ul class="dropdown-menu">
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">JavaScript</a></li>
         </ul>
      </div>
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <?php echo $this->session->flashdata('success'); ?>
         <form id="test" action="<?php echo base_url() ?>employer/job_post" method="post" enctype="multipart/form-data">
            <div class="col-md-9 post-job">
               <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
               <div id="svg_wrap"></div>
               <!-- <section> -->
               <div class="col-md-3 col-sm-4">
                  <div class="formrow">
                     <label class="control-label ">Job Title / Designation<span class="required"> * </span> </label>
                     <input class="form-control allowalphanumeric" type="text"  name="job_title" placeholder="Enter Job Title" id="job_title" value="<?php if(!empty($this->session->userdata('title')) ){echo $this->session->userdata('title'); } elseif(!empty($job_info->job_title)){
                        echo $job_info->job_title;} ?><?php echo set_value('job_title'); ?>" class="form-control" autocomplete="off" >
                     <?php echo form_error('job_title'); ?>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4" >
                  <div class="formrow">
                     <label class="control-label ">Job Locations<span class="required"> * </span> </label>
                     <input type="text" name="city_id" class="allowalphanumeric form-control" id="tokenfield" style="display: inline-block;"  placeholder="Enter Location" onkeydown="check_key();"
                        value="<?php if(!empty($job_info->city_id) ){echo $job_info->city_id; } ?><?php echo set_value('city_id'); ?>"><?php echo form_error('city_id'); ?>
                  </div>
                  <label for="tokenfield" generated="true" class="error"></label>
               </div>
               <div class="col-md-3 col-sm-12" >
                  <div class="formrow exp_domain">
                     <label class="control-label ">Expected Domain<span class="required"> * </span> </label>
                     <select name="job_category" id="job_category" class="form-control select2 limiter-options" data-role="limiter" data-style="btn-default" data-live-search="true" >
                        <option value=""></option>
                        <?php
                           $value =  set_value('job_category');
                           if (!empty($value)) {
                             echo $this->job_category_model->selected($value);
                           }
                            if (!empty($this->session->userdata('job_category'))) {
                             echo $this->job_category_model->selected($this->session->userdata('job_category'));
                           } else if(!empty($job_info->job_category)) {
                              echo $this->job_category_model->selected($job_info->job_category);
                              }
                           
                               else {
                              echo $this->job_category_model->selected();
                              }
                              ?>
                     </select>
                     <?php echo form_error('job_category'); ?>               
                  </div>
               </div>
               <div class="col-sm-3 p-m-2">
                  <div class="formrow job_role">
                     <label  class="control-label ">Job Role<span class="required"> *</span></label>
                     <select name="job_role" id="job_role" class="form-control col-sm-5 select2" onchange="getSkillsdetails(this.value)" >
                        <option></option>
                        <?php 
                           $jrole_value =  set_value('job_role');
                           
                           if(!empty($job_role_data)) foreach ($job_role_data as $role_value) {
                             ?> 
                        <option value="<?php echo $role_value['id']; ?>"<?php 
                           if (!empty($jrole_value) && $jrole_value == $role_value['id'] ) {
                             echo 'selected';
                           }
                           elseif(!empty($job_info)) if($job_info->job_role==$role_value['id']) echo 'selected'; ?>><?php echo $role_value['job_role_title']; ?></option>
                        <?php } ?><?php echo form_error('job_role'); ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" id="job_education" >
                  <div class="formrow job_edu">
                     <label class="control-label">Education Level<span class="required"> * </span></label>
                     <select name="job_edu" id="job_edu" class="form-control select2" data-style="btn-default" data-live-search="true" onchange="getEducationSpecial(this.value)" >
                        <option value=""> </option>
                        <?php  $edu_value =  set_value('job_edu'); foreach($education_level as $education){?>
                        <option value="<?php echo $education['education_level_id']; ?>"<?php if($edu_value==$education['education_level_id']){ echo "selected"; }elseif($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                        <?php } ?>
                        <option value="other">Other </option>
                        <option value="other">None </option>
                     </select>
                     <?php echo form_error('job_edu'); ?>                
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" id="training_title1" >
                  <div class="formrow">
                     <label class="control-label">Education Level<span class="required"> * </span></label>
                     <input type="text" name="other_edu" class="form-control" id="other_edu" placeholder="ex.B.E"
                        value=""> <button type="button" id="edu_txt" onclick="education_list();"><i class="fa fa-undo" aria-hidden="true"></i></button>
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" >
                  <div class="formrow job_nature">
                     <label class="control-label ">Engagement Model<span class="required"> * </span> </label>
                     <select name="job_nature" id="job_nature" class="form-control select2" data-style="btn-default" data-live-search="true" onchange="change_text();" >
                        <option value=""></option>
                        <?php 
                           $job_nature_value =  set_value('job_nature');
                           if (!empty($job_nature_value)) {
                             echo $this->job_category_model->selected($job_nature_value); } else  if(!empty($job_info->job_nature)) {
                              echo $this->job_nature_model->selected($job_info->job_nature);
                              } else {
                              echo $this->job_nature_model->selected();
                              }
                              ?>
                     </select>
                     <?php echo form_error('job_nature'); ?>               
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" >
                  <div class="formrow exp_experience" >
                     <label class="control-label ">Expected Experience (in years)<span class="required"> *</span> </label>
                     <?php $exp=explode('-', $job_info->experience);  ?>
                     <div class="col-md-3 formrow" style="width:80px;margin-left:-14px;">
                        <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" id="exp_from" name="exp_from"  value="<?php echo $exp['0']; ?><?php echo set_value('exp_from'); ?>" > <?php echo form_error('exp_to'); ?>
                     </div>
                     <div class="col-md-3 formrow" style="width:80px;margin-left:-19px;">
                        <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="exp_to"  value="<?php echo $exp['1'];  ?><?php echo set_value('exp_to'); ?>" />
                        <?php echo form_error('exp_to'); ?>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" >
                  <div class="formrow">
                     <label class="control-label ">Number of Positions<span class="required"> *</span> </label>
                     <input class="form-control allownumericwithdecimal" min="1" type="text" maxlength="2" name="no_jobs" placeholder="ex.02"  value="<?php if(!empty($this->session->userdata('no_jobs')) ){echo $this->session->userdata('no_jobs'); }elseif(!empty($job_info->no_jobs)){ echo $job_info->no_jobs; } ?><?php echo set_value('no_jobs'); ?>" autocomplete="off">  <?php echo form_error('no_jobs'); ?>                
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" id="spectial" >
                  <div class="formrow preffered_certificates" >
                     <label class="control-label ">Certifications Preferred </label>
                     <select name="preffered_certificates" id="preffered_certificates" class="form-control select2" data-style="btn-default" data-live-search="true">
                      <option></option>
                        <?php $cret_value = set_value('preffered_certificates'); foreach($certificates as $certificate){?>
                        <option value="<?php echo $certificate['certificate_id']; ?>"<?php if($cret_value==$certificate['certificate_id']){ echo "selected"; }elseif($job_info->job_edu==$certificate['certificate_id']){ echo "selected"; }?>><?php echo $certificate['certificate_name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               
               
               <div class="col-md-3 col-sm-12">
                  <div class="formrow salrange" >
                     <label class="control-label " style="margin-left:-162px;"><span id="sal_text">Salary Range </span>(INR)<span class="required"> *</span> </label>
                     <div class="col-md-3 formrow" style="width:100px;margin-left:-14px;margin-top:37px;">
                        <?php $sal=explode('-', $job_info->salary_range);  ?>
                        <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" id="salrange_from" name="salrange_from"  value="<?php echo $sal[0]; ?><?php echo set_value('salrange_from'); ?>">
                     </div>
                     <div class="col-md-3 formrow" style="width:100px;margin-left:-19px;margin-top: 37px;">
                        <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="salrange_to"  value="<?php echo $sal[1]; ?><?php echo set_value('salrange_to'); ?>" />
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" >
                  <div class="formrow">
                     <label class="control-label">Job Post Expiry<span class="required"> * </span> </label>
                     <?php
                        $old_date = date('d-m-Y');
                        $next_due_date = date('d-m-Y', strtotime($old_date. ' +30 days'));
                        
                        ?>
                     <!-- <input type="date" name="job_deadline" class="form-control datepicker" id="job_deadline_day" min="<?php echo date('Y-m-d'); ?>" required value="<?php echo $next_due_date; ?>" autocomplete="off">  -->    
                     <input type="text" id="my_date_picker" name="job_deadline" style="display: inline-block;" class="form-control datepicker" id="job_deadline_day"  value="<?php $jb_deadline=set_value('job_deadline'); if(!empty($jb_deadline)){ echo $jb_deadline;} else{ echo $next_due_date; } ?>" autocomplete="off">     <?php echo form_error('job_deadline'); ?>
                  </div>
               </div>
               <div class="col-md-3 col-sm-12" >
                  <div class="formrow">
                     <label class="control-label ">Ocean Test Required <span class="required">*</span></label>
                     <select name="job_test_requirment" onchange="set_test();" id="job_test_requirment" class="form-control select2" data-style="btn-default" data-live-search="true" >
                        <option></option>
                        <option  value="Yes"<?php $test_value= set_value('job_test_requirment'); if($job_info->is_test_required=="Yes" || $test_value == "Yes"){ echo "selected"; }?>>Yes </option>
                        <option value="No"<?php if($job_info->is_test_required=="No" || $test_value == 'No'){ echo "selected"; }?>>No </option>
                     </select>
                     <?php echo form_error('job_test_requirment'); ?>             
                  </div>
               </div>
               <div class="col-md-3 col-sm-12"  style="    margin-right: 1;">
                  <div class="formrow test_div">
                     <label class="control-label ">Test</label>
                     <select name="test_for_job" id="test_for_job" class="form-control select2" data-style="btn-default" data-live-search="true" >
                       <?php  if (isset($oceanchamp_tests) && !empty($oceanchamp_tests)) {
                        foreach ($oceanchamp_tests as $row) { if ($row['test_status'] == '3') { ?>
                          <option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>
                        }else { ?>
                          <option value="<?php echo $row['test_id']; ?>">Ocean - <?php echo $row['test_name']; ?></option>
                     <?php   } }
                     } ?>
                  </select>
                     <?php echo form_error('test_for_job'); ?>             
                  </div>
               </div>
               
               <div class="col-sm-12 p-m-2" >
                  <div class="formrow">
                     <!-- donain is nothing but industry -->
                     <label class="control-label ">Skill Set<span class="required"> * </span> </label>
                     <div id="skills_result">Please Select Job Role.</div>
                     <?php  
                        $this->session->unset_userdata('skills');
                        if (!empty($job_info->skills_required)) {
                          
                          $data['skills'] = $job_info->skills_required;
                          # code...
                        }
                        elseif(!empty(set_value('skill_set[]')))
                        {
                           $data['skills'] = implode(',', set_value('skill_set[]')) ;
                        }
                         $this->session->set_userdata($data); ?>
                  </div>
                  <div id="skl_btn">
                     <button type="button"  value="other_skill" onclick="check_other(this.value);"  style="font-size:28px;color:#18c5bd;border: none; background: none;">  <i class="fa fa-plus-circle"  ></i></button>
                  </div>
                  <div id="other_skills"><input type="text"  name="otr_skl" id="other_skill"  style="display: inline-block; width: 30%" ><button type="button" id="check-btn" onclick="save_skill();"><i class="fa fa-check"></i></button></div>
                  <?php echo form_error('skill_set[]'); ?>                                  
               </div>
               <div class="col-md-12 col-sm-12" >
                  <div class="formrow" >
                     <label class="control-label">Other Benefits <span class="required"> * </span></label>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12" >
                  <div class="formrow" id="benifit">
                     <?php 
                        // print_r(set_value('benefits'));
                        if((isset($job_info) && !empty($job_info)) || ( !empty(set_value('benefits[]')))  )
                        { 
                         if (!empty($job_info)) {
                            $benefits_session=explode(',', $job_info->benefits); 
                         }
                         else
                         {
                             $benefits_session=set_value('benefits[]'); 
                         }
                        
                          foreach($benefits_session as $row){ 
                             
                           ?>
                     <label>
                     <input type="checkbox" value="<?php echo $row; ?>"  class="btn-default1" id="benifit[]" checked
                        name="benefits[]">
                     <span><?php echo $row; ?></span>
                     </label>
                     <?php   } 
                        foreach($benefits as $benefit){ 
                         if (!in_array($benefit['benifit'], $benefits_session)) {
                               
                             ?>
                     <label>
                     <input type="checkbox" value="<?php echo $benefit['benifit']; ?>" class="btn-default1" id="benifit[]" 
                        name="benefits[]">
                     <span><?php echo $benefit['benifit']; ?></span>
                     </label>
                     <?  } } }
                        //  
                                else{
                                 foreach($benefits as $benefit){?>
                     <label>
                     <input type="checkbox" value="<?php echo $benefit['benifit']; ?>" class="btn-default1" id="benifit[]" checked="" name="benefits[]">
                     <span><?php echo $benefit['benifit']; ?></span>
                     </label>
                     <?php } } ?>
                  </div>
                  <button type="button"  value="other" onclick="check_other(this.value);"  style="font-size:28px;color:#18c5bd;border: none; background: none;">  <i class="fa fa-plus-circle"  ></i></button>
                  <div id="other_terxtbx"><input type="text"  name="othe_benf" id="other_benifit"  style="display: inline-block; width: 30%" ><button type="button" id="check-btn" onclick="save_benifit();"><i class="fa fa-check"></i></button></div>
               </div>
               <?php echo form_error('benefits[]'); ?>                                  
               <!-- </div>
                  </div>  -->
               <div class="col-md-6 col-sm-12"  >
                  <div id="errorbox"></div>
                  <div class=" formrow">
                     <label class="control-label">Upload JD <span class="required"> * </span></label>  <?php if (!empty($job_info->jd_file)) { ?>  <a id="jd_file"   style="margin-left: 10px;" href="<?php echo base_url() ?>upload/job_description/<?php echo $job_info->jd_file; ?>" download name="jd_file"><?php echo $job_info->jd_file; ?></a><span style="margin-left: 15px" onclick="cancel_jd();" id="cross_btn"  ><i class="fa fa-times" aria-hidden="true"></i></span> <?php   } ?> 
                     <input type="file"  name="job_description" id="job_description" class="form-control my_checkbox_group"  > 
                     <input type="hidden" name="jd_session" id="jd_session" class="my_checkbox_group" value="<?php $jd_db_file = $job_info->jd_file; echo $jd_db_file; ?>">
                  </div>
               </div>
               <?php if (!empty($this->session->userdata('jd_file')) ) { ?>
               <div class="col-md-6 col-sm-12"  style=" margin-top: 45px;" >
                  <div class=" formrow">
                  </div>
               </div>
               <?php   } ?> 
               <div class="col-md-12 col-sm-4" >
                  <p id="or">OR</p>
                  <div class="formrow">
                     <label class="control-label">Job Description <span class="required"> * </span></label>
                     <textarea name="job_desc" id="jd" class="form-control my_checkbox_group" placeholder="Job Description"><?php if (!empty($job_info->job_desc) ) {
                        echo $job_info->job_desc;
                        } elseif(!empty($job_info)){ echo $job_info->job_desc; }  ?><?php echo set_value('job_desc'); ?></textarea><?php echo form_error('job_desc'); ?>                                  
                  </div>
               </div>
               <!-- </section> -->
               <div class="btn-bottom_3">
                  <!-- <div class="button" id="prev">&larr; Previous</div> -->
                  <!-- <div class="button" id="next">Next &rarr;</div> -->
                 <a href="<?php echo base_url() ?>employer/active-job"><button id="submit" type="button"  class="button">Cancel</button></a> 
                  <button  class="button" type="submit" name="preview">preview</button>
                  <button  type="submit" class="button"><?php if(!empty($job_info->job_post_id)){echo 'Update Job Post';} else{
                     echo "Post Job";
                  } ?></button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
});


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>


<script> 
   function change_text()
   {
      type = $('#job_nature').val();
     if (type != 5) 
     {
      $('#sal_text').text('Hourly Rate');
     }
     else
     {
       $('#sal_text').text('Salary Range');
     }
   }
   function set_test()
   {
      var oceantest = $('#job_test_requirment').val();
      // alert(oceantest);
      if (oceantest == 'Yes') 
      {
         $('.test_div').show();
      }
      else
      {
         $('.test_div').hide();

      }
   }
   $(document).ready(function() { 
   
     $('#other_terxtbx').hide();
     $('#skl_btn').hide();
     $('#other_skills').hide();
      $('#training_title1').hide();


       // $('.test_div').hide();
        var oceantest = $('#job_test_requirment').val();
      // alert(oceantest);
      if (oceantest == 'Yes') 
      {
         $('.test_div').show();
      }
      else
      {
         $('.test_div').hide();

      }
      var id=document.getElementById('job_role').value;
      // alert(id);
      getSkillsdetails(id);
   
   $("#tokenfield").keypress(function(event){
         var inputValue = event.charCode;
         alert(inputValue);
         if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
             event.preventDefault();
         }
     });
   
     $(function() { 
     
     $("#my_date_picker").datepicker({ dateFormat: 'dd-mm-yy',minDate: '0' });
     }); 
   
   
     $("#test").validate ({
       groups: {
        DateofBirth: "exp_from exp_to",
        salary_range: "salrange_from salrange_to"
    },
         errorPlacement: function(error, element) {
             if (element.attr("name") == "city_id" )
                 error.insertAfter(".tokenfield ");
               else if (element.attr("name") == "exp_from" || element.attr("name") == "exp_to" ) 
                 error.insertAfter(".exp_experience");

               else if (element.attr("name") == "salrange_from" || element.attr("name") == "salrange_to" ) 
                 error.insertAfter(".salrange");

               else if (element.attr("name") == "job_category" ) 
                 error.insertAfter(".exp_domain");

               else if (element.attr("name") == "job_role" ) 
                 error.insertAfter(".job_role");

              else if (element.attr("name") == "job_edu" ) 
                 error.insertAfter(".job_edu");

              else if (element.attr("name") == "preffered_certificates" ) 
                 error.insertAfter(".preffered_certificates");

              else if (element.attr("name") == "job_nature" ) 
                 error.insertAfter(".job_nature");
            
         else
       error.insertAfter(element);
    
   
       },
       rules: {
           
     
                   
   
   'benefits[]': { required: true, minlength: 1 },
     
    'job_category':{
    
          required: true,
        
         }, 
   'job_deadline':{

      required: true,
   },
   
   'job_role':{
    
          required: true,
          
         },

   // 'preffered_certificates':{
    
   //        required: true,
          
   //       },
        
   
   'city_id':{
    
          required: true,
          cityid_regex: true
         },
   
   'job_title':{
    
           required: true,
     },
    
   
    'exp_from': {
 
   
    required: true
   },
   
   'exp_to': {
                  
    minlength:1,

      greaterThan: "#exp_from",
   
    required: true
   },
   
   
   'no_jobs': {
                  
    minlength:1,
    
    required: true
   },
   

   'salrange_from': {
  
    required: true
   },
   
   'salrange_to': {
    greaterThan: "#salrange_from",

    required: true
   },
   
   
   'job_edu':{
   
   required: true,
   
   },
   
   
   'job_nature':{
   
   required: true,
   
   },
   
   // 'job_edu_special':{
   
   // required: true,
   
   // },
   
   'job_test_requirment':{
   
   required: true,
   
   },
   },

   messages:{
   
   'job_title':{
   
   required: "This field is mandatory!",
   
   maxlength: "Choose a company name of at least 14 letters!"
   
   },

   'job_category':{
   
   required: "This field is mandatory!",
   
   maxlength: "Choose a company name of at least 14 letters!"
   
   },
   'job_role':{
   
   required: "This field is mandatory!",
   
   maxlength: "Choose a company name of at least 14 letters!"
   
   },
   'preffered_certificates':{
   
   required: "This field is mandatory!",
   
   maxlength: "Choose a company name of at least 14 letters!"
   
   },
    'job_deadline':{

     required: "This field is mandatory!",
   },
   
   'city_id':{
   
   required: "This field is mandatory!",
   
   
   
   },
    'job_edu':{
   
   required: "This field is mandatory!",
   
 
   
   },
    'job_nature':{
   
   required: "This field is mandatory!",
 
   
   },
   
   
   'exp_from':{
   
    required: "This field is mandatory!",
   
    matches: "Didn't match!", 
          
    minlength: "Please Enter 1 digit number!",
          
    maxlength: "Maximum length 10 digits!"
   },
   
   'exp_to':{
   
    required: "This field is mandatory!",
   
    matches: "Didn't match!", 
          
    minlength: "Please Enter 1 digit number!",
          
    maxlength: "Maximum length 10 digits!",

     greaterThan : "second value of a range must be greater than the first"
   },
   
   'no_jobs':{
   
    required: "This field is mandatory!",
   
    matches: "Didn't match!", 
          
    minlength: "Please Enter 1 digit number!",
          
    maxlength: "Maximum length 10 digits!"
   },
   
   
   'salrange_from':{
   
    required: "This field is mandatory!",
   
    matches: "Didn't match!", 
          
    minlength: "Please Enter 1 digit number!",
          
    maxlength: "Maximum length 10 digits!"
   },
   
   'salrange_to':{
   
    required: "This field is mandatory!",
   
    matches: "Didn't match!", 
          
    minlength: "Please Enter 1 digit number!",
          
    maxlength: "Maximum length 10 digits!",

    greaterThan : "second value of a range must be greater than the first"
   },
   
   'benefits[]':{
   
    required: "This field is mandatory!",
   
    matches: "Didn't match!", 
          
    minlength: "Please select atleast one benifit!",
          
    maxlength: "Maximum length 10 digits!"
   },
   
   
   
   }
   }) ;
   });
</script> 
<script >
   $.validator.addMethod("jobtitle_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/i.test(value);
   
   }, "Please choose only alphabets");
   
   
   $.validator.addMethod("cityid_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/i.test(value);
   
   }, "Please choose only alphabets");
   
   $.validator.addMethod("contactname_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
   
   }, "Please choose only alphabets");
   
   $.validator.addMethod("greaterThan",
    function (value, element, param) {
          var $otherElement = $(param);
   return parseInt(value, 10) > parseInt($otherElement.val(), 10);
    });

   
   $.validator.addMethod("salrangefrom_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
   
   }, "Please choose only alphabets");
   
   
   $.validator.addMethod("salrangeto_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
   
   }, "Please choose only alphabets");
   
   
   $.validator.addMethod("companypincode_regex", function(value, element) {
   
   return this.optional(element) || /^[1-9][0-9][0-9][0-9][0-9][0-9]$/.test(value);
   
   }, "Please Enter 6 digits Company Pincode");
   
</script>
<script>
   $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
             //this.value = this.value.replace(/[^0-9\.]/g,'');
      $(this).val($(this).val().replace(/[^\d].+/, ""));
             if ((event.which < 48 || event.which > 57)) {
                 event.preventDefault();
             }
         });
   
   //(^[ A-Za-z0-9_@./#&+-]*$)
   
   $(".allowalphanumeric").keypress(function (e) {
          var regex = new RegExp("^[a-zA-Z!@#.”$%&’()*\+,\/;\[\\\]\^_`{|}~ \s]+$");
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
   
</script>
<script>
   function education_list()
   {
      var x1 = document.getElementById("training_title1");
       var x = document.getElementById("job_education");
       
         $('#job_education').show();
         $('#training_title1').hide();
   
   }
   function cancel_jd()
   {
     // alert('jd');
     $('#cross_btn').hide();
     $('#jd_file').hide();
     $('#jd_session').val("");
     <?php $jd_db_file = ""; ?>
   }
</script>
<script>
   $('.select2').select2();
</script>
<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/search.js"></script>
<script>
   $('#tokenfield').tokenfield({
     autocomplete: {
       source: "<?php echo base_url('Employer/search_city'); ?>",
       delay: 100,
       minLength: 2
     },
   
     showAutocompleteOnFocus: true,
   
   });
   // to avoid duplications
   $('#tokenfield').on('tokenfield:createtoken', function (event) {
     var existingTokens = $(this).tokenfield('getTokens');
   
     $.each(existingTokens, function(index, token) {
       
       if (token.value.toLowerCase() === event.attrs.value.toLowerCase())
             event.preventDefault();
   
     });
   });
   
   
   $("#job_title").autocomplete({
             
             source: "<?php echo base_url();?>Employer/search_title",
             minLength: 2
            
           });
   
   $("#other_skill").autocomplete({
             
             source: "<?php echo base_url();?>Employer/search_skill",
             minLength: 2
            
           });
   
   
   
       function save_benifit()
       {
        var othr_benifit = document.getElementById('other_benifit').value;
        $('#benifit').append('<label><input type="checkbox" value="'+othr_benifit+'" class="btn-default1" checked="" name="benefits[]"><span>'+othr_benifit+'</span></label>');
        document.getElementById('other_benifit').value = '';
        // alert(othr_benifit);
   
       }
   
        function save_skill()
       {
        var othr_skill = document.getElementById('other_skill').value;
        $('#skills_result').append('<div  id="myfields" class="myfields" ><ul class="rating-comments" > <label> <input type="checkbox" name="skill_set[]"  value=' +othr_skill+'  class="btn-default1" checked> <span>'+othr_skill+'</span> </label> </ul> </div>');
   
        document.getElementById('other_skill').value = '';
        // alert(othr_benifit);
   
       }
     
   
     
   
</script>
<script>
   function check_other(value)
   {
    var x1 = document.getElementById("other_terxtbx");
     // var x = document.getElementById("training_title");
     if (value=='other') 
   {
          $('#other_terxtbx').show();
   }
   else if(value == 'other_skill' )
   {
    $('#other_skills').show();
   }
   else
   {
       $('#other_terxtbx').hide();
       $('#other_skills').hide();
   
     x1.value = value;
   }
     
   }
</script>
<script>
   function getSkillsdetails(id)
   {
     if(id){
       $.ajax({
                 url:'<?php echo base_url();?>Employer/getSkillsByRole',
                 type:'POST',
                 data:{
                     role_id:id
                 },
                  dataType: "html",  
                  success: function(data)
                  {
                     $('#skills_result').html(data);
                        $('#skl_btn').show();
   
                  } 
           });
   
       }
   }
   
   function getEducationSpecial(id){
   
    var x1 = document.getElementById("training_title1");
    var x = document.getElementById("job_education");
    if (id=='other') 
   {
    
      $('#training_title1').show();
      $('#job_education').hide();
    } else {
     
      $('#job_education').show();
      $('#training_title1').hide();
   
   
   
    }
   
   
    
   if(id==5 || id==6){
    $('#spectial').hide();
   }
   else{
       $('#spectial').show();
           $.ajax({
               type:'POST',
               url:'<?php echo base_url();?>Employer/getEducation_specialization',
               data:{id:id},
               success:function(res){
                 $('#job_edu_special').html(res);
               }
       
           }); 
         }
   
   }
   (function () {
   document.getElementById('test').addEventListener('submit', function(event){
    // Get the length of the values of each input
    var jd = document.getElementById('jd').value.length;
    var jd_session = document.getElementById('jd_session').value.length;
     var   job_description = document.getElementById('job_description').value.length;
   
    // If both fields are empty stop the form from submitting
    if( jd === 0 && job_description === 0 && jd_session ===0 ) {
      event.preventDefault();
       $("#errorbox").html("Either Upload JD or fill Job Description");
      // alert('please fille Upload JD or Job Description');
    }
   }, false);
   })();
   
</script>
<!--  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
<!-- jquery validation plugin  -->
<!-- <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
   <script type="text/javascript" src="validation_reg.js"></script> 