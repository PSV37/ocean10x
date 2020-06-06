<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ConsultnHire | Job Listing Site</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/font-awesome.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/main.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/jobseeker_header.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/seeker_dashboard.css">
    



    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/jc/css/jquery.Jcrop.css">

    <!-- Data Table  CSS -->
    <link href="<?php echo base_url(); ?>asset/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!--Token-Input CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input-facebook.css" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<!-- Token field css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/tokenfield-typeahead.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/bootstrap-tokenfield.css" type="text/css" />

    <!-- multiselect css -->
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

       
</head>
<body>
    <?php  $job_seeker=$this->session->userdata('job_seeker_id');
$jsname=$this->Job_seeker_model->jobseeker_name($job_seeker);


 ?> 
    <div class="container-fluid gradient_strip" >
<div class="container">
   <div class="menu_logo">
      <img src="http://www.tele-kinetics.com/assets/img/logo.png" />
   </div>  
   <div class="text-grad">

   <div class="sear-bar">
   <form class="search-form">
  <input type="search">
 <i class="fas fa-search"></i>
</form>
     </div>          
</div>

    <div class="social-media">
    <!---mail-box-->
    <div class="notification">
        <i class="fas fa-envelope"></i>
    </div>    
    <!---mail box-end-->
    
    <!---notification-->
     <div class="notification">
        <i class="fas fa-bell"></i>
     </div>
     <!--notification-end-->
     <!---profile--->
     <div class="profile">
     <i class="fas fa-user-circle"></i>
     <b><?php echo $jsname;
     // print_r($jsname); ?></b>
     </div>
     <!---end-profile-->
    </div>
    
  </div>

</div>
	
    	<div class="col-md-3">
            <aside id="left-panel" style="margin-top:75px;
                 margin-left: 14px;height:auto; border-right: 1px solid rgba(240, 240, 240, 0.3);box-shadow: 2px 2px 4px 0px   #00000033;position: fixed;
            z-index: 999;vertical-align:baseline;">
            <div class="inner-left-pannel">
         <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
      

	    </div>
		</aside>
	</div>
	
</body>

