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
<style>
.multiselect {
  width: 100%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
 
}

#checkboxes label {
  display: block;
}

</style>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Add corporate Documents</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add corporate Documents</span></div>
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
           
    		<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/savedocumets" method="post">

            	<div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="box-body">
					<div class="container-fluid">
                        <div class="col-md-6">
                            <div class="form-group">                                       
							   <label for="exampleInputEmail1">Document Type<span class="required">*</span></label>
                               <select>
                               	<option>Corporate Name (as in Regd. Docs)</option>
                               	<option>PAN</option>
                               	<option>GSTIN</option>
                               	<option>Office Address Proof</option>
                               </select>
								
							</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                       
							   <label for="exampleInputEmail1">Attach Document<span class="required">*</span></label>
                                <input type="file" name="corporate_pan">
								
								</div>
                        </div>

                    </div>
				  </div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

				<button type="submit">Add</button>
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

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


