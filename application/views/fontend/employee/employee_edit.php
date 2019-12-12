<?php 
    $this->load->view('fontend/layout/employee_header.php');
?>   
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style> 

		


          
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Edit Profile</h1>
        <?php print_r($employee_info->emp_id); ?>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Edit Profile</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->     
          <div class="section lb">
                <div class="container">
                    <div class="row">
                     <?php $this->load->view('fontend/layout/employee_left.php'); ?>


                        <div class="content col-md-9">
                         
							<div class="userccount empdash">
                            <div class="formpanel">
                                <?php echo $this->session->flashdata('msg'); ?>
                                <?php echo $this->session->flashdata('success_msg'); ?>
                                <form id="submit" action="" method="post" class="submit-form" enctype="multipart/form-data"  >
                                <input type="hidden" name="employee_id" value="<?php echo $employee_info->emp_id;?>">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">   
                                           <div class="formrow">
                                           	<label class="control-label">Employee ID<span class="required">*</span></label>
                                            <input type="text" name="emp_id" value="<?php 
                                            	 if(!empty($employee_info->emp_id)){
                                            	 	echo $employee_info->emp_id;
                                            	 }
                                            ?>" class="form-control" placeholder="Employee ID">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
                                        		<label class="control-label">Organization<span class="required">*</span></label>
                                            <input type="text" readonly name="Organization" value="<?php 
                                            	 if(!empty($employee_info->company_name)){
                                            	 	echo $employee_info->company_name;
                                            	 }
                                            ?>" class="form-control" placeholder="Company Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">   
                                           <div class="formrow">
                                           	<label class="control-label">Name<span class="required">*</span></label>
                                            <input type="text" name="emp_name" value="<?php 
                                            	 if(!empty($employee_info->emp_name)){
                                            	 	echo $employee_info->emp_name;
                                            	 }
                                            ?>" class="form-control" placeholder="Alternate Email ID">
                                            </div>
                                        </div>

                                         <div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
                                        	<label class="control-label">Email</label>
                                            <input type="text" name="email" value="<?php 
                                            	 if(!empty($employee_info->email)){
                                            	 	echo $employee_info->email;
                                            	 }
                                            ?>" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                       
                                        <div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
											<label class="control-label">Mobile Number</label>
											<input type="text" name="mobile" value="<?php 
                                            	 if(!empty($employee_info->mobile)){
                                            	 	echo $employee_info->mobile;
                                            	 }
                                            ?>" class="form-control">
											</div>
											</div>
											<div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
                                        	<label class="control-label">Department<span class="required">*</span></label>
                                            <input type="tel" name="department_name" value="<?php 
                                            	 if(!empty($employee_info->department_name)){
                                            	 	echo $employee_info->department_name;
                                            	 }
                                            ?>" class="form-control" maxlength="10" id="department_name"   maxlength="10">
                                            </div>
                                        </div>
                                    </div><!-- end row -->

										<div class="row">

 										<div class="col-md-12 col-sm-12">
                                         <div class="formrow">
                                         	<label class="control-label">Address<span class="required">*</span></label>
                                            <textarea name="address" class="form-control ckeditor" placeholder="Company Address"><?php if(!empty($employee_info->address)){
                                            	 	echo $employee_info->address;
                                            	 } ?></textarea>
                                                 </div>
                                        </div>
  										<div class="panel-body"></div>

                                       
                                       
                                    </div>
									
	                                    <div class="row">
	                                    	
	                                        <div class="col-md-4 col-sm-4">
	                                        	<div class="formrow">
	                                        <label class="control-label">Select Country: <span class="required">*</span></label>
										  <select  name="country_id" id="country_id" class="form-control country" onchange="getStates(this.value)">
											<option value="">Select Country</option>
											<?php foreach($country as $key){?>
											<option value="<?php echo $key['country_id']; ?>"<?php if($employee_info->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
											<?php } ?>
										  </select>
	                                        </div>
	                                    </div>

										
										<div class="col-md-4 col-sm-4">
											<div class="formrow">
											<label class="control-label">Select State: <span class="required">*</span></label>
											<select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
											<option value="">Select State</option>
											
										     
											</select>
										</div>
	                                    </div>
										
										<div class="col-md-4 col-sm-4">
											<div class="formrow">
											<label class="control-label">Select City: <span class="required">*</span></label>
											<select  name="city_id" id="city_id" class="form-control">
											<option value="">Select City</option>
											 
											</select>
	                                    </div>
										

	                                </div>
	                                    </div><!-- end row -->
                                    </div>
									<div class="row">
					 				 	<div class="col-md-6 col-sm-6">
					                       <div class="formrow">
					                             <label class="control-label">Pincode: <span class="required">*</span></label>
					                            <input type="text" name="company_pincode" id="company_pincode"  class="form-control" value="<?php 
					                                     if(!empty($employee_info->company_pincode)){
					                                        echo $employee_info->company_pincode;
					                                     }
					                                ?>" required>
					                        </div>
					                     </div>
					                </div><br/>
					 				
					                
                                    <div class="panel-body"></div>
 									<!-- end row -->
									
                                      
  									<div class="panel-body"></div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                        	<div class="formrow">
                                            <label class="control-label">Profile picture<small> company logo measures 300 x 300 pixels </small></label>
                                            <input type="file" name="company_logo"  value="<?php 
                                                 if(!empty($employee_info->company_logo)){
                                                    echo $employee_info->company_logo;
                                                 }
                                            ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        	<div class="formrow">
                                            <img class="thumbnail" src="<?php echo base_url(); ?>upload/<?php 
                                                 if(!empty($employee_info->company_logo)){
                                                    echo $employee_info->company_logo;
                                                 } else { echo "notfound.gif";}
                                            ?>">
                                            </div>
                                        </div>

                                    </div><!-- end row -->

                                    <button class="btn btn-primary" id="submitbtn"  type="submit"  >Update Profile</button>
                                </form>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="text-center">
  <img src="<?php echo base_url(); ?>/fontend/images/loader.gif">
</div>
  </div>
</div>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#submit').submit(function(){
            $('#myModal').modal();
        })
    })

</script>


<script>
$(document).ready(function(){
    $("#name").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });
});

</script>
  <script src="<?php echo base_url(); ?>asset/js/intlTelInput.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/utils.js"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "",
    });
  </script>
  
  
    
<script>
	function getStates(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                }
				
            }); 
        }
   
	}
	   
	  
	  function getCitys(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	  $(document).ready(function(){

    function getStates_load(){
        var id = $('#country_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                    $('#state_id').val(<?php echo $employee_info->state_id; ?>);
                     getCitys_load(<?php echo $employee_info->state_id; ?>);
                }
                
            }); 
          }
   
       }
    
    function getCitys_load(id){
      //var id = $('#state_id').val();
      // alert(id);
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                    $('#city_id').val(<?php echo $employee_info->city_id; ?>);
                }
                
            }); 
          }
   
       }

  getCitys_load();
  getStates_load();
 
});

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
$("#country").select2( {
	placeholder: "Select Country Code",
	allowClear: true
	} );
</script>


<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#company_pincode" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "employer/search",
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


<script>
$(function() {
  // choose target dropdown
  var select = $('.counrey_code');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>


<script>
$(function() {
  // choose target dropdown
  var select = $('.counrey_code');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>

<script>
$(function() {
  // choose target dropdown
  var select = $('.services');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
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
  //$('select').get(0).selectedIndex = 0;
});
</script>

		<script>        
           function phoneno(){          
            $('#company_phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
	   
	   <script>        
           function phonenoo(){          
            $('#cont_person_mobile').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
		<script type="text/javascript">
	$(document).ready(function() {

      

      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });
		</script>
	
 <?php $this->load->view("fontend/layout/footer.php"); ?>