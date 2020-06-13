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
        	
			<div class="col-md-9 post-job">
            	<div id="svg_wrap"></div>

<section>
  <div class=" col-sm-12 p-m-1">
                  <div class="formrow">
                    <label class="control-label ">Job Title / Designation<span class="required">*</span> </label>
                    <input type="text" name="job_title" value="" class="form-control" autocomplete="off" required="">
											                  </div>
                </div>
  
  
 <div class="col-sm-12 p-m-2">
                  <div class="formrow">
                    <!-- donain is nothing but industry -->
                    <label class="control-label ">Expected Domain<span class="required">*</span> </label>
                    <select name="job_category" id="job_category" required="" class="form-control industry select2-hidden-accessible" data-style="btn-default" data-live-search="true" tabindex="-1" aria-hidden="true">
                      <option value="">Select Domain</option>
                        <option value="1">HR/ Admin</option> <option value="2">Accounting/Finance</option> <option value="3">IT &amp; Telecommunication</option> <option value="4">Education &amp; Training</option> <option value="5">Marketing &amp; Sales</option> <option value="6">Customer Support</option> <option value="8">Engineer</option> <option value="9">Pharmaceutical</option> <option value="10">Real Estate</option> <option value="11">Electrical &amp; Electronics</option> <option value="14">Freelancer</option> <option value="15">Chemical</option> <option value="17">Automobile</option> <option value="18">Others</option>                     </select>          </div>
                </div>
  <div class="col-sm-12 p-m-3 last-row">
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Job Level<span class="required">*</span></label>
                    <select name="job_level" required="" class="form-control" data-style="btn-default" data-live-search="true">
                      <option value="">Select Job Level</option>
                      <option value="3">Expert</option> <option value="2">Medium</option> <option value="1">Beginner</option>                     </select>                  </div>
                </div>
				
				        <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Engagement Model<span class="required">*</span> </label>
                    <select name="job_nature" class="form-control" data-style="btn-default" data-live-search="true" required="">
                      <option value="">Select Engagement Model</option>
                      <option value="8">Freelancing</option> <option value="7">Hourly</option> <option value="6">Full time</option> <option value="5">Part time</option>                     </select>                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label>Job Role<span class="required">*</span></label>
                      <select name="job_role" id="job_role" class="form-control col-sm-5" onchange="getSkillsdetails(this.value)" required="">
                        <option value="">Select Role</option>
                         
                          <option value="1">PHP Developer</option>
                         
                          <option value="2">Java Developer</option>
                         
                          <option value="3">Digital Marketing</option>
                            
                      </select>                  </div>
                </div>
              
              </div>
</section>

<section>
 
   <div class="row p-m-4">
                  <div class="col-md-4 col-sm-4">
                    <div class="formrow">
                      <label class="control-label ">Job Locations<span class="required">*</span> </label>
                       <div class="tokenfield form-control"><input type="text" tabindex="-1" style="position: absolute; left: -10000px;"></div>                    </div>
                  </div>

                  <div class="col-md-4 col-sm-12">
                    <div class="formrow">
                      <label class="control-label ">Working Hours<span class="required">*</span></label>
                      <input type="number" name="working_hours" min="1" value="" class="form-control" autocomplete="off">                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="formrow">
                      <label class="control-label ">Job Deadline<span class="required">*</span></label>
                        <input type="text" name="job_deadline" class="form-control datepicker hasDatepicker" id="job_deadline_day" required="" value="" autocomplete="off">                    </div>
                  </div>

                </div>               
   <div class="row p-m-5">
               
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Compensation Range<span class="required">*</span></label>
                    <input type="text" id="salary_range" name="salary_range" onkeyup="javascript:changeSalary();" class="form-control" min="1" autocomplete="off">                  </div>
                </div>

                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Number of Positions<span class="required">*</span> </label>
                    <input class="form-control" min="1" type="number" name="no_jobs" value="" autocomplete="off">                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Work Experience </label>
                    <input class="form-control" type="text" name="experience" value="" autocomplete="off">                  </div>
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
                                              <option value="1">Ph.D / Doctorate</option>
                                              <option value="2">Masters/Post-Graduation</option>
                                              <option value="3">Graduation/Diploma</option>
                                              <option value="5">12th</option>
                                              <option value="6">10th</option>
                                          </select>                   </div>
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
                      <option value="">Select One </option>
                      <option value="Yes">Yes </option>
                      <option value="No">No </option>
                    </select>                   </div>
                </div>

              </div>                          
</section>

<section>
 
 <div class="col-md-12 col-sm-12 p-m-7">
                                         <div class="formrow">
                                         	<label class="control-label">Job Description <span class="required">*</span></label>
                                            <textarea name="company_address" class="form-control ckeditor" placeholder="Company Address"></textarea>                                  </div>
                                        </div>
 
 <div class="col-md-12 col-sm-12 p-m-8">
                                         <div class="formrow">
                                         	<label class="control-label">Other Expected skills  <span class="required">*</span></label>
                                            <textarea name="company_address" class="form-control ckeditor" placeholder="Company Address"></textarea>                                  </div>
                                        </div>
 
 <div class="col-md-12 col-sm-12 p-m-9">
                                         <div class="formrow">
                                         	<label class="control-label">Company benefit offered <span class="required">*</span></label>
                                            <textarea name="company_address" class="form-control ckeditor" placeholder="Company Address"></textarea>                                  </div>
                                        </div>
</section>



<div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<div class="button" id="submit">Post Job</div>

            </div>
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
