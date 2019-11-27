<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-5">
        <div class="job-header">
          <div class="contentbox">
            <div class="formpanel">
             <?php echo $this->session->flashdata('change_password'); ?>
              <form id="submit" class="submit-form" action="<?php echo base_url(); ?>job_seeker/change_password" method="post">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <label class="control-label">Current Password </label>
                    <input type="password" name="oldpassword" class="form-control" placeholder="Type your current password">
                      <br>
                    <label class="control-label">New Password</label>
                    <input type="password" name="newpassword" class="form-control" placeholder="Type your new password">
                      <br>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                  </div>
                </div>
              </form>
            </div><!-- end post-padding -->
          </div>
        </div>
      <div class="content col-md-4">
        <div class="job-header">
          <div class="contentbox">
            <div class="formpanel">
             <?php echo $this->session->flashdata('change_password'); ?>
              <form id="submit" class="submit-form" action="<?php echo base_url(); ?>job_seeker/change_password" method="post">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <label class="control-label">Current Password </label>
                    <input type="password" name="oldpassword" class="form-control" placeholder="Type your current password">
                      <br>
                    <label class="control-label">New Password</label>
                    <input type="password" name="newpassword" class="form-control" placeholder="Type your new password">
                      <br>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                  </div>
                </div>
              </form>
            </div><!-- end post-padding -->
          </div>
        </div>

      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>