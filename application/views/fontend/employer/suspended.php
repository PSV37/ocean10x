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
        <h1 class="page-heading">Deactivated Employees</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Deactivated Employees</span></div>
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
                <th>Status</th>
        			  <th>Activate</th>
              </thead>
              <tbody>
          		<?php $srno=0; foreach($result as $key){ $srno++; 
                ?>
          				
                <tr <?php if($key['emp_status']=='3'){?> style="background: #CCC;" <?php } ?>>
                  <td><?php echo $srno; ?></td>
          				<td><?php echo $key['emp_no']; ?></td>
          				<td><?php echo $key['emp_name']; ?></td>
          				<td><?php echo $key['email']; ?></td>
          				<td><?php echo $key['mobile']; ?></td>	
          				<td><?php echo $key['department_name']; ?></td>				
          		
                  <td style=""><button class="btn btn-danger"  name="status" id="status" value="<?php echo $key['emp_id'];?>" >Suspended</button></td>

                  <td><button class="btn btn-success" title='activate' data-toggle="modal" data-target="#activateModal"  name="activate" id="activate"    value="<?php echo $key['emp_id'];?>" >Activate</button></td>
                 

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
 <div id="activateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Activate Employee</h4>
        </div>
        <form  id="del" autocomplete="off" enctype="multipart/formdata" method="POST">
          <div class="modal-body" id="deleteContent">
            <input type="hidden" name="del_id" id="del_id">
            <div class="form-group">
              <p><b>Are you sure want to activate Account? </b></p>
            </div>
          </div>
          <center><div id='res'></div></center>
          <div class="modal-footer">
            <button class="btn btn-success submit" id="activate_btn" name="submit">Confirm</button>
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
          </div>
        </form>
      </div>
    </div>
  </div>

  </section>
<!-- /.content -->
</div>

<script >
  $("#activate_btn").click(function(e)
   { 
      var id=$('#activate').val();
      // alert(id);

      e.preventDefault();
      
         $.ajax({ 
                
                url:'<?php echo base_url();?>Employer/activate',
                   
                    type: "POST",
                    data: {
                           id:id  
                    },
                    success: function(data)
                    {

                    // $("button#del_id").button('reset');
                       $("#res").html('<div class="alert alert-success"><button type="button" class="close">×</button>Employee Activated</div>');
                          window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                                location.reload();
                            }, 1500);
                          $('.alert .close').on("click", function(e){
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                          });
                     location.replace("<?php echo base_url();?>employer/allemployee");

                          // location.reload();

                    }
            });



    })
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<?php $this->load->view("fontend/layout/footer.php"); ?>


