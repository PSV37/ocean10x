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
<?php if (!empty($this->session->flashdata('success_msg'))) {?>
<div id="smsg" class="alert alert-alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong style="font-size: 15px;" ><?php echo $this->session->flashdata('success_msg');?></strong>
</div> 
<?php } ?>



<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> 
           <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
                <th>Sr.No</th>
        			  <th>Emp Id.</th>
        			  <th>Employee Name</th>
        			  <th>Email Id</th>
        			  <th>Mobile No.</th>
        			  <th>Department</th>
        			  <th>Actions</th>
                <th>Status</th>
        			  <th>Access Given</th>
                


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
          		
                 

                   
                 
                 <!--  &nbsp;&nbsp; <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal"  onclick="$('#del_id').val('<?php echo $key['emp_id'];?>');"><i class="fa fa-trash-o"></i></a>
          				</td> -->
                 <?php if($key['emp_status']=='1')
                 {?>
                   <td>
                  &nbsp;&nbsp; <a href="<?php echo base_url();?>employer/editemployee?id=<?php echo $key['emp_id']; ?>"><i class="fa fa-pencil"></i></a>
                </td>
                  <td><button class="btn btn-success" title='Deactivate' data-toggle="modal" data-target="#deactivateModal"  name="status" id="status"   value="<?php echo $key['emp_id'];?>" >Deactive</button></td> <?}
                 elseif($key['emp_status']=='2')
                  { ?> 
                    <td></td>
                  <td style=""><button class="btn btn-warning" title='Activate' data-toggle="modal" data-target="#deleteModal"  name="status" id="status" onclick="Activate_user(this.value);" value="<?php echo $key['emp_id'];?>" >Inactive</button></td>
                  <?php } elseif($key['emp_status']=='3')
                  { ?> 
                    <td></td>
                  <td style=""><button class="btn btn-danger"  name="status" id="status" value="<?php echo $key['emp_id'];?>" >Deactivated</button></td>
                  <?php } ?>

                  <!-- <td><button class="btn btn-info" data-target="#aceess_specifiers"   name="acess" id="acess"  value="<?php echo $key['emp_id'];?>" >View Access given</button></td> -->

                  <td><a href="#" class="btn btn-info btn-xs getacessdetails" data-emp_id='<?php echo $key['emp_id']; ?>' title="acess" data-toggle="modal" data-target="#aceess_specifiers" ><strong>View Access given</strong> </a></td>

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
  <div id="deactivateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Deactivate Employee</h4>
        </div>
        <form  id="del" autocomplete="off" enctype="multipart/formdata" method="POST">
          <div class="modal-body" id="deleteContent">
            <input type="hidden" name="del_id" id="del_id">
            <div class="form-group">
              <p><b>Are you sure want to Deactivate Account? Once  the account get deactivated you cannot reactivate it...</b></p>
            </div>
          </div>
          <center><div id='res'></div></center>
          <div class="modal-footer">
            <button class="btn btn-success submit" id="deactivate_btn" name="submit">Confirm</button>
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
          </div>
        </form>
      </div>
    </div>
  </div>

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

  <div id="aceess_specifiers" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">View access given </h4>
      </div>
        <div class="modal-body cnf_reschedule_frm">
          <table>
            
          </table>
    
      </div>
           
     
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
$("#deactivate_btn").click(function(e)
   { 
      var id=$('#status').val();
      // alert(id);

      e.preventDefault();
      
         $.ajax({ 
                
                url:'<?php echo base_url();?>Employer/change_status',
                   
                    type: "POST",
                    data: {
                           id:id  
                    },
                    success: function(data)
                    {

                    // $("button#del_id").button('reset');
                       $("#res").html('<div class="alert alert-danger"><button type="button" class="close">×</button>User Deactivated Successfully!</div>');
                          window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                                location.reload();
                            }, 1500);
                          $('.alert .close').on("click", function(e){
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                          });
                          location.reload();

                    }
            });



    })

function Activate_user(id)
{
   // alert(id);
   if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/change_status',
                data:{id:id},
                success:function(res){
                     alert('User Activated  Successfully!');
                     location.replace("<?php echo base_url();?>employer/editemployee?id="+id);
                     // location.reload();
                }
                
            }); 
          }
}

function change_status(id)
{
   // alert(id);
   if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/change_status',
                data:{id:id},
                success:function(res){
                     alert('User Deactivated Successfully!');
                     // location.replace("<?php echo base_url();?>employer/editemployee?id="+id);
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
<script type="text/javascript">
  
  $(".getacessdetails").on('click', function(event){

   event.stopPropagation();
    event.stopImmediatePropagation();
    //(... rest of your JS code)
    var user = $(this).data('emp_id');
    // alert(user);
     $.ajax({
              url: "<?php echo base_url();?>Employer/get_acess_details",
              type: "POST",
              data: {user:user},
          
              success: function(data)
              {
                console.log(data);
                $('.cnf_reschedule_frm').html(data);
                
                $('#aceess_specifiers').modal('show'); 
                $( "#datepicker" ).datepicker();
               
            
              }
        });
});
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


