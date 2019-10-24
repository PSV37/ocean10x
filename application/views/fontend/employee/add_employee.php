<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">All Question's </h1>
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
					<div class="container-fluid">
                        <div class="col-md-4">
                            <div class="form-group">                                       
							   <label for="exampleInputEmail1">Employee No <span class="required">*</span></label>
                                
								<input type="number" min="1" name="emp_no" id="emp_no" class="form-control" autocomplete="off">
								</div>
                        </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name <span class="required">*</span></label>
                                         <input type="text" name="emp_name" id="emp_name" class="form-control" autocomplete="off">
                                    </div>
                                </div>
									<div class="col-md-4">
                                    <div class="form-group">
									<label for="exampleInputEmail1">Department<span class="required">*</span></label>
									<select  name="dept_id" id="dept_id" class="form-control">
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
                                    <input type="email" name="email" id="email" class="form-control" autocomplete="off">
										</div>
									</div>
									
										 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Password<span class="required">*</span></label>
                                         <input type="password" name="password" id="password" class="form-control">
										</div>
									</div>
								
									 
									 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                                       <input type="tel" name="mobile" id="mobile" class="form-control" autocomplete="off">
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
				    
	                                    	
	                                        <div class="col-md-4 col-sm-4">
	                                        	<div class="formrow">
	                                        <label class="control-label">Company Country: <span class="required">*</span></label>
										  <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
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
									<input type="text" name="pincode" id="pincode" class="form-control"></textarea>
									</div>
								   </div>
                                </div>										
									 <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit" name="submit_employee" id="submit_employee">Add Employe
                                </button>
								

            </form>

							<span class="text-danger"><?php echo validation_errors(); ?></span>
							
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
  
  
  function hideshowfun()
  {
  
      var a = $('#category').val();
      
      if(a=='MCQ')
      {
          $('#comp_name').hide();
      }
     else{
         $('#comp_name').show();
     } 
     
     if(a=='Subjective' || a=='Practical')
      {
          $('#name').hide();
      }
     else{
         $('#name').show();
     } 
     
      
  }
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
  

<!-- <script src="<?php echo base_url() ?>asset/js/select2.min.js"></script> -->
<!-- <script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script> -->