<?php 
    $this->load->view('fontend/layout/header.php');
?> 


<!-- Page Title start -->
<!-- <div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Seeker Login</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Seeker Login</span></div>
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
          	<h5 align="center">Hello Talented Professional !</br>
                  Welcome Back !</br>
             Login into the Ocean know about the latest Professional Opportunities !</h5>
          <!-- <h5 align="center">Seeker Login</h5> -->
          <hr>
          <!-- login form -->
           <form class="submit-form customform loginform" action="<?php echo base_url() ?>register/check_login" method="post">
           <?php echo $this->session->flashdata('verify_msg'); ?>
           <?php echo $this->session->flashdata('invalid'); ?>
          <div class="formpanel">
            <div class="formrow">
              <input type="text" class="form-control" name="email" placeholder="Enter your Email / Phone Number" autocomplete="off">
            </div>
            <div class="formrow">
              <input name="password" type="password" id="myInput" class="form-control" placeholder="Key in Your Password" autocomplete="off">
              <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password"></span>
              <!-- An element to toggle between password visibility -->
              <input type="checkbox" onclick="myFunction()">Show Password
            </div>
            <div class="formrow">
              <div class="row">
              	<div class="col-md-6">
                  <input id="checkbox_qu_01" type="checkbox" class="styled" checked="">
                	<label for="checkbox_qu_01"><small>Remember me</small></label>
                </div>
                <div class="col-md-6" align="right"><a href="<?php echo base_url() . 'register/forgot_pass' ?>">Forgot Password?</a></div>
              </div>
              
            </div>
              <div class="newuser"> 
                <!-- <input type="submit" class="btn" value="Sign in">  -->
                <button type="submit" class="btn btn-primary">Sign in</button>
                 <!--  Or
                <a href="#">Login via OTP</a> -->
              </div>
        
          </div>
        </form>
          <!-- login form  end--> 
          <hr>
            <div class="row">
              <div class="col-md-6">
                <span> Or Login using Social </span>
              </div>
              <div class="col-md-6" align="right"> 
                <a href="#"><span class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></span></a><a href="#"><span class="goog"><i class="fa fa-google" aria-hidden="true"></i></span></a>
              </div>
            </div>
          <hr>
         <!-- sign up form -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Not on Ocean ? <a href="<?php echo base_url() . 'register' ?>">Register Now</a></div>
          <!-- sign up form end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>

             
<!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 <style type="text/css">
   .fb{
      display: inline-block;
      width: 35px;
      height: 35px;
      background: #365899;
      border-radius: 50%;
      /* float: left; */
      margin-right: 10px;
      color: #fff;
      text-align: center;
      line-height: 35px;
   }
   .goog{
      display: inline-block;
      width: 35px;
      height: 35px;
      background: red;
      border-radius: 50%;
      /* float: left; */
      margin-right: 10px;
      color: #fff;
      text-align: center;
      line-height: 35px;
   }
 </style>

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

 <script type="text/javascript">
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>