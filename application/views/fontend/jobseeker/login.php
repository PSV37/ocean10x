<?php 
    $this->load->view('fontend/layout/header.php');
?> 


<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Seeker Login</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Employer Login</span></div>
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
          	
          <h5>Jobseeker Login</h5>
          <!-- login form -->
           <form class="submit-form customform loginform" action="<?php echo base_url() ?>register/check_login" method="post">
           <?php echo $this->session->flashdata('verify_msg'); ?>
           <?php echo $this->session->flashdata('invalid'); ?>
          <div class="formpanel">
            <div class="formrow">
              <input type="text" class="form-control" name="email" placeholder="Email" autocomplete="off">
            </div>
            <div class="formrow">
              <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
            </div>
            <div class="formrow">
              <div class="row">
              	<div class="col-md-6">
              <!--   <input id="checkbox_qu_01" type="checkbox" class="styled">
              	<label for="checkbox_qu_01"><small>Remember me</small></label> -->
                </div>
                <div class="col-md-6" align="right"><a href="<?php echo base_url() . 'register/forgot_pass' ?>">Forgot Password?</a></div>
              </div>
              
            </div>
              <div class="newuser"> <input type="submit" class="btn" value="Login Account"> 
                  Or
                <a href="#">Login via OTP</a>
            </div>
        
          </div>
        </form>
          <!-- login form  end--> 
          <hr>
            <p class="contactinfo">Or login via socials <a href="#"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a> &nbsp;<a href="#"><span><i class="fa fa-google" aria-hidden="true"></i></span></a></p>
          <hr>
         <!-- sign up form -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="<?php echo base_url() . 'register' ?>">Register My Account</a></div>
          <!-- sign up form end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>




               
              <!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>