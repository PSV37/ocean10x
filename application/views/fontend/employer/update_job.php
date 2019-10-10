<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>

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
<<<<<<< HEAD
                    <label class="control-label mandatory">Job Title<span class="required">*</span></label>
=======
                    <label class="control-label mandatory"><b>Job Title</b> <span class="required">*</span></label>
>>>>>>> 3c9c4cb857052f24d5b4b6d4e829fb232d7f3b2c
                    <input type="text" readonly name="job_title" required value="<?php 
                                            	 if(!empty($job_info->job_title)){
                                            	 	echo $job_info->job_title;
                                            	 }
                                            ?>" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
<<<<<<< HEAD
                    <label class="control-label mandatory">Job Industry<span class="required">*</span></label>
                    <select name="job_category" required class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Job Industry</option>
=======
                    <label class="control-label mandatory"><b>Job Industry</b> <span class="required">*</span></label>
                    <select name="job_category" required class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Industry</option>
>>>>>>> 3c9c4cb857052f24d5b4b6d4e829fb232d7f3b2c
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
<<<<<<< HEAD
             
      

                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <div class="formrow">
                      <label class="control-label ">Job Country<span class="required">*</span> </label>
                      <select  name="country_id" class="form-control" onchange="getStates(this.value)">
                        <option value="">Select Country</option>
                          <?php foreach($country as $key){?>
                            <option value="<?php echo $key['country_id']; ?>"<?php if($job_info->job_location==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="col-md-4 col-sm-4">
                    <div class="formrow">
                      <label class="control-label ">Job State<span class="required">*</span> </label>
                      <select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                        <option value="">Select State</option>
                      </select>
                  </div>
                  </div>
                    
                  <div class="col-md-4 col-sm-4">
                    <div class="formrow">
                      <label class="control-label ">Job City<span class="required">*</span> </label>
                      <select  name="city_id" id="city_id" class="form-control">
                        <option value="">Select City</option>
                      </select>
                    </div>
                  </div>
                </div><!-- end row -->
              <!-- end row -->
              
              <hr class="invis">
              <div class="row">
			  <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Job Level *</label>
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
                    <label class="control-label">Job Nature</label>
                    <select name="job_nature"  class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Job Nature</option>
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
                    <label class="control-label">Salary Offered</label>
                    <input type="number" name="salary_range" value="<?php 
                                                 if(!empty($job_info->salary_range)){
                                                    echo $job_info->salary_range;
                                                 }
                                            ?>" class="form-control" min="1">
                  </div>
                </div>
              </div>
=======
			  <hr class="invis">
              <div class="row">
			  <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Job Level <span class="required">*</span></label>
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
                    <label class="control-label">Job Nature<span class="required">*</span></label>
                    <select name="job_nature"  class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Job Nature</option>
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
                    <label>Job Role<span class="required">*</span></label>
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
                    <label>Skill Set<span class="required">*</span></label><br>
                    <div id="skills_result">Please Select Job Role.</div>
                  </div>
                </div>
              </div>
              <div class="panel-body"></div>
			  
              <hr class="invis">
              <div class="row">
									<div class="col-md-4 col-sm-12">
									<div class="formrow">
									  <select  name="country_id" class="form-control" onchange="getStates(this.value)">
										<option value="">Select Country</option>
										<?php foreach($country as $key){?>
										<option value="<?php echo $key['country_id']; ?>"<?php if($job_info->job_location==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
										<?php } ?>
									  </select>
                                        </div>
									</div>
										<div class="col-md-4 col-sm-12">
										<div class="formrow">
										<select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
										 <option value="">Select Country First</option>
										 <?php foreach($state as $keys){?>
										 <option value="<?php echo $keys['state_id']; ?>"<?php if($job_info->state_id==$keys['state_id']){ echo "selected"; }?>><?php echo $keys['state_name']; ?></option>
										 <?php } ?>
										</select>
                                        </div>
										</div>
										 <div class="col-md-4 col-sm-12">
										 <div class="formrow">
										 <select  name="city_id" id="city_id" class="form-control">
										 <option value="">Select State First</option>
										 <?php foreach($city as $keyss){?>
										 <option value="<?php echo $keyss['id']; ?>"<?php if($job_info->city_id==$keyss['id']){ echo "selected"; }?>><?php echo $keyss['city_name']; ?></option>
										 <?php } ?>
										</select>
                                        </div>
										</div>
                
              </div>
              <!-- end row -->
              
              
>>>>>>> 3c9c4cb857052f24d5b4b6d4e829fb232d7f3b2c
              <!-- end row -->
              
              <hr class="invis">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Preferred Age(From)</label>
                    <div class="row">
                    	<div class="col-md-6">
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
                        <div class="col-md-6"><select name="preferred_age_to" class="form-control" id="preferred_age_to" required>
						          <label class="control-label">Preferred Age(To)</label>
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
                    </select></div>
                    </div>
                    
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Working Hours</label>
                    <input type="text"  name="working_hours" value="<?php 
                                                 if(!empty($job_info->working_hours)){
                                                    echo $job_info->working_hours;
                                                 }
                                            ?>" class="form-control" >
                  </div>
                </div>
              </div>
              <!-- end row -->
              
              <hr class="invis">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Number of Vacancy </label>
                    <input class="form-control"  name="no_jobs" value="<?php 
                                                 if(!empty($job_info->no_jobs)){
                                                    echo $job_info->no_jobs;
                                                 }
                                            ?>" type="number" min="1"/>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Years of Experience</label>
                    <input class="form-control"  name="experience" value="<?php 
                                                 if(!empty($job_info->experience)){
                                                    echo $job_info->experience;
                                                 }
                                            ?>"  type="number" min="1"/>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Required Education </label>
                    <select name="job_edu" class="form-control" data-style="btn-default" data-live-search="true">
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
              </div>
              </hr>
              <hr class="invis">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Job Deadline</label>
                    
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
  					            <input type="date" name="job_deadline" class="form-control" id="job_deadline_day" required value="<?php echo $job_info->job_deadline?>">
                      </div>
                    
                    </div>
                  </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Types *</label>
                    <select name="job_types" required class="form-control" data-style="btn-default" data-live-search="true" style="height:58px;">
                      <?php if(!empty($job_info->job_types)) {echo $this->job_types_model->selected_types($job_info->job_types);}else {echo $this->job_types_model->selected_types();} ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- end row -->
              <hr class="invis">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Description *</label>
                    <textarea name="job_desc" class="form-control" required><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">	
                  <div class="formrow">
                    <label class="control-label mandatory">Work/Educational Requirements </label>
                    <textarea name="education" required class="form-control" ><?php if(!empty($job_info)) echo $job_info->education; ?></textarea>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Benefits</label>
                    <textarea name="benefits" required class="form-control" ><?php if(!empty($job_info)) echo $job_info->benefits; ?></textarea>
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
	  function getStates(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	   </script>
	   
	   <script>
	  function getCitys(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
				
            }); 
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
                   } 
            });

        }
    }
	   </script>
