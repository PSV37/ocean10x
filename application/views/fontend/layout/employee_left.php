<?php $employee_id=$this->session->userdata('emp_id'); ?>
<div class="col-md-3">
  <nav class="side-menu hidden-sm hidden-xs">
    <ul>
      <!-- <li> <a href="<?php echo base_url(); ?>" class=""> <i class="fa fa-home" aria-hidden="true"></i>Home </a> </li> -->
      <li> <a href="<?php echo base_url(); ?>employee/index" class=""> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a> </li>
      <li class="title">Employee</li>
      <li> <a href="<?php echo base_url() ?>employee/edit-profile" class=""> <i class="fa fa-user-circle-o" aria-hidden="true"></i> My Profile </a> </li>
      <li> <a href="<?php echo base_url() ?>active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
      
  	
    </ul>
  </nav>

 <!-- end widget -->
</div><!-- end col -->