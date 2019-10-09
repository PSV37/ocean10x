<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>

<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Post a New Job</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Vacancy Post</span></div>
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
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
            <form id="submit" action="<?php echo base_url() ?>employer/job_post" method="post" class="submit-form">
              <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Title<span class="required">*</span> </label>
                    <input type="text" name="job_title" required value="<?php 
                                            	 if(!empty($job_info->job_title)){
                                            	 	echo $job_info->job_title;
                                            	 }
                                            ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Industry<span class="required">*</span> </label>
                    <select name="job_category" required class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Vacancy Industry</option>
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
			  <hr class="invis">
									<div class="formrow">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
									  <select  name="country_id" class="form-control" onchange="getStates(this.value)">
										<option value="">Select Country</option>
										<?php foreach($country as $key){?>
										<option value="<?php echo $key['country_id']; ?>"<?php if($company_info->job_location==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
										<?php } ?>
									  </select>
                                        </div>
									
										<div class="col-md-4 col-sm-4">
										<select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
										 <option value="">Select Country First</option>
										</select>
                                        </div>
										
										 <div class="col-md-4 col-sm-4">
										 <select  name="city_id" id="city_id" class="form-control">
										 <option value="">Select State First</option>
										</select>
                                        </div>
                                    </div><!-- end row -->
                                    </div>
              <hr class="invis">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Level<span class="required">*</span></label>
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
                    <label class="control-label">Vacancy Nature<span class="required">*</span> </label>
                    <select name="job_nature" class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Vacancy Nature</option>
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
                    <label class="control-label">Salary Offered<span class="required">*</span></label>
                    <input type="number" id="salary_range" name="salary_range" onkeyup="javascript:changeSalary();" class="form-control" min="1">
                  </div>
                </div>
              </div>
              <!-- end row -->
              <!-- end row -->
              
              <hr class="invis">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Preferred Age(From)</label>
               		<input class="form-control" required name="preferred_age_from" placeholder="e.g. 25years" value="<?php if(!empty($job_info)) echo $job_info->preferred_age; ?>" type="text" >
                    
                    
                    
                    
                    <?php /*?><div class="row">
                    	<div class="col-md-6"><select name="preferred_age_from" class="form-control" id="preferred_age_from" required>
                      <option value="" selected>-- Age From --</option>
                      <?php
										for($i=20;$i<=60;$i++){
											echo '<option value="'.$i.'">'.$i.'</option>';	
										}
									?>
                    </select></div>
                        <div class="col-md-6"><select name="preferred_age_to" class="form-control" id="preferred_age_to" required>
                      <option value="" selected>-- Age To --</option>
                      <?php
										for($i=21;$i<=60;$i++){
											echo '<option value="'.$i.'">'.$i.'</option>';	
										}
									?>
                    </select></div>
                    </div><?php */?>
                    
                  </div>
                </div>
				<div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Preferred Age(To)</label>
               		<input class="form-control" required name="preferred_age_to" placeholder="e.g. 35years" value="<?php if(!empty($job_info)) echo $job_info->preferred_age; ?>" type="text" >
                </div>
				</div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Working Hours<span class="required">*</span></label>
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
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Deadline<span class="required">*</span></label>
                      <input type="date" name="job_deadline" class="form-control" id="job_deadline_day" required value="">

                    <?php /*?><div class="row">
                    	<div class="col-md-4"><select name="job_deadline_day" class="form-control" id="job_deadline_day" required>
                      <option value="" selected>Day</option>
                      <?php
        							for($i=1;$i<=31;$i++){
        								echo '<option value="'.$i.'">'.$i.'</option>';	
        							}
        						?>
                    </select></div>
                        <div class="col-md-4"><select name="job_deadline_month" class="form-control" id="job_deadline_month" required>
                      <option value="" selected>Month</option>
                      <?php
        							for($i=1;$i<=12;$i++){
        								echo '<option value="'.$i.'">'.$i.'</option>';	
        							}
        						?>
                    </select></div>
                        <div class="col-md-4"><select name="job_deadline_year" class="form-control" id="job_deadline_year" required>
                      <option value="" selected>Year</option>
                      <?php
        							for($i=date('Y')+1;$i>date('Y')-1;$i--){
        								echo '<option value="'.$i.'">'.$i.'</option>';	
        							}
  						      ?>
                    </select></div>
                    </div><?php */?>
                    
                    
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Types<span class="required">*</span></label>
                    <select name="job_types" required class="form-control" data-style="btn-default" data-live-search="true">
                      <?php echo $this->job_types_model->selected_types(); ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- end row -->
              <hr class="invis">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Number of Vacancy </label>
                    <input class="form-control" min="1" type="number"  name="no_jobs" value="<?php 
                                                 if(!empty($job_info->no_jobs)){
                                                    echo $job_info->no_jobs;
                                                 }
                                            ?>" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Years of Experience </label>
                    <input class="form-control" type="text"  name="experience" value="<?php 
                                                 if(!empty($job_info->experience)){
                                                    echo $job_info->experience;
                                                 }
                                            ?>" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Required Education </label>
                    <select name="job_edu" class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Education</option>
										<?php foreach($education_level as $education){?>
										<option value="<?php echo $education['education_level_id']; ?>"<?php if($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
										<?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              </hr>
              <hr class="invis">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Description<span class="required">*</span></label>
                    <textarea name="job_desc" required class="form-control ckeditor" required><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Other Skills Description</label>
                    <textarea name="education" class="form-control ckeditor" ><?php if(!empty($job_info)) echo $job_info->education; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Benefits </label>
                    <textarea name="benefits" class="form-control ckeditor" ><?php if(!empty($job_info)) echo $job_info->benefits; ?></textarea>
                  </div>
                </div>
              </div>
              <hr class="invis">
              <button class="btn btn-primary" type="submit">Post a Vacancy</button>
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
