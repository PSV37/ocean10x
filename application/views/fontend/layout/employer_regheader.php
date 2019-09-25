<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>Career Portal | Job Listing Site</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/font-awesome.css"> 
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/responsive.css">
    <?php /*?><link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/custom.css"><?php */?>
    <link href="<?php echo base_url(); ?>asset/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url() ?>fontend/js/jquery.js "></script> 
	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/main.css">
    
    <link rel="shortcut icon" href="<?php echo base_url() ?>fontend/images/favicon.png" type="image/x-icon">

    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]-->
</head>

<body>

       <div class="header">
            <div class="container">
            	<div class="row">
      <div class="col-md-2 col-sm-3 col-xs-12">
      <a class="logo" title="" href="<?php echo base_url() ?>"><?php echo get_logo();?></a>      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-10 col-sm-12 col-xs-12"> 
        <!-- Nav start -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-collapse collapse" id="nav-main">
            <ul class="nav navbar-nav">              
              <li><a title="" href="<?php echo base_url(); ?>">Home</a></li>
              <li class="<?=(current_url()==base_url('about-us')) ? 'active':''?>"><a title="" href="<?php echo base_url(); ?>about-us">About Us</a></li>
              <li><a title="" href="<?php echo base_url() ?>training">Training</a></li>
               <li><a title="" href="<?php base_url() ?>seeker-login">Post Resume</a></li>
               <li class="<?=(current_url()==base_url('job')) ? 'active':''?>"><a title="" href="<?php echo base_url() ?>job">All Jobs</a></li>
               <li><a title="" href="<?php echo base_url() ?>contact">Contact Us</a></li>
            
            <li class="yellow"><a href="<?php echo site_url('employer_login') ?>">Employer Site</a></li>
              <li class="black"><a href="<?php echo site_url('seeker-login') ?>">Sign In</a></li>
              <li class="green"><a href="<?php echo site_url('register') ?>">Register</a></li>
                    
            </ul>
            <!-- Nav collapes end --> 
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- Nav end --> 
      </div>
    </div>
                
            
                
            </div>
        </div>