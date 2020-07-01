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
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
  <input type="search" class="box" id="search_job" style="color: white;" placeholder="search job">
  <input type="hidden" class="box" id="search_people" style="color: white;" placeholder="search People">
 <i class="fas fa-search"></i>
</form>
     </div>          
</div>
	</div>

<div class="col-md-3">

	 <div class="switch switch-yellow">
      <input type="radio" class="switch-input" name="view3" value="week3" id="week3" onchange="getchecked(this.value);" checked>
      <label for="week3" class="switch-label switch-label-off">Job Search</label>
      <input type="radio" class="switch-input" name="view3" value="month3" onchange="getchecked(this.value);" id="month3">
      <label for="month3" class="switch-label switch-label-on">People Search</label>
      <span class="switch-selection"></span>
    </div>
</div>

<div class="col-md-1">
	 <div class="notification" style="font-size:13px;margin-top:10px;">
    	<i class="fas fa-comment-alt"></i><br>
        Messaging
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu" style="width: 300px;">
               
                  <?php 
                    $noti = get_notifications($job_seeker);
                      if(!empty($noti)){
                      foreach($noti as $msg_row)
                      {
                        $date = strtotime($msg_row['created_on']);
                        $dat = date('m/d/y', $date);
                        $tme = date('H:m:s A',$date);
                    ?>


                    <li <?php if($msg_row['status']==0){?>style="background-color: #ccc;margin: 5px;" <?php }else{?> style="margin: 5px;"<?php } ?> >

                      <a href="<?php echo base_url(); ?>seeker/seeker-profile?seeker_id=<?php echo base64_encode($msg_row['job_seeker_id']); ?>">
                        <span>
                          <span><?php echo $msg_row['full_name']; ?></span>
                          <span class="time">
                          <?php 

                            $mtime = time_ago_in_php($msg_row['created_on']);
                            echo $mtime;

                            
                          ?></span> 
                        </span>
                        <span class="message">
                         <?php 
                            $message = $msg_row['message_desc'];
                            if(strlen($message)>30)
                            {
                              echo substr($message, 0, 50);
                             echo '...';  
                            }else{echo $message; }
                         ?>
                        </span>
                      </a>
                    </li>
                  <?php } } else{?>
                    <li style="background-color: #ccc; margin: 5px;">
                        <a>
                        <span>
                          No any notification found..
                        </span>
                      </a>
                    </li>
                  <?php } ?>
              
                <li>
                  <div class="text-center">
                    <a href="<?php echo base_url(); ?>seeker/all-notifications" class="dropdown-item" style="color: #1d1c1c !important;">
                      <strong>See All Notification</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
    </div>    
   
</div>    

<div class="col-md-1">
	 <div class="bell" style="font-size:13px;margin-top:10px;">
    	<i class="fas fa-bell"></i><br>
        Notifications
   	 </div>  
   
</div>     
     
    <div class="col-md-2">
    	 <div class="dropdown">
         <?php
             if(!empty($this->Job_seeker_photo_model->get_jobseeker_photo($job_seeker))):?>
        <img src="<?php echo base_url() ?>upload/<?php echo  $this->Job_seeker_photo_model->get_jobseeker_photo($job_seeker);?>" class="img-thumbnail" style="height:45px; width:45px; border-radius:50%;" />&emsp;<a class=" dropdown-toggle" data-toggle="dropdown">
       <?php else: ?>
        <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" class="img-thumbnail" style="height:45px; width:45px; border-radius:50%;" />&emsp;<a class=" dropdown-toggle" data-toggle="dropdown">
          <?php endif; ?>
    <span class="caret"></span>
    <p class="profile-accoutnt-p" data-toggle="tooltip" title="Hooray!" ><?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?></p>
    </a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo base_url(); ?>job_seeker/seeker_info"><i class="fas fa-user"></i>My Profile</a> </li>
      <li><a href="<?php echo base_url(); ?>job_seeker/change_password"><i class="fas fa-lock"></i>Change Password</a></li>
      <li ><a href="#" class="btn-logoff" data-toggle="modal" data-target="#modal_logoff"><i class="fas fa-power-off"></i>Logout</a></li>
    </ul>
  </div>
    </div>
    
    </div>
  </div>

</div>
<div class="modal fade" id="modal_logoff" role="dialog">
    <div class="modal-dialog">
       <form method="post" action="<?php echo base_url(); ?>seeker/logout" > 
      
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Are you sure You Want to log off ?</h4>
        </div>
       
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" > Ok </button>
          <button type="button" class="btn btn-default1 active_modal" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      </form>
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
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>