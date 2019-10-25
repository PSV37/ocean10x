<?php 
    $this->load->view('fontend/layout/employer_regheader.php');
?>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
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
                                                <input type="text" name="company_name" class="form-control"  value="<?php echo (isset($this->session->userdata['reg_in']['company_name'])?$this->session->userdata['reg_in']['company_name']:''); ?>" placeholder="Company Name" autocomplete="off">
                                            </div>
                                            
                                        </div><!-- end row -->
                                    </div>
                                    
                                    <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <input type="email" name="company_email" value="<?php echo isset($this->session->userdata['reg_in']['company_email'])?$this->session->userdata['reg_in']['company_email']:''; ?>" class="form-control" placeholder="Email" autocomplete="off">
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <input type="text" name="company_username" value="<?php echo isset($this->session->userdata['reg_in']['company_username'])?$this->session->userdata['reg_in']['company_username']:''; ?>" class="form-control" placeholder="Company User Name" autocomplete="off">
                                            </div>
                                          
                                        </div><!-- end row -->
                                    </div>
									<div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                              <input type="Password" name="company_password" class="form-control" placeholder="Password">
                                           </div>
										   <div class="col-md-6 col-sm-12">
                                              <select  name="company_category" id="company_category" class="form-control">
                                                <option value="">Company Services</option>
                                                <?php foreach($job_category as $dept){?>
                                                <option value="<?php echo $dept['job_category_id']; ?>"><?php echo $dept['job_category_name']; ?></option>
                                                <?php } ?>
                                              </select> </div>
                                          </div><!-- end row -->
                                    </div>
                                     <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <textarea name="company_address" class="form-control" placeholder="Address-1" autocomplete="off"><?php echo isset($this->session->userdata['reg_in']['company_address'])?$this->session->userdata['reg_in']['company_address']:''; ?></textarea>
                                           </div>
                                          </div><!-- end row -->
                                    </div>
									 
									  <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <textarea name="company_address2" id="company_address2" class="form-control" placeholder="Address-2" autocomplete="off"><?php echo isset($this->session->userdata['reg_in']['company_address2'])?$this->session->userdata['reg_in']['company_address2']:''; ?></textarea>
                                           </div>
                                          </div><!-- end row -->
                                    </div>
									 
                                    <div class="formrow">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                              <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
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
                                            <input type="text" name="company_pincode" id="company_pincode" class="form-control"  value="<?php echo (isset($this->session->userdata['reg_in']['company_pincode'])?$this->session->userdata['reg_in']['company_pincode']:''); ?>" placeholder="Pincode" autocomplete="off" style="width: 560px; margin: auto;">
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
                </div>
										<div class="formrow">
                                       
                                		<div class="container-fluid">
										<div class="col-md-3 col-sm-12"></div>
                                            <div class="col-md-6 col-sm-12">
											<br/><p>For Any Query:</p>
											<p>Contact Us: +91 99999 99999 or +91 88888 88888</p>
											<p>Email us: <a href="mailto:onlinebuy@ocean.com">onlinebuy@ocean.com</a></p>											
											</div>
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
	   <script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#country_id").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script>
<script>
$("#company_category").select2( {
	placeholder: "Select Industry",
	allowClear: true
	} );
</script>

<script>
$("#company_category").select2( {
	placeholder: "Select Industry",
	allowClear: true
	} );
</script>

<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#company_pincode" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "employer_register/search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.pincode;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
</script>
  
 <?php $this->load->view("fontend/layout/footer.php"); ?>