<?php 
    $this->load->view('fontend/layout/employee_header.php');
?>                
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Change Password</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Change Password</span></div>
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
                        <div class="userccount">
                            <div class="formpanel">
                           <?php echo $this->session->flashdata('change_password'); ?>
                               <form id="submit" class="submit-form"  method="post">
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

                </div> <!--end row -->
                </div><!-- end container -->
            </div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>