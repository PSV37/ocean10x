<?php 
   $this->load->view('fontend/layout/employer_new_header.php');?>
<div class="container-fluid main-d">
	<div class="container">
    	<div class="col-md-12">
    	<?php $this->load->view('fontend/layout/employer_menu.php'); ?>
    	<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/add_new_cv" method="post">
			<div class="col-md-9 employe_add">
                <div class="col-md-12">
                	<h4 class="employee_heading">ADD NEW CV</h4>
                </div>
                <div class="col-md-12">
                	<div class="col-md-4">
                    	<div class="form-group">                                       
						   	<label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
	                        <input type="text" name="candidate_name" id="candidate_name" class="form-control" required="">
						</div>
                	</div>
                
                	<div class="col-md-4">
                    	<div class="form-group">
	                        <label for="exampleInputEmail1">Email Id <span class="required">*</span></label>
	                      	<input type="email" name="candidate_email" id="candidate_email" class="form-control ui-autocomplete-input" required="" autocomplete="off">
                    	</div>
                	</div>
                
                	<div class="col-md-4">
				  		<div class="form-group">
		                    <label for="exampleInputEmail1">Phone Number<span class="required">*</span></label>
		                 	<input type="text" name="candidate_phone" id="candidate_phone" class="form-control" maxlength="10" required="">
						</div>
					</div>
                </div>
                
                <div class="col-md-12">
	                <div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Yrs of Experience</label>
		                 	<input type="text" name="candidate_experiance" id="candidate_experiance" class="form-control">
						</div>
					</div>
                
	                <div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Notice Period at Current Job</label>
		                 	<input type="text" name="candidate_notice_period" id="candidate_notice_period" class="form-control">
						</div>
					</div>
                
	                <div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Job Type</label>
		                 	<select id="job_type" name="job_type" class="form-control">
		                      <option value="">Select Type</option>
		                      <option value="Full Time">Full Time</option>
		                      <option value="Part Time">Part Time</option>
		                      <option value="Contractual">Contractual</option>	
		                    </select> 
						</div>
					</div>
                </div>
                
                <div class="col-md-12"> 
                
                <div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current Job Designation</label>
	                 	<input type="text" name="current_job_desig" id="current_job_desig" class="form-control">
					</div>
				</div>
                
                <div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Working at Current Job Since</label>
	                 	<input type="text" name="working_current_since" id="working_current_since" class="form-control datepicker hasDatepicker">
					</div>
				</div>
                <div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current CTC</label>
	                 	<input type="text" name="current_ctc" id="current_ctc" class="form-control">
					</div>
				</div>
                
                </div>
                
                <div class="col-md-12"> 
                
                
                <div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Last Salary Hike</label>
	                 	<input type="text" name="last_salary_hike" id="last_salary_hike" class="form-control datepicker hasDatepicker">
					</div>
				</div>
                
                <div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Top Education</label>
	                 	<input type="text" name="top_education" id="top_education" class="form-control">
					</div>
				</div>
                
                <div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Skills</label>
	                 	<div class="tokenfield form-control"><input type="text" name="candidate_skills" id="tokenfield" class="skill form-control" value="" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" tabindex="-1" style="position: absolute; left: -10000px;"></div> 
					</div>
				</div>
                
                </div>
                
                <div class="col-md-12"> 
	                <div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Certifications</label>
		                 	<input type="text" name="candidate_certification" id="candidate_certification" class="form-control">
						</div>
					</div>
	                
	                <div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Industry</label>
		                 	<select id="candidate_industry" name="candidate_industry" class="form-control">
		                       <option value="">Select Industry</option>
	                      	  <?php if (!empty($industry_master)): foreach ($industry_master as $ind_row) : ?>
	                      	  	<option value="<?php echo $ind_row['job_category_id']; ?>"><?php echo $ind_row['job_category_name']; ?></option>
	                      	  <?php  endforeach; endif; ?>
	                      	</select> 
						</div>
					</div>
	                
	                <div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Role</label>
		                 	<select id="candidate_role" name="candidate_role" class="form-control">
		                      <option value="">Select Role</option>
		                      <?php if (!empty($job_role)): foreach ($job_role as $role_row) : ?>
	                      	  	<option value="<?php echo $role_row['id']; ?>"><?php echo $role_row['job_role_title']; ?></option>
	                      	  <?php  endforeach; endif; ?>
	                      	</select> 
						</div>
					</div>
            	</div>
                <div class="col-md-12"> 
                	<div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Expected Salary</label>
		                 	<input type="text" name="candidate_expected_sal" id="candidate_expected_sal" class="form-control">
						</div>
					</div>
                
                	<div class="col-md-4">
					  	<div class="form-group">
		                    <label for="exampleInputEmail1">Desired Work Location</label>
		                 	<input type="text" name="desired_wrok_location" id="desired_wrok_location" class="form-control">
						</div>
					</div>
	                <div class="col-md-4">
	                	<div class="form-group">
                		<button  class="save_cv">save cv</button>
                	</div>
                	</div>
                </div>
                
             </div>
         	</form>
         </div>
     </div>
 </div>
