<!---header-->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">

<?php 

$company_profile_id = $this->session->userdata('company_profile_id');

 $this->load->view('fontend/layout/employer_new_header.php');
 
?>
<style>
  .required
  {
    color: red;
  }
  label.control-label {
    margin-top: 15px;
}
div#next {
    float: right;
    /* margin-left: 385px; */
    /* margin-right: -70px; */
}

</style>
<!---header--->
<div class="container-fluid main-d">
	<div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
       <form  action="<?php echo base_url() ?>employer/job_post" method="post">
        <div class="col-md-9 post-job">
         
            <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
          <div id="svg_wrap"></div>

          <section>
             <div class="col-md-3 col-sm-4">
                <div class="formrow">
                <label class="control-label ">Job Title / Designation<span class="required"> * </span> </label>
                <input type="text" name="job_title" value="<?php if(!empty($job_info->job_title)){
                  echo $job_info->job_title;} ?><?php echo set_value('job_title'); ?>" class="form-control" autocomplete="off" required="">
                  <?php echo form_error('job_title'); ?>
                </div>
              </div>
             <div class="col-md-3 col-sm-4">
                <div class="formrow">
                  <label class="control-label ">Job Locations<span class="required"> * </span> </label>
                    <input type="text" name="city_id" class="form-control" id="tokenfield" placeholder="Enter Location"
                        value="" required><?php echo form_error('city_id'); ?>                   
                  </div>
              </div>
                <div class="col-md-3 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Expected Experience<span class="required"> *</span> </label>
                    <input class="form-control" type="text" name="experience" maxlength="2" value="<?php 
                      if(!empty($job_info->experience)){ echo $job_info->experience;
                       }
                    ?>" autocomplete="off" required>                  
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <div class="formrow">
                    <label class="control-label ">Number of Positions<span class="required"> *</span> </label>
                    <input class="form-control" min="1" type="number" maxlength="2" name="no_jobs" required value="<?php 
                      if(!empty($job_info->no_jobs)){ echo $job_info->no_jobs; } ?>" autocomplete="off">  <?php echo form_error('no_jobs'); ?>                
                  </div>
              </div>
               <div class="col-md-3 col-sm-12"> 
                  <div class="formrow">  
                    <label class="control-label">Education Level<span class="required"> * </span></label>
                    <select name="job_edu" id="job_edu" class="form-control" data-style="btn-default" data-live-search="true" onchange="getEducationSpecial(this.value)" required="">
                      <option value="">Select Level </option>
                      <?php foreach($education_level as $education){?>
                      <option value="<?php echo $education['education_level_id']; ?>"<?php if($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                      <?php } ?>
                  </select>   <?php echo form_error('job_edu'); ?>                
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="formrow">
                  <label class="control-label ">Engagement Model<span class="required"> * </span> </label>
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
               <div class="col-md-3 col-sm-12" id="spectial"> 
                  <div class="formrow">  
                    <label class="control-label ">Certifications Preferred <span class="required"> * </span></label>
                    <select name="job_edu_special" id="job_edu_special" class="form-control" data-style="btn-default" data-live-search="true">
                     <option value="">Select Certifications </option>
                   
                    </select> 
                  </div>
                </div>

                 <div class="col-md-3 col-sm-12">
                <div class="formrow">
                  <label  class="control-label ">Job Role<span class="required"> *</span></label>
                    <select name="job_role" id="job_role" class="form-control col-sm-5" onchange="getSkillsdetails(this.value)" required="">
                       <?php if(!empty($job_role_data)) foreach ($job_role_data as $role_value) {
                           ?> 
                          <option value="<?php echo $role_value['id']; ?>"<?php if(!empty($job_info)) if($job_info->job_role==$role_value['id']) echo 'selected'; ?>><?php echo $role_value['job_role_title']; ?></option>
                        <?php } ?><?php echo form_error('job_role'); ?>
                    </select>                  
                  </div>
              </div>
               
               
            <div class="col-sm-12 p-m-2">
              <div class="formrow">
                <!-- donain is nothing but industry -->
                <label class="control-label ">Skill Set<span class="required"> * </span> </label>
                <div id="skills_result">Please Select Job Role.</div>       
              </div>
            </div>
           
          </section>
           
          

          <section>
             <div class="col-md-3 col-sm-12">
                  <div class="formrow">
                     <input type="radio" name="">CTC (in Lakhs)<span class="required"> * </span>
                    <input type="text" id="salary_range" name="salary_range" onkeyup="javascript:changeSalary();" class="form-control" min="1" autocomplete="off"><?php echo form_error('salary_range'); ?>
                  </div>
                </div>
             <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                    <input type="radio" name=""> CTC (in Lakhs)<span class="required"> * </span>
                    <input type="text" id="salary_range" name="salary_range" onkeyup="javascript:changeSalary();" class="form-control" min="1" autocomplete="off"><?php echo form_error('salary_range'); ?>
                  </div>
                </div>
           
             
              

                 <div class="col-md-12 col-sm-12">
                   <div class="formrow">
                   <label class="control-label">Other Benefits <span class="required"> * </span></label>
                    <textarea name="benefits" class="form-control ckeditor" placeholder="Company benefits offered"><?php if(!empty($job_info)) echo $job_info->benefits; ?></textarea><?php echo form_error('benefits'); ?>                                 
                </div>
                </div>
                <div class="col-md-6 col-sm-4">
                <div class="formrow">
                  <label class="control-label">Upload JD <span class="required"> * </span></label>
                  <input type="file" name="">                                  
                </div>
              </div>
              
                 <div class="col-md-12 col-sm-4">
                <div class="formrow">
                  <label class="control-label">Job Description <span class="required"> * </span></label>
                  <textarea name="job_desc" class="form-control ckeditor" placeholder="Job Description"><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea><?php echo form_error('job_desc'); ?>                                  
                </div>
              </div>
                 <div class="col-sm-12 p-m-2">
               <div class="formrow">  
                    <label class="control-label ">Ocean Test Required <span class="required">*</span></label>
                    <select name="job_test_requirment" id="job_test_requirment" class="form-control" data-style="btn-default" data-live-search="true" required="">
                      <option value="Yes"<?php if($job_info->is_test_required=="Yes"){ echo "selected"; }?>>Yes </option>
                      <option value="No"<?php if($job_info->is_test_required=="No"){ echo "selected"; }?>>No </option>
                    </select> <?php echo form_error('job_test_requirment'); ?>             
                  </div>
            </div>
            </section>

          
            
            <button class="button" id="prev">&larr; Previous</button>
            <button class="button" id="next">Next &rarr;</button>
           <button class="button" data-toggle="modal" data-target="#rotateModal" id="preview">preview</button>
            <button type="submit" class="button" id="submit">Post Job</button>
      
        </div>
      </form>
    </div>
  </div>
</div> 

<div class="modal fade-rotate" id="rotateModal<?php echo $v_companyjobs->job_post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="company_profile_id" id="company_profile_id" value="<?php echo $this->session->userdata('company_profile_id'); ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 24px;font-weight: 600;color:#fff;">Forward this job post</h5>
          </div>
          <form action="<?php echo base_url() ?>employer/job_post" class="sendEmail" method="post" autocomplete="off">
        <div class="modal-body">
             <div class="col-md-4 col-sm-4">
                <div class="formrow">
                <label class="control-label ">Job Title / Designation<span class="required"> * </span> </label>
                <input type="text" name="job_title" value="<?php if(!empty($job_info->job_title)){
                  echo $job_info->job_title;} ?><?php echo set_value('job_title'); ?>" class="form-control" autocomplete="off" required="">
                  <?php echo form_error('job_title'); ?>
                </div>
              </div>
          </div>
        
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">Message</label>

          <textarea class="form-control" name="message" rows="5" id="comment" required></textarea>
          </div>
         
         
       
        </div>
        <div class="modal-footer">
                           
       <button type="submit" class="btn btn-save">Post Job</button>
         
      </div>
      </form>
    </div>
  </div>

</div> 
<script>
  $(document).ready(function(){
    $('input').keyup(function(){
      alert('input');
        if($(this).val().length==$(this).attr("maxlength")){
            $(this).next().focus();
        }
    });
})
</script>
<script>
var base_color = "#dcdcdc";
var active_color = "rgb(16, 132, 126)";

var child = 1;
var length = $("section").length - 1;
$("#prev").addClass("disabled");
$("#submit").addClass("disabled");
$("#preview").addClass("disabled");

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
      $('#preview').removeClass("disabled");
    }
    if (child <= length) {
      child++;
    }
  } else if (id == "prev") {
    $("#next").removeClass("disabled");
    $('#submit').addClass("disabled");
    $('#preview').addClass("disabled");
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

<script>



    $('#tokenfield').tokenfield({
      autocomplete: {
        source: "<?php echo base_url('Employer/search_city'); ?>",
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

  function getEducationSpecial(id){
     
    if(id==5 || id==6){
     $('#spectial').hide();
    }
    else{
        $('#spectial').show();
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getEducation_specialization',
                data:{id:id},
                success:function(res){
                  $('#job_edu_special').html(res);
                }
        
            }); 
          }
   
    }


 
</script>

