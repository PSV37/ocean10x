<?php 
    $this->load->view('fontend/layout/header.php');
?>

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

                <div class="formrow">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
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
                      <input type="radio" name="profession" value="Fresher" <?php echo $str_fr ; ?>> Fresher &nbsp;
                      <input type="radio" name="profession" value="Professional" <?php echo $str_pro ; ?>> Professional<span class="required">*</span>
                    </div>
                    
                  </div><!-- end row -->
                </div>

                <div class="formrow">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <label>Full Name</label><span class="required">*</span>
                      <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?>" class="form-control name-valid" placeholder="Full Name" autocomplete="off">
                    </div><span class="required">*</span>

                    <div class="col-md-6 col-sm-12">
                       <label>Email</label><span class="required">*</span>
                      <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" autocomplete="off"><?php echo form_error('email'); ?><span class="required">*</span>
                    </div>

                  </div><!-- end row -->
                </div>

                <div class="formrow">
                  <div class="row">
                    <!-- <div class="col-md-6 col-sm-12">
                      <input type="text" name="mobile" value="<?php echo isset($this->session->userdata['reg_jobseeker']['mobile_no'])?$this->session->userdata['reg_jobseeker']['mobile_no']:''; ?>" class="form-control" placeholder="Mobile Number" autocomplete="off">
                    </div> -->

                    <!-- <div class="col-md-6 col-sm-12">
                      <?php $str_m="";
                        if((isset($this->session->userdata['reg_jobseeker']['gender'])) && $this->session->userdata['reg_jobseeker']['gender']=='1'){

                        $str_m="selected";
                        $str_f="";
                        }
                        if((isset($this->session->userdata['reg_jobseeker']['gender'])) && $this->session->userdata['reg_jobseeker']['gender']=='2'){
                        $str_m="";
                        $str_f="selected";
                        } 
                      ?> -->
                      <!-- <select name="gender" class="form-control" id="gender">
                        <option value="">Select One</option>
                        <option value="1" <?php echo $str_m ; ?>>Male</option>
                        <option value="2" <?php echo $str_f ; ?>>Female</option>
                      </select> -->
                       <!-- <label>Gender</label> &nbsp;&nbsp;
                      <input type="radio" name="gender" value="1" <?php echo $str_m ; ?>> Male &nbsp;
                      <input type="radio" name="gender" value="2" <?php echo $str_f ; ?>> Female
                    </div> -->
                    <div class="col-md-6 col-sm-12">
                       <label>Password</label><span class="required">*</span>

                      <input type="Password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" ><?php echo form_error('password'); ?><span class="required">*</span>
                    </div>
                  </div><!-- end row -->
                </div>

                <div class="formrow">
                  <div class="row">
                   
                   <!--  <div class="col-md-6 col-sm-12">
                      <input type="Password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                    </div> -->
                  </div>
                </div>

                <div class="formrow">
                  <div class="captchacode">Captcha is cause sensitive</div><span class="required">*</span>
                    <div class="row">

                      <div class="col-md-6 col-sm-12">
                        <input id="inputchapcha" type="text" name="captcha" value="" class="form-control" autocomplete="off"><span class="required">*</span>
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
                      <input type="checkbox" value="" checked="" > <a  href="<?php echo base_url().'terms' ?>" target="_blank" required>  I agree to the Terms and Conditions</a>
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

        function validateCaptcha(){
            var sessionCaptcha = '<?php echo $this->session->userdata('captchaCode'); ?>';
            $( "#submit" ).validate({

                rules: {
                    full_name: "required",
                    
                 gender: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    // confirm_password: {
                    //     required: true,
                    //     minlength: 6,
                    //     equalTo: "#password"
                    // },
                    email: {
                        required: true,
                        email: true
                    }, 
                    // mobile: {
                    //     required: true,
                    // }, 
                    profession: {
                        required: true,
                    }, 


                    captcha: {
                        required:true,
                        equalTo: "#sessionCaptcha1",
                    }  
                },
                messages: {
                    full_name: "Please enter your firstname",
                    gender: "Please select your Gender",
                   
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    // confirm_password: {
                    //     required: "Please provide a password",
                    //     minlength: "Your password must be at least 6 characters long",
                    //     equalTo: "Please enter the same password as above"
                    // },
                    profession: "Please tell us about yourself",
                    email: "Please enter a valid email address",
                    // mobile: "Please enter  mobile number",
                    captcha:{
                        required:"Captcha is required!",
                        equalTo: "Captcha doesn't match!",
                    }
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
        }



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
        });
</script>

 <?php $this->load->view("fontend/layout/footer.php"); ?>

