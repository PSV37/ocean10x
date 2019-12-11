<?php $employer_id=$this->session->userdata('company_profile_id'); 
                $type=$this->session->userdata('comp_type');
          ?>
<div class="col-md-3">
  <nav class="side-menu hidden-sm hidden-xs">
    <ul>
      <li> <a href="<?php echo base_url(); ?>" class=""> <i class="fa fa-home" aria-hidden="true"></i>Home </a> </li>
      <li class="title">Employer</li>
      <li> <a href="<?php echo base_url(); ?>employer" class=""> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a> </li>
      <li> <a href="<?php echo base_url(); ?>Edit_profile" class=""> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Edit Profile </a> </li>
      <li> <a href="<?php echo base_url() ?>employer/active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
      
  	
    </ul>
  </nav>

 <!-- end widget -->
</div><!-- end col -->