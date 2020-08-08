<?php 
   $this->load->view('fontend/layout/header.php');
   ?> 
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
<style>
   .field-icon {
   float: right;
   margin-right: 8px;
   margin-top: -60px;
   position: relative;
   z-index: 2;
   cursor:pointer;    
   } 
   p#output {
   margin-top: 30px;
   }  
</style>
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
                        <span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password"></span>
                     </div>
                     <div class="col-md-4 col-sm-12">
                        <label></label><br>
                        <p id="output"></p>
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
   function validatePassword(password) {
       
       // Do not show anything when the length of password is zero.
       if (password.length === 0) {
           document.getElementById("output").innerHTML = "";
           return;
       }
       // Create an array and push all possible values that you want in password
       var matchedCase = new Array();
       matchedCase.push("[$@$!%*#?&]"); // Special Charector
       matchedCase.push("[A-Z]");      // Uppercase Alpabates
       matchedCase.push("[0-9]");      // Numbers
       matchedCase.push("[a-z]");     // Lowercase Alphabates
       matchedCase.push("[9,20]");
   
       // Check the conditions
       var ctr = 0;
       for (var i = 0; i < matchedCase.length; i++) {
           if (new RegExp(matchedCase[i]).test(password)) {
               ctr++;
           }
       }
       // Display it
       var color = "";
       var strength = "";
       switch (ctr) {
           case 0:
           case 1:
           case 2:
               strength = "Very Weak";
               color = "red";
               break;
           case 3:
           case 4:
               strength = "Medium";
               color = "orange";
               break;
           case 5:
               strength = "Strong";
               color = "green";
               break;
   
       }
       document.getElementById("output").innerHTML = strength;
       document.getElementById("output").style.color = color;
             }
         
</script>
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