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

     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/profile_css.css">

     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/job_liosting_dashboard.css">

     <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/oceantest.css"> -->
     

 
  
    

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

<!---header---->
 <?php  $job_seeker=$this->session->userdata('job_seeker_id'); ?>
<div class="container-fluid gradient_strip" >
<div class="container">
<div class="col-md-12">
	<div class="col-md-3">
   <div class="menu_logo">
      <img src="http://www.tele-kinetics.com/assets/img/logo.png" />
      <!-- <img src="http://www.tele-kinetics.com/assets/img/logo.png" />/ -->
   </div> 
   </div>
   
		
   <div class="col-md-2">
   <div class="text-grad">

   <div class="sear-bar">
   <form class="search-form">
  <input type="search">
 <i class="fas fa-search"></i>
</form>
     </div>          
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
  <i class="fas fa-user-circle"><img src="<?php echo base_url() ?>upload/<?php echo  $this->Job_seeker_photo_model->get_jobseeker_photo($job_seeker);?>" alt="" class="img-circle"></i>&emsp;<a class=" dropdown-toggle" data-toggle="dropdown">
    
    <span class="caret"></span>
    <p class="profile-accoutnt-p"><?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?></p>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#"><i class="fas fa-user"></i>My Profile</a> </li>
      <li><a href="#"><i class="fas fa-lock"></i>Change Password</a></li>
      <li><a href="#" onclick="logout();"><i class="fas fa-power-off"> </i>Logout</a></li>
    </ul>
  </div>
    </div>
    
    </div>
  </div>

</div>
    
<!---header end--->


<script>
  function logout()
  {
    if(window.confirm('Are you sure want to logout?'))
     {
        window.location.href="<?php echo base_url(); ?>seeker/logout";  
     }
    
  }
</script>
<script type="text/javascript">
    function getchecked(value)
    {
      if($('#'+value).is(':checked')){ 
        // alert('checked');
        if (value=='week3') 
        {
         
          $("#search_people").prop("type", "hidden");
          $("#search_job").prop("type", "search");         
       }
        else
        {
          $("#search_job").prop("type", "hidden");
          $("#search_people").prop("type", "search");
        }
        
      }
      
    }

    function getautocomplete()
    {
      var term = document.getElementById('search');
      var search = document.getElementsByName("view3");
       $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>job_seeker/search_people_job',
                data:{term:term,search:search},
                success:function(res){
                  $('#sort').append(res);
                  alert(res);
                }
        
            });
    }

</script>


<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery-ui.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $("#search_job").autocomplete({
              
              source: "<?php echo base_url();?>job_seeker/search_job",
             
            });
        });

        $(document).ready(function(){
            $("#search_people").autocomplete({
             
              source: "<?php echo base_url();?>job_seeker/search_people",
             
            });
        });
    </script>


   
>>>>>>