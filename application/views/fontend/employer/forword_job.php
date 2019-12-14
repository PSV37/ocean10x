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
        <h1 class="page-heading">Forward Job</h1>
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
            <form id="submit" action="<?php echo base_url() ?>employer/forword_job_post" method="post" class="submit-form">
              <input type="hidden" name="job_post_id" value="<?php echo $job_id; ?>">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <input type="hidden" name="company_profile_id" id="company_profile_id" value="<?php echo $this->session->userdata('company_profile_id'); ?>">
                    <label class="control-label">Send To:</label>
                     <input type="radio" name="consultant" value="consultant" onclick="getall_consultants();" >Consultanat &nbsp;
                      <input type="radio" name="consultant" value="JobSeeker">JobSeeker(candidate)                
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Emails<span class="required">*</span> </label><small><b>Enter one or more emails separated by comma.</b></small>   
                      <textarea name="candiate_email" placeholder="Enter Emails" required class="form-control" rows="3"></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="formrow">
                                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label>Job Description<span class="required">*</span></label>
                    <textarea name="job_desc" required class="form-control ckeditor"></textarea>
                  </div>
                </div>
                
              </div>

              <hr class="invis">
              <button class="btn btn-primary" type="submit">Forward Job</button>
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
<script type="text/javascript">
  function getall_consultants()
  {
     var employer_id=document.getElementById('company_profile_id').value;
     alert(employer_id);
      $.ajax({
                type:'POST',
                  url:'<?php echo site_url('employee/get_fav_consultants') ?>',
                data:{id:employer_id},
                 dataType: "JSON",  
                success:function(res){
                  console.log(res);
            // $.each(res, function(index, value) 
            //       {
            //          // console.log(value);
            //          $('#candiate_email').val(value.company_email);
            //          // $('#company_url').val(value.company_url);
            //          // $('#country_code').val(value.country_code);
            //          // $('#company_phone').val(value.company_phone);
            //          // $('#contact_name').val(value.contact_name);
            //          // $('#cont_person_email').val(value.cont_person_email);
            //          // $('#cont_person_mobile').val(value.cont_person_mobile);
            //          // $('#company_career_link').val(value.company_career_link);
            //          // $('#company_address').val(value.company_address);
            //          // $('#company_address2').val(value.company_address2);
            //          // $('#country_id').val(value.country_id);
            //          // $('#state_id').val(value.state_id);
            //          // $('#city_id').val(value.city_id);
            //          // $('#company_pincode').val(value.company_pincode);
            //          // $('#comp_gst_no').val(value.comp_gstn_no);
            //          // $('#comp_pan_no').val(value.comp_pan_no);
            //          // $('#company_profile_id').val(value.company_profile_id);
            //          // getStates(value.country_id);
            //          // getCitys(value.state_id);
            //       });
                }
                
            });
  }
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


