<?php 
    $this->load->view('fontend/layout/employee_header.php');


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
<?php if (!empty($this->session->flashdata('welcome'))) {?>
<div id="smsg" class="alert alert-alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong style="font-size: 15px; float: right;"><?php echo $this->session->flashdata('welcome');?></strong>
</div>   

<?php } ?> 
           

<div class="section lb">
  <div class="container">
    <div class="row">
     <?php $this->load->view('fontend/layout/employee_left.php'); ?>

      <div class="content col-md-9">
       
        <div class="userccount empdash">
          <?php $emp_id=$this->session->userdata('emp_id'); 
                $name=$this->session->userdata('name');;
          ?>
          <h2>Welcome Back: <strong><?php  echo $name; ?></strong></h2>
          
          <ul class="dashbuttons">
            <li> <a href="<?php echo base_url() ?>employee/edit-profile" class=""> <i class="fa fa-user-circle-o" aria-hidden="true"></i> My Profile </a> </li>
           
            <li> <a href="<?php echo base_url() ?>active-job"><i class="fa fa-check-square-o" aria-hidden="true"></i> Posted Job </a> </li>
           
            <li> <a href="<?php echo base_url() ?>change-password" class=""><i class="fa fa-lock" aria-hidden="true"></i> Change Password </a> </li>   
           
            <li> <a href="<?php echo base_url() ?>employee/logout" class=""> <i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out </a> </li>
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