<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<?php 
   $company_profile_id = $this->session->userdata('company_profile_id');
   
    $this->load->view('fontend/layout/employer_new_header.php');
    
    // print_r($this->session->userdata());die;
   ?>
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
   border: 1px solid lightgrey;}
   span.options_beni {
   background: #18c5bd !important;
   display: inline-block;
   color: #fff;
   padding: 5px 12px !important;   
   font-size: 11px;
   border-radius:13px !important; }
</style>
<!---header--->
<!--form id="form_register"-->
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <form id="test" action="<?php echo base_url() ?>employer/job_post" method="post">
            <div class="col-md-9 post-job">
               <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
               <div id="svg_wrap"></div>
               <!-- <section> -->
                  <div class="col-md-3 col-sm-4">
                     <div class="formrow">
                        <label class="control-label ">Job Title / Designation<span class="required"> * </span> </label>
                        <input class="form-control allowalphanumeric" type="text" name="job_title" value="<?php if(!empty($this->session->userdata('title')) ){echo $this->session->userdata('title'); } elseif(!empty($job_info->job_title)){
                           echo $job_info->job_title;} ?><?php echo set_value('job_title'); ?>" class="form-control" autocomplete="off" required="">
                        <?php echo form_error('job_title'); ?>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-4">
                     <div class="formrow">
                        <label class="control-label ">Job Locations<span class="required"> * </span> </label>
                        <input class="form-control allowalphabatescomma" type="text" name="city_id" class="form-control" id="tokenfield" placeholder="Enter Location"
                           value="<?php if(!empty($this->session->userdata('location')) ){echo $this->session->userdata('location'); } ?>" required><?php echo form_error('city_id'); ?>                   
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label ">Expected Domain<span class="required"> * </span> </label>
                        <select name="job_category" class="form-control" data-style="btn-default" data-live-search="true" required="">
                           <option value="">Select Expected Domain</option>
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
                  <div class="col-sm-3 p-m-2">
                     <div class="formrow">
                        <label  class="control-label ">Job Role<span class="required"> *</span></label>
                        <select name="job_role" id="job_role" class="form-control col-sm-5" onchange="getSkillsdetails(this.value)" required="">
                           <option>select job Role</option>
                           <?php if(!empty($job_role_data)) foreach ($job_role_data as $role_value) {
                              ?> 
                           <option value="<?php echo $role_value['id']; ?>"<?php if($this->session->userdata('jobrole')==$role_value['id']){ echo "selected"; } elseif(!empty($job_info)) if($job_info->job_role==$role_value['id']) echo 'selected'; ?>><?php echo $role_value['job_role_title']; ?></option>
                           <?php } ?><?php echo form_error('job_role'); ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label">Education Level<span class="required"> * </span></label>
                        <select name="job_edu" id="job_edu" class="form-control" data-style="btn-default" data-live-search="true" onchange="getEducationSpecial(this.value)" required="">
                           <option value="">Select Level </option>
                           <?php foreach($education_level as $education){?>
                           <option value="<?php echo $education['education_level_id']; ?>"<?php if($this->session->userdata('edu')==$education['education_level_id']){ echo "selected"; }elseif($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                           <?php } ?>
                        </select>
                        <?php echo form_error('job_edu'); ?>                
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label ">Engagement Model<span class="required"> * </span> </label>
                        <select name="job_nature" class="form-control" data-style="btn-default" data-live-search="true" required="">
                           <option value="">Select Engagement Model</option>
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
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label ">Expected Experience<span class="required"> *</span> </label>
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
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label ">Number of Positions<span class="required"> *</span> </label>
                        <input class="form-control allownumericwithdecimal" min="1" type="text" maxlength="2" name="no_jobs" required value="<?php if(!empty($this->session->userdata('no_jobs')) ){echo $this->session->userdata('no_jobs'); }elseif(!empty($job_info->no_jobs)){ echo $job_info->no_jobs; } ?>" autocomplete="off">  <?php echo form_error('no_jobs'); ?>                
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12" id="spectial">
                     <div class="formrow">
                        <label class="control-label ">Certifications Preferred <span class="required"> * </span></label>
                        <select name="job_edu_special" id="job_edu_special" class="form-control" data-style="btn-default" data-live-search="true">
                           <option value="">Select Certifications </option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label ">Ocean Test Required <span class="required">*</span></label>
                        <select name="job_test_requirment" id="job_test_requirment" class="form-control" data-style="btn-default" data-live-search="true" required="">
                           <option value="Yes"<?php if($job_info->is_test_required=="Yes"){ echo "selected"; }?>>Yes </option>
                           <option value="No"<?php if($job_info->is_test_required=="No"){ echo "selected"; }?>>No </option>
                        </select>
                        <?php echo form_error('job_test_requirment'); ?>             
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label " style="margin-left:-162px;">Salary Range<span class="required"> *</span> </label>
                        <div class="col-md-3 formrow" style="width:100px;margin-left:-14px;margin-top:37px;">
                           <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="salrange_from" value="">
                        </div>
                        <div class="col-md-3 formrow" style="width:100px;margin-left:-19px;margin-top: 37px;">
                           <input class="form-control allownumericwithdecimal" min="1" maxlength="2" type="text" name="salrange_to" value="<?php if(!empty($this->session->userdata('exp_to')) ){echo $this->session->userdata('exp_to'); } ?>" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                     <div class="formrow">
                        <label class="control-label ">Deadline<span class="required"> * </span> </label>
                        <input type="date" name="job_deadline" class="form-control datepicker" id="job_deadline_day" min="<?php echo date('Y-m-d'); ?>" required value="" autocomplete="off"><?php echo form_error('job_deadline'); ?>         
                     </div>
                  </div>
                  
                  <div class="col-sm-12 p-m-2">
                     <div class="formrow">
                        <!-- donain is nothing but industry -->
                        <label class="control-label ">Skill Set<span class="required"> * </span> </label>
                        <div id="skills_result">Please Select Job Role.</div>
                     </div>
                  </div>
             
                  <div class="col-md-12 col-sm-12">
                     <div class="formrow">
                        <label class="control-label">Other Benefits <span class="required"> * </span></label>
                     </div>
                  </div>
                  <!--     <textarea name="benefits" class="form-control ckeditor" placeholder="Company benefits offered"><?php if(!empty($job_info)) echo $job_info->benefits; ?>--->
                  <!--  <div class="form-control benifit-div" style="padding:10px 10px; height:auto;" > -->
                  <div class="col-md-12 col-sm-12">
                     <div class="formrow">
                        <?php foreach($benefits as $benefit){?>
                        <label>
                        <input type="checkbox" value="<?php echo $benefit['id']; ?>" class="btn-default1" checked="" name="benefits[]">
                        <span><?php echo $benefit['benifit']; ?></span>
                        </label>
                        <?php } ?>
                          <label>
                           <input type="button" value="4" class="btn-default1" checked="" name="benefits[]">
                           <span><i class="fa fa-plus"></i> Other</span>
                           </label>
                           <label>
                           <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                           <span></span>
                           </label>
                     </div>
                  </div>
                  <!-- </textarea><?php echo form_error('benefits'); ?>                                  -->
                  <!-- </div>
                     </div>  -->
                  <div class="col-md-6 col-sm-12">
                     <div class=" formrow">
                        <label class="control-label">Upload JD <span class="required"> * </span></label>
                        <input type="file" name="">                                  
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-4">
                     <div class="formrow">
                        <label class="control-label">Job Description <span class="required"> * </span></label>
                        <textarea name="job_desc" class="form-control ckeditor" placeholder="Job Description"><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea><?php echo form_error('job_desc'); ?>                                  
                     </div>
                  </div>
               <!-- </section> -->
               <div class="btn-bottom_3">
                  <!-- <div class="button" id="prev">&larr; Previous</div> -->
                  <!-- <div class="button" id="next">Next &rarr;</div> -->
                  <button class="button" type="submit" name="preview">preview</button>
                  <button type="submit" class="button">Post Job</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!--/form-->
<!-- <script type="text/javascript">
   $( '#preview' ).click( function(){
    var data = new FormData( $( 'form#test' )[ 0 ] );
   
    $.ajax( {
       processData: false,
       contentType: false,
   
       data: data,
       dataType: 'json',
       type: $( this ).attr( 'method' );
       url: <?php echo base_url() ?>'employer/preview_post_job',
       success: function( feedback ){
          console.log( "the feedback from your API: " + feedback );
       }
   });
   </script> -->
<script>
   $(document).ready(function(){
     $('input').keyup(function(){
       // alert('input');
         if($(this).val().length==$(this).attr("maxlength")){
             $(this).next().focus();
         }
     });
   
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
                    } 
             });
   
         
    $('#tokenfield').tokenfield({
     autocomplete: {
       source: "<?php echo base_url('Employer/search_city'); ?>",
       delay: 100
     },
   
     showAutocompleteOnFocus: true,
   
   });
   
   })
</script>

<script>
  
   // to avoid duplications
   
   $('#tokenfield').on('tokenfield:createtoken', function (event) {
     var existingTokens = $(this).tokenfield('getTokens');
     $.each(existingTokens, function(index, token) {
         if (token.value === event.attrs.value)
             event.preventDefault();
   
     });
   });
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
                  } 
           });
   
       }
   }
   
   function getEducationSpecial(id){
    
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
   $(document).ready(function()
   
   {
   
   $("#test").validate (  
   
   {
   
   rules:{
   
   'city_id':{
   
   required: true,
   
   //cityid_regex: true
   //minlength: 10,
   
   //maxlength: 10
   //company_phone_regex: true
   
   },
   
   
   // 'job_title':{
   
   // // required: true,
   
   // //jobtitle_regex: true
   
   // },
   
   
   'contact_name':{
   
   required: true,
   
   contactname_regex: true
   
   },
   
   'cont_person_level': {
   
   required: true,
   
   contpersonlevel_regex: true
   
   }, 
   
   'alternate_email_id':{
   
   required: true,
   
   email: true
   
   
   },
   
   'cont_person_email':{
   
   required: true,
   
   email: true
   
   
   },
   
   'exp_from': {
                   
     //minlength:1,
           
    // maxlength:10,
   
     required: true
   },
   
   'exp_to': {
                   
     minlength:1,
           
    // maxlength:10,
   
     required: true
   },
   
   
   'no_jobs': {
                   
     minlength:1,
           
    // maxlength:10,
   
     required: true
   },
   
   'salrange_from': {
                   
     //minlength:1,
           
    // maxlength:10,
     //salrangefrom_regex: true,
     required: true
   },
   
   'salrange_to': {
                   
     //minlength:1,
    // salrangeto_regex: true,    
    // maxlength:10,
   
     required: true
   },
   
   
   'job_edu':{
   
   required: true,
   
   },
   
   
   'job_nature':{
   
   required: true,
   
   },
   
   'job_edu_special':{
   
   required: true,
   
   },
   
   'job_test_requirment':{
   
   required: true,
   
   },
   
   
   'company_pincode':{
   
   required: true,
   
   companypincode_regex: true
   
   },
   
   'job_desc':{
   
   required: true,
   
   job_desc_regex: true
   
   }
   
     
   
   
   },
   
   messages:{
   
   'job_title':{
   
   required: "The name field is mandatory!",
   
   maxlength: "Choose a company name of at least 14 letters!"
   
   },
   
   
   'city_id':{
   
   required: "Please enter the Job Location!",
   
   //minlength: "Please Enter 10 digit phone numbers!",
   
   //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
   
   //remote: "The username is already in use by another user!"
   
   },
   
   
   'exp_from':{
   
     required: "The name field is mandatory!",
   
     matches: "Didn't match!", 
           
     minlength: "Please Enter 1 digit number!",
           
     maxlength: "Maximum length 10 digits!"
   },
   
   'exp_to':{
   
     required: "The name field is mandatory!",
   
     matches: "Didn't match!", 
           
     minlength: "Please Enter 1 digit number!",
           
     maxlength: "Maximum length 10 digits!"
   },
   
   'no_jobs':{
   
     required: "The name field is mandatory!",
   
     matches: "Didn't match!", 
           
     minlength: "Please Enter 1 digit number!",
           
     maxlength: "Maximum length 10 digits!"
   },
   
   
   'salrange_from':{
   
     required: "The name field is mandatory!",
   
     matches: "Didn't match!", 
           
     minlength: "Please Enter 1 digit number!",
           
     maxlength: "Maximum length 10 digits!"
   },
   
   'salrange_to':{
   
     required: "The name field is mandatory!",
   
     matches: "Didn't match!", 
           
     minlength: "Please Enter 1 digit number!",
           
     maxlength: "Maximum length 10 digits!"
   },
   
   'contact_name':{
   
   required: "The name field is mandatory!",
   
   maxlength: "Choose a company name of at least 14 letters!"
   
   },
   
   'cont_person_level':{
   
   required: "The name field is mandatory!",
   
   maxlength: "Choose a company name of at least 14 letters!"
   
   },
   
   'job_desc':{
   
   required: "Please fill Job Description!",
   
   //minlength: "Please Enter 10 digit phone numbers!",
   
   //company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",
   
   //remote: "The username is already in use by another user!"
   
   },
   
   
   'alternate_email_id':{
   
   required: "The Email is required!",
   
   email: "Please enter a valid email address!",
   
   remote: "The email is already in use by another user!"
   
   },
   
   'cont_person_email' :{
   
   required: "The Email is required!",
   
   email: "Please enter a valid email address!",
   
   remote: "The email is already in use by another user!"
   
   },
   
   'company_url':{
   
   required: "The Web Address is required!"
   
   },
   
   'username':{
   
   required: "The username field is mandatory!",
   
   minlength: "Choose a username of at least 4 letters!",
   
   username_regex: "You have used invalid characters. Are permitted only letters numbers!",
   
   remote: "The username is already in use by another user!"
   
   }
   
   
   }
   
   });
   
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