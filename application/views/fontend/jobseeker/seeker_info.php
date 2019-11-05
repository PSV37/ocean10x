<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>        
<div class="col-md-4"></div>        
<div id="smsg" class="alert alert-<?php echo $this->session->flashdata('type');?> alert-dismissible fade in col-md-4">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $this->session->flashdata('Message');?> 	</strong>
</div>
<div class="col-md-4"></div>
<div class="tabdata"></div>

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 
 