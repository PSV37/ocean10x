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
                                
								<input type="number" min="1" name="emp_no" id="emp_no" class="form-control">
								</div>
                        </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name <span class="required">*</span></label>
                                         <input type="text" name="emp_name" id="emp_name" class="form-control">
                                    </div>
                                </div>
									 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Salary<span class="required">*</span></label>
                                    <input type="text" name="emp_salary" id="emp_salary" class="form-control">
										</div>
									</div>
                                </div>
									 <div class="container-fluid">
									 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control">
										</div>
									</div>
									
										 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Password<span class="required">*</span></label>
                                     <select id="lineitemlevel_id"  name="lineitemlevel_id" class="form-control">
                                           
                                        </select> 
										</div>
									</div>
								
									 
									 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                                       <input type="tel" name="mobile" id="mobile" class="form-control">
									 </div>
                                </div>
								
								
								</div>
								<div class="container-fluid">
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
								<div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Photo<span class="required">*</span></label>
                                       <input type="file" name="photo" id="photo" class="form-control">
									 </div>
                                </div>
								</div>
								<div class="container-fluid">
									<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address<span class="required">*</span></label>
									<textarea class="form-control ckeditor" name="address"></textarea> </div>
								   </div>
                                </div>		 
		 							
								<!--<div class="box-body">
								<input type="hidden" name="is_admin" value="1" class="form-control"> 
								</div>-->
				  <div class="container-fluid">
				   <div class="col-sm-12">
				  <div class="form-group" id="comp_name" style="display:none;">
                 
				  <label>Answer: <span class="required">*</span></label>
                    <textarea name="sub_answer" id="sub_answer" class="form-control ckeditor" style="height:100px;"><?php if (!empty($edit_questionbank_info)) echo $row['sub_answer'];?></textarea>
                  </div>
				  
                </div>	
				</div>
				<span class="text-danger"><?php echo validation_errors(); ?></span>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit" name="submit_employee" id="submit_employee">Add Employe
                                </button><br/><br/>
                            
                        

                        
                    </div>

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

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
	  
	  
	  
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
			function getTopic(id){
				if(id){
					$.ajax({
						type:'POST',
						url:'<?php echo base_url();?>employer/gettopic',
						data:{id:id},
						success:function(res){
							$('#topic_id').html(res);
						}
						
					}); 
				  }
		   }

    $(document).ready(function(){
		
		function getLineitemlevel_load(){
			var id = $('#lineitem_id').val();
			if(id){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>employer/getlineitemlevel',
					data:{id:id},
					success:function(res){
						$('#lineitemlevel_id').html(res);
						$('#lineitemlevel_id').val(<?php echo $row['lineitemlevel_id']; ?>);
					}
				}); 
			  }
        }
		
		function getLineitem_load(){
			var id = $('#subtopic_id').val();

			if(id){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>employer/getlineitem',
					data:{id:id},
					success:function(res){
						$('#lineitem_id').html(res);
						$('#lineitem_id').val(<?php echo $row['lineitem_id']; ?>);
						 getLineitemlevel_load();
					}
					
				}); 
			  }
   
        }
		
		function getSubtopic_load(){
        var id = $('#topic_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                    $('#subtopic_id').val(<?php echo $row['subtopic_id']; ?>);
					getLineitem_load();
                }
                
            }); 
          }
   
       }
		
		function getTopic_load(){
			var id = $('#subject').val();
			if(id){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>employer/gettopic',
					data:{id:id},
					success:function(res){
						$('#topic_id').html(res);
						$('#topic_id').val(<?php echo $row['topic_id']; ?>);
						getSubtopic_load();
					}
					
				}); 
			}
       }
       getTopic_load();
    });
       
</script>
	   <script>
    function getSubtopic(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                }
                
            }); 
          }
   
    }
</script>



 <script>
    function getLineitem(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getlineitem',
                data:{id:id},
                success:function(res){
                    $('#lineitem_id').html(res);
                }
                
            }); 
          }
   
    }
</script>



<script>
    function getLineitemlevel(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getlineitemlevel',
                data:{id:id},
                success:function(res){
                    $('#lineitemlevel_id').html(res);
                }
                
            }); 
          }
   
       }
</script>   

<!-- <script src="<?php echo base_url() ?>asset/js/select2.min.js"></script> -->
<!-- <script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script> -->