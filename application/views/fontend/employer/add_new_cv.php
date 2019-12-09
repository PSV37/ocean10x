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
        <h1 class="page-heading">Add New CV</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add New CV</span></div>
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
           
    		<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/add_new_cv" method="post">

           <div class="row">

        	<div class="col-md-12 col-sm-12 col-xs-12">
            
                <div class="col-md-6">
                    <div class="form-group">                                       
					   <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                        <input type="text" name="candidate_name" id="candidate_name" class="form-control" required="">
					</div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Id <span class="required">*</span></label>
                      	<input type="email" name="candidate_email" id="candidate_email" class="form-control" required="">
                    </div>
                </div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Phone Number<span class="required">*</span></label>
	                 	<input type="text" name="candidate_phone" id="candidate_phone" class="form-control" required="">
					</div>
				</div>

              	<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Yrs of Experience</label>
	                 	<input type="text" name="candidate_experiance" id="candidate_experiance" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Notice Period at Current Job</label>
	                 	<input type="text" name="candidate_notice_period" id="candidate_notice_period" class="form-control">
					</div>
				</div>
									 
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Job Type</label>
	                 	<select id="job_type" name="job_type" class="form-control" >
	                      <option value="">Select Type</option>
	                      <option value="Full Time">Full Time</option>
	                      <option value="Part Time">Part Time</option>
	                      <option value="Contractual">Contractual</option>	
	                    </select> 
					</div>
				</div>
					
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current Job Designation</label>
	                 	<input type="text" name="current_job_desig" id="current_job_desig" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current Work Location</label>
	                 	<input type="text" name="current_work_location" id="current_work_location" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Working at Current Job Since</label>
	                 	<input type="text" name="working_current_since" id="working_current_since" class="form-control datepicker">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current CTC</label>
	                 	<input type="text" name="current_ctc" id="current_ctc" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Last Salary Hike</label>
	                 	<input type="text" name="last_salary_hike" id="last_salary_hike" class="form-control datepicker">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Top Education</label>
	                 	<input type="text" name="top_education" id="top_education" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Education Specialization</label>
	                 	<input type="text" name="education_specialization" id="education_specialization" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Skills</label>
	                 	<input type="text" name="candidate_skills" id="candidate_skills" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Certifications</label>
	                 	<input type="text" name="candidate_certification" id="candidate_certification" class="form-control">
					</div>
				</div>
				<div class="col-md-12">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Candidate Expectations (Desires):</label>
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Industry</label>
	                 	<select id="candidate_industry"  name="candidate_industry" class="form-control">
	                      <option value="">Select Industry</option>
                      	  <?php if (!empty($industry_master)): foreach ($industry_master as $ind_row) : ?>
                      	  	<option value="<?php echo $ind_row['job_category_id']; ?>"><?php echo $ind_row['job_category_name']; ?></option>
                      	  <?php  endforeach; endif; ?>
	                    </select> 
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Role</label>
	                 	<select id="candidate_role"  name="candidate_role" class="form-control">
	                      <option value="">Select Role</option>
	                      <?php if (!empty($job_role)): foreach ($job_role as $role_row) : ?>
                      	  	<option value="<?php echo $role_row['id']; ?>"><?php echo $role_row['job_role_title']; ?></option>
                      	  <?php  endforeach; endif; ?>
	                    </select> 
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Expected Salary</label>
	                 	<input type="text" name="candidate_expected_sal" id="candidate_expected_sal" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Desired Work Location</label>
	                 	<input type="text" name="desired_wrok_location" id="desired_wrok_location" class="form-control">
					</div>
				</div>

                <div class="panel-body"></div>
                <button type="submit" class="btn bg-navy pull-right" type="submit">Save CV </button>
               
             </div>
         	</div>
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



// $(function() {

//     $('#job_type').multiselect({

//         includeSelectAllOption: true
//     });

    
// });

    $(function() {
      $("#candidate_email").autocomplete({
          source: "<?php echo base_url('employer/get_candidate_by_email'); ?>",
          select: function(a,b)
            {
                 // alert(b.item.value);
              $(this).val(b.item.value); //grabed the selected value
              get_candidate_info(b.item.value);
              get_cand_other_info(b.item.value);

            }
        });
    });
   function get_candidate_info(email){

    	$.ajax({
              url:'<?php echo site_url('employer/get_candidate_info_by_email') ?>',
              type:'POST',
              data:{
                    email:email
              },
               dataType: "JSON",  
               success: function(data)
               {
                 // console.log(data);
                 $.each(data, function(index, value) 
                  {
                    console.log(value);

                     $('#candidate_name').val(value.full_name);
                     $('#job_type').val(value.avaliable);
                     // $('#country_code').val(value.desired_industry);
                     // $('#company_phone').val(value.immediate_join);
                     $('#candidate_industry').val(value.industry_id);
                     $('#desired_wrok_location').val(value.job_area);
                     $('#candidate_role').val(value.job_role);
                     $('#candidate_expected_sal').val(value.js_career_salary);
                     $('#candidate_phone').val(value.mobile_no);
                     $('#candidate_notice_period').val(value.notice_period);
                     // $('#country_id').val(value.serving_notice_period);
                     // $('#state_id').val(value.state_id);
                     // $('#city_id').val(value.city_id);
                     // $('#company_pincode').val(value.company_pincode);
                     // $('#comp_gst_no').val(value.comp_gstn_no);
                     // $('#comp_pan_no').val(value.comp_pan_no);
                     // $('#company_profile_id').val(value.company_profile_id);
                    


                  });
               } 
        });
	}

	function get_cand_other_info(email){

    	$.ajax({
              url:'<?php echo site_url('employer/get_cand_other_info_by_email') ?>',
              type:'POST',
              data:{
                    email:email
              },
               dataType: "JSON",  
               success: function(data)
               {
                 // console.log(data);
                 $.each(data, function(index, value) 
                  {
                    // console.log(value);
                    var edu_level = value.education_level_id;
                    console.log(edu_level);
                 	var a = Math.min.apply(null, edu_level) // 1
                 	console.log(a);

                    $('#top_education').val(value.education_level_name);
                    $('#education_specialization').val(value.education_specialization);
                    
                  });
               } 
        });
	}

</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


