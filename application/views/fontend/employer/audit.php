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
        <h1 class="page-heading">Audit</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Audit</span></div>
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
                <th>Sr.No</th>
        			  <th>company Name</th>
        			  <th>action</th>
        			  <th>Date & Time</th>
        			  <th>Updated By</th>
        			  <!-- <th>Department</th> -->
              </thead>
              <tbody>
          		<?php $srno=0; foreach($result as $key){ $srno++; 
                ?>
          				
                <tr>
                  <td><?php echo $srno; ?></td>
          				<td><?php echo $key['company']; ?></td>
          				<td><?php echo $key['Action']; ?></td>
          				<td><?php echo $key['datetime']; ?></td>
          				<td><?php echo $key['updated_by']; ?></td>	
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
  

  </section>
<!-- /.content -->
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<?php $this->load->view("fontend/layout/footer.php"); ?>


