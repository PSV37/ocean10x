<?php 

  $company_profile_id = $this->session->userdata('company_profile_id');
 $jobseeker_id = $this->session->userdata('job_seeker_id');
        if ($company_profile_id != null) {
             $this->load->view('fontend/layout/employer_header.php');
            }
        elseif($jobseeker_id != null) {
             $this->load->view('fontend/layout/seeker_header.php');
        } else {
    $this->load->view('fontend/layout/header.php');
    }
?> 

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Contact Us</h1>
      </div>
      <div class="col-md-6 col-sm-6">
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 
<div class="inner-page">
<div class="container">
<div class="contact-wrap">
      <div class="row">
        
        
        <!-- Contact Info -->
        <div class="col-md-4 column">
          <div class="contact-now">
            <div class="contact"> <span><i class="fa fa-home"></i></span>
              <div class="information"> <strong>Corporate office:</strong>
                <p><?php echo $row['address'];?></p>
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-envelope"></i></span>
              <div class="information"> <strong>Email Address:</strong>
               
                  <p><?php echo $row['email'];?> </p>
<!--                <p>Cvbank711@gmail.com </p>-->
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-phone"></i></span>
              <div class="information"> <strong>Phone No:</strong>
                <p><?php echo $row['phone'];?></p>
<!--                <p>01790279399</p>-->
              </div>
            </div>
            <!-- Contact Info --> 
          </div>
          <!-- Contact Now --> 
        </div>
        
        <!-- Contact form -->
        <div class="col-md-8 column">
          <div class="contact-form">
            <div id="message"></div>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo $this->session->flashdata('captcha_msg'); ?>
             <form action="" method="post" id="contactForm" class="submit-form">
              <div class="row">
                <div class="col-md-6">
                   <input type="text" name="fname" required placeholder="First Name" class="form-control" id="fname">
                </div>
                <div class="col-md-6">
                  <input type="text" name="lname" required placeholder="Last Name" class="form-control" id="lname">
                </div>
                <div class="col-md-6">
                  <input type="email" name="email" required placeholder="Your Email" class="form-control" id="email">
                </div>
                <div class="col-md-6">
                  <input type="text" name="phone" required placeholder="Mobile number" class="form-control" id="phone">
                </div>
                <div class="col-md-12">
                  <textarea  name="msg" required class="form-control" placeholder="Your Message Here..."></textarea>
                </div>
                <div class="col-md-12">
                <div class="captchacode">Captcha is cause sensitive</div>
                </div>
                <div class="col-md-6"><input type="text" id="inputchapcha" name="captcha" value="" placeholder="Type captcha code" class="form-control" ></div>
                <div class="col-md-4"><p id="captImg"><?php echo $captcha_images; ?></p></div>
                <div class="col-md-2"><a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'fontend/images/refresh-button.png'; ?>"/></a></div>
                
                
                <div class="col-md-12">
                  <button type="submit" id="submitButton" class="button">Submit Form</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>


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
            $.get('<?php echo base_url().'home/refresh'; ?>', function(data){
              $('#captImg').html(data);
                         $.get('<?php echo base_url().'home/getCaptcha'; ?>', function(data1){
                         $('#sessionCaptcha1').val(data1);
              
                        });
            });
      });






        });

        function validateCaptcha(){
            var sessionCaptcha = '<?php echo $this->session->userdata('captchaCode'); ?>';
               $( "#contactForm" ).validate( {
                rules: {
                fname: {
                        required: true,
                    },
                  lname: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
					phone: {
                        required: true,
                    },
                   msg: {
                        required: true,
                    },
                    

                    captcha: {
                        required:true,
                        equalTo: "#sessionCaptcha1",
                    }  

                },
              
              messages: { 
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

 <?php $this->load->view("fontend/layout/footer.php"); ?>