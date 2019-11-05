<?php 
    $this->load->view('fontend/layout/seeker_header.php');
    print_r($results);
?>                
<div id="smsg" class="alert alert-<?php echo $this->session->flashdata('type');?> alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $this->session->flashdata('Message');?> </strong>
</div>

<div class="tabdata"></div>

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 
 