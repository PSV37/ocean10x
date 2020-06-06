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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<!---header---->

<div class="container-fluid gradient_strip" >
<div class="container">
   <div class="menu_logo">
      <img src="http://www.tele-kinetics.com/assets/img/logo.png" />
   </div>  
   <div class="text-grad">

   <div class="sear-bar">
   <form class="search-form">
  <input type="search" id="search">
 <i class="fas fa-search"></i>
</form>
     </div>          
</div>


    <div class="switch switch-yellow">
      <input type="radio" class="switch-input" name="view3" value="week3" id="week3" onchange="getchecked(this.value);" checked >
      <label for="week3" class="switch-label switch-label-off">Job Search</label>
      <input type="radio" class="switch-input" name="view3" value="month3" id="month3">
      <label for="month3" class="switch-label switch-label-on">People Search</label>
      <span class="switch-selection"></span>
    </div>






    <div class="social-media">
    <!---mail-box-->
    <div class="notification">
        <i class="fas fa-comment-alt"></i><br>
        Messaging
    </div>    
    <!---mail box-end-->
    
    <!---notification-->
     <div class="bell">
        <i class="fas fa-bell"></i><br>
        Notifications
     </div>
     <!--notification-end-->
     <!---profile--->   
     <div class="profile">
     <i class="fas fa-user-circle"></i>
     <b><?php
     $job_seeker=$this->session->userdata('job_seeker_id');
          echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?> </b>
     </div>
     <!---end-profile-->
    </div>
    
  </div>

</div>

<!---header end--->
<script type="text/javascript">
    function getchecked(value)
    {
      if($('#'+value).is(':checked')){ 
        alert('checked');
        if (value=='week3') 
        {
          $("#search").attr("placeholder", "Job Search");
        }
        else
        {
          $("#search").attr("placeholder", "People Search");
        }
        
      }
      
    }

</script>


   
