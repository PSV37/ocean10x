<!---header-->
<?php 
$company_profile_id = $this->session->userdata('company_profile_id');

 $this->load->view('fontend/layout/employer_new_header.php');
 
?>
<!---header--->
<div class="container-fluid main-d">
	<div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
       <form id="submit" action="<?php echo base_url() ?>employer/job_post" method="post" class="submit-form">
        <div class="col-md-9 post-job">
         
            <!--  -->
          <div id="svg_wrap"></div>
           
          <section>
            <div class=" col-sm-12 p-m-1">
              <div class="formrow">
                <label class="control-label ">Job Title / Designation<span class="required">*</span> </label>
                <input type="text" name="job_title" value="<?php if(!empty($job_info->job_title)){
                  echo $job_info->job_title;} ?><?php echo set_value('job_title'); ?>" class="form-control" autocomplete="off" required="">
                  <?php echo form_error('job_title'); ?>
							</div>
            </div>
  
  
            <div class="col-sm-12 p-m-2">
              <div class="formrow">
                <!-- donain is nothing but industry -->
                <label class="control-label ">Expected Domain<span class="required">*</span> </label>
                <select name="job_category" id="job_category" required="" class="form-control industry select2-hidden-accessible" data-style="btn-default" data-live-search="true" tabindex="-1" aria-hidden="true">
                  <?php if(!empty($job_info->job_category)) {
                            echo $this->job_category_model->selected($job_info->job_category);
                          } else {
                            echo $this->job_category_model->selected();
                          }
                        ?>                    
                 </select>  <?php echo form_error('job_category'); ?>        
              </div>
            </div>
            <div class="col-sm-12 p-m-3 last-row">
              <div class="col-md-4 col-sm-12">
                <div class="formrow">
                  <label class="control-label ">Job Level<span class="required">*</span></label>
                  <select name="job_level" required="" class="form-control" data-style="btn-default" data-live-search="true">
                    <?php if(!empty($job_info->job_level)) {
                          echo $this->job_level_model->selected($job_info->job_level);
                        } else {
                           echo $this->job_level_model->selected();
                        }
                      ?>                   
                  </select>   <?php echo form_error('job_nature'); ?>               
                </div>
              </div>
				
				      <div class="col-md-4 col-sm-12">
                <div class="formrow">
                  <label class="control-label ">Engagement Model<span class="required">*</span> </label>
                  <select name="job_nature" class="form-control" data-style="btn-default" data-live-search="true" required="">
                    <option value="">Select Engagement Model</option>
                     <?php if(!empty($job_info->job_nature)) {
                          echo $this->job_nature_model->selected($job_info->job_nature);
                        } else {
                         echo $this->job_nature_model->selected();
                        }
                      ?>
                  </select>   <?php echo form_error('job_nature'); ?>               
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="formrow">
                  <label>Job Role<span class="required">*</span></label>
                    <select name="job_role" id="job_role" class="form-control col-sm-5" onchange="getSkillsdetails(this.value)" required="">
                       <?php if(!empty($job_role_data)) foreach ($job_role_data as $role_value) {
                           ?> 
                          <option value="<?php echo $role_value['id']; ?>"<?php if(!empty($job_info)) if($job_info->job_role==$role_value['id']) echo 'selected'; ?>><?php echo $role_value['job_role_title']; ?></option>
                        <?php } ?><?php echo form_error('job_role'); ?>
                    </select>                  
                  </div>
              </div>

              
            </div>
             <div class="col-sm-12 p-m-2">
              <div class="formrow">
                <!-- donain is nothing but industry -->
                <label class="control-label ">Skill Set<span class="required">*</span> </label>
                <div id="skills_result">Please Select Job Role.</div>       
              </div>
            </div>
          </section>

          <section>
 
            <div class="row p-m-4">
              <div class="col-md-4 col-sm-4">
                <div class="formrow">
                  <label class="control-label ">Job Locations<span class="required">*</span> </label>
                    <div class="tokenfield form-control">
                      <!-- <input type="text" tabindex="-1" style="position: absolute; left: -10000px;" name="city_id" id="tokenfield" placeholder="Enter Location"><?php echo form_error('city_id'); ?> -->
                      <input type="text" style="position: absolute; left: -10000px;" name="city_id"  id="tokenfield" placeholder="Enter Location" value=""><?php echo form_error('city_id'); ?>
                    </div>                    
                  </div>
              </div>

                  <div class="col-md-4 col-sm-12">
                    <div class="formrow">
                      <label class="control-label ">Working Hours<span class="required">*</span></label>
                      <input type="number" name="working_hours" min="1" value="<?php if(!empty($job_info->working_hours)){ echo $job_info->working_hours; }
                        ?>" class="form-control" autocomplete="off">  <?php echo form_error('working_hours'); ?>                  
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="formrow">
                      <label class="control-label ">Job Deadline<span class="required">*</span></label>
                      <input type="text" name="job_deadline" class="form-control datepicker hasDatepicker" id="job_deadline_day" required="" value="" autocomplete="off">  
                    </div><?php echo form_error('job_deadline'); ?>
                  </div>

              </div>               
              <div class="row p-m-5">
               
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Compensation Range<span class="required">*</span></label>
                    <input type="text" id="salary_range" name="salary_range" onkeyup="javascript:changeSalary();" class="form-control" min="1" autocomplete="off"><?php echo form_error('salary_range'); ?>
                  </div>
                </div>

                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Number of Positions<span class="required">*</span> </label>
                    <input class="form-control" min="1" type="number" name="no_jobs" value="<?php 
                      if(!empty($job_info->no_jobs)){ echo $job_info->no_jobs; } ?>" autocomplete="off">  <?php echo form_error('no_jobs'); ?>                
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Work Experience </label>
                    <input class="form-control" type="text" name="experience" value="<?php 
                      if(!empty($job_info->experience)){ echo $job_info->experience;
                       }
                    ?>" autocomplete="off">                  
                  </div>
                </div>

            <!--     <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Job Types<span class="required">*</span></label>
                    <select name="job_types" required class="form-control" data-style="btn-default" data-live-search="true">
                      <option  value="1">Comonly Search CV's </option> <option  value="2">Selected Candidates </option> <option  value="3">University</option> <option  value="5">Banks Jobs
</option> <option  value="6">Others Jobs
</option>                     </select>
                  </div>
                </div> -->
              </div>
              <div class="row p-m-6">
               
                <div class="col-md-4 col-sm-12"> 
                  <div class="formrow">  
                    <label class="control-label">Education Level<span class="required">*</span></label>
                    <select name="job_edu" id="job_edu" class="form-control" data-style="btn-default" data-live-search="true" onchange="getEducationSpecial(this.value)" required="">
                      <option value="">Select Level </option>
                      <?php foreach($education_level as $education){?>
                      <option value="<?php echo $education['education_level_id']; ?>"<?php if($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                      <?php } ?>
                  </select>   <?php echo form_error('job_edu'); ?>                
                </div>
                </div>

                <div class="col-md-4 col-sm-12" id="spectial"> 
                  <div class="formrow">  
                    <label class="control-label ">Specialization <span class="required">*</span></label>
                    <select name="job_edu_special" id="job_edu_special" class="form-control" data-style="btn-default" data-live-search="true">
                     <option value="">Select Specialization </option>
                   
                    </select> 
                  </div>
                </div>

                <div class="col-md-4 col-sm-12"> 
                  <div class="formrow">  
                    <label class="control-label ">Ocean Test Required <span class="required">*</span></label>
                    <select name="job_test_requirment" id="job_test_requirment" class="form-control" data-style="btn-default" data-live-search="true" required="">
                      <option value="Yes"<?php if($job_info->is_test_required=="Yes"){ echo "selected"; }?>>Yes </option>
                      <option value="No"<?php if($job_info->is_test_required=="No"){ echo "selected"; }?>>No </option>
                    </select> <?php echo form_error('job_test_requirment'); ?>             
                  </div>
                </div>

              </div>                          
            </section>

            <section>
 
              <div class="col-md-12 col-sm-12 p-m-7">
                <div class="formrow">
                  <label class="control-label">Job Description <span class="required">*</span></label>
                  <textarea name="job_desc" class="form-control ckeditor" placeholder="Job Description"><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea><?php echo form_error('job_desc'); ?>                                  
                </div>
              </div>
 
              <div class="col-md-12 col-sm-12 p-m-8">
                <div class="formrow">
                  <label class="control-label">Other Expected skills  <span class="required">*</span></label>
                  <textarea name="education" class="form-control ckeditor" placeholder="Other Expected skills"><?php if(!empty($job_info)) echo $job_info->education; ?></textarea>                                  
                </div>
              </div>
 
              <div class="col-md-12 col-sm-12 p-m-9">
                <div class="formrow">
                   <label class="control-label">Company benefit offered <span class="required">*</span></label>
                    <textarea name="benefits" class="form-control ckeditor" placeholder="Company Address"><?php if(!empty($job_info)) echo $job_info->benefits; ?></textarea><?php echo form_error('benefits'); ?>                                 
                </div>
              </div>
            </section>
            <div class="button" id="prev">&larr; Previous</div>
            <div class="button" id="next">Next &rarr;</div>
            <div class="button" id="submit">Post Job</div>
        <!-- </form> -->
        </div>
      </form>
      <!-- </form> -->
    </div>
  </div>
</div> 

<<script>
var base_color = "#dcdcdc";
var active_color = "rgb(16, 132, 126)";

var child = 1;
var length = $("section").length - 1;
$("#prev").addClass("disabled");
$("#submit").addClass("disabled");

$("section").not("section:nth-of-type(1)").hide();
$("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');

var svgWidth = length * 200 + 24;
$("#svg_wrap").html(
  '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
    svgWidth +
    ' 24" xml:space="preserve"></svg>'
);

function makeSVG(tag, attrs) {
  var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
  for (var k in attrs) el.setAttribute(k, attrs[k]);
  return el;
}

for (i = 0; i < length; i++) {
  var positionX = 12 + i * 200;
  var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
  document.getElementById("svg_form_time").appendChild(rect);
  // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
  var circle = makeSVG("circle", {
    cx: positionX,
    cy: 12,
    r: 12,
    width: positionX,
    height: 6
  });
  document.getElementById("svg_form_time").appendChild(circle);
}

var circle = makeSVG("circle", {
  cx: positionX + 200,
  cy: 12,
  r: 12,
  width: positionX,
  height: 6
});
document.getElementById("svg_form_time").appendChild(circle);

$("circle:nth-of-type(1)").css("fill", active_color);

$(".button").click(function () {
  $("#svg_form_time rect").css("fill", active_color);
  $("#svg_form_time circle").css("fill", active_color);
  var id = $(this).attr("id");
  if (id == "next") {
    $("#prev").removeClass("disabled");
    if (child >= length) {
      $(this).addClass("disabled");
      $('#submit').removeClass("disabled");
    }
    if (child <= length) {
      child++;
    }
  } else if (id == "prev") {
    $("#next").removeClass("disabled");
    $('#submit').addClass("disabled");
    if (child <= 2) {
      $(this).addClass("disabled");
    }
    if (child > 1) {
      child--;
    }
  }
  var circle_child = child + 1;
  $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
    "fill",
    base_color
  );
  $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
    "fill",
    base_color
  );
  var currentSection = $("section:nth-of-type(" + child + ")");
  currentSection.fadeIn();
  currentSection.css('transform','translateX(0)');
 currentSection.prevAll('section').css('transform','translateX(-100px)');
  currentSection.nextAll('section').css('transform','translateX(100px)');
  $('section').not(currentSection).hide();
});

</script>
