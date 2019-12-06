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
           
    		<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/save_questionbank/<?php  if (!empty($edit_questionbank_info)) { foreach($edit_questionbank_info as $row)
                    echo $row['ques_id'];
            	}
            ?>" method="post">

           <div class="row">

        	<div class="col-md-12 col-sm-12 col-xs-12">
            
                <div class="col-md-6">
                    <div class="form-group">                                       
					   <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                        <input type="text" name="candidate_name" class="form-control">
					</div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Id <span class="required">*</span></label>
                      	<input type="email" name="candidate_email" class="form-control">
                    </div>
                </div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Phone Number<span class="required">*</span></label>
	                 	<input type="text" name="candidate_phone" class="form-control">
					</div>
				</div>

              	<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Yrs of Experience<span class="required">*</span></label>
	                 	<input type="text" name="candidate_experiance" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Notice Period at Current Job<span class="required">*</span></label>
	                 	<input type="text" name="candidate_notice_period" class="form-control">
					</div>
				</div>
									 
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Job Type<span class="required">*</span></label>
	                 	<select id="job_type"  name="job_type" class="form-control">
	                      <option value="">Select Type</option>
	                      <option value="Full Time">Full Time</option>
	                      <option value="Part Time">Part Time</option>
	                      <option value="Contractual">Contractual</option>
	                    </select> 
					</div>
				</div>
					
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current Job Designation<span class="required">*</span></label>
	                 	<input type="text" name="current_job_desig" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current Work Location<span class="required">*</span></label>
	                 	<input type="text" name="current_work_location" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Working at Current Job Since<span class="required">*</span></label>
	                 	<input type="text" name="working_current_since" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Current CTC<span class="required">*</span></label>
	                 	<input type="text" name="working_current_since" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Last Salary Hike<span class="required">*</span></label>
	                 	<input type="text" name="working_current_since" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Last Salary Hike<span class="required">*</span></label>
	                 	<input type="text" name="working_current_since" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Top Education<span class="required">*</span></label>
	                 	<input type="text" name="top_education" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Skills<span class="required">*</span></label>
	                 	<input type="text" name="candidate_skills" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Certifications</label>
	                 	<input type="text" name="candidate_certification" class="form-control">
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

	                    </select> 
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Role</label>
	                 	<select id="candidate_role"  name="candidate_role" class="form-control">
	                      <option value="">Select Industry</option>
	                      
	                    </select> 
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Expected Salary</label>
	                 	<input type="text" name="candidate_expected_sal" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Desired Work Location</label>
	                 	<input type="text" name="desired_wrok_location" class="form-control">
					</div>
				</div>
				


                <div class="panel-body"></div>
                <button type="submit" class="btn bg-navy" type="submit">Save CV
                </button>
                <div class="panel-body"></div>
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
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


