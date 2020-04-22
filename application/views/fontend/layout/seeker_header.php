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

    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]-->

<style>
		.select2-container{box-sizing:border-box;display:inline-block;margin:0;position:relative;vertical-align:middle}.select2-container .select2-selection--single{box-sizing:border-box;cursor:pointer;display:block;height:38px;user-select:none;-webkit-user-select:none}.select2-container .select2-selection--single .select2-selection__rendered{display:block;padding-left:8px;padding-right:20px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.select2-container .select2-selection--single .select2-selection__clear{position:relative}.select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered{padding-right:8px;padding-left:20px}.select2-container .select2-selection--multiple{box-sizing:border-box;cursor:pointer;display:block;min-height:32px;user-select:none;-webkit-user-select:none}.select2-container .select2-selection--multiple .select2-selection__rendered{display:inline-block;overflow:hidden;padding-left:8px;text-overflow:ellipsis;white-space:nowrap}.select2-container .select2-search--inline{float:left}.select2-container .select2-search--inline .select2-search__field{box-sizing:border-box;border:none;font-size:100%;margin-top:5px;padding:0}.select2-container .select2-search--inline .select2-search__field::-webkit-search-cancel-button{-webkit-appearance:none}.select2-dropdown{background-color:white;border:1px solid #aaa;border-radius:4px;box-sizing:border-box;display:block;position:absolute;left:-100000px;width:100%;z-index:1051}.select2-results{display:block}.select2-results__options{list-style:none;margin:0;padding:0}.select2-results__option{padding:6px;user-select:none;-webkit-user-select:none}.select2-results__option[aria-selected]{cursor:pointer}.select2-container--open .select2-dropdown{left:0}.select2-container--open .select2-dropdown--above{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0}.select2-container--open .select2-dropdown--below{border-top:none;border-top-left-radius:0;border-top-right-radius:0}.select2-search--dropdown{display:block;padding:4px}.select2-search--dropdown .select2-search__field{padding:4px;width:100%;box-sizing:border-box}.select2-search--dropdown .select2-search__field::-webkit-search-cancel-button{-webkit-appearance:none}.select2-search--dropdown.select2-search--hide{display:none}.select2-close-mask{border:0;margin:0;padding:0;display:block;position:fixed;left:0;top:0;min-height:100%;min-width:100%;height:auto;width:auto;opacity:0;z-index:99;background-color:#fff;filter:alpha(opacity=0)}.select2-hidden-accessible{border:0 !important;clip:rect(0 0 0 0) !important;height:1px !important;margin:-1px !important;overflow:hidden !important;padding:0 !important;position:absolute !important;width:1px !important}.select2-container--default .select2-selection--single{background-color:#fff;border:1px solid #aaa;border-radius:4px}.select2-container--default .select2-selection--single .select2-selection__rendered{color:#444;line-height:28px}.select2-container--default .select2-selection--single .select2-selection__clear{cursor:pointer;float:right;font-weight:bold}.select2-container--default .select2-selection--single .select2-selection__placeholder{color:#999}.select2-container--default .select2-selection--single .select2-selection__arrow{height:26px;position:absolute;top:1px;right:1px;width:20px}.select2-container--default .select2-selection--single .select2-selection__arrow b{border-color:#888 transparent transparent transparent;border-style:solid;border-width:5px 4px 0 4px;height:0;left:50%;margin-left:-4px;margin-top:-2px;position:absolute;top:50%;width:0}.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__clear{float:left}.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow{left:1px;right:auto}.select2-container--default.select2-container--disabled .select2-selection--single{background-color:#eee;cursor:default}.select2-container--default.select2-container--disabled .select2-selection--single .select2-selection__clear{display:none}.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{border-color:transparent transparent #888 transparent;border-width:0 4px 5px 4px}.select2-container--default .select2-selection--multiple{background-color:white;border:1px solid #aaa;border-radius:4px;cursor:text}.select2-container--default .select2-selection--multiple .select2-selection__rendered{box-sizing:border-box;list-style:none;margin:0;padding:0 5px;width:100%}.select2-container--default .select2-selection--multiple .select2-selection__placeholder{color:#999;margin-top:5px;float:left}.select2-container--default .select2-selection--multiple .select2-selection__clear{cursor:pointer;float:right;font-weight:bold;margin-top:5px;margin-right:10px}.select2-container--default .select2-selection--multiple .select2-selection__choice{background-color:#e4e4e4;border:1px solid #aaa;border-radius:4px;cursor:default;float:left;margin-right:5px;margin-top:5px;padding:0 5px}.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{color:#999;cursor:pointer;display:inline-block;font-weight:bold;margin-right:2px}.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{color:#333}.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice,.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__placeholder,.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-search--inline{float:right}.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice{margin-left:5px;margin-right:auto}.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove{margin-left:2px;margin-right:auto}.select2-container--default.select2-container--focus .select2-selection--multiple{border:solid #000 1px;outline:0}.select2-container--default.select2-container--disabled .select2-selection--multiple{background-color:#eee;cursor:default}.select2-container--default.select2-container--disabled .select2-selection__choice__remove{display:none}.select2-container--default.select2-container--open.select2-container--above .select2-selection--single,.select2-container--default.select2-container--open.select2-container--above .select2-selection--multiple{border-top-left-radius:0;border-top-right-radius:0}.select2-container--default.select2-container--open.select2-container--below .select2-selection--single,.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple{border-bottom-left-radius:0;border-bottom-right-radius:0}.select2-container--default .select2-search--dropdown .select2-search__field{border:1px solid #aaa}.select2-container--default .select2-search--inline .select2-search__field{background:transparent;border:none;outline:0;box-shadow:none;-webkit-appearance:textfield}.select2-container--default .select2-results>.select2-results__options{max-height:200px;overflow-y:auto}.select2-container--default .select2-results__option[role=group]{padding:0}.select2-container--default .select2-results__option[aria-disabled=true]{color:#999}.select2-container--default .select2-results__option[aria-selected=true]{background-color:#ddd}.select2-container--default .select2-results__option .select2-results__option{padding-left:1em}.select2-container--default .select2-results__option .select2-results__option .select2-results__group{padding-left:0}.select2-container--default .select2-results__option .select2-results__option .select2-results__option{margin-left:-1em;padding-left:2em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-2em;padding-left:3em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-3em;padding-left:4em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-4em;padding-left:5em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-5em;padding-left:6em}.select2-container--default .select2-results__option--highlighted[aria-selected]{background-color:#5897fb;color:white}.select2-container--default .select2-results__group{cursor:default;display:block;padding:6px}.select2-container--classic .select2-selection--single{background-color:#f7f7f7;border:1px solid #aaa;border-radius:4px;outline:0;background-image:-webkit-linear-gradient(top, #fff 50%, #eee 100%);background-image:-o-linear-gradient(top, #fff 50%, #eee 100%);background-image:linear-gradient(to bottom, #fff 50%, #eee 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)}.select2-container--classic .select2-selection--single:focus{border:1px solid #5897fb}.select2-container--classic .select2-selection--single .select2-selection__rendered{color:#444;line-height:28px}.select2-container--classic .select2-selection--single .select2-selection__clear{cursor:pointer;float:right;font-weight:bold;margin-right:10px}.select2-container--classic .select2-selection--single .select2-selection__placeholder{color:#999}.select2-container--classic .select2-selection--single .select2-selection__arrow{background-color:#ddd;border:none;border-left:1px solid #aaa;border-top-right-radius:4px;border-bottom-right-radius:4px;height:26px;position:absolute;top:1px;right:1px;width:20px;background-image:-webkit-linear-gradient(top, #eee 50%, #ccc 100%);background-image:-o-linear-gradient(top, #eee 50%, #ccc 100%);background-image:linear-gradient(to bottom, #eee 50%, #ccc 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFCCCCCC', GradientType=0)}.select2-container--classic .select2-selection--single .select2-selection__arrow b{border-color:#888 transparent transparent transparent;border-style:solid;border-width:5px 4px 0 4px;height:0;left:50%;margin-left:-4px;margin-top:-2px;position:absolute;top:50%;width:0}.select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__clear{float:left}.select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__arrow{border:none;border-right:1px solid #aaa;border-radius:0;border-top-left-radius:4px;border-bottom-left-radius:4px;left:1px;right:auto}.select2-container--classic.select2-container--open .select2-selection--single{border:1px solid #5897fb}.select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow{background:transparent;border:none}.select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow b{border-color:transparent transparent #888 transparent;border-width:0 4px 5px 4px}.select2-container--classic.select2-container--open.select2-container--above .select2-selection--single{border-top:none;border-top-left-radius:0;border-top-right-radius:0;background-image:-webkit-linear-gradient(top, #fff 0%, #eee 50%);background-image:-o-linear-gradient(top, #fff 0%, #eee 50%);background-image:linear-gradient(to bottom, #fff 0%, #eee 50%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)}.select2-container--classic.select2-container--open.select2-container--below .select2-selection--single{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0;background-image:-webkit-linear-gradient(top, #eee 50%, #fff 100%);background-image:-o-linear-gradient(top, #eee 50%, #fff 100%);background-image:linear-gradient(to bottom, #eee 50%, #fff 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFFFFFFF', GradientType=0)}.select2-container--classic .select2-selection--multiple{background-color:white;border:1px solid #aaa;border-radius:4px;cursor:text;outline:0}.select2-container--classic .select2-selection--multiple:focus{border:1px solid #5897fb}.select2-container--classic .select2-selection--multiple .select2-selection__rendered{list-style:none;margin:0;padding:0 5px}.select2-container--classic .select2-selection--multiple .select2-selection__clear{display:none}.select2-container--classic .select2-selection--multiple .select2-selection__choice{background-color:#e4e4e4;border:1px solid #aaa;border-radius:4px;cursor:default;float:left;margin-right:5px;margin-top:5px;padding:0 5px}.select2-container--classic .select2-selection--multiple .select2-selection__choice__remove{color:#888;cursor:pointer;display:inline-block;font-weight:bold;margin-right:2px}.select2-container--classic .select2-selection--multiple .select2-selection__choice__remove:hover{color:#555}.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice{float:right}.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice{margin-left:5px;margin-right:auto}.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove{margin-left:2px;margin-right:auto}.select2-container--classic.select2-container--open .select2-selection--multiple{border:1px solid #5897fb}.select2-container--classic.select2-container--open.select2-container--above .select2-selection--multiple{border-top:none;border-top-left-radius:0;border-top-right-radius:0}.select2-container--classic.select2-container--open.select2-container--below .select2-selection--multiple{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0}.select2-container--classic .select2-search--dropdown .select2-search__field{border:1px solid #aaa;outline:0}.select2-container--classic .select2-search--inline .select2-search__field{outline:0;box-shadow:none}.select2-container--classic .select2-dropdown{background-color:#fff;border:1px solid transparent}.select2-container--classic .select2-dropdown--above{border-bottom:none}.select2-container--classic .select2-dropdown--below{border-top:none}.select2-container--classic .select2-results>.select2-results__options{max-height:200px;overflow-y:auto}.select2-container--classic .select2-results__option[role=group]{padding:0}.select2-container--classic .select2-results__option[aria-disabled=true]{color:grey}.select2-container--classic .select2-results__option--highlighted[aria-selected]{background-color:#3875d7;color:#fff}.select2-container--classic .select2-results__group{cursor:default;display:block;padding:6px}.select2-container--classic.select2-container--open .select2-dropdown{border-color:#5897fb}

		</style>
        <style>
          
            .required {
                color: #DD4B39;
            }

            .badge {
                font-size: 10px;
                font-weight: normal;
                line-height: 13px;
                padding: 2px 6px;
                position: absolute;
                right: -12px;
                top: -5px;
            }
            .bg-green {
                background: #1ABB9C !important;
                border: 1px solid #1ABB9C !important;
                color: #fff;
            }
            .text-center{
                margin: 10px;
                padding: 5px;
                height: 25px;
                background-color: #cccccc;
            }
            ul.msg_list li a .time {
                font-size: 11px;
                font-style: italic;
                font-weight: bold;
                position: absolute;
                right: 35px;
            }
           ul.msg_list li a .message {
                display: block !important;
                font-size: 11px;
            }
        </style>
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
      <div class="col-md-4 col-sm-12 col-xs-12"> 
        <input type="text" class="form-control" id="search_text" placeholder="Search Peoples.." style="margin: 5%;">
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12"> 
        <!-- Nav start -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-collapse collapse" id="nav-main">
            <ul class="nav navbar-nav">      
            <?php  $job_seeker=$this->session->userdata('job_seeker_id'); ?>      

            <li role="presentation" class="dropdown" style="margin: 10px;" >
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px;">
                <i class="fa fa-envelope-o"></i>
                <?php 
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
                          <span><a href="<?php echo base_url() ?>seeker/instant-message"><?php echo $msg_row['full_name']; ?></a></span>
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
            </li>    

            <li role="presentation" class="dropdown" style="margin: 10px;" >
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px;">
                <i class="fa fa-bell"></i>
                <?php 
                    $msgs = get_notifcationcount($job_seeker);
                      if(!empty($msgs))
                        foreach($msgs as $msgs_row)
                        {
                          if($msgs_row['total_notifications']!=0)
                          {
                     ?>
                    <span class="badge bg-green" ><?php echo $msgs_row['total_notifications']; ?></span>
                  <?php } }else{}
                  ?>
              </a>
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
            </li>  

            <li>
            	                       
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
                        <li><a href="<?php echo base_url(); ?>job_seeker/seeker_info"><span class="glyphicon glyphicon-user"></span>My Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>job_seeker/change_password" class=""><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
                        <li><a href="#" onclick="logout();"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
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

<script>
  function logout()
  {
    if(window.confirm('Are you sure want to logout?'))
     {
        window.location.href="<?php echo base_url(); ?>seeker/logout";  
     }
    
  }
</script>
