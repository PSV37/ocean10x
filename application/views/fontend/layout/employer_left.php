<?php $employer_id=$this->session->userdata('company_profile_id'); 
                $type=$this->session->userdata('comp_type');
          ?>
<div class="col-md-3">
  <nav class="side-menu hidden-sm hidden-xs">
    <ul>
      <li> <a href="<?php echo base_url(); ?>" class=""> <i class="fa fa-home" aria-hidden="true"></i>Home </a> </li>
      <li class="title">Employer</li>

      <li> <a href="<?php echo base_url(); ?>employer" class=""> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a> </li>

      <li title="superadmin" data-toggle="modal" data-target="#superadmin" onclick="record_audit('Edit Profile');" value="Edit_Profile" id="Edit_Profile">  <i class="fa fa-user-circle-o" aria-hidden="true" ></i> Edit Profile </li>

      <li onclick="record_audit('Post New Job ');"> <a href="<?php echo base_url(); ?>employer/job-post" class=""> <i class="fa fa-pencil" aria-hidden="true"></i> Post New Job </a> </li>

      <li onclick="record_audit('Posted Job');"> <a href="<?php echo base_url() ?>employer/active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>

      <li onclick="record_audit('Pending Job');"> <a href="<?php echo base_url() ?>employer/pending-job" class=""><i class="fa fa-clock-o" aria-hidden="true"></i> Pending Job </a> </li>

      <li onclick="record_audit('Question Bank');"> <a href="<?php echo base_url() ?>employer/all-questions" class=""><i class="fa fa-check-square-o" aria-hidden="true"></i> Question Bank</a> </li>

      <li onclick="record_audit('Add New Question');"> <a href="<?php echo base_url() ?>employer/add-question" class=""><i class="fa fa-pencil" aria-hidden="true"></i> Add New Question</a></li>

  	 <li onclick="record_audit('Import Question');"> <a href="<?php echo base_url() ?>employer/questionbank-import" class=""><i class="fa fa-upload" aria-hidden="true"></i>Import Question</a></li> 

  	 <li onclick="record_audit('Add Employee');"> <a href="<?php echo base_url() ?>employer/addemployee" class=""><i class="fa fa-plus" aria-hidden="true"></i> Add Employee</a></li>

  	 <li onclick="record_audit('Employee');"> <a href="<?php echo base_url() ?>employer/allemployee" class=""><i class="fa fa-user" aria-hidden="true"></i> Employee</a></li>

      <li onclick="record_audit('Deactivated Employees');"> <a href="<?php echo base_url() ?>employer/deactivated-employee" class=""><i class="fa fa-user-times" aria-hidden="true"></i>
      Deactivated Employees</a></li>

     <li onclick="record_audit(' Add Consultant');"> <a href="<?php echo base_url() ?>employer/add-new-consultant" class=""><i class="fa fa-plus" aria-hidden="true"></i> Add Consultant</a></li> 

     <li onclick="record_audit('All Consultants');"> <a href="<?php echo base_url() ?>employer/show-all-consultant" class=""><i class="fa fa-user" aria-hidden="true"></i>All Consultants</a></li> 

     <li onclick="record_audit('Add New CV');"> <a href="<?php echo base_url() ?>employer/add-new-cv" class=""><i class="fa fa-plus" aria-hidden="true"></i> Add New CV</a></li> 

     <li onclick="record_audit('Bulk Upload CVs');"> <a href="<?php echo base_url() ?>employer/bulk-upload-cv" class=""><i class="fa fa-plus" aria-hidden="true"></i> Bulk Upload CVs</a></li> 

     <li onclick="record_audit('CV Bank');"> <a href="<?php echo base_url() ?>employer/corporate-cv-bank" class=""><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $this->company_profile_model->company_name($employer_id); ?> CV Bank</a></li> 

     <li onclick="record_audit('Add Corporate Documents');"> <a href="<?php echo base_url() ?>add-Corporate-Documents" class=""><i class="fa fa-file" aria-hidden="true"></i> Add Corporate Documents</a></li> 

  	
    </ul>
  </nav>

 <!-- end widget -->
</div><!-- end col -->

<div id="superadmin" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form id="Personal-info" class="form-horizontal" action="<?php echo base_url('employee/check_super_pass');?>"  method="post" autocomplete="off">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Enter Super Admin Password</h4>
      </div>
        <div class="modal-body cnf_reschedule_frm">
          <div class="row">
            <div class="col-md-12">
              <label  class="control-label" ><span class="required">*</span></label>
                <input class="form-control" type="Password" name="Password">
              
            </div>
          </div>

    
      </div>
   <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
           
     
    </div>
  </form>

  </div>
</div>

<script type="text/javascript">
  
  function record_audit(var1) {
    // body...
    // alert(var1);
    if (var1) {
      $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/add_to_audit',
                data:{var1:var1},
                success:function(res){
                    
                }
        
            });
    }
  }
</script>