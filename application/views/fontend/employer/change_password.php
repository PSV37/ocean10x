<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
<style type="text/css">
   .required
   {
   color: red;
   }
   label.error {
   color: red;
   }
   input.select2-search__field {
   display: inline;
   border-radius: 0px;
   margin-top: 0px;
   }
   ul.select2-results__options {
   margin-top: 30px;
   }
   div#errorbox {
   margin-top: 25px;
   /*font-weight: bold;*/
   color: red;
   }
   .add-question {
   margin-top: 100px;
   padding: 20px;
   }
   form#submit {
   margin-left: 30px;
   margin-top: 25px;
   }
   .emp
   {
   margin-top: 65px;
   }
   .required
   {
   color: red;
   }
   .field-icon {
   float: right;
   margin-right: 8px;
   margin-top: -27px;
   position: relative;
   z-index: 2;
   cursor:pointer;
   }
   p#output {
    margin-top: 30px;
}
</style>
<div class="container">
   <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
     <!--  <?php echo $this->session->flashdata('change_password'); ?> -->
      <div class="col-md-9 add-question">
         <div class="header-bookbank">
            Change Password
         </div>
         <?php echo $this->session->flashdata('change_password'); 
          $company_email = $this->session->userdata('email');
         ?>
         <form id="submit" class="submit-form" action="<?php echo base_url(); ?>employer/change_password" method="post" onSubmit = "return checkPassword(this)">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group lineitem_id ">
                     <label for="exampleInputEmail1">Username <span class="required">*</span></label>
                     <input type="username" name="username" id="myInput1" readonly value="<?php echo $company_email; ?>" class="form-control">
                     <!--<span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password1"></span>-->
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group lineitem_id ">
                     <label for="exampleInputEmail1">Current Password <span class="required">*</span></label>
                     <input type="password" name="oldpassword" id="myInput1" required class="form-control" placeholder="Type your current password">
                     <span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password1"></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group ques_type">
                     <label for="exampleInputEmail1">New Password <span class="required">*</span></label>
                     <input type="password" name="newpassword" id="myInput" onkeyup="validatePassword(this.value);" class="form-control" required placeholder="Type your new password">
                     <span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password"></span>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label></label><br>
                  <p id="output"></p>
               </div>
            </div>
             <div class="row">
               <div class="col-md-4">
                  <div class="form-group lineitem_id ">
                     <label for="exampleInputEmail1">Confirm Password <span class="required">*</span></label>
                     <input type="password" name="confirmpassword" id="confirmpassword" required class="form-control" placeholder="confirm password">
                     <span toggle="#password-field2" class="fa fa-eye-slash field-icon toggle-password1"></span>
                  </div>
               </div>
            </div>
            <div style="color: red" class="error"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align:right;">
               <button id="submit" type="Submit" class="save_question">Update Password</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script> 
   // Function to check Whether both passwords 
   // is same or not. 
   function checkPassword(form) { 
       password1 = form.newpassword.value; 
       password2 = form.confirmpassword.value; 
   
        if (password1 != password2) { 
        $('.error').html('Password did not match: Please try again...');
           // alert ("\nPassword did not match: Please try again...") 
           return false; 
       } 
   
       // If same return True. 
       else{ 
           // alert("Password Match: Welcome to GeeksforGeeks!") 
           return true; 
       } 
   } 
</script>
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
<script>
   $(".toggle-password1").click(function() {
   
   $(this).toggleClass("fa-eye fa-eye-slash");
   var x = document.getElementById("myInput1");
     if (x.type === "password") {
       x.type = "text";
     } else {
       x.type = "password";
     }
   
   });
   $(".toggle-password2").click(function() {
   
   $(this).toggleClass("fa-eye fa-eye-slash");
   var x = document.getElementById("confirmpassword");
     if (x.type === "password") {
       x.type = "text";
     } else {
       x.type = "password";
     }
   
   });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script> -->
<script>
$(document).ready(function() { 
   $("#submit").validate ({
       
       rules: {
           
    'newpassword': {  
    minlength: 8,
   newpassword_regex: true
   
 },
   
   },

  
   
  
   }) ;
   });
</script>
<script>
   $.validator.addMethod("newpassword_regex", function(value, element) {
   
   return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
   
   }, "Please Enter Minimum eight characters,  at least one uppercase letter, one lowercase letter, one number and one special character:");
</script>