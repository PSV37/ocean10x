<?php 
    $this->load->view('fontend/layout/header.php');
?> 


<!-- Page Title start -->
<!-- <div class="pageTitle">
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
</div> -->
<!-- Page Title End --> 


<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          	
          <h5>Please enter new password</h5>
          <!-- login form -->
           <form class="submit-form customform loginform" action="" method="post">
           <?php echo $this->session->flashdata('verify_msg'); ?>
           <?php echo $this->session->flashdata('invalid'); ?>
          <div class="formpanel">
            
            <div class="formrow">
              <input name="password" type="password" id="myInput" class="form-control" placeholder="Enter New Password" min="8" required>
              <input type="checkbox" onclick="myFunction()">Show Password
            </div>
            <div class="formrow"></div>
            <input type="submit" class="btn" value="Reset Password">
          </div>
           </form>
          <!-- login form  end--> 
          
         <!-- sign up form -->
          <!-- <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="<?php echo base_url() . 'register' ?>">Register Here</a></div> -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Not a member yet ? <a href="<?php echo base_url() . 'register' ?>">Register Now</a></div>
          <!-- sign up form end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 <script>
   function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
 </script>