<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<?php  
   $MyProfile=20;
   $Education=20;
   $Work_Experience=20;
   $certs_training=20;
   $js_photo=20;
   
    $jobseeker_id = $this->session->userdata('job_seeker_id');
   
    $js_personal_info = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
    $jsname=$this->Job_seeker_model->jobseeker_name($job_seeker);
   $job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
   
   
   $full_profile_each=$MyProfile/11;
   $Education_each=$Education/4;
   
   
   // print_r($Corporate_docs_each);die;
   if (isset($job_seeker_photo) && !empty($job_seeker_photo)) {
       $photo_total = $js_photo;
   }
   
   if (isset($jsname->full_name) && !empty($jsname->full_name)) {
       $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->date_of_birth) && !empty($js_personal_info->date_of_birth)) {
       $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->mobile) && !empty($js_personal_info->mobile)) {
        $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->present_address) && !empty($js_personal_info->present_address)) {
        $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->city_name) && !empty($js_personal_info->city_name)) {
       $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->state_name) && !empty($js_personal_info->state_name)) {
       $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->country_name) && !empty($js_personal_info->country_name)) {
        $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->marital_status) && !empty($js_personal_info->marital_status)) {
        $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->work_permit_usa) && !empty($js_personal_info->work_permit_usa)) {
        $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->work_permit_countries) && !empty($js_personal_info->work_permit_countries)) {
       $profile_details_total += $full_profile_each;
   }
   
   if (isset($js_personal_info->resume_title) && !empty($js_personal_info->resume_title)) {
        $profile_details_total += $full_profile_each;
   }
   
   $edcuaiton_list = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
   if (isset($edcuaiton_list) && !empty($edcuaiton_list)) {
       $Education_total = $Education;
   }
   
   $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
    if (isset($experinece_list) && !empty($experinece_list)) {
       $Work_Experience_total = $Work_Experience;
   }
   
   $training_list = $this->Job_training_model->training_list_by_id($jobseeker_id);
    if (isset($training_list) && !empty($training_list)) {
       $certs_training_total = $certs_training;
   }
   
   $profile_total=$photo_total+$profile_details_total+$Education_total+$Work_Experience_total+$certs_training_total;
   
    ?>
<?php 
   $this->load->view('fontend/layout/new_seeker_header.php');
   
   ?>  
<style>
   .open-button {
   background-color: #555;
   color: white;
   padding: 16px 20px;
   border: none;
   cursor: pointer;
   opacity: 0.8;
   position: fixed;
   bottom: 23px;
   right: 28px;
   width: 280px;
   }
   /* The popup chat - hidden by default */
   .chat-popup {
   display: none;
   position: fixed;
   bottom: 0;
   /*right: 15px;*/
   border: 3px solid #f1f1f1;
   z-index: 9;
   }
   /* Add styles to the form container */
   .form-container {
   max-width: 300px;
   padding: 10px;
   background-color: white;
   }
   /* Full-width textarea */
   .form-container textarea {
   width: 100%;
   padding: 15px;
   margin: 5px 0 22px 0;
   border: none;
   background: #f1f1f1;
   resize: none;
   min-height: 200px;
   }
   /* When the textarea gets focus, do something */
   .form-container textarea:focus {
   background-color: #ddd;
   outline: none;
   }
   /* Set a style for the submit/send button */
   .form-container .btn {
   background-color: #4CAF50;
   color: white;
   padding: 16px 20px;
   border: none;
   cursor: pointer;
   width: 100%;
   margin-bottom:10px;
   opacity: 0.8;
   }
   /* Add a red background color to the cancel button */
   .form-container .cancel {
   background-color: red;
   }
   /* Add some hover effects to buttons */
   .form-container .btn:hover, .open-button:hover {
   opacity: 1;
   }
   .chatperson{
   display: block;
   border-bottom: 1px solid #eee;
   width: 100%;
   display: flex;
   align-items: center;
   white-space: nowrap;
   overflow: hidden;
   margin-bottom: 15px;
   padding: 4px;
   }
   .chatperson:hover{
   text-decoration: none;
   border-bottom: 1px solid orange;
   }
   .namechat {
   display: inline-block;
   vertical-align: middle;
   }
   .chatperson .chatimg img{
   width: 40px;
   height: 40px;
   background-image: url('http://i.imgur.com/JqEuJ6t.png');
   }
   .chatperson .pname{
   font-size: 18px;
   padding-left: 5px;
   }
   .chatperson .lastmsg{
   font-size: 12px;
   padding-left: 5px;
   color: #ccc;
   }
   /*body{
   height:400px;
   position: fixed;
   bottom: 0;
   }*/
   .col-md-2, .col-md-10{
   padding:0;
   }
   .panel{
   margin-bottom: 0px;
   }
   .chat-window{
   bottom:0;
   position:fixed;
   float:right;
   margin-left:10px;
   }
   .chat-window > div > .panel{
   border-radius: 5px 5px 0 0;
   }
   .icon_minim{
   padding:2px 10px;
   }
   .msg_container_base{
   background: #e5e5e5;
   margin: 0;
   padding: 0 10px 10px;
   max-height:300px;
   overflow-x:hidden;
   }
   .top-bar {
   background: #666;
   color: white;
   padding: 10px;
   position: relative;
   overflow: hidden;
   }
   .msg_receive{
   padding-left:0;
   margin-left:0;
   }
   .msg_sent{
   padding-bottom:20px !important;
   margin-right:0;
   }
   .messages {
   background: white;
   padding: 10px;
   border-radius: 2px;
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
   max-width:100%;
   }
   .messages > p {
   font-size: 13px;
   margin: 0 0 0.2rem 0;
   }
   .messages > time {
   font-size: 11px;
   color: #ccc;
   }
   .msg_container {
   padding: 10px;
   overflow: hidden;
   display: flex;
   }
   img {
   display: block;
   width: 100%;
   }
   .avatar {
   position: relative;
   }
   .base_receive > .avatar:after {
   content: "";
   position: absolute;
   top: 0;
   right: 0;
   width: 0;
   height: 0;
   border: 5px solid #FFF;
   border-left-color: rgba(0, 0, 0, 0);
   border-bottom-color: rgba(0, 0, 0, 0);
   }
   .base_sent {
   justify-content: flex-end;
   align-items: flex-end;
   }
   .base_sent > .avatar:after {
   content: "";
   position: absolute;
   bottom: 0;
   left: 0;
   width: 0;
   height: 0;
   border: 5px solid white;
   border-right-color: transparent;
   border-top-color: transparent;
   box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
   }
   .msg_sent > time{
   float: right;
   }
   .msg_container_base::-webkit-scrollbar-track
   {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
   background-color: #F5F5F5;
   }
   .msg_container_base::-webkit-scrollbar
   {
   width: 12px;
   background-color: #F5F5F5;
   }
   .msg_container_base::-webkit-scrollbar-thumb
   {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
   background-color: #555;
   }
   .btn-group.dropup{
   position:fixed;
   left:0px;
   bottom:0;
   }
   .panel-heading.top-bar {
   background-color: #18c5bd;
   }
   button#btn-chat {
   height: 30px;
   background-color: #18c5bd;
   border: none;
   }
   div#myForm1 {
   display: none;
   max-width: 350px;
   float: right;
   margin-left: 290px;
   max-height: 300;
   overflow-y: auto;
   }
   div#myForm {
   display: none;
   max-width: 300px;
   margin-left: 55px;
   min-width: 280px;
   min-height: 100;
   background-color: white;
   bottom: 11px;
   }
   .numberCircle {
   border-radius: 50%;
   width: 25px;
   height: 25px;
   padding: 2px;
   background: #98da01;
   /* border: 2px solid #666; */
   color: white;
   text-align: center;
   font: 20px Arial, sans-serif;
   float: right;
   padding-top: -55px;
   margin-top: -15px;
   }
   .alert.alert-success.text-center {
    margin-top: 100px;
}

   /*.ui-autocomplete {
   z-index: 1000;
   }*/
</style>
<div class="container-fluid">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
         <div class="col-md-6 mid-section">
              <div id="smsg">  <?php echo $this->session->flashdata('msg'); ?></div>
            <div class="row">
               <div class="col-md-12 bd-1">
                  <div class="dash-box-w">
                     <h3 class="heading-dash">My Dashboard</h3>
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-primary o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-fw fa-download"></i>
                              </div>
                              <span>Saved Job</span>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url(); ?>seeker/my-saved-jobs">
                           <span class="float-left" style="font-size:22px;"><?php echo $saved_jobs; ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-danger o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-volume-up fa-fw"></i>
                              </div>
                              <div >Job Alerts</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><?php echo $job_alert; ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-warning o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-users fa-fw"></i>
                              </div>
                              <div>Profile Views</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;">20</span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-bluish o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-fw fa-download"></i>
                              </div>
                              <span>Article Views</span>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;">10</span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-link o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-volume-up fa-fw"></i>
                              </div>
                              <div>courses Completed</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;">20</span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-green o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-users fa-fw"></i>
                              </div>
                              <div>News Feed</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;">20</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 bd-2">
                  <?php 
                     $sr_no=0;
                     if (!empty($jobs)): foreach ($jobs as $applicaiton) :
                     
                     // print_r($applicaiton);
                     for ($i=0; $i <sizeof($applicaiton) ; $i++) { 
                         # code...
                     
                     ?>
                  <div class="invi-div">
                     <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton->company_profile_id); ?>" class="invitation-img"/>
                     <div class="info-invitation">
                        <p class="head-invi"><?php echo $this->job_posting_model->job_title_by_name($applicaiton->job_post_id); ?></p>
                        <span class="salary-info">Salary: <?php echo $this->job_posting_model->job_salary_by_id($applicaiton->job_post_id); ?></span>
                        <p>text test</p>
                        <div class="detail-b"><a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton->job_post_id) ?>">Details</a></div>
                        <div class="last-row-invitation">
                           <ul>
                              <li>
                                 <div class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $applicaiton->city_id;  ?></div>
                              </li>
                              <li>
                                 <div class="year-inv"><i class="fas fa-save"></i>&emsp;<?php echo $applicaiton->experience;  ?> years</div>
                              </li>
                              <li>
                                 <div class="calender-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($applicaiton->created_at)) { $mtime = time_ago_in_php($applicaiton->created_at);
                                    echo $mtime;} ?></div>
                              </li>
                              <li>
                                 <div class="fulltime-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $applicaiton->job_nature;  ?></div>
                              </li>
                           </ul>
                        </div>
                        <?php  
                           $job_post_id = $applicaiton->job_post_id;
                           $company_id = $applicaiton->company_profile_id;
                           
                           if ($this->job_apply_model->check_apply_job($jobseeker_id, $company_id, $job_post_id)) { ?>
                        <button class="apply-invi">Applied</button>
                        <?php }else { ?>
                        <a href="#" data-toggle="modal" data-target="#ApplyJob<?php echo $applicaiton->job_post_id; ?>"><button class="apply-invi">Apply Now</button></a>
                        <?php } ?>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <!--  -->
                  <?php
                     // $sr_no++;
                      }
                     endforeach;
                     ?>
                  <?php else : ?> 
                  <div>
                     <strong>There is no data to display</strong>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <div class="chat-popup" id="myForm1" style="margin-bottom: 100px;">
               <div class="chatbody">
                  <div class="panel panel-primary">
                     <div class="msg">
                     </div>
                     <div class="panel-footer">
                        <div class="input-group">
                           <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                           <span class="input-group-btn">
                           <button class="btn btn-primary btn-sm" value="<?php echo $check['emp_js_connection_id']; ?>" id="btn-chat" onclick="send_msg();"><i class="fa fa-send fa-1x" aria-hidden="true"></i></button>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 pro-bar">
            <h3 class="heading-dash_profile">PROFILE LEVEL</h3>
            <div class="progress yellow">
               <span class="progress-left">
               <span class="progress-bar"></span>
               </span>
               <span class="progress-right">
               <span class="progress-bar"></span>
               </span>
               <div class="progress-value"><?php echo round($profile_total);?>%</div>
            </div>
            <div class="paragraph_p_level">
            </div>
            <button class="open-button" onclick="openForm()" style="margin-bottom: 100px;" >Messaging</button>
            <div class="chat-popup" id="myForm" style="    display: none;
               max-width: 300px;
               margin-left: 55px; margin-bottom: 100px;">
               <!-- <form action="/action_page.php" class="form-container">
                  <h1>Chat</h1>
                  
                  <label for="msg"><b>Message</b></label>
                  <textarea placeholder="Type message.." name="msg" required></textarea>
                  
                  <button type="submit" class="btn">Send</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                  </form> -->
               <div class="chatbody">
                  <div class="panel panel-primary">
                     <div class="panel-heading top-bar">
                        <div class="col-md-8 col-xs-8">
                           <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Messaging</h3>
                        </div>
                        <span style="margin-left: 40px;" onclick="opensearch()"><i  class="fa fa-plus"></i></span>
                        <span style="float: right;" onclick="closeForm('myForm')"><i  class="fa fa-close"></i></span>
                     </div>
                     <div class="panel-body msg_container_base" >
                        <input type="search" name="search_connection" placeholder="search new connection" id="search_connection" style="display: none; border-radius: 0;margin-top: 43px;max-width: 88%;margin-left: 2px; color: black;">
                        <button class="btn btn-primary btn-sm" id="connection_btn" style="display: none;float: right;margin-right: -9px;margin-top: 1px;height: 36px;background-color: #18c5bd;border: none;"><i class="fa fa-plus fa-1x" onclick="add_connection();" aria-hidden="true"></i></button>
                        <input type="hidden" name="job_seeker_id" value="" id="auto-value">
                        <div class="connections" style="margin-top: 50px;">
                           <?php foreach ($chatbox as $row) {?>
                           <div class="row msg_container base_receive">
                              <div class="col-md-2 col-xs-2 avatar">
                                 <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                              </div>
                              <div class="col-md-10 col-xs-10" onclick="show_box(<?php echo $row['emp_js_connection_id']; ?>);get_list();">
                                 <div class="messages msg_receive">
                                    <?php $js_id = $this->session->userdata('job_seeker_id');
                                       $emp_id = $row['emp_id'];
                                         $whereres   = "msg_to='$js_id' and message_status = '0' and msg_from = '$emp_id'";
                                        $msges = $this->Master_model->getMaster('messaging', $where =  $whereres, $join = false, $order = 'desc', $field = 'message_id', $select = '*',$limit=false,$start=false, $search=false); ?>
                                    <?php $js_id = $this->session->userdata('job_seeker_id');
                                       // print_r($row['created_by']);
                                       // print_r($row['$js_id']);
                                        if ($row['type'] == 'js-js' && $row['created_by'] == $js_id) {
                                          // echo "string";
                                          $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.emp_id|Left OUTER ');
                                         
                                        }
                                        elseif ($row['type'] == 'js-js' && $row['created_by'] != $js_id)  {
                                          $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
                                        }
                                        else
                                          {
                                              $Join_data      = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');
                                          } 
                                              $id=$row['emp_js_connection_id'];
                                             $whereres   = "emp_js_connection_id='$id'";
                                            $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);  ?> 
                                    <p><?php if (!empty($check['full_name'])) 
                                       {
                                         echo $check['full_name']; 
                                         if (sizeof($msges) > 0 ) 
                                           { ?> 
                                    <div class="numberCircle"><?php echo sizeof($msges); ?></div>
                                    <?php } 
                                       }else
                                       {
                                        echo $check['company_name'];
                                        if (sizeof($msges) > 0 ) 
                                           { ?> 
                                    <div class="numberCircle"><?php echo sizeof($msges); ?></div>
                                    <?php }
                                       } ?>
                                    </p>
                                    <p><?php echo $msges[0]['msg'] ?></p>
                                    <time datetime="2009-11-13T20:00"><?php echo $msges[0]['created_date'] ?></time>
                                 </div>
                              </div>
                           </div>
                           <?php } ?> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Footer -->
   <!-- ./Footer -->
</div>
<?php foreach ($jobs as $applicaiton) : ?>
<div id="ApplyJob<?php echo $applicaiton->job_post_id; ?>" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Apply Job</h4>
         </div>
         <div class="modal-body">
            <form  class="form-horizontal" action="<?php echo base_url() ?>job/apply_job" method="post" style="padding: 30px;">
               <input type="hidden" name="forward_status" class="form-control" id="forward_status" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
                  echo $frow['forword_job_status'];
                  } }?>" placeholder="">
               <input type="hidden" name="job_apply_id" class="form-control" id="job_apply_id" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
                  echo $frow['job_apply_id'];
                  } }?>" placeholder="">
               <input type="hidden" name="job_seeker_id" value="<?php echo $jobseeker_id ?>">
               <input type="hidden" name="job_post_id" value="<?php echo $applicaiton->job_post_id; ?>">
               <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Company Name:</label>
                  <div class="col-sm-8">
                     <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$applicaiton->company_profile_id;
                        echo $this->company_profile_model->company_name($company_id);?>">
                  </div>
               </div>
               <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
               <div class="form-group">
                  <label class="control-label col-sm-4" for="email"> Expected Salary:</label>
                  <div class="col-sm-8">
                     <input type="text" name="expected_salary" required class="form-control allownumericwithdecimal" id="avaliable" placeholder="Expected Salary"
                        >
                  </div>
               </div>
               <?php $test=$applicaiton->is_test_required;
                  if ($test=='Yes') {
                  ?>
               <div><b>Note: This job has a Online Test.</b></div>
               <div class="panel-body"></div>
               <?php }else{} ?>
               <div class="modal-footer" >
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Apply</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php  endforeach;  
   $this->load->view("fontend/layout/jobseeker_footer.php"); ?>
</body>
<script>
   $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
             //this.value = this.value.replace(/[^0-9\.]/g,'');
      $(this).val($(this).val().replace(/[^0-9\.]/g,''));
             if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                 event.preventDefault();
             }
         });

   $(document).ready (function(){
     $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
     $("#smsg").slideUp(500);
     });   
   });
</script> 
<script>
   $(function(){
    setInterval(function(){ 
      if ( $('#myForm1').css('display') == 'block')
       {
         var cid = $('#connection_id').val();
           // alert(cid);
           show_box(cid);
       }
       if ( $('#myForm').css('display') == 'block')
       {
         get_list();
       }
                    
       }, 20000);
   
    $("#search_connection").autocomplete({
              
               source: "<?php echo base_url();?>job_seeker/search_people_connection",
              minLength: 2,
               // append: "#rotateModal",
               focus: function(event, ui) {
                // prevent autocomplete from updating the textbox
                event.preventDefault();
                // manually update the textbox
                // alert(source);
                $(this).val(ui.item.label);
             },
             select: function(event, ui) {
                // prevent autocomplete from updating the textbox
                event.preventDefault();
                // manually update the textbox and hidden field
                $(this).val(ui.item.label);
                $("#auto-value").val(ui.item.value);
             }
             
            });
   });
   function openForm() {
   document.getElementById("myForm").style.display = "block";
   get_list();
   }
   
   function closeForm(id) {
   document.getElementById(id).style.display = "none";
   }
   
   function send_msg()
   {
   var id = $('#connection_id').val();
   var message = $('#btn-input').val();
//    if (!str.replace(/\s/g, '').length) {
//   console.log('string only contains whitespace (ie. spaces, tabs or line breaks)');
// }
   if (message.replace(/\s/g, '').length > 0) {
   $.ajax({
               url: "<?php echo base_url();?>job_seeker/send_message",
               type: "POST",
               data: {id:id,message:message},
               // contentType:false,
               // processData:false,
                // dataType: "json",
               success: function(data)
               {
                  $('.msg').html(data);
                   $('#btn-input').val('');
               }
         });
      }
   }
   
   function show_box(id){
   
    $.ajax({
               url: "<?php echo base_url();?>job_seeker/get_messages",
               type: "POST",
               data: {id:id},
               // contentType:false,
               // processData:false,
                // dataType: "json",
               success: function(data)
               {
                  document.getElementById("myForm1").style.display = "block";
   
                 $('.msg').html(data);
                  // 
                     get_list();
               
   
               }
         });
   
   }
   
   function get_list()
   {
   $.ajax({
               url: "<?php echo base_url();?>job_seeker/get_list_connections",
               type: "POST",
               // data: {id:id,name:name},
               // contentType:false,
               // processData:false,
                // dataType: "json",
               success: function(data)
               {
                 $('.connections').html(data);
               }
         });
   }
   
   
   
   function opensearch(){
     document.getElementById("search_connection").style.display = "block";
     document.getElementById("connection_btn").style.display = "block";
   }
   $(document).on("keypress", "#btn-input", function (e){
     if (event.which == 13) {
         // validate();
         // alert("You pressed enter");
         $('#btn-chat').click();
      }
   });
   
   
   function add_connection()
   {
   var id = $('#auto-value').val();
   var name = $('#search_connection').val();
   // alert(id);
    $.ajax({
               url: "<?php echo base_url();?>job_seeker/add_new_connection",
               type: "POST",
               data: {id:id,name:name},
               // contentType:false,
               // processData:false,
                // dataType: "json",
               success: function(data)
               {
                 $('.connections').html(data);
                 $('#search_connection').val('');
                 
               }
         });
   }
</script>