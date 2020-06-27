<?php 
   $this->load->view('fontend/layout/employer_new_header.php');?>
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
 </style>  
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
	                        <label for="exampleInputEmail1">Email Id <span class="required"> *</span></label>
	                      	<input type="email" name="candidate_email" id="candidate_email" class="form-control ui-autocomplete-input" required="" autocomplete="off">
                    	</div>
                	</div>
                
                	<div class="col-md-4">
				  		<div class="form-group">
		                    <label for="exampleInputEmail1">Phone Number<span class="required"> *</span></label>
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
    <script src="<?php echo base_url(); ?>asset/js/jquery-ui.js" type="text/javascript"></script>
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
                     $('#job_type').val(value.job_area);
                     // $('#current_job_desig').val(value.contact_name);
                     // $('#working_current_since').val(value.cont_person_email);
                     $('#current_ctc').val(value.js_career_salary);
                     $('#last_salary_hike').val(value.last_salary_hike);
                     $('#top_education').val(value.edu_high);
                     $('#candidate_skills').val(value.skills);
                     // $('#candidate_certification').val(value.country_id);
                     $('#candidate_industry').val(value.industry_name);
                     $('#candidate_role').val(value.job_role_title);
                     // $('#candidate_expected_sal').val(value.company_pincode);
                     // $('#desired_wrok_location').val(value.comp_gstn_no);
                    
                     // getStates(value.country_id);
                     // getCitys(value.state_id);
                  });
               } 
        });
    // savecompanymapping(value.company_profile_id);
}
</script>