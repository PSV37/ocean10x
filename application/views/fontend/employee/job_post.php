<?php 
    $this->load->view('fontend/layout/employee_header.php');
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
      <?php $this->load->view('fontend/layout/employee_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
            <form id="submit" action="<?php echo base_url() ?>employee/job_post" method="post" class="submit-form">
              <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Job Title / Designation<span class="required">*</span> </label>
                      <input type="text" name="job_title" value="<?php 
                          if(!empty($job_info->job_title)){
                              echo $job_info->job_title;
                              }?><?php echo set_value('job_title'); ?>" class="form-control"autocomplete="off">
											<?php echo form_error('job_title'); ?>
                  </div>
                </div>
              <div class="col-md-6 col-sm-12">
                <div class="formrow">
                    <!-- donain is nothing but industry -->
                  <label class="control-label ">Expected Domain<span class="required">*</span> </label>
                    <select name="job_category" id="job_category" required class="form-control industry" data-style="btn-default" data-live-search="true">
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
			  <!-- <hr class="invis"> -->
            
              <!-- <hr class="invis"> -->
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Job Level<span class="required">*</span></label>
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
                    <label class="control-label ">Engagement Model<span class="required">*</span> </label>
                    <select name="job_nature" class="form-control" data-style="btn-default" data-live-search="true">
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
              
               <div class="row">

                  <div class="col-md-4 col-sm-4">
                    <div class="formrow">
                      <label class="control-label ">Job Locations<span class="required">*</span> </label>
                       <input type="text" name="city_id" class="form-control" id="tokenfield" placeholder="Enter Location"
                        value="">
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-12">
                    <div class="formrow">
                      <label class="control-label ">Working Hours<span class="required">*</span></label>
                      <input type="number"  name="working_hours" value="<?php 
                           if(!empty($job_info->working_hours)){
                            echo $job_info->working_hours;
                           }
                        ?>" class="form-control" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="formrow">
                      <label class="control-label ">Job Deadline<span class="required">*</span></label>
                        <input type="text" name="job_deadline" class="form-control datepicker" id="job_deadline_day" required value="" autocomplete="off">
                    </div>
                  </div>

                </div><!-- end row -->
              <!-- <hr class="invis"> -->

              <div class="row">
               
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Compensation Range<span class="required">*</span></label>
                    <input type="text" id="salary_range" name="salary_range" onkeyup="javascript:changeSalary();" class="form-control" min="1" autocomplete="off" >
                  </div>
                </div>

                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Number of Positions<span class="required">*</span> </label>
                    <input class="form-control" min="1" type="number"  name="no_jobs" value="<?php 
                           if(!empty($job_info->no_jobs)){
                              echo $job_info->no_jobs;
                           }
                      ?>" autocomplete="off"/>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Work Experience </label>
                    <input class="form-control" type="text"  name="experience" value="<?php 
                      if(!empty($job_info->experience)){
                          echo $job_info->experience;
                       }
                    ?>" autocomplete="off"/>
                  </div>
                </div>

          
              <div class="row">
               
                <div class="col-md-4 col-sm-12"> 
                  <div class="formrow">  
                    <label class="control-label">Education Level<span class="required">*</span></label>

                    <select name="job_edu" id="job_edu" class="form-control"  data-style="btn-default" data-live-search="true" onchange="getEducationSpecial(this.value)" required="">
                     <option value="">Select Level </option>
                      <?php foreach($education_level as $education){?>
                        <option value="<?php echo $education['education_level_id']; ?>"<?php if($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                      <?php } ?>
                    </select> 
                  </div>
                </div>

                <div class="col-md-4 col-sm-12" id="spectial"> 
                  <div class="formrow">  
                    <label class="control-label ">Specialization <span class="required">*</span></label>
                    <select name="job_edu_special" id="job_edu_special" class="form-control"  data-style="btn-default" data-live-search="true" required>
                     <option value="">Select Specialization </option>
                   
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
             
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label>Job Description (JD)<span class="required">*</span></label>
                    <textarea name="job_desc" required class="form-control ckeditor" required><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Other Expected Skills</label>
                    <textarea name="education" class="form-control ckeditor" ><?php if(!empty($job_info)) echo $job_info->education; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label mandatory">Company Benefits Offered</label>
                    <textarea name="benefits" class="form-control ckeditor" ><?php if(!empty($job_info)) echo $job_info->benefits; ?></textarea>
                  </div>
                </div>
              </div>
              <hr class="invis">
              <button class="btn btn-primary" type="submit">Post Job</button>
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
        source: "<?php echo base_url('Employee/search_city'); ?>",
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

	
  function getSkillsdetails(id)
    {
      if(id){
        $.ajax({
                  url:'<?php echo base_url();?>Employee/getSkillsByRole',
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
                url:'<?php echo base_url();?>Employee/getEducation_specialization',
                data:{id:id},
                success:function(res){
                  $('#job_edu_special').html(res);
                }
        
            }); 
          }
   
    }


  $(document).ready(function(){

    

 function getEducationSpecial_load(){
    var id = $('#job_edu').val();
    if(id==5 || id==6){
     $('#spectial').hide();
    }
    else{
      $('#spectial').show();
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/Job_posting/getEducation_specialization',
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
                  url:'<?php echo base_url();?>admin/Job_posting/getSkillsByRole',
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
	placeholder: "Select Domain",
	allowClear: true
	} );
</script> 
<script>
$("#country_id").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script> 

<script>
$(function() {
  // choose target dropdown
  var select = $('.industry');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>

<script>
$(function() {
  // choose target dropdown
  var select = $('.country');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>

