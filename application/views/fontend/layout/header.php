<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php echo get_metas(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/font-awesome.css">

<!-- Data Table  CSS -->

<link href="<?php echo base_url(); ?>asset/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url() ?>fontend/images/favicon.ico" type="image/x-icon">
<?php /*?><link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/colors.css"><?php */?>
<link href="<?php echo base_url(); ?>asset/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/main.css">
<!--Token-Input CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input-facebook.css" type="text/css" />
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"> -->
<script src="<?php echo base_url() ?>fontend/js/jquery.js "></script>


<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]-->

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>

<!-- Header start -->

<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-12"> <a class="logo" title="" href="<?php echo base_url() ?>"><?php echo get_logo();?></a>
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
              <li class="<?=(current_url()==base_url('cms/cms_page/about-us')) ? 'active':''?>"><a title="" href="<?php echo base_url(); ?>cms/cms_page/about-us">About Us</a></li>
              <li><a title="" href="<?php echo base_url() ?>training">Training</a></li>
              <li><a title="" href="<?php echo base_url() ?>seeker-login">Post Resume</a></li>
              <li class="<?=(current_url()==base_url('job')) ? 'active':''?>"><a title="" href="<?php echo base_url() ?>job">Search Jobs</a></li>
              <li><a title="" href="<?php echo base_url() ?>contact">Contact Us</a></li>
              
              <li class="yellow"><a href="<?php echo site_url('employer_login') ?>">Employer Login</a></li>
              <li class="green"><a href="<?php echo site_url('seeker-login') ?>">Jobseeker Login</a></li>
              <!-- <li class="green"><a href="<?php echo site_url('register') ?>">Register</a></li> -->
              
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
  
  <!-- Header container end --> 
  


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