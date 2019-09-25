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
        <h1 class="page-heading">REGISTRATION</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Registration</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <div class="content col-md-8">
        <div class="contactfwrap">
          <?php  echo $this->session->flashdata('msg'); ?>
          <form id="TrainingFrom" action="<?php echo base_url().'training/submit_registration'; ?>" method="post" class="submit-form">
            <div class="row">
              <input type="hidden" name="training_info_id" value="<?php echo $training_info->training_id; ?>">
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" required>
              </div>
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Email</label>
                <input type="email" required name="email" class="form-control">
              </div>
            </div>
            <!-- end row -->
            <hr class="invis">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Voice</label>
                <input type="text" required name="voice" class="form-control">
              </div>
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Training Title</label>
                <input type="text" readonly name="training_title" class="form-control" placeholder="" value="<?php echo $training_info->training_title; ?>">
              </div>
            </div>
            <!-- end row -->
            <hr class="invis">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Training Duration </label>
                <input readonly type="text" name="training_duration" class="form-control" value="<?php echo date('j F', strtotime($training_info->start_date)).'-'.date('j F Y', strtotime($training_info->end_date)); ?>">
              </div>
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Venue</label>
                <input readonly type="text" name="venue" value="<?php echo $training_info->venus; ?>" class="form-control" >
              </div>
            </div>
            <!-- end row -->
            <hr class="invis">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Training Fee</label>
                <input type="text" name="training_fee" class="form-control" readonly value="<?php echo $training_info->training_fee; ?>" >
              </div>
              <div class="col-md-6 col-sm-12">
                <label class="control-label"> Payment Method</label>
                <br>
                <input type="radio" name="payment_method" value="Paypal" >
                Paypal
                <input type="radio" name="payment_method" value="Cheque">
                Cheque
                <input type="radio" name="payment_method" value="Cash">
                Cash </div>
            </div>
            <!-- end row -->
            
            <hr class="invis">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <label class="control-label">Captcha Code</label>
                <input type="text" required name="captcha" value="" class="form-control" >
              </div>
              <div class="col-md-4 col-sm-4">
                <p id="captImg"><?php echo $captcha_images; ?></p>
              </div>
              <div class="col-md-2 col-sm-2"><a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'fontend/images/refresh-button.png'; ?>"/></a></div>
            </div>
            <!-- end row -->
            
            <hr class="invis">
            <input type="submit" id="submitButton" class="btn contact-btn" value="Sumbit" />
          </form>
        </div>
        <!-- end post-padding --> 
      </div>
      <!-- end col -->
      
      <div class="col-md-4">
        <div class="job-header">
          <div class="jobdetail">
            <?php $ads_right = get_ads('rightside');
 
 if($ads_right): foreach($ads_right as $row_right):?>
            <div class="adbanner2"><a href="<?php echo $row_right->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$row_right->ad_image); ?>" alt=""></a></div>
            <?php endforeach; endif;?>
          </div>
        </div>
      </div>
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
<!-- end section -->
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
            $.get('<?php echo base_url().'training/refresh'; ?>', function(data){
              $('#captImg').html(data);
                         $.get('<?php echo base_url().'training/getCaptcha'; ?>', function(data1){
                         $('#sessionCaptcha1').val(data1);
              
                        });
            });
      });






        });

        function validateCaptcha(){
            var sessionCaptcha = '<?php echo $this->session->userdata('captchaCode'); ?>';
               $( "#TrainingFrom" ).validate( {
                rules: {
                full_name: {
                        required: true,
                        minlength: 5
                    },
                  email: {
                        required: true,
                        email: true
                    },
                    voice: {
                        required: true,
                        minlength: 5
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
