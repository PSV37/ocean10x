<?php 
    $this->load->view('fontend/layout/header.php');
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

<style type="text/css">
  .required
  {
    color: red;
    margin-left: 10px;
  }
   .field-icon {
  float: right;
  margin-right: 8px;
  margin-top: -27px;
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
        <h1 class="page-heading">Jobseeker Account</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Create Account</span></div>
      </div>
    </div>
  </div>
</div> -->
<!-- Page Title End --> 

<div class="listpgWraper lb">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('msg'); ?>
        <?php echo $this->session->flashdata('captcha_msg'); ?>
      </div>
    </div>
      <div class="row">
        <div class="content col-md-8 col-md-offset-2">
          <div class="userccount">
            <!-- <h5>Jobseeker Account</h5> -->
            <h5 align="center">Join the Ocean to hunt the best Professional Opportunities !</h5><hr>
            <div class="formpanel">
                    
              <form id="submit" action="" method="post" class="submit-form">

                <div class="formrow profession">
                  <div class="row ">
                    <div class="col-md-6 col-sm-12 ">
                       <?php $str_fr="";
                        if((isset($this->session->userdata['reg_jobseeker']['gender'])) && $this->session->userdata['reg_jobseeker']['profession']=='1'){

                        $str_fr="selected";
                        $str_pro="";
                        }
                        if((isset($this->session->userdata['reg_jobseeker']['gender'])) && $this->session->userdata['reg_jobseeker']['profession']=='2'){
                        $str_fr="";
                        $str_pro="selected";
                        } 
                      ?>
                     <label>I am a</label> &nbsp;&nbsp;
                      <input type="radio" name="profession"  value="Fresher" <?php echo $str_fr ; ?>> Fresher &nbsp;
                      <input type="radio" name="profession" value="Professional" <?php echo $str_pro ; ?>> Professional<span class="required">*</span>
                    </div>
                    
                  </div><!-- end row -->
                </div>

                <div class="formrow">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 full_name">
                      <label>Name</label><span class="required">*</span>
                      <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?>" class="form-control name-valid" placeholder="Full Name" autocomplete="off" >
                    </div>

                    <div class="col-md-6 col-sm-12 email">
                     <label>Email</label><span class="required">*</span>
                      <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" autocomplete="off" ><?php echo form_error('email'); ?>
                    </div>

                  </div><!-- end row -->
                </div>

                <div class="formrow">
                  <div class="row">
                  
                    <div class="col-md-6 col-sm-12 password">
                      <label>Password</label><span class="required">*</span>

                      <input title="Password must contain one uppercase,one lowercase,one numeric,one special character and  minimum 8 characters" type="Password" id="password" name="password" class="form-control" placeholder="Password" minlength="8" maxlength="20"  value="<?php echo set_value('password'); ?>" onkeyup="validatePassword(this.value);"> 
                       <span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password"></span>
                               <!-- <span toggle="#password-field"><i class="fa fa-info-circle" ></i></span> -->

                      <?php echo form_error('password'); ?>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <label></label><br>
                      <!-- <meter  class="form-control progress-bar" max="4" id="password-strength"></meter> -->
                       <p id="output"></p>
                    </div>
                  </div><!-- end row -->
                </div>

                <div class="formrow">
                  <div class="row">
                   
                 
                  </div>
                </div>

                <div class="formrow">
                  <div class="captchacode">Captcha is case sensitive<span class="required">*</span></div>
                    <div class="row">

                      <div class="col-md-6 col-sm-12">
                        <input id="inputchapcha" type="text" name="captcha" value="" class="form-control" autocomplete="off" >
                      </div>

                      <div class="col-md-5 col-sm-5">
                        <p id="captImg"><?php echo $captcha_images; ?></p>
                        <a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'fontend/images/refresh-button.png'; ?>"/></a>
                      </div>
                      <div class="col-md-1 col-sm-1"></div>
                    </div><!-- end row -->
                </div>

                <div class="formrow">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <input type="checkbox" value="" checked="" > <a  href="<?php echo base_url().'terms' ?>" target="_blank" >  I agree to the Terms and Conditions</a>
                    </div>
                  </div>
                </div>

              <div class="newuser">
                <button type="submit" id="submitButton" class="btn btn-primary">Join the Ocean !</button>
              </div>
                <a href="<?php echo base_url() . 'register/jobseeker_login' ?>" class="pull-right">Already on Ocean ? Sign in !</a>
            </form>

            <?php //echo $this->session->flashdata('msg'); ?>
          </div><!-- end post-padding -->
        </div>
      </div><!-- end col -->
      <!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->



           

<!--  -->
<input type="hidden" id="sessionCaptcha1" name="sessionCaptcha1" value="<?php echo $this->session->userdata('captchaCode'); ?>">

    <script type="text/javascript">

        $( document ).ready( function () {

            $("#submitButton").click(function(){
            var inputchapcha=$('#inputchapcha').val();
            var imageData='<?php echo $this->session->userdata('captchaCode'); ?>';
            validateCaptcha();
         });

            /// CAPTCHA CODE 

        $('.refreshCaptcha').on('click', function(){
            $.get('<?php echo base_url().'register/refresh'; ?>', function(data){
              $('#captImg').html(data);
                         $.get('<?php echo base_url().'register/getCaptcha'; ?>', function(data1){
                         $('#sessionCaptcha1').val(data1);
              
                        });
            });
      });






        });

  

  </script>

</script>  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
         $('.name-valid').on('keypress', function(e) {
          var regex = new RegExp("^[a-zA-Z ]*$");
          var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
          if (regex.test(str)) {
             return true;
          }
          e.preventDefault();
          return false;
         });
          $( "#submit" ).validate( {
            errorPlacement: function(error, element) {


              if (element.attr("name") == "profession"  ) 
                 error.insertAfter(".profession");

             
         else
       error.insertAfter(element);
    
   
       },
           rules: {
   
           full_name: {
                   required: true,
               },
           email: {
                   required: true,
                     email: true
                  
               },
           password: {
                   required: true,
                   // newpassword_regex: true
                 
               },
             
              profession:{
                required: true,
              },
   
   
               captcha: {
                   required:true,
                   equalTo: "#sessionCaptcha1",
               }  
           },
         
         messages: { 
          full_name: {
                    required: "This field is mandatory!",
                 
           },
           email: {
                    required: "This field is mandatory!",
                  
           },
           password: {
                    required: "This field is mandatory!",
                   minlength: "Your password must be at least 8 characters long",
                   newpassword_regex: "Please Enter Minimum eight characters,  at least one uppercase letter, one lowercase letter, one number and one special character:"
           },
            captcha:{
                   required:"This field is mandatory!",
                   equalTo: "Captcha doesn't match!",
               },
               
              


         },
           
       }); 
      
   
   
   
        });
</script>
 <script>
   $(".toggle-password").click(function() {
   
   $(this).toggleClass("fa-eye fa-eye-slash");
   var x = document.getElementById("password");
     if (x.type === "password") {
       x.type = "text";
     } else {
       x.type = "password";
     }
   
   });
   
</script>
<script>
   $.validator.addMethod("newpassword_regex", function(value, element) {
   
   return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
   
   }, "Please Enter Minimum eight characters,  at least one uppercase letter, one lowercase letter, one number and one special character:");
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
 <?php $this->load->view("fontend/layout/footer.php"); ?>
