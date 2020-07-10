<?php 
   $this->load->view('fontend/layout/employer_new_header.php');?>
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
   .error {
      color: red;
      /*background-color: #acf;*/
   }
   }
div#ui-datepicker-div {
    margin-left: 9px;
}
</style>
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <form role="form" id="js" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/add_new_cv" method="post">
            <div class="col-md-9 employe_add">
               <div class="col-md-12">
                  <h4 class="employee_heading">ADD NEW CV</h4>
               </div>
               <div class="col-md-12">
                  <div class="col-md-4">
                     <div class="form-group">                                       
                        <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                        <input type="text" name="candidate_name" id="candidate_name" class="form-control"> <?php echo form_error('candidate_name'); ?>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email Id <span class="required"> *</span></label>
                        <input type="email" name="candidate_email" id="candidate_email" class="form-control ui-autocomplete-input"  autocomplete="off"> <?php echo form_error('candidate_email'); ?>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number<span class="required"> *</span></label>
                        <input type="text" name="candidate_phone" id="candidate_phone" class="form-control" maxlength="10" >   <?php echo form_error('candidate_phone'); ?>          
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Yrs of Experience</label>
                        <input type="text" name="candidate_experiance" id="candidate_experiance" class="form-control"><?php echo form_error('candidate_experiance'); ?>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Notice Period at Current Job</label>
                        <input type="text" name="candidate_notice_period" id="candidate_notice_period" class="form-control">  <?php echo form_error('candidate_notice_period'); ?> 
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Job Type</label>
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
                        <label for="exampleInputEmail1">Current Job Designation</label>
                        <input type="text" name="current_job_desig" id="current_job_desig" class="form-control">    <?php echo form_error('current_job_desig'); ?> 
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Working at Current Job Since</label>

                         <input type="text" id="my_date_picker" name="working_current_since" style="display: inline-block;" class="form-control datepicker"   value="">  
                       <!--  <input type="text" name="working_current_since" id="working_current_since" class="form-control datepicker">  <?php echo form_error('current_work_location'); ?>    -->
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Current CTC</label>
                        <input type="text" name="current_ctc" id="current_ctc" class="form-control">   <?php echo form_error('current_ctc'); ?>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Last Salary Hike</label>
                        <input type="text" name="last_salary_hike" id="last_salary_hike" class="form-control datepicker"><span><i class="fa fa-calendar" aria-hidden="true"></i></span>  <?php echo form_error('last_salary_hike'); ?>     
                     </div>
                  </div>
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
                  <!-- <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Skills</label>
                        <div class="tokenfield form-control"><input type="text" name="candidate_skills" id="tokenfield" class="skill form-control" value="" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" tabindex="-1" style="position: absolute; left: -10000px;"></div>
                        <?php echo form_error('skills'); ?>   
                     </div>
                  </div> -->
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
               </div>
               <div class="col-md-12">
                  
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Industry</label>
                       
                          <select name="candidate_industry" id="candidate_industry" class="form-control select2" data-role="limiter" data-style="btn-default" data-live-search="true" >
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
                        <?php echo form_error('candidate_industry'); ?>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select id="candidate_role" name="candidate_role" class="form-control select2">
                           <option value="">Select Role</option>
                           <?php if (!empty($job_role)): foreach ($job_role as $role_row) : ?>
                           <option value="<?php echo $role_row['id']; ?>"><?php echo $role_row['job_role_title']; ?></option>
                           <?php  endforeach; endif; ?>
                        </select>
                        <?php echo form_error('candidate_role'); ?>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Expected Salary</label>
                        <input type="text" name="candidate_expected_sal" id="candidate_expected_sal" class="form-control">   <?php echo form_error('candidate_expected_sal'); ?>

                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Desired Work Location</label>
                        <input type="text" name="desired_wrok_location" id="tokenfield" class="form-control" style="display: inline-block;">   <?php echo form_error('desired_wrok_location'); ?>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <button  class="btn btn-primary save_cv">save cv</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script>


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
   $(document).ready(function() { 
   
   	$(function() { 
     
     $("#my_date_picker").datepicker({ dateFormat: 'yy-mm-dd' });
     $("#last_salary_hike").datepicker({ dateFormat: 'yy-mm-dd' });
     });

   	$("#js").validate (  

{

rules:{

'candidate_name':{

required: true
},

'candidate_email':{

required: true,

contactname_regex: true

},

'candidate_phone': {

required: true,

contpersonlevel_regex: true

}, 

// 'candidate_experiance':{

// required: true,

// email: true
// },

// 'candidate_notice_period':{
// required: true,
// email: true
// },

// 'job_type': {
                
//   minlength:10,
        
//   maxlength:10,

//   required: true
// },

// 'current_job_desig':{

// required: true,

// url: true

// },


// 'current_work_location':{

// required: true

// // /companypincode_regex: true

// },

// 'working_current_since':{

// required: true

// // /companypincode_regex: true

// },

// 'current_ctc':{

// required: true

// // /companypincode_regex: true

// },

// 'last_salary_hike':{

// required: true

// // /companypincode_regex: true

// },

// 'top_education':{

// required: true

// // /companypincode_regex: true

// },

// 'candidate_skills':{

// required: true

// // /companypincode_regex: true

// },

// 'candidate_certification':{

// required: true

// // /companypincode_regex: true

// },

// 'candidate_industry':{

// required: true

// // /companypincode_regex: true

// },

// 'candidate_role':{

// required: true

// // /companypincode_regex: true

// },

// 'candidate_expected_sal':{

// required: true

// // /companypincode_regex: true

// } , 

// 'desired_wrok_location':{

// required: true

// // /companypincode_regex: true

// }

},

messages:{

'candidate_name':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!",

},
'candidate_email':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!",

},
'candidate_phone':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!",

},



}

});
   });
   
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