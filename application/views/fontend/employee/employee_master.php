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
        <h1 class="page-heading">All Question's </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>All Question's</span></div>
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
           <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
			  <th>Employee No.</th>
			  <th>Name</th>
			  <th>Email Id</th>
			  <th>Mobile No.</th>
			  <th>Department</th>
			  <th>Address</th>
			  <th>Created Date</th>
			  <th>Updated Date</th>
			  <!--<th>Status</th>-->
			  <th>Actions</th>
            </thead>
            <tbody>
			<?php foreach($result as $key){
				?>
              <tr>
				<td><?php echo $key['emp_no']; ?></td>
				<td><?php echo $key['emp_name']; ?></td>
				<td><?php echo $key['email']; ?></td>
				<td><?php echo $key['mobile']; ?></td>	
				<td><?php echo $key['department_name']; ?></td>				
				<td><?php echo $key['address']; ?></td>
				<td><?php echo $key['emp_created_date']; ?></td>
				<td><?php echo $key['emp_updated_date']; ?></td>
				<!--<td><?php if($key['emp_status']=='1'){ echo "Active"; }else{ echo "Inactive"; } ?></td>-->
                <td>
                 &nbsp;&nbsp; <a href="<?php echo base_url();?>emp/editemployee?id=<?php echo $key['emp_id']; ?>"><i class="fa fa-pencil"></i></a>
                 &nbsp;&nbsp; <!--<a href="<?php echo base_url();?>emp/deletestatus?id=<?php echo $key['emp_id']; ?>"> <i class="fa fa-toggle-on"></i></a>-->
                &nbsp;&nbsp; <a href='#' "title='Delete Record' data-toggle="modal" data-target="#deleteModal"  onclick="$('#del_id').val('<?php echo $key['emp_id'];?>');"><i class="fa fa-trash-o"></i></a>
				</td>
              </tr>
			<?php } ?>
              
            </tbody>
          </table>
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
<?php $this->load->view("fontend/layout/footer.php"); ?>


