<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Update Vacancy</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Update Vacancy</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('update'); ?>
            <form id="submit" action="<?php echo base_url() ?>employer/job_post" method="post" class="submit-form">
              <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory"><b>Job Title / Designation</b> <span class="required">*</span></label>
                    <input type="text" readonly name="job_title" required value="<?php 
                                            	 if(!empty($job_info->job_title)){
                                            	 	echo $job_info->job_title;
                                            	 }
                                            ?>" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory"><b>Expected Domain</b> <span class="required">*</span></label>
                    <select name="job_category" required class="form-control" id="job_category" data-style="btn-default" data-live-search="true">
                      <option value="">Select Domain</option>
                      <?php if(!empty($job_info->job_category)) {
                                                echo $this->job_category_model->selected($job_info->job_category);
                                                } else {
                                                   echo $this->job_category_model->selected();
                                                }
                                                 ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
			          <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory"><b>Job Level</b> <span class="required">*</span></label>
                    <select name="job_level" required class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Job Level</option>
                      <?php if(!empty($job_info->job_level)) {
                                                echo $this->job_level_model->selected($job_info->job_level);
                                                } else {
                                                   echo $this->job_level_model->selected();
                                                }
                                                 ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label"><b>Engagement Model</b> <span class="required">*</span></label>
                    <select name="job_nature"  class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Engagement Model</option>
                      <?php if(!empty($job_info->job_nature)) {
                                                echo $this->job_nature_model->selected($job_info->job_nature);
                                                } else {
                                                   echo $this->job_nature_model->selected();
                                                }
                                                 ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label><b>Job Role</b> <span class="required">*</span></label>
                      <select name="job_role" id="job_role" class="form-control col-sm-5" onchange="getSkillsdetails(this.value)">
                        <option value="">Select Role</option>
                        <?php if(!empty($job_role_data)) foreach ($job_role_data as $role_value) {
                           ?> 
                          <option value="<?php echo $role_value['id']; ?>"<?php if(!empty($job_info)) if($job_info->job_role==$role_value['id']) echo 'selected'; ?>><?php echo $role_value['job_role_title']; ?></option>
                        <?php } ?>       
                      </select>
                  </div>
                </div>
              </div>
			   <!-- end row -->
              <div class="panel-body"></div>
              <div class="row">
                <div class="formrow">
                  <div class="col-md-12 col-sm-12"> 
                    <label><b>Skill Set</b> <span class="required">*</span></label><br>
                    <div id="skills_result">Please Select Job Role.</div>
                  </div>
                </div>
              </div>
              <div class="panel-body"></div>
			  
              <div class="row">
								<!-- 	<div class="col-md-4 col-sm-12">
									<div class="formrow">
									<label class="control-label"><b>Job Country</b> <span class="required">*</span> </label>
									  <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
									  
										<option value="">Select Country</option>
										<?php foreach($country as $key){?>
										<option value="<?php echo $key['country_id']; ?>"<?php if($job_info->job_location==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
										<?php } ?>
									  </select>
                  </div>
									</div>
										<div class="col-md-4 col-sm-12">
										<div class="formrow">
										<label class="control-label"><b>Job State</b> <span class="required">*</span> </label>
										<select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
										 <option value="">Select Country First</option>
										 <?php foreach($state as $keys){?>
										 <option value="<?php echo $keys['state_id']; ?>"<?php if($job_info->state_id==$keys['state_id']){ echo "selected"; }?>><?php echo $keys['state_name']; ?></option>
										 <?php } ?>
										</select>
                                        </div>
										</div> -->
										<div class="col-md-4 col-sm-12">
										  <div class="formrow">
										    <label class="control-label"><b>Job City</b> <span class="required">*</span> </label>
										
                          <input type="text" name="city_id" class="form-control" id="tokenfield" placeholder="Enter Location" value="<?php 
                             if(!empty($job_info->city_id)){
                              echo $job_info->city_id;
                             }
                          ?>">
                      </div>
										</div>
                    <div class="col-md-4 col-sm-12">
                      <div class="formrow">
                        <label class="control-label"></b>Working Hours</b> <span class="required">*</span></label>
                        <input type="text"  name="working_hours" value="<?php 
                                                 if(!empty($job_info->working_hours)){
                                                    echo $job_info->working_hours;
                                                 }
                                            ?>" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="formrow">
                      <label class="control-label"><b>Job Deadline</b> <span class="required">*</span></label>
                      
                      <div class="row">
                      <div class="col-md-12 col-sm-12">
                         <input type="text" name="job_deadline" class="form-control datepicker" id="job_deadline_day" required value="<?php echo date('d-m-Y',strtotime($job_info->job_deadline))?>">
                      </div>
                      
                    </div>
                  </div>
                 </div>
                
              </div>
              <!-- end row -->
              
              <div class="row">
			           
                 <div class="col-md-4">
                  <div class="formrow">
                    <label class="control-label "><b>Compensation Range</b> <span class="required">*</span></label>
                    <input type="text" id="salary_range" name="salary_range" onkeyup="javascript:changeSalary();" class="form-control"  value="<?php 
                                                 if(!empty($job_info->salary_range)){
                                                    echo $job_info->salary_range;
                                                 }
                                            ?>" >
                  </div>
                </div>
                 <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label "><b>Number of Positions</b> </label>
                    <input class="form-control"  name="no_jobs" value="<?php 
                                                 if(!empty($job_info->no_jobs)){
                                                    echo $job_info->no_jobs;
                                                 }
                                            ?>" type="number" min="1"/>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label "><b>Work Experience</b></label>
                    <input class="form-control"  name="experience" value="<?php 
                                                 if(!empty($job_info->experience)){
                                                    echo $job_info->experience;
                                                 }
                                            ?>"  type="number" min="1"/>
                  </div>
                </div>
          <!--       <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory"><b>Job Types</b> <span class="required">*</span></label>
                    <select name="job_types" required class="form-control" data-style="btn-default" data-live-search="true"
                      <?php if(!empty($job_info->job_types)) {echo $this->job_types_model->selected_types($job_info->job_types);}else {echo $this->job_types_model->selected_types();} ?>
                    </select>
                  </div>
                </div> -->
              </div>
              <!-- end row -->
              
              <!-- <hr class="invis"> -->
              <!-- <div class="row"> -->
			         
              <!--   <div class="col-sm-4">
                  <div class="formrow">
                    <label class="control-label"><b>Preferred Age(From)</b></label>
                    
                    	<select name="preferred_age_from" class="form-control" id="preferred_age_from" required>
                      <option value="" selected>Age From</option>
                      <?php
					  					
										for($i=20;$i<=60;$i++){
											$selected='';
											if($job_info->preferred_age==$i){
												$selected='selected';
											}
											echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';	
										}
									?>
                    </select>
					</div>
					</div> -->
             <!--            <div class="col-sm-4">
						<div class="formrow">
						<label class="control-label"><b>Preferred Age(To)</b></label>
						<select name="preferred_age_to" class="form-control" id="preferred_age_to" required>
						
                      <option value="" selected>Age To</option>
                      <?php
					  
										for($i=21;$i<=60;$i++){
											$selected='';
											if($job_info->preferred_age_to==$i){
												$selected='selected';
											}
											echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';	
										}
									?>
                    </select>
					</div>
                    </div> -->
                    
                  <!-- </div> -->
                <!-- </div> -->
                
              
              <!-- end row -->
              
              <div class="row">
               
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label "><b>Education Level</b> <span class="required">*</span></label>
                    <select name="job_edu" id="job_edu" class="form-control" data-style="btn-default" data-live-search="true" onchange="getEducationSpecial(this.value)">
                      <option value="">Select Education </option>
                      <?php if(!empty($job_info->job_edu)) {
                                                echo $this->education_level_model->selected($job_info->job_edu);
                                                } else {
                                                   echo $this->education_level_model->selected();
                                                }
                                                 ?>
                    </select>
                  </div>
                </div>

                 <div class="col-md-4 col-sm-12" id="spectial"> 
                  <div class="formrow">  
                    <label class="control-label "><b>Specialization</b> <span class="required">*</span></label>
                    <select name="job_edu_special" id="job_edu_special" class="form-control"  data-style="btn-default" data-live-search="true" required="">
                     <option value="">Select Specialization </option>
                      <?php
                        foreach($education_specialization as $spec_row){
                      ?>
                        <option value="<?php echo $spec_row['id']; ?>"<?php if($job_info->edu_specialization==$spec_row['id']){ echo "selected"; }?>><?php echo $spec_row['education_specialization']; ?></option>
                     <?php } ?>
    
                    </select> 
                  </div>
                </div>
                 <div class="col-md-4 col-sm-12"> 
                  <div class="formrow">  
                    <label class="control-label ">Ocean Test Required <span class="required">*</span></label>
                    <select name="job_test_requirment" id="job_test_requirment" class="form-control"  data-style="btn-default" data-live-search="true" required="">
                     <option value="">Select One </option>
                     <option value="Yes"<?php if($job_info->is_test_required=="Yes"){ echo "selected"; }?>>Yes </option>
                     <option value="No"<?php if($job_info->is_test_required=="No"){ echo "selected"; }?>>No </option>
                    </select> 
                  </div>
                </div>

              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Job Description (JD) <span class="required">*</span></label>
                    <textarea name="job_desc" class="form-control ckeditor" required><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12">	
                  <div class="formrow">
                    <label class="control-label mandatory">Other Expected Skills </label>
                    <textarea name="education" required class="form-control ckeditor" ><?php if(!empty($job_info)) echo $job_info->education; ?></textarea>
                  </div>
                </div>
              </div>
			  
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Company Benefits Offered</label>
                    <textarea name="benefits" required class="form-control ckeditor" ><?php if(!empty($job_info)) echo $job_info->benefits; ?></textarea>
                  </div>
                </div>
              </div>
              <hr class="invis">
              <button class="btn btn-primary" type="submit">Update Vacancy</button>
            </form>
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

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>



<script>

   $('#tokenfield').tokenfield({
      autocomplete: {
        source: "<?php echo base_url('Employer/search_city'); ?>",
        delay: 100
      },

      showAutocompleteOnFocus: true,
    

    });
    // to avoid duplications
 $('#tokenfield').on('tokenfield:createtoken', function (event) {
      var existingTokens = $(this).tokenfield('getTokens');
      $.each(existingTokens, function(index, token) {
          if (token.value === event.attrs.value)
              event.preventDefault();

      });
  });
	// function getStates(id){
	// 	if(id){
 //            $.ajax({
 //                type:'POST',
 //                url:'<?php echo base_url();?>Employer/getstate',
 //                data:{id:id},
 //                success:function(res){
 //                    $('#state_id').html(res);
 //                }
				
 //            }); 
 //          }
   
	//    }
	   
	// function getCitys(id){
	// 	if(id){
 //            $.ajax({
 //                type:'POST',
 //                url:'<?php echo base_url();?>Employer/getcity',
 //                data:{id:id},
 //                success:function(res){
 //                  $('#city_id').html(res);
 //                }
				
 //            }); 
 //          }
	//    }

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

  $(document).ready(function(){

    // function getStates_load(){
    //     var id = $('#country_id').val();

    //     if(id){
    //         $.ajax({
    //             type:'POST',
    //             url:'<?php echo base_url();?>Employer/getstate',
    //             data:{id:id},
    //             success:function(res){
    //                 $('#state_id').html(res);
    //                 $('#state_id').val(<?php echo $job_info->state_id; ?>);
    //                  getCitys_load(<?php echo $job_info->state_id; ?>);
    //             }
                
    //         }); 
    //       }
   
    //    }
    
    // function getCitys_load(id){
    //   //var id = $('#state_id').val();
    //   // alert(id);
    //     if(id){
    //         $.ajax({
    //             type:'POST',
    //             url:'<?php echo base_url();?>Employer/getcity',
    //             data:{id:id},
    //             success:function(res){
    //                 $('#city_id').html(res);
    //                 $('#city_id').val(<?php echo $job_info->city_id; ?>);
    //             }
                
    //         }); 
    //       }
   
    //    }


 function getEducationSpecial_load(){
    var id = $('#job_edu').val();
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
                  $('#job_edu_special').val(<?php echo $job_info->edu_specialization; ?>);
                }
        
            }); 
          }
   
    }

  function getSkillsdetails_load()
    {
      var id = $('#job_role').val();
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
                      $('#skills_result').val(<?php echo $job_info->job_role; ?>);
                   } 
            });

      }
}

  // getCitys_load();
  // getStates_load();
  getSkillsdetails_load();
  getEducationSpecial_load();
});
	   
</script> 

<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>

<script>
$("#job_category").select2( {
	placeholder: "Select Industry",
	allowClear: true
	} );
</script> 
<script>
$("#country_id").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script> 