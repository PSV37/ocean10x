<?php 
    $this->load->view('fontend/layout/employer_regheader.php');
?>

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Employer Register</h1>
      </div>
      <div class="col-md-6 col-sm-6">
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
 
            <div class="section lb">
                <div class="container">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php echo $this->session->flashdata('verify'); ?>
                     <?php echo $this->session->flashdata('msg'); ?>
                     <?php echo $this->session->flashdata('captchaCode_msg'); ?>
                </div>
            </div>
                    <div class="row">
                        <div class="content col-md-8 col-md-offset-2">
                            <div class="userccount">
                                <h5>Create An Account</h5>
                                <div class="formpanel">
                                
                                <form id="EmpRegistation" action="<?php echo base_url(); ?>employer_register/create" method="post" enctype="multipart/form-data" class="submit-form">
                                    <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <select name="company_type" id="company_type" class="form-control" >
                                                    <option value="">Select Type</option> 
                                                    <option value="Company"<?php echo (isset($this->session->userdata['reg_in']['comp_type'])?$this->session->userdata['reg_in']['comp_type']:''); ?>>Company</option> 
                                                    <option value="HR Consultant"<?php echo (isset($this->session->userdata['reg_in']['comp_type'])?$this->session->userdata['reg_in']['comp_type']:''); ?>>HR Consultant</option> 
                                                </select>
                                               
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <input type="text" name="company_name" class="form-control"  value="<?php echo (isset($this->session->userdata['reg_in']['company_name'])?$this->session->userdata['reg_in']['company_name']:''); ?>" placeholder="Company Name">
                                            </div>
                                            
                                        </div><!-- end row -->
                                    </div>
                                    
                                    <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <input type="email" name="company_email" value="<?php echo isset($this->session->userdata['reg_in']['company_email'])?$this->session->userdata['reg_in']['company_email']:''; ?>" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <input type="text" name="company_username" value="<?php echo isset($this->session->userdata['reg_in']['company_username'])?$this->session->userdata['reg_in']['company_username']:''; ?>" class="form-control" placeholder="Company User Name">
                                            </div>
                                          
                                        </div><!-- end row -->
                                    </div>
									<div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                              <input type="Password" name="company_password" class="form-control" placeholder="Password">
                                           </div>
										   <div class="col-md-6 col-sm-12">
                                              <select  name="country_id" class="form-control" onchange="getStates(this.value)">
                                                <option value="">Select Country</option>
                                                <?php foreach($country as $key){?>
                                                <option value="<?php echo $key['country_id']; ?>"><?php echo $key['country_name']; ?></option>
                                                <?php } ?>
                                              </select> </div>
                                          </div><!-- end row -->
                                    </div>
                                     <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <textarea name="company_address" class="form-control" placeholder="Address-1"><?php echo isset($this->session->userdata['reg_in']['company_address'])?$this->session->userdata['reg_in']['company_address']:''; ?></textarea>
                                           </div>
                                          </div><!-- end row -->
                                    </div>
									 
									  <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <textarea name="company_address2" class="form-control" placeholder="Address-2"><?php echo isset($this->session->userdata['reg_in']['company_address2'])?$this->session->userdata['reg_in']['company_address2']:''; ?></textarea>
                                           </div>
                                          </div><!-- end row -->
                                    </div>
									 
                                    <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                              <select  name="country_id" class="form-control" onchange="getStates(this.value)">
                                                <option value="">Select Country</option>
                                                <?php foreach($country as $key){?>
                                                <option value="<?php echo $key['country_id']; ?>"><?php echo $key['country_name']; ?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-12">
                                                <select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                        </div><!-- end row -->
                                    </div>

                                    <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <select  name="city_id" id="city_id" class="form-control">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
											 <div class="col-md-6 col-sm-12">
                                            <input type="text" name="company_pincode" class="form-control"  value="<?php echo (isset($this->session->userdata['reg_in']['company_pincode'])?$this->session->userdata['reg_in']['company_pincode']:''); ?>" placeholder="Pincode">
                                           </div>
                                        </div><!-- end row -->
                                    </div>
                                    <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="control-label">Company Logo<small> company logo measures 300 x 300 pixels </small></label>
                                                <input type="file" name="company_logo"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="formrow">
                                        <div class="captchacode">Captcha is cause sensitive</div>
                                		<div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <input type="text" id="inputchapcha" required name="captcha" value="" class="form-control" placeholder="Captcha Code">
                                            </div>
                                            <div class="col-md-4 col-sm-4"><p id="captImg"><?php echo $captcha_images; ?></p>
                                            <a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'fontend/images/refresh-button.png'; ?>"/></a>
                                            </div>
                                        </div><!-- end row -->
                                    </div>

                                    <button id="submitButton" class="btn">Create Account</button>
                                </form>

                             </div>   
                            </div><!-- end post-padding -->
                        </div><!-- end col -->

                        <!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->

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
            $.get('<?php echo base_url().'Employer_register/refresh'; ?>', function(data){
              $('#captImg').html(data);
                         $.get('<?php echo base_url().'Employer_register/getCaptcha'; ?>', function(data1){
                         $('#sessionCaptcha1').val(data1);
              
                        });
            });
      });






        });

        function validateCaptcha(){
            var sessionCaptcha = '<?php echo $this->session->userdata('captchaCode'); ?>';
               $( "#EmpRegistation" ).validate( {
                rules: {

                company_type: {
                        required: true,
                    },
                company_name: {
                        required: true,
                        minlength: 5
                    },
                company_email: {
                        required: true,
                        email: true
                    },
                    company_username: {
                        required: true,
                        minlength: 5
                    },
                    company_password: {
                        required: true,
                        minlength: 6
                    },
                    company_service: {
                        required: true,
                    },
                    company_address: {
                        required: true,
                    },

                    country_id: {
                        required: true,
                    },
                    state_id: {
                        required: true,
                    },
                    city_id: {
                        required: true,
                    },


                    captcha: {
                        required:true,
                        equalTo: "#sessionCaptcha1",
                    }  
                },
              
              messages: { 
                company_password: {
                         required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                },
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
  
  
<script>
	  function getStates(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer_register/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	   </script>
	   
	   <script>
	  function getCitys(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer_register/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	   </script>  
  
 <?php $this->load->view("fontend/layout/footer.php"); ?>