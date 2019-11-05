<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>        
<div id="smsg" class="alert alert-<?php echo $this->session->flashdata('type');?> alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $this->session->flashdata('Message');?></strong>
</div>

<div class="tabdata"></div>

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 <script>
	$(document).ready (function(){
		$("#smsg").fadeTo(2000, 500).slideUp(500, function(){
		$("#smsg").slideUp(500);
		});   
	});
 </script>
 