
<?php 
    $this->load->view('fontend/layout/header.php');
?>                
   <style>
        .field-icon {
  float: right;
  margin-right: 8px;
  margin-top: -60px;
  position: relative;
  z-index: 2;
  cursor:pointer;    
}   
   </style>       
<!-- Page Title start -->
<!-- <div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Employer Login</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Employer Login</span></div>
      </div>
    </div>
  </div>
</div> -->
<!-- Page Title End --> 


<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          	
          <h5 align="center">Employer Login</h5>
          <hr>
          <!-- login form -->
           <form class="submit-form customform loginform" action="<?php echo base_url() ?>employer_login/check_login?redirect=<?php echo $this->input->get('redirect'); ?>" method="post">
           <?php echo $this->session->flashdata('emp_msg');; ?>
             <?php echo $this->session->flashdata('invalid'); ?>
           <?php echo $this->session->flashdata('verify_msg'); ?>
           <?php echo $this->session->flashdata('employer_success'); ?>
           
             
          <div class="formpanel">
            <div class="formrow">
              <input type="text" class="form-control" name="email" placeholder="Enter your Email / Phone Number">
            </div>
          <!--   <div class="formrow">
              <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="formrow">                          	
              <a href="<?php echo base_url() . 'employer_login/forgot_pass' ?>">Forgot Password?</a>              
            </div> -->


            <div class="formrow">
              <input name="password" type="password" id="myInput" class="form-control" placeholder="Key in Your Password" autocomplete="off">
              <span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password"></span>
              <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
            </div>
            <div class="formrow">
              <div class="row check">
                <div class="col-md-6">
                  <input id="checkbox_qu_01" type="checkbox" class="styled" checked="">
                  <label for="checkbox_qu_01"><small>Remember me</small></label>
                </div>
                <div class="col-md-6" align="right"><a class="forgot" href="<?php echo base_url() . 'employer_login/forgot_pass' ?>">Forgot Password?</a></div>
              </div>
              
            </div>
             <div class="newuser"> 
                <!-- <input type="submit" class="btn" value="Sign in">  -->
                <button type="submit" class="btn btn-primary">Sign in</button>
                 <!--  Or
                <a href="#">Login via OTP</a> -->
            </div>
            <!-- <input type="submit" class="btn" value="Login Account"> -->
             <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
          </div>
           </form>
          <!-- login form  end--> 
          
          <!-- sign up form -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Not on Ocean ? <a href="<?php echo base_url(); ?>employer_register">Register Now</a></div>
          <!-- sign up form end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>
<script>
   $(".toggle-password").click(function() {
   
   $(this).toggleClass("fa-eye fa-eye-slash");
   var x = document.getElementById("myInput");
     if (x.type === "password") {
       x.type = "text";
     } else {
       x.type = "password";
     }
   
   });
   
</script>

          
              <!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 