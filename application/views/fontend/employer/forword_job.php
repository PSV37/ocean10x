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
                    <label >Send To:</label>
                    <input type="radio" name="Seeker" value="consultanat">Consultant
                    <input type="radio" name="Seeker" value="Seeker">JobSeeker(candidate)

                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="formrow">
                    <label class="control-label ">Emails<span class="required">*</span> </label><small><b>Enter one or more emails separated by comma.</b></small>   
                      <textarea name="candiate_email" placeholder="Candiate Emails" required class="form-control" rows="3"></textarea>
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
<?php $this->load->view("fontend/layout/footer.php"); ?>


