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
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/intlTelInput.css">
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/demo.css">
    
    <link href="<?php echo base_url(); ?>asset/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url() ?>fontend/js/jquery.js "></script> 
    <link href="<?php echo base_url(); ?>asset/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<script>var base_url = '<?php echo base_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/ckfinder/ckfinder.js"></script>
	
        <style>
          
.required {
    color: #DD4B39;
}

        </style>
      
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
               <li><a title="" href="<?php echo base_url(); ?>">Home</a></li>
               <li class="<?=(current_url()==base_url('about-us')) ? 'active':''?>"><a title="" href="<?php echo base_url(); ?>cms/cms_page/about-us">About Us</a></li>
               <li><a title="" href="<?php echo base_url() ?>training">Training</a></li>
               <li class="<?=(current_url()==base_url('job')) ? 'active':''?>"><a title="" href="<?php echo base_url() ?>job">All Jobs</a></li>
               <li><a title="" href="<?php echo base_url() ?>contact">Contact Us</a></li>
            <li class="green"><a title="" href="<?php echo base_url(); ?>employer/job-post">Submit Vacancy</a></li>
             <?php $employer_id=$this->session->userdata('company_profile_id'); ?>
             <li>
                       <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown yamm-half membermenu hasmenu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <?php if(!empty($this->company_profile_model->company_logoby_id($employer_id))): ?>
                        <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($employer_id);?>" alt="" class="img-circle"></a>
                       <?php else: ?>
                        <img src="<?php echo base_url() ?>upload/notfound.gif" alt="" class="img-circle"></a>
                    <?php endif; ?>
                        <ul class="dropdown-menu start-right">
                            <li class="dropdown-header">Welcome <?php echo $this->company_profile_model->company_name($employer_id); ?></li>
                            <li><a href="<?php echo base_url(); ?>employer"><span class="glyphicon glyphicon-user"></span>Dashboard</a></li>
                            <li><a href="<?php echo base_url(); ?>employer/active-job"><span class="glyphicon glyphicon-star"></span> Active Job</a></li>
                            <li><a href="<?php echo base_url(); ?>employer/pending-job"><span class="glyphicon glyphicon-star"></span>Pending Job</a></li>
                            <li><a href="<?php echo base_url(); ?>employer/change-password"><span class="glyphicon glyphicon-briefcase"></span> Change Password</a></li>
                            <li><a href="<?php echo base_url(); ?>employer/logout"><span class="glyphicon glyphicon-lock"></span> Logout</a></li>
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
    </li>
        </div>
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