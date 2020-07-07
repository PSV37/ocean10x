<!---header-->

<?php 
   $company_profile_id = $this->session->userdata('company_profile_id');
   
    $this->load->view('fontend/layout/employer_new_header.php');
    
    // print_r($this->session->userdata());die;
   ?>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/calender.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
         <form id="test" action="<?php echo base_url() ?>employer/job_post" method="post" enctype="multipart/form-data">
            <div class="col-md-9 post-job">
               <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
               <div id="svg_wrap"></div>
               <!-- <section> -->
                  <div class="col-md-3 col-sm-4" tabindex="0">
                     <div class="formrow">
                        <label class="control-label ">Job Title / Designation<span class="required"> * </span> </label>
                        <input class="form-control allowalphanumeric" type="text"  name="job_title" placeholder="Enter Job Title" id="job_title" value="<?php if(!empty($this->session->userdata('title')) ){echo $this->session->userdata('title'); } elseif(!empty($job_info->job_title)){
                           echo $job_info->job_title;} ?><?php echo set_value('job_title'); ?>" class="form-control" autocomplete="off" required="">
                        <?php echo form_error('job_title'); ?>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-4" tabindex="1">
                     <div class="formrow">
                        <label class="control-label ">Job Locations<span class="required"> * </span> </label>
                      
                           <input type="text" name="city_id" class="form-control allowalphabatescomma" id="tokenfield" style="display: inline-block;"  placeholder="Enter Location"
                        value="<?php if(!empty($this->session->userdata('location')) ){echo $this->session->userdata('location'); } ?>"><?php echo form_error('city_id'); ?>
                       
                                     
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" tabindex="2">
                     <div class="formrow">

                        <label class="control-label ">Expected Domain<span class="required"> * </span> </label>
                        <select name="job_category" id="job_category" class="form-control select2 limiter-options" data-role="limiter" data-style="btn-default" data-live-search="true" required="">
                           <!-- <option value="">Select Expected Domain</option> -->
                           <?php if(!empty($job_info->job_category)) {
                              echo $this->job_category_model->selected($job_info->job_category);
                              } else {
                              echo $this->job_category_model->selected();
                              }
                              ?>
                        </select>
                        <?php echo form_error('job_category'); ?>               
                     </div>
                  </div>
                  <div class="col-sm-3 p-m-2" tabindex="3">
                     <div class="formrow">
                        <label  class="control-label ">Job Role<span class="required"> *</span></label>
                        <select name="job_role" id="job_role" class="form-control col-sm-5 select2" onchange="getSkillsdetails(this.value)" required="">
                           <!-- <option>select job Role</option> -->
                           <?php if(!empty($job_role_data)) foreach ($job_role_data as $role_value) {
                              ?> 
                           <option value="<?php echo $role_value['id']; ?>"<?php if($this->session->userdata('jobrole')==$role_value['id']){ echo "selected"; } elseif(!empty($job_info)) if($job_info->job_role==$role_value['id']) echo 'selected'; ?>><?php echo $role_value['job_role_title']; ?></option>
                           <?php } ?><?php echo form_error('job_role'); ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" id="job_education" tabindex="4">
                     <div class="formrow">
                        <label class="control-label">Education Level<span class="required"> * </span></label>
                        <select name="job_edu" id="job_edu" class="form-control select2" data-style="btn-default" data-live-search="true" onchange="getEducationSpecial(this.value)" required="">
                           <!-- <option value="">Select Level </option> -->
                           
                           <?php foreach($education_level as $education){?>
                           <option value="<?php echo $education['education_level_id']; ?>"<?php if($this->session->userdata('edu')==$education['education_level_id']){ echo "selected"; }elseif($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                           
                           <?php } ?>
                           <option value="other">Other </option>
                           <option value="other">None </option>
                        </select>
                        
                        <?php echo form_error('job_edu'); ?>                
                     </div>
                  </div>
                   <div class="col-md-3 col-sm-12" id="training_title1" tabindex="5">
                     <div class="formrow">
                        <label class="control-label">Education Level<span class="required"> * </span></label>
                          <input type="text" name="other_edu" class="form-control" id="other_edu" placeholder="ex.B.E"
                           value=""> <button type="button" id="edu_txt" onclick="education_list();"><i class="fa fa-undo" aria-hidden="true"></i></button>
                         </div>
                      </div>
                  <div class="col-md-3 col-sm-12" tabindex="6">
                     <div class="formrow">
                        <label class="control-label ">Engagement Model<span class="required"> * </span> </label>
                        <select name="job_nature" class="form-control select2" data-style="btn-default" data-live-search="true" required="">
                           <!-- <option value="">Select Engagement Model</option> -->
                           <?php if(!empty($job_info->job_nature)) {
                              echo $this->job_nature_model->selected($job_info->job_nature);
                              } else {
                              echo $this->job_nature_model->selected();
                              }
                              ?>
                        </select>
                        <?php echo form_error('job_nature'); ?>               
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" tabindex="7">
                     <div class="formrow">
                        <label class="control-label ">Expected Experience(in years)<span class="required"> *</span> </label>
                        <!--  <input class="form-control" type="text" name="experience" maxlength="2" value="<?php 
                           if(!empty($job_info->experience)){ echo $job_info->experience;
                            }
                           ?>" autocomplete="off" required> -->
                        <div class="col-md-3 formrow" style="width:80px;margin-left:-14px;">
                           <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="exp_from"  value="<?php if(!empty($this->session->userdata('exp_from')) ){echo $this->session->userdata('exp_from'); } ?>" />
                        </div>
                        <div class="col-md-3 formrow" style="width:80px;margin-left:-19px;">
                           <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="exp_to" value="<?php if(!empty($this->session->userdata('exp_to')) ){echo $this->session->userdata('exp_to'); } ?>" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" tabindex="8">
                     <div class="formrow">
                        <label class="control-label ">Number of Positions<span class="required"> *</span> </label>
                        <input class="form-control allownumericwithdecimal" min="1" type="text" maxlength="2" name="no_jobs" placeholder="ex.02" required value="<?php if(!empty($this->session->userdata('no_jobs')) ){echo $this->session->userdata('no_jobs'); }elseif(!empty($job_info->no_jobs)){ echo $job_info->no_jobs; } ?>" autocomplete="off">  <?php echo form_error('no_jobs'); ?>                
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" id="spectial" tabindex="9">
                     <div class="formrow">
                        <label class="control-label ">Certifications Preferred <span class="required"> * </span></label>
                        <select name="preffered_certificates" id="preffered_certificates" class="form-control select2" data-style="btn-default" data-live-search="true">
                           <?php foreach($certificates as $certificate){?>
                           <option value="<?php echo $certificate['certificate_id']; ?>"<?php if($this->session->userdata('preffered_certificates')==$certificate['certificate_id']){ echo "selected"; }elseif($job_info->job_edu==$certificate['certificate_id']){ echo "selected"; }?>><?php echo $certificate['certificate_name']; ?></option>
                           
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" tabindex="10">
                     <div class="formrow">
                        <label class="control-label ">Ocean Test Required <span class="required">*</span></label>
                        <select name="job_test_requirment" id="job_test_requirment" class="form-control" data-style="btn-default" data-live-search="true" required="">
                           <option value="Yes"<?php if($job_info->is_test_required=="Yes"){ echo "selected"; }?>>Yes </option>
                           <option value="No"<?php if($job_info->is_test_required=="No"){ echo "selected"; }?>>No </option>
                        </select>
                        <?php echo form_error('job_test_requirment'); ?>             
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" tabindex="11">
                     <div class="formrow">
                        <label class="control-label " style="margin-left:-162px;">Salary Range (INR)<span class="required"> *</span> </label>
                        <div class="col-md-3 formrow" style="width:100px;margin-left:-14px;margin-top:37px;">
                           <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="salrange_from" value="<?php if(!empty($this->session->userdata('salrange_from')) ){echo $this->session->userdata('salrange_from'); } ?>">
                        </div>
                        <div class="col-md-3 formrow" style="width:100px;margin-left:-19px;margin-top: 37px;">
                           <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="salrange_to" value="<?php if(!empty($this->session->userdata('salrange_to')) ){echo $this->session->userdata('salrange_to'); } ?>" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" tabindex="12">
                     <div class="formrow">
                        <label class="control-label">Deadline<span class="required"> * </span> </label>
                       <?php
                          $old_date = date('Y-m-d');
                          $next_due_date = date('Y-m-d', strtotime($old_date. ' +30 days'));
                          
                        ?>
                        <!-- <input type="date" name="job_deadline" class="form-control datepicker" id="job_deadline_day" min="<?php echo date('Y-m-d'); ?>" required value="<?php echo $next_due_date; ?>" autocomplete="off">  -->    
                        <input type="text" id="my_date_picker" name="job_deadline" style="display: inline-block;" class="form-control datepicker" id="job_deadline_day" min="<?php echo date('Y-m-d'); ?>" required value="<?php echo $next_due_date; ?>" autocomplete="off">     <?php echo form_error('job_deadline'); ?>
                     </div>
                  </div>
                  
                  <div class="col-sm-12 p-m-2" tabindex="13">
                     <div class="formrow">
                        <!-- donain is nothing but industry -->
                        <label class="control-label ">Skill Set<span class="required"> * </span> </label>
                        <div id="skills_result">Please Select Job Role.</div>
                     </div>
                   <div id="skl_btn">
                      <button type="button"  value="other_skill" onclick="check_other(this.value);"  style="font-size:28px;color:#18c5bd;border: none; background: none;">  <i class="fa fa-plus-circle"  ></i></button>
                   </div>
                       
                           
                     <div id="other_skills"><input type="text"  name="otr_skl" id="other_skill"  style="display: inline-block; width: 30%" ><button type="button" id="check-btn" onclick="save_skill();"><i class="fa fa-check"></i></button></div>
                  </div>
             
                  <div class="col-md-12 col-sm-12" tabindex="14">
                     <div class="formrow" >
                        <label class="control-label">Other Benefits <span class="required"> * </span></label>
                     </div>
                  </div>
                  <!--     <textarea name="benefits" class="form-control ckeditor" placeholder="Company benefits offered"><?php if(!empty($job_info)) echo $job_info->benefits; ?>--->
                  <!--  <div class="form-control benifit-div" style="padding:10px 10px; height:auto;" > -->
                  <div class="col-md-12 col-sm-12" tabindex="15">
                     <div class="formrow" id="benifit">
                        <?php foreach($benefits as $benefit){?>
                        <label>
                        <input type="checkbox" value="<?php echo $benefit['benifit']; ?>" class="btn-default1" checked="" name="benefits[]">
                        <span><?php echo $benefit['benifit']; ?></span>
                        </label>
                        <?php } ?>

                          

                        </div>
                        <button type="button"  value="other" onclick="check_other(this.value);"  style="font-size:28px;color:#18c5bd;border: none; background: none;">  <i class="fa fa-plus-circle"  ></i></button>
                        <!-- <label>
                           <button type="button" value="other" class="btn-default1" checked="" name="benefits[]" onclick="check_other(this.value);">
                           <span><i class="fa fa-plus"></i> Other</span></button>

                           </label> -->
                        <div id="other_terxtbx"><input type="text"  name="othe_benf" id="other_benifit"  style="display: inline-block; width: 30%" ><button type="button" id="check-btn" onclick="save_benifit();"><i class="fa fa-check"></i></button></div>
                  </div>
                  <!-- </textarea><?php echo form_error('benefits'); ?>                                  -->
                  <!-- </div>
                     </div>  -->
                  <div class="col-md-6 col-sm-12" tabindex="16" >
                     <div class=" formrow">
                        <label class="control-label">Upload JD <span class="required"> * </span></label>
                        <input type="file" name="job_description" class="form-control">          <?php if (!empty($this->session->userdata('jd_file')) ) { ?>
                         <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $this->session->userdata('jd_file'); ?>" download>Job_description</a>
                     <?php   } ?>                        
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-4" tabindex="17">
                     <div class="formrow">
                        <label class="control-label">Job Description <span class="required"> * </span></label>
                        <textarea name="job_desc" id="jd" class="form-control ckeditor" placeholder="Job Description"><?php if (!empty($this->session->userdata('job_desc')) ) {
                          echo $this->session->userdata('job_desc');
                        } elseif(!empty($job_info)){ echo $job_info->job_desc; }  ?></textarea><?php echo form_error('job_desc'); ?>                                  
                     </div>
                  </div>
               <!-- </section> -->
               <div class="btn-bottom_3">
                  <!-- <div class="button" id="prev">&larr; Previous</div> -->
                  <!-- <div class="button" id="next">Next &rarr;</div> -->
                  <button tabindex="18" class="button" type="submit" name="preview">preview</button>
                  <button tabindex="19" type="submit" class="button">Post Job</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script type="text/javascript">
window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){alert('enter'); e.preventDefault();return false;}}},true);
</script>
   
</script>
<script>
function education_list()
{
   var x1 = document.getElementById("training_title1");
    var x = document.getElementById("job_education");
    
      $('#job_education').show();
      $('#training_title1').hide();

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
$(document).ready(function() {  
$('#tokenfield').on('keypress keydown keyup', function(e){
  alert(e.keyCode);
       if(e.keyCode == 13) { e.preventDefault(); }
    });


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
        alert(token.value);
        alert(event.attrs.value);
        
          if (token.value === event.attrs.value)
              event.preventDefault();

      });
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
    $(document).ready(function() { 
    
      $('#other_terxtbx').hide();
      $('#skl_btn').hide();
      $('#other_skills').hide();
       var id=document.getElementById('job_role').value;
       // alert(id);
       getSkillsdetails(id);


      $(function() { 
        $("#my_date_picker").datepicker(); 
      }); 
    }) 
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
   $(document).ready(function(){
 
   
      $('#training_title1').hide();
   
     var id=document.getElementById('job_role');
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
   
         
  
   
   })
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
   
   
</script>
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
jquery validation plugin //-->
<!-- <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script type="text/javascript" src="validation_reg.js"></script>
<script src="js/jquery.validate.js"></script>  -->

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