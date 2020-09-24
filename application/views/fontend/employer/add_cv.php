<?php 
  $this->load->view('fontend/layout/employer_new_header.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/calender.css">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/jquery-ui.css"  type="text/css" />
<style type="text/css">
  button.save_cv {
  margin-top: 29px;
  margin-left: 84px;
  background-color: #18c5bd;
  border: 0px;
  width: 100px;
  border-radius: 30px;
  font-size: 15px;
  font-weight: bold;
  height: 35px;
  }
  button.cancel {
  margin-top: 29px;
  margin-left: 60px;
  background-color: #18c5bd;
  border: 0px;
  width: 100px;
  border-radius: 30px;
  font-size: 15px;
  font-weight: bold;
  height: 35px;
  }
  .required
  {
  color: red;
  }
  .col-md-9.employe_add {
  background-color: white;
  margin-top: 40px;
  border-radius: 14;
  border-radius: 31;
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
  margin-top: 15px;
  }
  span.select2-selection.select2-selection--single {
  border-radius: 4px;
  }
  label.error {
  color: red;
  }
  div#ui-datepicker-div {
  margin-left: 9px;
  }
  input[type="text"] {
  display: inline-block;
  }
  input#candidate_skills {
  display: none;
  }
  input.capital {
  text-transform: capitalize;
  }
</style>
<div class="container-fluid main-d">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <div id="smsg"><?php echo $this->session->flashdata('success'); ?></div>
      <form role="form" id="js" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/add_new_cv/<?php if(!empty($id)){echo $id;} ?><?php if(!empty($fid)){echo '?fid='.$fid;} ?>" method="post">
        <div id="smsg"><?php echo $this->session->flashdata('success'); ?></div>
        <div class="col-md-9 employe_add">
          <?php $currency = $this->session->userdata('currency') ?>
          <div class="row">
            <div class="col-md-6">
              <h4 class="employee_heading">ADD NEW CV</h4>
            </div>
            <div class="col-md-6">
              <input style="float: right;" type="checkbox" name="send_email">Send Email to Candidate ?
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">                   
                <input type="hidden" name="cv_id" value="<?php if(isset($cv_bank_data) && !empty($cv_bank_data)){
                  echo $cv_bank_data['cv_id'];
                  } ?>">                
                <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                <input type="text" name="candidate_name" id="candidate_name" class="form-control allowalphabates capital " value="<?php $val=set_value('candidate_name'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_name'];
                  } ?>"> <?php echo form_error('candidate_name'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Email<span class="required"> *</span></label>
                <!--<label for="exampleInputEmail1">Email Id <span class="required"> *</span></label>-->
                <input type="email" name="candidate_email" id="candidate_email" class="form-control ui-autocomplete-input" value="<?php $val=set_value('candidate_email'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_email'];
                  } ?>" autocomplete="off"> <?php echo form_error('candidate_email'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number<span class="required"> *</span></label>
                <input type="text" name="candidate_phone" id="candidate_phone" class="form-control allownumericwithoutdecimal" maxlength="10" value="<?php $val=set_value('candidate_phone'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_mobile'];
                  } ?>">   <?php echo form_error('candidate_phone'); ?>          
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Experience (Yrs)</label>
                <!--<label for="exampleInputEmail1">Yrs of Experience</label>-->
                <input type="text" name="candidate_experiance" id="candidate_experiance" value="<?php $val=set_value('candidate_experiance'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_experience'];
                  } ?>" maxlength="3"  class="form-control allownumericwithdecimal"><?php echo form_error('candidate_experiance'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Job Notice (Days)</label>
                <!--<label for="exampleInputEmail1">Notice Period at Current Job (Days)</label>-->
                <input type="text" name="candidate_notice_period" id="candidate_notice_period " maxlength="3"  value="<?php $val=set_value('candidate_notice_period'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_current_notice_period'];
                  } ?>" class="form-control allownumericwithoutdecimal">  <?php echo form_error('candidate_notice_period'); ?> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Engagement</label>
                <!--<label for="exampleInputEmail1">Job Type</label>-->
                <select id="job_type" name="job_type " class="form-control select2">
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
                <?php echo form_error('job_type'); ?>  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Designation</label>
                <!--<label for="exampleInputEmail1">Current Job Designation</label>-->
                <input type="text" name="current_job_desig" id="current_job_desig" class="form-control allowalphabates capital" value="<?php $val=set_value('current_job_desig'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_current_designation'];
                  } ?>">    <?php echo form_error('current_job_desig'); ?> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Working at Current Job Since</label>
                <input type="text" id="my_date_picker" name="working_current_since" style="display: inline-block;" class="form-control datepicker "   value="<?php $val=set_value('working_current_since'); if(isset($val) && !empty($val))
                  {
                     echo date("d-m-Y", strtotime($val));
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data['js_working_since'])){
                     echo date("d-m-Y", strtotime($cv_bank_data['js_working_since']));
                  } ?>">  
                <!--  <input type="text" name="working_current_since" id="working_current_since" class="form-control datepicker">  <?php echo form_error('working_current_since'); ?>    -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"> Yearly Salary (CTC - <?php if (isset($currency) && !empty($currency)) {
                  $locale='en-US'; //browser or user locale
                   // $currency='JPY';
                   $fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
                   $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
                   header("Content-Type: text/html; charset=UTF-8;");
                      echo $symbol;echo $symbol;
                  } ?>)</label>
                <!--<label for="exampleInputEmail1">Current CTC <?php if (isset($currency) && !empty($currency)) {
                  $locale='en-US'; //browser or user locale
                   // $currency='JPY';
                   $fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
                   $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
                   header("Content-Type: text/html; charset=UTF-8;");
                      echo $symbol;
                  } ?></label>-->
                <input type="text" name="current_ctc" id="current_ctc" class="form-control allownumericwithdecimal" maxlength="5" value="<?php $val=set_value('current_ctc'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_current_ctc'];
                  } ?>">   <?php echo form_error('current_ctc'); ?>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Last Salary Hike Date</label>
                <!--<label for="exampleInputEmail1">Last Salary Hike</label>-->
                <input type="text" name="last_salary_hike" id="last_salary_hike" class="form-control datepicker" max="<?php echo date('Y-m-d'); ?>" value="<?php $val=set_value('last_salary_hike'); if(isset($val) && !empty($val))
                  {
                     echo date("d-m-Y", strtotime($val));
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo date("d-m-Y", strtotime($cv_bank_data['js_last_salary_hike']));
                  } ?>">
                <!--  <span><i class="fa fa-calendar" aria-hidden="true"></i></span> -->  
                <?php echo form_error('last_salary_hike'); ?>     
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Company</label>
                <!--<label for="exampleInputEmail1">Current Organization</label>-->
                <input type="text" name="current_org" id="current_org" class="form-control allowalphabatesspace capital" value="<?php $val=set_value('current_org'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['current_org'];
                  } ?>">    <?php echo form_error('current_org'); ?> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Location</label>
                <input type="text" name="current_work_location" id="current_work_location" class="form-control">       <?php echo form_error('current_work_location'); ?>
               
                
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Top Education</label>
                <!-- <input type="text" name="top_education" id="top_education" class="form-control">       <?php echo form_error('top_education'); ?> -->
                <select name="top_education" id="top_education" class="form-control select2" data-style="btn-default" data-live-search="true" >
                  <option value=""> </option>
                  <?php  $edu_value =  set_value('top_education'); foreach($education_level as $education){?>
                  <option value="<?php echo $education['education_level_id']; ?>"<?php if($edu_value==$education['education_level_id']){ echo "selected"; }elseif($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                  <?php } ?>
                  <option value="other">Other </option>
                  <option value="other">None </option>
                </select>
                <?php echo form_error('top_education'); ?>      
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Certifications</label>
                <select name="candidate_certification" id="preffered_certificates" class="form-control select2" data-style="btn-default" data-live-search="true">
                  <option></option>
                  <?php $cret_value = set_value('candidate_certification'); foreach($certificates as $certificate){?>
                  <option value="<?php echo $certificate['certificate_id']; ?>"<?php if($cret_value==$certificate['certificate_id']){ echo "selected"; }elseif($job_info->job_edu==$certificate['certificate_id']){ echo "selected"; }?>><?php echo $certificate['certificate_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Domain</label>
                <!--<label for="exampleInputEmail1">Industry</label>-->
                <select name="candidate_industry" id="candidate_industry" class="form-control select2" data-role="limiter" data-style="btn-default" data-live-search="true" >
                  <option value=""></option>
                  <?php
                    $value =  set_value('candidate_industry');
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
                <?php echo form_error('candidate_industry'); ?>
              </div>
            </div>
            
          </div>
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Role</label>
                <!--<label for="exampleInputEmail1">Role</label>-->
                <select id="candidate_role" name="candidate_role" class="form-control select2">
                  <option value=""></option>
                  <?php $value= set_value('candidate_role'); if (!empty($job_role)): foreach ($job_role as $role_row) : ?>
                  <option value="<?php echo $role_row['id']; ?>" <?php if (isset( $value) &&  $value==$role_row['id']) { echo "selected";
                    # code...
                    } ?> ><?php echo $role_row['job_role_title']; ?></option>
                  <?php  endforeach; endif; ?>
                </select>
                <?php echo form_error('candidate_role'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Expected Salary(CTC - <?php if (isset($currency) && !empty($currency)) {
                  $locale='en-US'; //browser or user locale
                   // $currency='JPY';
                   $fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
                   $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
                   header("Content-Type: text/html; charset=UTF-8;");
                      echo $symbol;echo $symbol;
                  } ?>)</label>
                <input type="text" name="candidate_expected_sal" id="candidate_expected_sal" class="form-control allownumericwithdecimal"  maxlength="5" value="<?php $val=set_value('candidate_expected_sal'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_expected_salary'];
                  } ?>">  <?php echo form_error('candidate_expected_sal'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Desired Work Location</label>
                <input type="text" name="desired_wrok_location" id="tokenfield" class="form-control" style="display: inline-block;" value="<?php $val=set_value('desired_wrok_location'); if(isset($val) && !empty($val))
                  {
                     echo $val;
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data)){
                     echo $cv_bank_data['js_desired_work_location'];
                  } ?>"> <?php echo form_error('desired_wrok_location'); ?>
              </div>
            </div>
            
          </div>
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">
                  SkypeId
                </label>
                <input type="text" name="skypid" id="skypid" class="form-control" style="display: inline-block;">   <?php echo form_error('skypid'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Proposed Interview Date</label>
                <input type="text" id="interview_picker" name="proposed_interview_date" style="display: inline-block;" class="form-control datepicker "   value="<?php $val=set_value('proposed_interview_date'); if(isset($val) && !empty($val))
                  {
                     echo date("d-m-Y", strtotime($val));
                  }
                  elseif(isset($cv_bank_data) && !empty($cv_bank_data['js_proposed_interview_date'])){
                     echo date("d-m-Y", strtotime($cv_bank_data['js_proposed_interview_date']));
                  } ?>">  
                <!--  <input type="text" name="proposed_interview_date" id="proposed_interview_date" class="form-control datepicker">  <?php echo form_error('proposed_interview_date'); ?>    -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Upload Resume</label>
                <input type="file" name="candidate_resume" id="candidate_resume" class="form-control" style="display: inline-block;">   <?php echo form_error('candidate_resume'); ?>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group" id="candidate_skills">
              <label class="control-label">Skills: <span class="required"> * </span></label><br>
              <?php if (!empty($skills)) {
                foreach($skills as $row){ ?>
              <label>
              <input type="checkbox" value="<?php echo $row['skill_name']; ?>" class="btn-default1" id="candidate_skills" checked="" name="candidate_skills[]">
              <span><?php echo $row['skill_name']; ?></span>
              </label>
              <?php }  }  ?>
            </div>
            <button type="button"  value="other" onclick="check_other(this.value);"  style="font-size:28px;color:#18c5bd;border: none; background: none;">  <i class="fa fa-plus-circle"  ></i></button>
            <div id="other_terxtbx"><input type="text"  name="othe_benf" id="other_benifit"  style="display: inline-block; width: 30%" ><button type="button" id="check-btn" onclick="save_benifit();"><i class="fa fa-check"></i></button></div>
          </div>
          <div class="col-md-12">
            <!-- <div class="col-md-4"> -->
            <div class="form-group">
              <button  style="float: right;" class="btn btn-primary save_cv">Save CV</button>
              <button id="submit" style="float: right;" type="button" onclick="history.back()" class="btn btn-primary cancel">Cancel</button>
            </div>
            <!-- </div> -->
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script> -->
<script>
  $(document).ready (function(){
    $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
    $("#smsg").slideUp(500);
    });   
  });
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
  
</script> 
<script>
  $('.select2').select2();
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
  
  else
  {
      $('#other_terxtbx').hide();
     
  
    // x1.value = value;
  }
    
  }
</script>
<script>
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
  });
  
  
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>
<script> 
  function save_benifit()
     {
      var othr_benifit = document.getElementById('other_benifit').value;
      $('#candidate_skills').append('<label><input type="checkbox" value="'+othr_benifit+'" class="btn-default1" checked="" name="candidate_skills[]"><span>'+othr_benifit+'</span></label>');
      document.getElementById('other_benifit').value = '';
      // alert(othr_benifit);
  
     }
  $(document).ready(function() { 
     $('#other_terxtbx').hide();
  
    $(function() { 
   
   $("#my_date_picker").datepicker({ dateFormat: 'dd-mm-yy',maxDate: '0', changeMonth: true,
   changeYear: true,
   yearRange: '2000:' + new Date().getFullYear().toString() });
   $("#last_salary_hike").datepicker(
    { dateFormat: 'dd-mm-yy',maxDate: '0', changeMonth: true,
   changeYear: true,
   yearRange: '2000:' + new Date().getFullYear().toString() });
var oneYearFromNow = new Date().getFullYear() +1.toString();

    $("#interview_picker").datepicker(
    { 

      dateFormat: 'dd-mm-yy',minDate: '0', changeMonth: true,
   changeYear: true,
   yearRange: new Date().getFullYear().toString()+':'+oneYearFromNow });
  });
  
  $("#js").validate (  
  
  {
  
  rules:{
  
  'candidate_name':{
  
  required: true,
  minlength: 3,
  namespace_regex: true
  },
  
  'candidate_email':{
  
  required: true,
  email_regex: true
  
  },
  
  'candidate_phone':{
  
  required: true,
  
  phonenumber_regex: true
  
  }, 
  
  'candidate_experiance':{
 
  },
  
  'candidate_notice_period':{
  
  maxlength:3
  //email: true
  },

  
  'current_job_desig':{
  
  namespace_regex: true

  },
  
  
 
  
  
  'current_ctc':{
  twodecimal_regex: true
 
  },
 
  
  'candidate_skills':{
  required: true
 
  },
 
  'candidate_expected_sal':{
  
  twodecimal_regex: true
  
  // /companypincode_regex: true
  
  } , 
  
  'desired_wrok_location': {
  //namespace_regex: true
  // companypincode_regex: true
  
  }
  
  },
  
  messages:{
  
  'candidate_name':{
  
  required: "This field is mandatory!",
  
  minlength: "Please type atleast 3 characters!",
  
  namespace_regex: "Please type only alphabets"
  
  },
  
  'candidate_email':{
  
  required: "This field is mandatory!",
  
  matches: "Didn't match!", 
      
  minlength: "Please Enter 10 digit phone numbers!",
      
  maxlength: "Maximum length 10 digits!"
  },
  
  'candidate_phone':{
  
  required: "This field is mandatory!",
  
  minlength: "Please type atleast 10 digits",
  maxlength: "Please type atleast 10 digits"
  
  },
  
  'candidate_experiance':{
  
  maxlength: "Choose a company name of at least 14 letters!"
  
  },
  
  'candidate_notice_period':{
  
  //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
  
  //remote: "The username is already in use by another user!"
  
  },
  
  
  'job_type':{
  
  email: "Please enter a valid email address!",
  
  remote: "The email is already in use by another user!"
  
  },
  
  'current_job_desig' :{
  
  email: "Please enter a valid email address!",
  
  remote: "The email is already in use by another user!"
  
  },
  
  
  'working_current_since':{
  
  required: "This field is mandatory!",
  minlength: "Choose a username of at least 4 letters!",
  
  username_regex: "You have used invalid characters. Are permitted only letters numbers!",
  
  remote: "The useername is already in use by another user!"
  
  }
  
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
  
  return this.optional(element) || /^\d{1,2}(\.\d{1,2})?$/.test(value);
    
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
  
  }, "Please Enter 6 digits Company Pincode");
  
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
    $(this).val($(this).val().replace(/[^0-9\.\d{1,2}]/g,''));
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
        var regex = new RegExp("^[a-zA-Z -]*$");
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
  function validateEmail(email) { 
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   return re.test(email);
  } 
</script>
<script type="text/javascript">
  $(function() {
  $("#candidate_email").autocomplete({
      source: "<?php echo base_url('employer/get_candidate_by_email'); ?>",
      select: function(a,b)
        {
             // alert(b.item.value);
          $(this).val(b.item.value); //grabed the selected value
          getcandidateinfo(b.item.value);
  
        }
    });
  });
  function getcandidateinfo(candidate_email){
  
  $.ajax({
          url:'<?php echo site_url('employer/get_profile') ?>',
          type:'post',
         
           dataType: "JSON",  
            data:{
                email:candidate_email
          },
           success: function(data)
           {
             console.log(data);
             $.each(data, function(index, value) 
              {
                // console.log(value);
                 // $('#candidate_email').val(candidate_email);
                 $('#candidate_phone').val(value.mobile_no);
                 $('#candidate_experiance').val(value.js_career_exp);
                 $('#candidate_notice_period').val(value.notice_period);
                 // $('#job_type').val(value.job_area);
                 // $('#current_job_desig').val(value.contact_name);
                 // $('#working_current_since').val(value.cont_person_email);
                 $('#current_ctc').val(value.js_career_salary);
                 $('#last_salary_hike').val(value.last_salary_hike);
                 $('#top_education').val(value.edu_high);
                 $('#candidate_skills').val(value.skills);
                 $('#candidate_certification').val(value.training_title);
                 $('#candidate_industry').val(value.industry_name);
                 $('#candidate_role').val(value.job_role);
                 // $('#candidate_expected_sal').val(value.company_pincode);
                 $('#desired_wrok_location').val(value.job_area);
                
                 // getStates(value.country_id);
                 // getCitys(value.state_id);
              });
           } 
    });
  // savecompanymapping(value.company_profile_id);
  }
</script>