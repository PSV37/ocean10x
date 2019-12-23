<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<!-- Page Title start -->
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Add Employee </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add Employee</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
    		<form method="post" action="<?php echo base_url();?>employer/addemployee" enctype="multipart/form-data">

            	<div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box-body">
					  <?php
              if (isset($message_display)) {
                echo "<div class='message'>";
                echo $message_display;
                echo "</div>";
              }
            ?>
					<div class="container-fluid">
            <div class="col-md-4">
              <div class="form-group">                                       
							   <label for="exampleInputEmail1">Employee Number <span class="required">*</span></label>
                  <input type="number" min="1" name="emp_no" id="emp_no" class="form-control" autocomplete="off" value="<?php echo set_value('emp_no'); ?>">
								  <span style="color:#ff0000;"><?php echo form_error('emp_no'); ?></span>
							</div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                 <label for="exampleInputEmail1">Name <span class="required">*</span></label>
                  <input type="text" name="emp_name" id="emp_name" class="form-control name-valid" autocomplete="off" value="<?php echo set_value('emp_name'); ?>">
                  <span style="color:#ff0000;"><?php echo form_error('emp_name'); ?></span>
							</div>
            </div>
						<div class="col-md-4">
              <div class="form-group">
								<label for="exampleInputEmail1">Department<span class="required">*</span></label>
								  <select  name="dept_id" id="dept_id" class="form-control department">
  										<option value="">Select Department</option>
  										<?php foreach($result as $key){?>
  										<option value="<?php echo $key['dept_id']; ?>"><?php echo $key['department_name']; ?></option>
  										<?php } ?>
								  </select>
							</div>
            </div>
         </div>
				<div class="container-fluid">
					<div class="col-md-4">
					 <div class="form-group">
             <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
              <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
									<?php echo form_error('email'); ?>
					 </div>
				  </div>
					<div class="col-md-4">
						<div class="form-group">
              <label for="exampleInputEmail1">Password<span class="required">*</span></label>
               <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>">
										<?php echo form_error('password'); ?>
						</div>
					</div>
					<div class="col-md-4">
             <div class="form-group">
               <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                <input type="tel" name="mobile" id="mobile" class="form-control" autocomplete="off" onkeypress="phoneno()" maxlength="10" value="<?php echo set_value('mobile'); ?>">
									 <?php echo form_error('mobile'); ?>
							</div>
           </div>
				</div>
				<div class="container-fluid">
					<div class="col-md-8">
              <div class="form-group">
                  <label for="exampleInputEmail1">Photo<span class="required">*</span></label>
                   <input type="file" name="photo" id="photo" class="form-control">
							</div>
           </div>
				</div>
          <div class="container-fluid">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Designation<span class="required">*</span></label>
                     
                      <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);">
                        <!-- <option value="">Select designation</option> -->
                        <?php foreach($roles as $key){?>
                        <option value="<?php echo $key['user_role_id']; ?>"<?php if($result['user_role_id'] == $key['user_role_id']){ echo "selected"; }?>><?php echo $key['user_roles']; ?></option>
                        <?php } ?>
                        <!-- <option>HR Manager</option>
                        <option>Project Manager</option>
                        <option>Finance Manager</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Give Access To User<span class="required">*</span></label>
                          
                            <select class="selectpicker form-control" multiple data-live-search="true" name="user_acc[]" id="user_accc">
                              <?php  $arr=explode(',', $result['access_to_employee']); 
                              print_r($result['access_to_employee']);
                                foreach ($arr as $key) { ?>
                                 <option value="<?php echo $key ?>"<?php  echo "selected";?>><?php echo $key; ?></option>
                               
                              <?php  } ?>
                              
                        <?php } ?>
                            </select>
                         
                      </div>
                  </div>
                </div>
										<div class="container-fluid">
				    
	                                    	
	                                        <div class="col-md-4 col-sm-4">
	                                        	<div class="formrow">
	                                        <label class="control-label">Company Country: <span class="required">*</span></label>
										  <select  name="country_id" id="country_id" class="form-control country" onchange="getStates(this.value)">
											<option value="">Select Country</option>
											<?php foreach($country as $key){?>
											<option value="<?php echo $key['country_id']; ?>"<?php if($company_info->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
											<?php } ?>
										  </select>
	                                        </div>
	                                    </div>

										
										<div class="col-md-4 col-sm-4">
											<div class="formrow">
											<label class="control-label">Company State: <span class="required">*</span></label>
											<select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
											<option value="">Select State</option>
										     
											</select>
										</div>
	                                    </div>
										
										<div class="col-md-4 col-sm-4">
											<div class="formrow">
											<label class="control-label">Company City: <span class="required">*</span></label>
											<select  name="city_id" id="city_id" class="form-control">
											<option value="">Select City</option>
											 
											</select>
											</div>
										</div>
				                                             
										</div>
								<div class="container-fluid">
									<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address<span class="required">*</span></label>
									<textarea class="form-control ckeditor" name="address" autocomplete="off"></textarea> </div>
								   </div>
                                </div>	
								<div class="container-fluid">
									<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pincode<span class="required">*</span></label>
									<input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo set_value('pincode'); ?>">
									<?php echo form_error('pincode'); ?>
									</div>
								   </div>
                                </div>										
									 <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit" name="submit_employee" id="submit_employee">Add Employe
                                </button>
								

            </form>

							
							
          </div>
        </div>
        <!-- end post-padding --> 
      </div>
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
</div>
</div>
<!-- end section --> 
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>   
	   
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
      function getuseraccess(id){
      if(id){
          
        
              $.ajax({
                  type:'POST',
                  url:'<?php echo base_url();?>employer/get_access_data',
                  data:{id:id},
                  success:function(res){
                      $('#user_accc').html(res);
                      $("#user_accc").selectpicker('refresh');
                  }

          
              }); 
            }
          // $(".empdash .selectpicker").css("display", "block");
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
                    $('#state_id').val(<?php echo $company_info->state_id; ?>);
                     getCitys_load(<?php echo $company_info->state_id; ?>);
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
                    $('#city_id').val(<?php echo $company_info->city_id; ?>);
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
$("#dept_id").select2( {
	placeholder: "Select Department",
	allowClear: true
	} );
</script>

<script>
$("#country_id").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
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
$(function() {
  // choose target dropdown
  var select = $('.department');
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
            $('#mobile').keypress(function(e) {
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
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#pincode" ).autocomplete({
 
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
<!-- <script src="<?php echo base_url() ?>asset/js/select2.min.js"></script> -->
<!-- <script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script> -->