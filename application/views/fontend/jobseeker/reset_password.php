<?php 
    $this->load->view('fontend/layout/header.php');
?> 


<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Seeker Reset Password</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Reset Account</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 


<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          	
          <h5>Jobseeker Reset Password</h5>
          <!-- login form -->
           <form class="submit-form customform loginform" action="" method="post">
           <?php echo $this->session->flashdata('verify_msg'); ?>
           <?php echo $this->session->flashdata('invalid'); ?>
          <div class="formpanel">
            
            <div class="formrow">
              <input name="password" type="password" class="form-control" placeholder="Password" min="5" required>
            </div>
            <div class="formrow"></div>
            <input type="submit" class="btn" value="Reset Account">
          </div>
           </form>
          <!-- login form  end--> 
          
         <!-- sign up form -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="<?php echo base_url() . 'register' ?>">Register Here</a></div>
          <!-- sign up form end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>




               
              <!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>