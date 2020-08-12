<?php 
   $this->load->view('fontend/layout/style.php');
   ?>
   <style>
     span.select2-dropdown.select2-dropdown--below {
    width: 383px;
    margin-left: 20px;
    margin-top: 20px;
}
  
      .field-icon {
  float: right;
  margin-right: 8px;
  margin-top: -27px;
  position: relative;
  z-index: 2;
  cursor:pointer;    
}   
i.fa.fa-info-circle{    /* margin-top: 1px; */
    float: right;
    margin-top: -27px;
    margin-right: -18px;
}
input#city {
    width: 100%;
}
input#company_name {
    text-transform: capitalize;
}
.required {
    color: #DD4B39;
    float: right;
    margin-top: -29px;
    margin-right: -16px;
    font-size: 25px;
}
  
   </style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Page Title start -->
<!-- <div class="pageTitle">
   <div class="container">
     <div class="row">
       <div class="col-md-6 col-sm-6">
         <h1 class="page-heading">Employer Register</h1>
       </div>
       <div class="col-md-6 col-sm-6">
       </div>
     </div>
   </div>
   </div> -->
<!-- Page Title End -->
<script> 
   // Function to check Whether both passwords 
   // is same or not. 
   function checkPassword(form) { 
       password1 = form.company_password.value; 
       password2 = form.confirm_password.value; 
   
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
               <h5 align="center">Join the Ocean to hunt the best Professional !</h5>
               <hr>
               <div class="formpanel">
                  <form id="EmpRegistation" action="<?php echo base_url(); ?>employer_register/create" method="post" enctype="multipart/form-data" class="submit-form" onSubmit = "return checkPassword(this)" >
                     <div class="formrow">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 company_type">
                              <select name="company_type" id="company_type" class="form-control select2" >
                                 <!-- <option value="">Select Type</option> -->
                                 <option value="Company"<?php echo set_select('company_type', 'Company', TRUE); ?>>Company</option>
                                 <option value="HR Consultant"<?php echo set_select('company_type', 'HR Consultant', TRUE); ?>>HR Consultant</option>
                              </select> 
                           </div>
                           <div class="col-md-6 col-sm-12 company_name">
                              <input type="text" name="company_name" id="company_name"class="form-control" placeholder="Company name"  value="<?php echo set_value('company_name'); ?>"  autocomplete="off"> <span class="required">*</span>
                             
                              <?php echo form_error('company_name'); ?>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                     <div class="formrow">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 company_email">
                              <input type="email" name="company_email" placeholder="Email" value="<?php echo set_value('company_email'); ?>"  class="form-control "  autocomplete="off"><span class="required">*</span>
                              
                              <?php echo form_error('company_email'); ?>
                           </div>
                          <!--  <div class="col-md-6 col-sm-12">
                              <input type="text" name="company_username" id="company_username" value="<?php echo set_value('company_username'); ?>" class="form-control" placeholder="Company Admin UserName" autocomplete="off"><?php echo form_error('company_username'); ?>
                           </div> -->
                        </div>
                        <!-- end row -->
                     </div>
                     <span id="username_result"></span>
                     <br><br>
                     <div class="formrow">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 company_password">
                              <input type="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  name="company_password" id="myInput"  class="form-control " placeholder="Password" value="<?php echo set_value('company_password'); ?>" >
                               <span class="required">*</span>
                              <?php echo form_error('company_password'); ?>
                               <span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password"></span>
                               <span toggle="#password-field"><i class="fa fa-info-circle" title="Password must contain one uppercase,one lowercase,one numeric,one special character and  minimum 8 characters"></i></span>
                           </div>
                           <div class="col-md-6 col-sm-12 confirm_password">
                              <input type="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  name="confirm_password"  class="form-control " placeholder="Confirm password" value="<?php echo set_value('company_password'); ?>" >
                               <span class="required">*</span>
                           </div>
                           <div class="error"></div>
                        </div>
                        <!-- end row -->
                     </div>
                     <div class="formrow">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 company_category">
                              <select  name="company_category" id="company_category" class="form-control services select2">
                                 <option value="">Select Company Type</option>
                                 <?php foreach($job_category as $dept){ ?>
                                 <option value="<?php echo $dept['job_category_id']; ?>"><?php echo $dept['job_category_name']; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-6 col-sm-12 City">
                            <input type="text" name="city" class="form-control" id="city" placeholder="City" >
                             <span class="required">*</span>
                            <input type="hidden" value="" class="form-control"  name="city_id" id="city_id" onchange="get_country();">
                             <!--  <select  name="country_id" id="country_id" class="form-control country select2" onChange="getStates(this.value)">
                                 <option value="">Select Country</option>
                                 <?php foreach($country as $key){?>
                                 <option value="<?php echo $key['country_id']; ?>" <?php echo  set_select('country_id', $key['country_id']); ?> ><?php echo $key['country_name']; ?></option>
                                 <?php } ?>
                              </select> -->
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                   
                   
                     <div class="formrow">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                               <input type="text" name="state" id="state" class="form-control" value="">
                             <input type="hidden" name="state_id" id="state_id" class="form-control" value="">

                              <!-- <select  name="country_id" id="country_id" class="form-control select2">
                                 <option value="">Select City</option>
                              </select> -->
                           </div>
                           <div class="col-md-6 col-sm-12">
                            
                             <input type="text" name="country" id="country" class="form-control" value="">
                              <input type="hidden" name="country_id" id="country_id" class="form-control" value="">
                              <!-- <select  name="state_id" id="state_id" class="form-control select2" onChange="getCitys(this.value)">
                                 <option value="">Select State</option>
                              </select> -->
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                     <div class="formrow">
                        <div class="row">
                           <div class="col-md-12 col-sm-12 company_address">
                              <textarea name="company_address" class="form-control " placeholder="Office Address" autocomplete="off"  ><?php echo set_value('company_address'); ?></textarea>
                               <span class="required">*</span>
                              <?php echo form_error('company_address'); ?>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>

                     <div class="formrow">
                        <div class="row">
                           <div class="col-md-12 col-sm-12">
                              <label class="control-label">Company Logo<small> (300 x 300 pixels) </small></label>
                              <input type="file" name="company_logo"  class="form-control" />
                           </div>
                        </div>
                     </div>
                     <div class="formrow">
                        <div class="captchacode">Captcha is cause sensitive</div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 captcha">
                              <input type="text" id="inputchapcha" required name="captcha" value="" class="form-control" placeholder="Captcha Code">
                               <span class="required">*</span>
                           </div>
                           <div class="col-md-4 col-sm-4">
                              <p id="captImg"><?php echo $captcha_images; ?></p>
                              <a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'fontend/images/refresh-button.png'; ?>"/></a>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                     <div class="formrow">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 ">
                              <input type="checkbox" value="" checked="" style="width: 25px !important;height: 15px !important;" > <a href="<?php echo base_url().'terms' ?>" target="_blank" required>  I agree to the Terms and Conditions</a>
                           </div>
                        </div>
                     </div>
                     <div class="newuser">
                        <!-- <button type="submit" id="submitButton" class="btn btn-primary">Join the Ocean !</button> -->
                        <button id="submitButton" class="btn btn-primary">Join the Ocean !</button>
                     </div>
                     <a href="<?php echo base_url() . 'employer_login' ?>" class="pull-right">Already on Ocean ? Sign in !</a>
                  </form>
               </div>
            </div>
            <!-- end post-padding -->
         </div>
         <!-- end col -->
         <!-- end col -->
      </div>
      <!-- end row -->  
   </div>
   <div class="formrow">
      <div class="container-fluid">
         <div class="col-md-3 col-sm-12"></div>
         <div class="col-md-6 col-sm-12">
            <br/>
            <p>For Any Query:</p>
            <p>Contact Us: +91 99999 99999 or +91 88888 88888</p>
            <p>Email us: <a href="mailto:onlinebuy@ocean.com">onlinebuy@ocean.com</a></p>
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</div>
<!-- end section -->
<input type="hidden" id="sessionCaptcha1" name="sessionCaptcha1" value="<?php echo $this->session->userdata('captchaCode'); ?>">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>

<script>
   $('.select2').select2();
</script>
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
            errorPlacement: function(error, element) {

             if (element.attr("name") == "company_type" )
                 error.insertAfter(".company_type ");
               else if (element.attr("name") == "company_name"  ) 
                 error.insertAfter(".company_name");

               else if (element.attr("name") == "company_email"  ) 
                 error.insertAfter(".company_email");

               else if (element.attr("name") == "company_password" ) 
                 error.insertAfter(".company_password");

               else if (element.attr("name") == "confirm_password" ) 
                 error.insertAfter(".confirm_password");

              else if (element.attr("name") == "company_category" ) 
                 error.insertAfter(".company_category");

              else if (element.attr("name") == "company_address" ) 
                 error.insertAfter(".company_address");

              else if (element.attr("name") == "city_id" ) 
                 error.insertAfter(".city_id");

               else if (element.attr("name") == "captcha" ) 
                 error.insertAfter(".captcha");
            
         else
       error.insertAfter(element);
    
   
       },
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
             
               company_password: {
                   required: true,
                   minlength: 8
                    newpassword_regex: true
                   
               },
                confirm_password: {
                   required: true,
                   minlength: 8
                   
               },
               company_category: {
                   required: true,
               },
               company_address: {
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
                    required: "This field is mandatory!",
                   minlength: "Your password must be at least 8 characters long"
           },
            captcha:{
                   required:"This field is mandatory!",
                   equalTo: "Captcha doesn't match!",
               },
                company_password: {
                    required: "This field is mandatory!",
                   minlength: "Your password must be at least 8 characters long"
           },
            company_password:{
                   required:"This field is mandatory!",
                   equalTo: "Captcha doesn't match!",
               },
               confirm_password:{
                   required:"This field is mandatory!",
                   equalTo: "Captcha doesn't match!",
               },
                company_category:{
                   required:"This field is mandatory!",
                   equalTo: "Captcha doesn't match!",
               },
                company_address:{
                   required:"This field is mandatory!",
                   equalTo: "Captcha doesn't match!",
               },
 city_id:{
                   required:"This field is mandatory!",
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
   $.validator.addMethod("newpassword_regex", function(value, element) {
   
   return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
   
   }, "Please Enter Minimum eight characters,  at least one uppercase letter, one lowercase letter, one number and one special character:");
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
                 var pincode = obj.pincode;
                 var location=  obj.location;
                 var city = obj.city;
                 var state = obj.state;
                 var resData = pincode + ', ' + location + ', ' + city + ', '+ state; 
                     return resData;
                }); 
   
                response(resp);
             }
         });
     },
     minLength: 1
   });

     $("#city").autocomplete({
             
             source: "<?php echo base_url();?>employer_register/search_city_name",
            minLength: 2,
                 // append: "#rotateModal",
                 focus: function(event, ui) {
                  // prevent autocomplete from updating the textbox
                  event.preventDefault();
                  // manually update the textbox
                  // alert(source);
                  $(this).val(ui.item.label);
               },
               select: function(event, ui) {
                  // prevent autocomplete from updating the textbox
                  event.preventDefault();
                  // manually update the textbox and hidden field
                  $(this).val(ui.item.label);
                  $('#city_id').val(ui.item.value);
                  get_country(ui.item.value);
               }
               
              });
   });

   function get_country(city_id)
   {
    // var city_id = $('#city_id').val();
    $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer_register/getcity_details',
                data:{city_id:city_id},
                success:function(res)
                {
                  var obj = JSON.parse(res);

                    $('#country_id').val(obj.country_id);
                    $('#country').val(obj.country_name);
                    $('#state_id').val(obj.state_id);
                    $('#state').val(obj.state_name);
                    $('#country').prop('readonly', true);
                    $('#state').prop('readonly', true);
                }
    
            }); 

   }
</script>
<!-- <script type="text/javascript">
   $(document).ready(function(){
    $('#company_username').change(function(){
     var company_username = $('#company_username').val();
     if(company_username != ''){
      $.ajax({
       url: "<?php echo base_url(); ?>Search/checkUsername",
       method: "POST",
       data: {company_username:company_username},
       success: function(data){
        $('#username_result').html(data);
       }
      });
     }
    });
   });
   </script>-->
<script>
   $(function() {
     // choose target dropdown
     var select = $('.services');
     select.html(select.find('option').sort(function(x, y) {
       // to change to descending order switch "<" for ">"
       return $(x).text() > $(y).text() ? 1 : -1;
     }));
   
     // select default item after sorting (first item)
     // $('select').get(0).selectedIndex = 0;
   });
</script>
<script>
   $(function() {
     // choose target dropdown
     var select = $('.country');
     select.html(select.find('option').sort(function(x, y) {
       // to change to descending order switch "<" for ">"
       return $(x).text() > $(y).text() ? 1 : -1;
     }));
   
     // select default item after sorting (first item)
     // $('select').get(0).selectedIndex = 0;
   });
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
<?php $this->load->view("fontend/layout/footer.php"); ?>