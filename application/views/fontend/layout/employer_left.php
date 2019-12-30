<?php $employer_id=$this->session->userdata('company_profile_id'); 
                $type=$this->session->userdata('comp_type');
          ?>
<div class="col-md-3">
  <nav class="side-menu hidden-sm hidden-xs">
    <ul>
      <li> <a href="<?php echo base_url(); ?>" class=""> <i class="fa fa-home" aria-hidden="true"></i>Home </a> </li>
      <li class="title">Employer</li>
      <li> <a href="<?php echo base_url(); ?>employer" class=""> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a> </li>
      <li onclick="record_audit(this.value)" value="Edit_Profile"> <a href="<?php echo base_url(); ?>employer/profile_setting"  class=""> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Edit Profile </a> </li>
      <li> <a href="<?php echo base_url(); ?>employer/job-post" class=""> <i class="fa fa-pencil" aria-hidden="true"></i> Post New Job </a> </li>
      <li> <a href="<?php echo base_url() ?>employer/active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
      <li> <a href="<?php echo base_url() ?>employer/pending-job" class=""><i class="fa fa-clock-o" aria-hidden="true"></i> Pending Job </a> </li>
      <li> <a href="<?php echo base_url() ?>employer/all-questions" class=""><i class="fa fa-check-square-o" aria-hidden="true"></i> Question Bank</a> </li>
      <li> <a href="<?php echo base_url() ?>employer/add-question" class=""><i class="fa fa-pencil" aria-hidden="true"></i> Add New Question</a></li>
  	 <li> <a href="<?php echo base_url() ?>employer/questionbank-import" class=""><i class="fa fa-upload" aria-hidden="true"></i>Import Question</a></li> 
  	 <li> <a href="<?php echo base_url() ?>employer/addemployee" class=""><i class="fa fa-plus" aria-hidden="true"></i> Add Employee</a></li> 
  	 <li> <a href="<?php echo base_url() ?>employer/allemployee" class=""><i class="fa fa-user" aria-hidden="true"></i> Employee</a></li>
      <li> <a href="<?php echo base_url() ?>employer/deactivated-employee" class=""><i class="fa fa-user-times" aria-hidden="true"></i>Deactivated Employees</a></li>
     <li> <a href="<?php echo base_url() ?>employer/add-new-consultant" class=""><i class="fa fa-plus" aria-hidden="true"></i> Add Consultant</a></li> 
     <li> <a href="<?php echo base_url() ?>employer/show-all-consultant" class=""><i class="fa fa-user" aria-hidden="true"></i>All Consultants</a></li> 	
     <li> <a href="<?php echo base_url() ?>employer/add-new-cv" class=""><i class="fa fa-plus" aria-hidden="true"></i> Add New CV</a></li> 
     <li> <a href="<?php echo base_url() ?>employer/bulk-upload-cv" class=""><i class="fa fa-plus" aria-hidden="true"></i> Bulk Upload CVs</a></li> 
     <li> <a href="<?php echo base_url() ?>employer/corporate-cv-bank" class=""><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $this->company_profile_model->company_name($employer_id); ?> CV Bank</a></li> 
     <li> <a href="<?php echo base_url() ?>add-Corporate-Documents" class=""><i class="fa fa-file" aria-hidden="true"></i> Add Corporate Documents</a></li> 
  	
    </ul>
  </nav>

 <!-- end widget -->
</div><!-- end col -->

<script type="text/javascript">
  
  function record_audit(var1) {
    // body...
    alert(var1);
  }
</script>