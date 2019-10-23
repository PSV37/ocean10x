<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Edit Question's </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Edit Employee</span></div>
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
    		<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/save_city/<?php  if (!empty($edit_employee_info)) { foreach($edit_employee_info as $row)
                        echo $row['emp_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country <span class="required">*</span></label>
                                        <select id="country_name" name="country_name" class="form-control" required onchange="getStates(this.value)">
                                           <option value="">Select Country</option> 
                                        <?php if (!empty($country_data))
                                           foreach($country_data as $cnt_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $cnt_row['country_id']; ?>"<?php if (!empty($edit_employee_info)) if($row['country_id']==$cnt_row['country_id'])echo "selected";?>><?php echo $cnt_row['country_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State <span class="required">*</span></label>
                                        <select id="state_name"  name="state_name" class="form-control" required>
                                           <option value="">Select State</option> 
                                        </select>
                                    </div>
                                </div>
								 </div>
								 <div class="box-body">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">City Name <span class="required">*</span></label>
                                      <input type="text" name="city_name" class="form-control" value="<?php if (!empty($edit_city_info)) echo $row['city_name'];?>" required>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save City
                                </button><br/><br/>
								</div>
                            <!-- /.box-body -->

                        </div>
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
  $(document).ready(function(){



    function getStates_load(){
        var id = $('#country_name').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/city_master/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_name').html(res);
                    $('#state_name').val(<?php echo $row['state_id']; ?>);
					getStates_load();
                }
                
            }); 
          }
   
       }
       getStates_load();
    });
</script>
<script>
    function getStates(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/city_master/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_name').html(res);
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