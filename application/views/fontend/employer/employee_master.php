<?php 
    $this->load->view('fontend/layout/employer_header.php');
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
        <h1 class="page-heading">All Employees</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>All Employees</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
<div id="smsg" class="alert alert-alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong style="font-size: 15px;  float: right;"><?php echo $this->session->flashdata('emp_msg');?></strong>
</div> 

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
                <th>Sr.No</th>
        			  <th>Emp Id.</th>
        			  <th>Employee Name</th>
        			  <th>Email Id</th>
        			  <th>Mobile No.</th>
        			  <th>Department</th>
        			<!--   <th>Address</th>
        			  <th>City</th>
        			  <th>State</th>
        			  <th>Country</th>
        			  <th>Pincode</th>
        			  <th>Created Date</th>
        			  <th>Updated Date</th> -->
        			  <th>Actions</th>
        			  <th>Status</th>
              </thead>
              <tbody>
          		<?php $srno=0; foreach($result as $key){ $srno++; 
                ?>
          				
                <tr <?php if($key['emp_status']=='0'){?> style="background: #CCC;" <?php } ?>>
                  <td><?php echo $srno; ?></td>
          				<td><?php echo $key['emp_no']; ?></td>
          				<td><?php echo $key['emp_name']; ?></td>
          				<td><?php echo $key['email']; ?></td>
          				<td><?php echo $key['mobile']; ?></td>	
          				<td><?php echo $key['department_name']; ?></td>				
          		<!-- 		<td><?php echo $key['address']; ?></td>
          				<td><?php echo $key['city_name']; ?></td>
          				<td><?php echo $key['state_name']; ?></td>
          				<td><?php echo $key['country_name']; ?></td>
          				<td><?php echo $key['pincode']; ?></td>
          				<td><?php echo $key['emp_created_date']; ?></td>
          				<td><?php echo $key['emp_updated_date']; ?></td> -->
          				
                  <td>
                   &nbsp;&nbsp; <a href="<?php echo base_url();?>employer/editemployee?id=<?php echo $key['emp_id']; ?>"><i class="fa fa-pencil"></i></a>
                   &nbsp;&nbsp; <!--<a href="<?php echo base_url();?>emp/deletestatus?id=<?php echo $key['emp_id']; ?>"> <i class="fa fa-toggle-on"></i></a>-->
                  &nbsp;&nbsp; <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal"  onclick="$('#del_id').val('<?php echo $key['emp_id'];?>');"><i class="fa fa-trash-o"></i></a>
          				</td>
                 <?php if($key['emp_status']=='1')
                 {?> <td><button class="btn btn-success"  name="status" id="status" onclick="chnagestatus(this.value);" value="<?php echo $key['emp_id'];?>" ?>Active</button></td> <?}
                 else
                  { ?> 
                  <td style=""><button class="btn btn-danger"  name="status" id="status" onclick="chnagestatus(this.value);" value="<?php echo $key['emp_id'];?>" ?>Inactive</button></td>
                  <?php } ?>
                </tr>
			        <?php } ?>
              
            </tbody>
          </table>
          </div>
		 <div class="container-fluid">
       <div class="col-md-10"></div>
		  <div class="col-md-2">
			<span><?php echo $links; ?></span>
		  </div>
         
      </div>


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
<!-- end section --> 

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<!-- delete model -->
  <div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Delete Details</h4>
        </div>
        <form  id="del" autocomplete="off" enctype="multipart/formdata" method="POST">
          <div class="modal-body" id="deleteContent">
            <input type="hidden" name="del_id" id="del_id">
            <div class="form-group">
              <p><b>Are you sure want to delete ?</b></p>
            </div>
          </div>
          <center><div id='res'></div></center>
          <div class="modal-footer">
            <button class="btn btn-success submit" id="delete_btn" name="submit">Confirm</button>
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
          </div>
        </form>
      </div>
    </div>
  </div>

  </section>
<!-- /.content -->
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$("#delete_btn").click(function(e)
   { 
      var id=$('#del_id').val();

      e.preventDefault();

         $.ajax({ 
                
                    url: "<?php echo site_url('employer/deleteemployee')?>",
                    type: "POST",
                    data: {
                           id:id  
                    },
                    success: function(data)
                    {

                    // $("button#del_id").button('reset');
                       $("#res").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Record Successfully Deleted!</div>');
                          window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                                location.reload();
                            }, 1500);
                          $('.alert .close').on("click", function(e){
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                          });

                    }
            });



    })

function chnagestatus(id)
{
   // alert(id);
   if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/change_status',
                data:{id:id},
                success:function(res){
                     alert('status changed Successfully!');
                     location.reload();
                }
                
            }); 
          }
}
</script>
<script>
  $(document).ready (function(){
    $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
    $("#smsg").slideUp(500);
    });   
  });
 </script>

<?php $this->load->view("fontend/layout/footer.php"); ?>


