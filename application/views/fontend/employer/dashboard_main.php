<?php 
    $this->load->view('fontend/layout/employer_header.php');


?>   
   
          
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Dashboard</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Dashboard</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 
<div id="smsg" class="alert alert-alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $this->session->flashdata('emp_msg');?></strong>
</div>             

<div class="section lb">
  <div class="container">
    <div class="row">
     <?php $this->load->view('fontend/layout/employer_left.php'); ?>

      <div class="content col-md-9">
       
        <div class="userccount empdash">
          <?php $employer_id=$this->session->userdata('company_profile_id'); 
                $type=$this->session->userdata('comp_type');
          ?>
          <h2>Welcome Back: <strong><?php echo $this->company_profile_model->company_name($employer_id); ?></strong></h2>
          
          <ul class="dashbuttons">
            <li> <a href="<?php echo base_url(); ?>employer/profile_setting" class=""> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Edit Profile </a> </li>
            <li> <a href="<?php echo base_url(); ?>employer/job-post" class=""> <i class="fa fa-pencil" aria-hidden="true"></i> Post New Job </a> </li>
            <li> <a href="<?php echo base_url() ?>employer/active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
            <li> <a href="<?php echo base_url() ?>employer/pending-job" class=""><i class="fa fa-clock-o" aria-hidden="true"></i> Pending Job </a> </li>
            <li> <a href="<?php echo base_url() ?>employer/change-password" class=""><i class="fa fa-lock" aria-hidden="true"></i> Change Password </a> </li>    
            <!-- <li> <a href="<?php echo base_url() ?>employer/logout" class=""> <i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out </a> </li> -->
          </ul>
          
        </div>
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="text-center">
  <img src="<?php echo base_url(); ?>/fontend/images/loader.gif">
</div>
  </div>
</div>
<script>
  $(document).ready (function(){
    $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
    $("#smsg").slideUp(500);
    });   
  });
 </script>

 <?php $this->load->view("fontend/layout/footer.php"); ?>