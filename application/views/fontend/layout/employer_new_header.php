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
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/dashboard.css">

     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/jc/css/jquery.Jcrop.css">
    <!-- Data Table  CSS -->
    <link href="<?php echo base_url(); ?>asset/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!--Token-Input CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input-facebook.css" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<!-- Token field css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/tokenfield-typeahead.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/bootstrap-tokenfield.min.js" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/bootstrap-tokenfield.css" type="text/css" />

    <!-- multiselect css -->
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <style type="text/css">
       .box:-moz-placeholder {
    color: white;

}
.box::-webkit-input-placeholder {
    color: white;
}

.box::-moz-placeholder {
    color: white;

}
     </style>
</head>

<div class="container-fluid gradient_strip" >
<div class="container">
<div class="col-md-12">
	<div class="col-md-3">
   <div class="menu_logo">
      <img src="http://www.tele-kinetics.com/assets/img/logo.png" />
   </div> 
   </div>
   
		
   <div class="col-md-2">
 

   <div class="sear-bar">
   <form class="search-form">
  <input type="search">
 <i class="fas fa-search"></i>
</form>
     </div>          

	</div>

<div class="col-md-3">

	 <div class="switch switch-yellow">
      <input type="radio" class="switch-input" name="view3" value="week3" id="week3" checked>
      <label for="week3" class="switch-label switch-label-off">Job Search</label>
      <input type="radio" class="switch-input" name="view3" value="month3" id="month3">
      <label for="month3" class="switch-label switch-label-on">People Search</label>
      <span class="switch-selection"></span>
    </div>
</div>

<div class="col-md-1">
	 <div class="notification">
    	<i class="fas fa-comment-alt"></i><br>
        Messaging
    </div>    
   
</div>

<div class="col-md-1">
	 <div class="bell">
    	<i class="fas fa-bell"></i><br>
        Notifications
   	 </div>  
   
</div>     
    
    <div class="col-md-2">
    	 <div class="dropdown">
  <i class="fas fa-user-circle"></i>&emsp;<a class=" dropdown-toggle" data-toggle="dropdown">
    
    <span class="caret"></span>
    <p class="profile-accoutnt-p">supriya</p>
    </a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo base_url() ?>employer/profile-setting"><i class="fas fa-user"></i>My Profile</a> </li>
      <li><a href="<?php echo base_url(); ?>employer/change-password"><i class="fas fa-lock"></i>Change Password</a></li>
      <li ><a href="#" class="btn-logoff" data-toggle="modal" data-target="#modal_logoff"><i class="fas fa-power-off"></i>Logout</a></li>
    </ul>
  </div>
    </div>
    
    </div>
  </div>

</div>
<div class="modal fade" id="modal_logoff" role="dialog">
    <div class="modal-dialog">
        
      
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Are you sure want to log off ?</h4>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal"><a href="<?php echo base_url(); ?>employer/logout">Ok</a></button>
          <button type="button" class="btn btn-default1" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
<script>
  function logout()
  {
    if(window.confirm('Are you sure want to logout?'))
     {
        window.location.href="<?php echo base_url(); ?>employer/logout";  
     }
    
  }
</script>