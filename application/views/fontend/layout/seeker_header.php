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

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/jc/css/jquery.Jcrop.css">

<!--Token-Input CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input-facebook.css" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<!-- Token field css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/tokenfield-typeahead.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/bootstrap-tokenfield.css" type="text/css" />

    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]-->
</head>

<body>
<div class="header topshadow">
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
             
            <li>
            	<?php  $job_seeker=$this->session->userdata('job_seeker_id'); ?>                             
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown yamm-half membermenu hasmenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <?php
                     
                       if(!empty($this->Job_seeker_photo_model->get_jobseeker_photo($job_seeker))):?>
                      <img src="<?php echo base_url() ?>upload/<?php echo  $this->Job_seeker_photo_model->get_jobseeker_photo($job_seeker);?>" alt="" class="img-circle"> <strong>Welcome <?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?></strong></a>
                      <?php else: ?>
                      <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" alt="" class="img-circle"><strong>Welcome <?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?></strong></a>
                      <?php endif; ?>
                      <ul class="dropdown-menu start-right">                                            
                        <li><a href="<?php echo base_url(); ?>job_seeker/seeker_info"><span class="glyphicon glyphicon-user"></span>My Dashboard</a></li>
                        <!--<li><a href="<?php echo base_url(); ?>job_seeker/view_resume"><span class="glyphicon glyphicon-edit"></span> View Resume</a></li>-->
                        <li><a href="<?php echo base_url(); ?>seeker/logout"><span class="glyphicon glyphicon-lock"></span> Logout</a></li>
                      </ul>
                  </li>
              </ul>
            </li>
                    
            </ul>
            <!-- Nav collapes end --> 
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- Nav end --> 
      </div>
    </div>
 </div>
  <!-- Header container end --> 
</div>






<div class="modal fade" id="lookingjob" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <button type="button" class="close closebtn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body">
        <div class="widget clearfix">
          <div class="post-padding item-price">
            
              <div class="content-title">
                <h4><i class="fa fa-file-text" aria-hidden="true"></i> Upload Your Resume</h4>
              </div>
              <!-- end widget-title -->
              
              <form id="sdt" action="<?php echo base_url('Home/fast_upload_resume');?>" method="post" class="submit-form" enctype='multipart/form-data'>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <input type="text" name="full_names" required class="form-control" placeholder="Full Name ">
                    <input type="email" name="emails"  required class="form-control" placeholder="Your Email">
                    <input type="file" name="filenames"  required class="form-control" placeholder="Your Resume">
                    <button type="submit" id="qsb" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                <!-- end row -->
                
              </form>
           
            <!-- end row --> 
            
          </div>
          <!-- end newsletter --> 
          
        </div>
        <!-- end post-padding --> 
        
      </div>
    </div>
    <!-- /.modal-content --> 
    
  </div>
  <!-- /.modal-dialog --> 
  
</div>