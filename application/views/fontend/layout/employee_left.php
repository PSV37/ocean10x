<?php $employee_id=$this->session->userdata('emp_id');
 $where_apply="emp_id='$employee_id'";
        $select_edu = "access_to_employee,org_id";
        $data = $this->Master_model->get_master_row("employee", $select_edu, $where_apply, $join = FALSE);
        $access=explode(",", $data['access_to_employee']);
        $accessSpecifiers = explode(',',$data['access_to_employee']);
        
 ?>
<div class="col-md-3">
  <nav class="side-menu hidden-sm hidden-xs">
    <ul>
     
      <li> <a href="<?php echo base_url(); ?>employee/index" class=""> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a> </li>
      <li> <a href="<?php echo base_url() ?>employee/edit-profile" class=""> <i class="fa fa-check-square-oa-user-circle-o" aria-hidden="true"></i> My Profile </a> </li>
      <li class="title">Employee</li>
      <?php 
      if (in_array('editprofile', $accessSpecifiers)) 
      {?>
        <li> <a href="<?php echo base_url() ?>company-profile" class=""> <i class="fa fa-check-square-oa-user-circle-o" aria-hidden="true"></i>Edit Company Profile</a> </li>
      <?php }?> 

      <?php 
      if (in_array('postjob', $accessSpecifiers)) 
      {?>
          <li> <a href="<?php echo base_url(); ?>post-a-job" class=""> <i class="fa fa-pencil" aria-hidden="true"></i> Post New Job </a> </li>
          <li> <a href="<?php echo base_url() ?>jobs"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
      <?php }else{?> 
        <li> <a href="<?php echo base_url() ?>active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
      <?php } ?>
        

      <?php if (in_array('Addquestionbank', $accessSpecifiers)) {?>
          <li> <a href="<?php echo base_url() ?>add-question"><i class="fa fa-pencil" aria-hidden="true"></i>Add Question</a> </li>
          <li> <a href="<?php echo base_url() ?>question-bank" class=""><i class="fa fa-upload" aria-hidden="true"></i>Import Question</a></li> 
          <li> <a href="<?php echo base_url() ?>all-questions" class=""><i class="fa fa-check-square-o" aria-hidden="true"></i> Question Bank</a> </li>
     <?php } ?>

     <?php if (in_array('Add Consultant', $accessSpecifiers)) {?>
         <li> <a href="<?php echo base_url() ?>add-new-consultant" class=""><i class="fa fa-plus" aria-hidden="true"></i> Add Consultant</a></li>
         <li> <a href="<?php echo base_url() ?>show-all-consultant" class=""><i class="fa fa-user" aria-hidden="true"></i>All Consultants</a></li>   
     <?php } ?>
      
      <li> <a href="<?php echo base_url() ?>employee/logout"><i class="fa fa-lock" aria-hidden="true"></i> logout </a> </li>
     
      
      
  	
    </ul>
  </nav>

 <!-- end widget -->
</div>
<!-- end col -->