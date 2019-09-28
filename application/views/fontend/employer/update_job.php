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
                    <label class="control-label mandatory">Vacancy Title *</label>
                    <input type="text" readonly name="job_title" required value="<?php 
                                            	 if(!empty($job_info->job_title)){
                                            	 	echo $job_info->job_title;
                                            	 }
                                            ?>" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Category *</label>
                    <select name="job_category" required class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Vacancy Category</option>
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
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Location *</label>
                    <select name="job_location" required class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Location</option>
                      <?php if(!empty($job_info->job_location)) {
                                                echo $this->job_location_model->selected($job_info->job_location);
                                                } else {
                                                   echo $this->job_location_model->selected();
                                                }
                                                 ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Level *</label>
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
              </div>
              <!-- end row -->
              
              <hr class="invis">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Vacancy Nature</label>
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
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label">Salary Range</label>
                    <input type="text" name="salary_range" value="<?php 
                                                 if(!empty($job_info->salary_range)){
                                                    echo $job_info->salary_range;
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
                    <label class="control-label">Preferred Age</label>
                    <div class="row">
                    	<div class="col-md-6"><select name="preferred_age_from" class="form-control" id="preferred_age_from" required>
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
                    </select></div>
                        <div class="col-md-6"><select name="preferred_age_to" class="form-control" id="preferred_age_to" required>
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
                                            ?>" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Years of Experience</label>
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
                    <label class="control-label">Vacancy Deadline</label>
                    
                    <div class="row">
                    <div class="col-md-12 col-sm-12">
					<input type="date" name="job_deadline_day" class="form-control" id="job_deadline_day" required value="<?php echo $job_info->job_deadline?>">
                   <!-- <select name="job_deadline_day" class="form-control" id="job_deadline_day" required>
                      <option value="" selected>Day</option>
                      <?php
					  
										for($i=1;$i<=31;$i++){
											$selected='';
											if($job_info->job_deadline==$i){
												$selected='selected';
											}
												
											echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';	
										}
									?>
                    </select>-->
                    </div>
                    <!--<div class="col-md-4">
                    <select name="job_deadline_month" class="form-control" id="job_deadline_month" required>
                      <option value="" selected>Month</option>
                      <?php
					   
										for($i=1;$i<=12;$i++){
											$selected='';
											if($job_info->job_deadline_month==$i){
												$selected='selected';
											}
											echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';	
										}
									?>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <select name="job_deadline_year" class="form-control" id="job_deadline_year" required>
                      <option value="" selected>Year</option>
                      <?php
					   
										for($i=date('Y')+1;$i>date('Y')-1;$i--){
											$selected='';
											if($job_info->job_deadline_year==$i){
												$selected='selected';
											}
											echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';	
										}
									?>
                    </select>
                    </div>-->
                    </div>
                    
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Vacancy Types *</label>
                    <select name="job_types" required class="form-control" data-style="btn-default" data-live-search="true">
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
