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
  <input type="search" id="search" style="color: white;">
 <i class="fas fa-search"></i>
</form>
     </div>          
</div>


    <div class="switch switch-yellow">
      <input type="radio" class="switch-input" name="view3" value="week3" id="week3" onchange="getchecked(this.value);" checked >
      <label for="week3" class="switch-label switch-label-off">Job Search</label>
      <input type="radio" class="switch-input" name="view3" value="month3" id="month3" onchange="getchecked(this.value);">
      <label for="month3" class="switch-label switch-label-on">People Search</label>
      <span class="switch-selection"></span>
    </div>






    <div class="social-media">
    <!---mail-box-->
    <div class="notification">
        <i class="fas fa-comment-alt"></i><br>
        <!-- Messaging -->
             <?php 
                $job_seeker=$this->session->userdata('job_seeker_id');  
                    $msgs = get_messagescount($job_seeker);
                      if(!empty($msgs))
                        foreach($msgs as $msgs_row)
                        {
                          if($msgs_row['total_msg']!=0)
                          {
                     ?>
                    <span class="badge bg-green" ><?php echo $msgs_row['total_msg']; ?></span>
                  <?php } }else{}
                  ?>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu" style="width: 300px;">
                <li>
                  <div class="text-center">
                    <a href="<?php echo base_url(); ?>job_seeker/ReadAllMessages" class="dropdown-item" style="color: #1d1c1c !important;">
                      <strong>Mark All As Read</strong>
                    </a>
                  </div>
                </li>
               
                  <?php 
                    $msg = get_messages($job_seeker);
                      if(!empty($msg)){
                      foreach($msg as $msg_row)
                      {
                        $date = strtotime($msg_row['created_on']);
                        $dat = date('m/d/y', $date);
                        $tme = date('H:m:s A',$date);
                    ?>


                    <li <?php if($msg_row['status']==0){?>style="background-color: #ccc;margin: 5px;" <?php }else{?> style="margin: 5px;"<?php } ?> >

                      <a data-toggle="modal" data-target="#myMsgModal">
                        <span>
                        <!-- <?php print_r($msg_row); ?> -->
                          <span><a href="<?php echo base_url() ?>seeker/message-history/<?php echo $msg_row['job_seeker_id']; ?>"><?php echo $msg_row['full_name']; ?></a><span class="time">
                          <?php 

                            $mtime = time_ago_in_php($msg_row['created_on']);
                            echo $mtime;

                            
                          ?></span> </span>
                          
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
                          No Message Found..
                        </span>
                      </a>
                    </li>
                  <?php } ?>
              
                <li>
                  <div class="text-center">
                    <a href="<?php echo base_url(); ?>seeker/instant-message" class="dropdown-item" style="color: #1d1c1c !important;">
                      <strong>See All Messages</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
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
        // alert('checked');
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


   
