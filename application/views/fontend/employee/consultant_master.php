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
        <h1 class="page-heading">All consultants</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>All Consultants</span></div>
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
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
			  <th>Sr No.</th>
			  <th>Company Name</th>
			  <th>Company Email</th>
        <th>Company Mobile No.</th>
        <th>Contact person's Name</th>
        <th>Contact person's Email</th>
			  <th>Contact person's Mobile No.</th>
			  <th>Is Favourite</th>
			  <th>Actions</th>
            </thead>
            <tbody>
			<?php  $count=1; foreach($result as $key){
				?>
              <tr>
				<td><?php echo $count; $count++; ?></td>
				<td><?php echo $key['company_name']; ?></td>
				<td><?php echo $key['company_email']; ?></td>
				<td><?php echo $key['company_phone']; ?></td>	
				<td><?php echo $key['contact_name']; ?></td>				
				<td><?php echo $key['cont_person_email']; ?></td>
				<td><?php echo $key['cont_person_mobile']; ?></td>
				<td><?php echo $key['is_favourite']; ?></td>
				
				<!--<td><?php if($key['emp_status']=='1'){ echo "Active"; }else{ echo "Inactive"; } ?></td>-->
                <td>
                 &nbsp;&nbsp; <a href="<?php echo base_url();?>employer/edit_consultant?id=<?php echo $key['con_comp_map_id']; ?>"><i class="fa fa-pencil"></i></a>
                 &nbsp;&nbsp; <!--<a href="<?php echo base_url();?>emp/deletestatus?id=<?php echo $key['con_comp_map_id']; ?>"> <i class="fa fa-toggle-on"></i></a>-->
                &nbsp;&nbsp; <a href='#' "title='Delete Record' data-toggle="modal" data-target="#deleteModal"  onclick="$('#del_id').val('<?php echo $key['con_comp_map_id'];?>');"><i class="fa fa-trash-o"></i></a>
				</td>
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
                
                    url: "<?php echo site_url('employee/delete_consultant')?>",
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
</script>


<?php $this->load->view("fontend/layout/footer.php"); ?>


