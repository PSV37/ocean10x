<?php $employee_id=$this->session->userdata('emp_id');
 $where_apply="emp_id='$employee_id'";
        $select_edu = "access_to_employee";
        $data = $this->Master_model->get_master_row("employee", $select_edu, $where_apply, $join = FALSE);
        $access=$data['access_to_employee']);
        print_r($access['0']);
        $HiddenProducts = explode(',',$access);
if (in_array('edit_profile', $HiddenProducts)) {
  echo "Available";
} else {
  echo "Not available";
}
 ?>
<div class="col-md-3">
  <nav class="side-menu hidden-sm hidden-xs">
    <ul>
      <!-- <li> <a href="<?php echo base_url(); ?>" class=""> <i class="fa fa-home" aria-hidden="true"></i>Home </a> </li> -->
      <li> <a href="<?php echo base_url(); ?>employee/index" class=""> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a> </li>
      <li class="title">Employee</li>
     <!--  <?php if (find_in_set('edit_profile',$access) >0)
  {?>
  <li> <a href="<?php echo base_url() ?>employee/edit-profile" class=""> <i class="fa fa-user-circle-o" aria-hidden="true"></i> My Profile </a> </li>
  <?php }?> -->
      
      
      <li> <a href="<?php echo base_url() ?>active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
      
      
  	
    </ul>
  </nav>

 <!-- end widget -->
</div><!-- end col -->