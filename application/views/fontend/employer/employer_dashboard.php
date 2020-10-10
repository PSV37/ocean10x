<!---header-->

<?php $this->load->view('fontend/layout/employer_new_header.php');?>  
<!---header--->

<style>
   body {font-family: Arial, Helvetica, sans-serif;}
   * {box-sizing: border-box;}
   /*.ui-autocomplete {
   z-index: 100;
   }*/
   /* Button used to open the chat form - fixed at the bottom of the page */
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
   .bg-dream-pink {
    background-color: #D81B60;
}
.bg-dream-purple {
    background-color: #a612a6;
    color: white;
}
</style>
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <div class="col-lg-9 mid-section">
            <div class="row">
               <div class="col-md-12 bd-1">
                  <div class="dash-box-w">
                     <h3 class="heading-dash">My Dashboard</h3>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-primary o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-fw fa-download"></i>
                              </div>
                              <span>Active Job Posts </span>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><?php echo sizeof($company_active_jobs); ?></span>
                           </a>  
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-danger o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-volume-up fa-fw"></i>
                              </div>
                              <div >Customers</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;">20</span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-warning o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-users fa-fw"></i>
                              </div>
                              <div>CV Bank</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($cv_bank_data); ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-dream-pink o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                <i class="far fa-address-card"></i>
                              </div>
                              <div>CV Bank</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($cv_bank_data); ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-bluish o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-fw fa-download"></i>
                              </div>
                              <span>Open Positions</span>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span>
                           <?php 
                           //print_r($open_positions); 
                           if(isset($open_positions) && isset($open_positions[0]) && isset($open_positions[0]->no_jobs)){
                                 echo $open_positions[0]->no_jobs;
                           }else{
                                 echo "0";
                           } 
                            ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-link o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-volume-up fa-fw"></i>
                              </div>
                              <div>Successful Hiring</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($success_full_hiring); ?></span> 
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
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
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-dream-purple o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="far fa-address-card"></i>
                              </div>
                              <div>CV Bank</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($cv_bank_data); ?></span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php if (!empty($jobs)): foreach ($jobs as $v_companyjobs) : ?>
   <label class="checkbox_label content">
      <div class="border-top1"></div>
      <input type="checkbox" id='posted_job' class="posted_job" onchange="get_report_data(<?php echo $v_companyjobs['job_post_id'] ?>)" />
      <div class="card">
         <div class="front">



            <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_profile_id);?>" style="height:50px; width:50px;border-radius:5px;float:left;border:solid 1px #eae9e9b8;margin-right:15px;" />
            <div class="job-info">
               <p class="job_title"><?php echo $v_companyjobs['job_title']; ?></p>
            </div>
            <div class="icon-info">
               <li class="left-icon-title"><i class="far fa-money-bill-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $v_companyjobs['salary_range']; ?> (Yearly - <?php  $currency = $this->session->userdata('currency');  if (isset($currency) && !empty($currency)) {
                  $locale='en-US'; //browser or user locale
                   // $currency='JPY';
                   $fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
                   $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
                   header("Content-Type: text/html; charset=UTF-8;");
                      echo $symbol;echo $symbol;
                  } ?>)  </li>
               <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $v_companyjobs['city_id']; ?></li>
               <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
               <li class="right-title" style="width:100%;"> &emsp;<?php echo $v_companyjobs['experience']; ?> (Experience)</li>
               <div class="clear"></div>
            </div>

            <div class="following-info">
               <li class="left-title"
                  >Job Role </li>
                  <li class="right-title">&nbsp;: <?php echo $v_companyjobs['job_role_title']; ?></li>
                  <li class="left-title">Education</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs['education_level_name']; ?></li>
               
               
               <li class="left-title">Domain</li>
               <li class="right-title">&nbsp;:<?php echo $v_companyjobs['job_category_name']; ?></li>
              
              
               <div class="clear"></div>
            </div>
            <div class="following-info2">
               
             <li class="left-title">Vacancies</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs['no_jobs']; ?></li>
               <li class="left-title">Engagement</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs['job_nature_name']; ?></li>
               
              
                <li class="left-title">Published on</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs['posting_date'])) { echo date('j M Y',strtotime($v_companyjobs['posting_date'])); } ?></li>
               <div class="clear"></div>
            </div>
            <div class="following-info3">
               
               
               <li class="left-title">Ocean Test</li>
               <li class="right-title">&nbsp;:<?php 
                if ($v_companyjobs['is_test_required'] == 'Yes' && empty($v_companyjobs['test_for_job'])) { echo $v_companyjobs['is_test_required'];  ?>
                  <sup><span title="Marked yes but test is not attached" class="required">*</span></sup>
             <?php  } elseif ($v_companyjobs['is_test_required'] == 'Yes' && !empty($v_companyjobs['test_for_job'])) { ?>
               <a style="margin-left: 15px" title="<?php echo $v_companyjobs['test_name'] ?>" href="<?php echo base_url() ?>employer/show_test_details/<?php echo base64_encode($v_companyjobs['test_for_job']); ?>/" >Yes</a>
            <?php }else{echo $v_companyjobs['is_test_required']; } ?> </li>
             <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>

               <li class="right-title">&nbsp;: <?php if (isset($v_companyjobs['jd_file']) && !empty($v_companyjobs['jd_file'])) { echo "Yes"; ?>  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $v_companyjobs['jd_file']; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a> <?php } else { echo "No";} ?></li>
              
               <li class="left-title">Job expiry</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs['job_deadline'])) { echo date('j M Y',strtotime($v_companyjobs['job_deadline'])); } ?></li>
               <div class="clear"></div>
            </div>
             <br>
            <div class="skl_bnft">
              
            <span>Skill sets</span>:
            <span class="right-side">
            <?php 
               $sk=$v_companyjobs['skills_required'];
               if (isset($sk) && !empty($sk)) {
                  $where_sk= "id IN (".$sk.") AND status=1";
                $select_sk = "skill_name ,id";
                $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                if(!empty($skills)){ 
                  foreach($skills as $skill_row){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $skill_row['skill_name'];?></button></lable>
            <?php }
               } }   ?>
            </span>
               <div class="clear"></div>
               </div> 
           
            <br>
            <div class="skl_bnft">
            <span>Benefits</span>:
            <span class="right-side">
            <?php 
               $benefits=explode(',', $v_companyjobs['benefits']);
               
                if(!empty($benefits)){ 
                  $i=0;
                  foreach($benefits as $benefit){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $benefits[$i];?></button></lable>
            <?php $i++; }
               }    ?>
            </span>
             <div class="clear"></div>
            </div>  
            <?php  
                    $job_post_id = $v_companyjobs['job_post_id'];
                    $employer_id = $this->session->userdata('company_profile_id');
                    $where="job_posting.job_post_id = '$job_post_id' ";
                    $join = array('forwarded_jobs_cv'=>'forwarded_jobs_cv.job_post_id = job_posting.job_post_id |Left OUTER',
                     'corporate_cv_bank'=>'corporate_cv_bank.cv_id=forwarded_jobs_cv.cv_id | LEFT OUTER',
                     
                      'company_profile'=>'company_profile.company_profile_id = job_posting.company_profile_id |Left OUTER');
                    $jobs_data = $this->Master_model->getMaster('job_posting', $where , $join, $order = 'desc', $field = 'date', $select = '*,IFNULL(forwarded_jobs_cv.created_on, job_posting.update_at) AS date',$limit=false,$start=false, $search=false); 
                    // print_r($this->db->last_query());
                      if (!empty($jobs_data)) { ?>

                       <span data-toggle="collapse" data-target="#collapseEx<?php echo $v_companyjobs['job_post_id']?>" aria-expanded="false" aria-controls="collapseEx" style="color: red;font-size: 25px;margin-left: 38px;" title="Click to see the Jobs Forwarded" class="required"> * </span>

                       <div class="collapse" id="collapseEx<?php echo $v_companyjobs['job_post_id']?>">
                      <div class="card-body">
                      <?php $i=1; if (!empty($jobs_data)) { ?>
                         <hr>
                        <?php // print_r($jobs_data);
                        foreach ($jobs_data as $row) {

                          if (isset($row['update_at'])) { ?>
                             <p><?php echo $i; ?>.Job Post Updated - <?php echo date('d-m-y H:i',strtotime($row['date'])) ; ?> - <?php echo $row['company_name']; ?> </p>
                        <?php  }elseif(isset($row['cv_id'])){ ?>
                          <p><?php echo $i; ?>.Job Post Forwarded - <?php echo date('d-m-y H:i',strtotime($row['date'])) ; ?> - <?php echo $row['js_email']; ?>  </p>
                       <?php  }
                         ?>

                       

                            <?php $i++;  } }  ?>
                        
                      </div>
                      </div>
                     <?php  }
                    ?>
               <br>       
            <a title="details" href=" <?php echo base_url() ?>employer/preview_job_post/<?php echo $v_companyjobs['job_post_id'] ?>"><i class="fa fa-info-circle icon_backg"></i></a>
            <div class="btn-group">
                        <a title="Edit" href=" <?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs['job_post_id'] ?>"><i class="far fa-edit icon_backg"></i></a>
                        <a title="Delete" href="<?php echo base_url('employer/deactivate_job/' . $v_companyjobs['job_post_id']); ?>"><i class="fas fa-trash-alt icon_backg"></i></a>
                     </div>

            <?php  if ($v_companyjobs['job_deadline'] > date('Y-m-d')){
               // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
               echo '<span class="active-span">Active</span>';
               }
               else {
               // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
               echo '<span class="pasive-span">Expired</span>';
               } ?>
            <div class="dropdown">
               <a href="#" data-toggle="modal" data-target="#rotateModal<?php echo $v_companyjobs['job_post_id']; ?>"> <i class="fas fa-share"></i></a>
               <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-h"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                  <li><a class="dropdown-item" href="#">View post job</a></li>
                  <!-- <li> <a class="dropdown-item" href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs['job_post_id'] ?>">Edit job post</a></li> -->
                 <li ><a class="dropdown-item" href="#" id="attach_to_job" data-toggle="modal" data-target="#attach_test<?php echo $v_companyjobs['job_post_id'] ?>" >Attach Test</a></li>
               </div>
            </div>

           
         </div>
      </div>
   </label>
   <?php endforeach; 
      else : ?> 
   <li>
      <strong>There are no Active Job Posts to Display !</strong>
   </li>
   <?php endif; ?>

 <div class="container-fluid">
             <div class="col-md-6"></div>
            <div class="col-md-6">
            <span><?php echo $link; ?></span>   
            </div>
               
          </div>
            </div>
            <div class="chat-popup" id="myForm1">
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
         <div class="col-md-3 pro-bar">
            <h3 class="heading-dash_profile">PROFILE LEVEL</h3>
            <div class="progress yellow">
               <span class="progress-left">
               <span class="progress-bar"></span>
               </span>
               <span class="progress-right">
               <span class="progress-bar"></span>
               </span>
               <div class="progress-value">75%</div>
            </div>
            <div class="paragraph_p_level">
            </div>
            <button class="open-button" onclick="openForm()">Messaging</button>
            <div class="chat-popup" id="myForm" style="    display: none;
               max-width: 300px;  margin-left: 55px;">
              
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
                        <input type="search" name="search_connection" placeholder="search new connection" id="search_connection" style="display: none;
                           border-radius: 0;margin-top: 43px;max-width: 88%;margin-left: 2px; color: black;">
                        <button class="btn btn-primary btn-sm" id="connection_btn" style="display: none;float: right;margin-right: -9px;margin-top: 1px;height: 36px;background-color: #18c5bd;border: none;"><i class="fa fa-plus fa-1x" onclick="add_connection();" aria-hidden="true"></i></button>
                        <input type="hidden" name="job_seeker_id" value="" id="auto-value">
                        <div class="connections" style="margin-top: 50px;">
                           <?php foreach ($chatbox as $row) { 
                              ?>
                           <div class="row msg_container base_receive" >
                              <div class="col-md-2 col-xs-2 avatar">
                                 <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                              </div>
                              <div class="col-md-10 col-xs-10" onclick="show_box(<?php echo $row['emp_js_connection_id']; ?>);">
                                 <div class="messages msg_receive">
                                    <?php $employer_id = $this->session->userdata('company_profile_id');
                                       $js_id = $row['js_id'];
                                         $whereres   = "msg_to='$employer_id' and message_status = '0' and msg_from = '$js_id'";
                                         $msges = $this->Master_model->getMaster('messaging', $where =  $whereres, $join = false, $order = 'desc', $field = 'message_id', $select = '*',$limit=false,$start=false, $search=false); 

                                         // print_r($msges);

                                         ?>
                                    <?php $employer_id = $this->session->userdata('company_profile_id');
                                       // print_r($)
                                        if ($row['type'] == 'emp-emp' && $row['created_by'] == $this->session->userdata('company_profile_id') ) {
                                          $Join_data      = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.js_id|Left OUTER ');
                                       }
                                       elseif ($row['type'] == 'emp-emp' && $row['created_by'] != $this->session->userdata('company_profile_id') ) {
                                          $Join_data      = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');
                                       }
                                        else
                                          {
                                             $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
                                             } 
                                              $id=$row['emp_js_connection_id'];
                                             $whereres   = "emp_js_connection_id='$id'";
                                            $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);?> 
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
</div>
<script>
   $(function(){
      $("#search_connection").autocomplete({
                
                 source: "<?php echo base_url();?>Employer/search_people",
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
   
   
     });
   
     // setInterval("my_function();",10000);
   function openForm() {
     document.getElementById("myForm").style.display = "block";
     get_list()
   }
   
   function closeForm(id) {
     document.getElementById(id).style.display = "none";
   }
   
   function get_list()
   {
     $.ajax({
                 url: "<?php echo base_url();?>employer/get_list_connections",
                 type: "POST",
               
                 success: function(data)
                 {
                   $('.connections').html(data);
                 }
           });
   }
   
   function send_msg()
   {
     var id = $('#connection_id').val();
   
     var message = $('#btn-input').val();
   if (message.replace(/\s/g, '').length > 0) {

     $.ajax({
                 url: "<?php echo base_url();?>employer/send_message",
                 type: "POST",
                 data: {id:id,message:message},
               
                 success: function(data)
                 {
                   $('.msg').html(data);
                  $('#btn-input').val('');
                 }
           });
  }
   }
   
   function show_box(id){
     // alert(id);/
    
     document.getElementById("myForm1").style.display = "block";
    
          $.ajax({
                 url: "<?php echo base_url();?>employer/get_messages",
                 type: "POST",
                 data: {id:id},
             
                 success: function(data)
                 {
                    
   
                   $('.msg').html(data);
                     get_list();
   
                    
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
                 url: "<?php echo base_url();?>employer/add_new_connection",
                 type: "POST",
                 data: {id:id,name:name},
                
                 success: function(data)
                 {
                   $('.connections').html(data);
                  $('#search_connection').val('');

                 }
           });
   }
</script>