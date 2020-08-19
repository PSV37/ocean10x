<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/oceanchamp_exp.css">
<style>
   .dropdown {
   display: inline-block;
   position: relative;
   }   
   .dd-button {
   display: inline-block;
   border: 1px solid #dedede;
   border-radius: 4px;
   padding: 5px 30px 5px 20px;
   background-color:#cde4f5;
   cursor: pointer;
   white-space: nowrap;
   border-radius: 33px;
   color:#848484;
   font-size:12px;
   }
   .dd-button:after {
   content: '';
   position: absolute;
   top: 50%;
   right: 15px;
   transform: translateY(-50%);
   width: 0; 
   height: 0; 
   border-left: 5px solid transparent;
   border-right: 5px solid transparent;
   border-top: 5px solid #6f6b6b;
   }
   .dd-button:hover {
   background-color: #eeeeee;
   }
   .dd-input {
   display: none;
   }
   .dd-menu {
   position: absolute;
   top: 100%;
   border: 1px solid #ccc;
   border-radius: 4px;
   padding: 0;
   margin: 2px 0 0 0;
   box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
   background-color: #ffffff;
   list-style-type: none;
   }
   .dd-input + .dd-menu {
   display: none;
   } 
   .dd-input:checked + .dd-menu {
   display: block;
   z-index:999;
   } 
   .dd-menu li {
   padding: 10px 20px;
   cursor: pointer;
   white-space: nowrap;
   }
   .dd-menu li:hover {
   background-color: #f6f6f6;
   }
   .dd-menu li a {
   display: block;
   margin: -10px -20px;
   padding: 10px 20px;
   }
   .dd-menu li.divider{
   padding: 0;
   border-bottom: 1px solid #cccccc;
   }
   .header-bookbank{margin-bottom:12px !important;}   
   button#question_add {
   background-color: #18c5bd;
   border: none;
   border-radius: 15px;
   width: auto;
   }
  @media (min-width: 768px){
   .nav-justified>li {
   display: inline-block;
   width: 225px;
   height: 30px;
   margin-right:30px;
   }
   }
   .nav>li>a:focus, .nav>li>a:hover {
   text-decoration: none;
   background-color:#fff;
   border: solid 2px #a5a5a5;
   color: #949494;
   }
   .nav li a {
   color: #949494;
   background-color: #fff;
   border: solid 2px #a5a5a5;
   border-radius: 30px;
   padding: 4px 10px;
   font-weight: 700;
   }
   .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
   color:  #18c5bd;
   background-color:#fff;
   border: solid 2px #18c5bd;
   font-weight: 700;
   }
   .tab-content {
   margin-top: 45px;
   }
   .panel-body {
   padding: 4px;
   }
    label.btn.btn-secondary.active {
   border-radius: 20px;
   border: solid 2px;
   color: #18c5bd;
   background-color: #fff;
   border: solid 2px #18c5bd;
   font-weight: 700;
   }
   label.btn.btn-secondary {
   color: #949494;
   background-color: #fff;
   border: solid 2px #a5a5a5;
   border-radius: 30px;
   padding: 4px 10px;
   font-weight: 700;
   }
   button.btn.btn-primary {
    font-size: 15px;
    font-weight: bold;
    margin-left: 80px;
    padding: 5px;
    margin-right: -199px;
    min-width: 80px;
}
.btn-group-toggle {
    margin-left: 139px;
}
li.btn.btn-secondary.active {
    box-shadow: none;
    border: solid 2px #18c5bd;
    border-radius: 65px;
}
#qbottons
{
      margin-right: 202px;
    float: right;
}
i.fa.fa-plus {
    padding: 2px;
}
.box-body {
    height: fit-content;
}
span.select2-selection.select2-selection--single {
    width: 275px;
}
.following-info {
   float:left;
   line-height:30px;
   margin-top:0px;
   margin-left:18px;
   }
  .following-info2 {
    margin-left: 270px;
    line-height: 30px;
    margin-top: 0px;
    margin-bottom: 15px;
}.following-info3 {
   margin-left: 309px;
   line-height: 30px;
   margin-top: 0px;
   margin-bottom: 15px;
   }
     .card {
   position: relative;
   height: auto;
   width: 100%;
   -webkit-transform-style: preserve-3d;  
   transform-style: preserve-3d;
   -webkit-transition: all 600ms;
   transition: all 600ms;
   border-radius:13px;
   padding:0px;
   margin-top:15px;
   }
   .card div {
   -webkit-backface-visibility: hidden;
   backface-visibility: hidden;
   border-radius: 5px;
   }
   .card .back {
   background: #222;
   -webkit-transform: rotateX(180deg);
   transform: rotateX(180deg);
   }
   /*
   :checked + .card {
   transform: rotateX(180deg);
   -webkit-transform: rotateX(180deg);
   }
   */
   .active-job {
   margin-top:168px;
   }
   .dropdown-menu>li>a{padding:3px 20px;}
   .front{padding:11px;height:auto;}
   .job-info {
   margin-left: 40px;
   margin-top:0px;
   }
   li.left-title {
   list-style-type: none;
   float: left;
   font-size: 12px;
   font-weight: 100;
   width:auto;
   height:15px;
   }
   li.right-title {
   list-style-type: none;
   font-size: 12px;
   font-weight: 100;
   width:150px;
   }
   .icon-info {
   margin-left:60px;
   margin-bottom:10px;
   }
   li.left-icon-title{
   list-style-type: none;
   float: left;
   }
   .left-icon-title i{color:#18c5bd;}
   li.right-icon-title {
   list-style-type: none;
   float: left;
   margin-right: 20px;
   font-weight:100;
   }
   .front .dropdown {
   top: -8px;
   width: 63px;
   position: absolute;
   right: 0px;
   }
   .detail-btn{
   background-color: #fff;
   padding: 3px 19px;
   border-radius: 20px;
   background-color: #18c5bd;
   border: none;
   color: #fff;
   font-weight: 100;
   float:right;
   margin-left:10px;}
   .detail-btn:hover{
   background-color:#107773;
   transition:0.8s; 
   }   
   .following-info {
   float:left;
   line-height:30px;
   margin-top:0px;
   margin-left:18px;
   }
  .following-info2 {
    margin-left: 270px;
    line-height: 30px;
    margin-top: 0px;
    margin-bottom: 15px;
}.following-info3 {
   margin-left: 309px;
   line-height: 30px;
   margin-top: 0px;
   margin-bottom: 15px;
   }
   .active-span{
   position: absolute;
   top: 12px;
   left: 405px;
   background-color: #8BC34A;
   padding: 1px 17px;
   border-radius: 9px;
   color: #fff;
   font-size: 11px;
   }
   .following-info3 {
   float: right;
   margin-top: -133px;
   line-height:30px;
   }
   label{display:block;}
   .test_history{margin-top:80px;}
   .result {
   margin-left: 42px;
   }
   .open>.dropdown-menu {
   display: block;
   width: fit-content;
   }
   .dropdown-menu-right {
   right: 0;
   left: auto;
   }
   button#gedf-drop1 {
   top: 0px;
   position: absolute;
   right: 0px;
   }
   .dropdown-menu {
   position: absolute;
   top:35;
   right: 0;
   z-index: 1000;
   display: none;
   float: left;
   min-width: 160px;
   padding: 5px 0;
   margin: 2px 0 0;
   font-size: 14px;
   text-align: left;
   list-style: none;
   background-color: #fff;
   background-clip: padding-box;
   border: 1px solid #ccc;
   border: 1px solid rgba(0,0,0,.15);
   border-radius: 4px;
   -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
   box-shadow: 0 6px 12px rgba(0,0,0,.175);
   }
   .check{right: 28px;
   z-index: 999;
   margin-top: 29px;
   position:absolute;}
    :root {
   --bg: #e3e4e8;
   --fg: #17181c;
   --bs1: #ffffff;
   --bs2: #c1c2c5;
   --tick: #454954;
   --transDur: 0.1s;
   font-size: calc(20px + (40 - 20)*(100vw - 320px)/(2560 - 320));
   }
      .modal-content {
   background-image: linear-gradient(#18c5bd, #d4efec);
   }
   .sendEmail label{color:#fff;font-size:13px;}
   .sendEmail input{background-color: #f3f7f663;}
   .sendEmail textarea.form-control{background-color:#fbffff80;}
   @media (min-width: 768px){
   .modal-dialog {
   width: 460px;
   margin: 30px auto;
   }
   }
   .fade-rotate .modal-dialog{top:45%;}
   .modal-footer{border-top:none;}
   .modal-header{border-bottom:none;}
   button.btn-save:hover{background-color:#0e776d;
   transition:0.9s;color:#fff;}
</style>

<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <div class="col-md-9 question-bank">
            <!-- <div class="header-bookbank">
               Question Bank
               <a style="float: right;" href="<?php echo base_url(); ?>employer/add-question"><button type="button" id="question_add" class="btn btn-primary"><i class="fa fa-plus"> Add Question</i></button></a>
               </div> -->
            <ul id="myTabs" class="" role="tablist" data-tabs="tabs">
               <li class="btn btn-secondary active"><a href="#qbank" data-toggle="tab">Question Bank</a></li>
               <li class="btn btn-secondary"><a href="#Videos" data-toggle="tab">Test Paper Bank</a></li>
            </ul>
            <div class="tab-content">
               <div role="tabpanel" class="tab-pane fade" id="Videos">
                    <div class="row">
                      <a style="float: right;margin-right: 200px;"  href="<?php echo base_url(); ?>employer/create-test"><button type="button" id="question_add" class="btn btn-primary"><i class="fa fa-plus"> Create Test</i></button></a>
                    </div>
                     <div class="row">
                        <div class="btn-group-toggle" data-toggle="buttons" >
                           <a href="#add_test" data-toggle="tab"><label class="btn btn-secondary active">
                           <input type="radio" name="options" id="option1" autocomplete="off"  style="display: none;">I want to choose My Questions in the Test !
                           </label></a>
                           <a href="#create_test" data-toggle="tab"><label class="btn btn-secondary">
                           <input type="radio" name="options" id="option2" autocomplete="off" style="display: none;"> Ocean can help me create the Test !
                           </label></a>
                        </div>
                     </div>
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="add_test">
                           <form method="post" action="<?php echo base_url(); ?>employer/add_to_test">
                           <input type="hidden" id="question_id" name="data_arr" value="">
                           <input type="hidden" class="form-control" readonly style="border: none;" id="test_time" name="test_time">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group technical_id">                                       
                                       <label for="exampleInputEmail1">Test Name <span class="required">*</span></label>
                                       <input type="text" class="form-control" id="test_name" name="test_name">
                                    </div>
                                 </div>
                                  <div class="col-md-4">
                                    <div class="form-group technical_id">
                                       <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                       <select id="subject" name="subject_data" required class="form-control select2"  onchange="getTopic(this.value)">
                                          <option value="">Select Subject</option>
                                          <?php if (!empty($skill_master))
                                             foreach($skill_master as $skill) 
                                             {
                                             ?>   
                                          <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <?php echo form_error('technical_id'); ?>   
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group topic_id">
                                       <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                                       <select id="topic_id" name="topic_id" class="form-control select2" onchange="getSubtopic(this.value)">
                                          <option value="">Select Topic</option>
                                          <!-- <option value="1">HTML 5</option>  -->
                                       </select>
                                       <?php echo form_error('topic_id'); ?>   
                                    </div>
                                 </div>
                              
                              </div>
                              <div class="row">
                                
                                
                                 <div class="col-md-4">
                                    <div class="form-group subtopic_id">
                                       <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                                       <select id="subtopic_id" name="subtopic_id" class="form-control select2" onchange="get_questuions();" >
                                       </select> <?php echo form_error('subtopic_id'); ?>   
                                    </div>
                                 </div>
                                   <div class="col-md-4">
                                   <div class="form-group level">
                                     <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                                       <select name="level_data" onchange="get_questuions();" id="level" class="form-control select2">                                     
                                         <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                                         <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                                         <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                                       </select> <?php echo form_error('level'); ?>   
                                   </div>
                                 </div>
                              </div>
                              <div class="box-body">
                                 <div class="box" >
                                    <p ><b style="float: left;margin-right: 80px">Total Time Duration:<span id="total_time"></span></b> <b style="float: right;margin-right: 80px" >Total Questions:<span id="total_questions"></span></b></p>
                                    <div class="card content">
                                       <!-- <div class="front"> -->
                                       <div class="following-info">
                                          <table class="table table-borderless" id="myTable">
                                             <thead>
                                                <tr>
                                                   <th scope="col">Sr No</th>
                                                   <th scope="col">Line Item 1</th>
                                                   <th scope="col">Line Item 2</th>
                                                   <th scope="col">Question</th>
                                                   <th scope="col">time</th>
                                                   <th scope="col">Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                          </table>
                                       </div>
                                       <!-- </div> -->
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6"></div>
                                 <div class="col-md-6">
                                    <div class="col-md-3">
                                       <button class="btn btn-primary" type="reset">Discard</button>
                                    </div>
                                    <div class="col-md-3" style="margin-left: 20;">
                                       <button class="btn btn-primary" id="frwd_btn" type="submit">Create</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <div class="row">
                     <div class="box1" >
                        <?php $key = 1; if (!empty($oceanchamp_tests)): foreach ($oceanchamp_tests as $tests) : 
                           $on_ocean = $tests['ocean_candidate'];
                                 if($on_ocean == 'Yes')
                                 {
                                    $resume = getUploadedResume($tests['js_email']);
                                    $photo = getSeekerPhoto($tests['js_email']);
                                    $updates = getSeekerlastUpdates($tests['js_email']);
                                    if (!empty($updates)) {
                                      if($updates[0]['update_at']=='0000-00-00 00:00:00') { 
                                        $mtime = date('d-M-y',strtotime($updates[0]['create_at']));
                                      } else{
                                        $mtime = date('d-M-y',strtotime($updates[0]['update_at']));
                                      }
                                    }else{
                                      $mtime = date('d-M-y',strtotime($tests['created_on']));
                                    }
                                 }else{
                                  $mtime = date('d-M-y',strtotime($tests['created_on']));
                                 }
                                
                                ?>
                        <label>
                           <div class="check">
                              <!--  <input type="checkbox" value="<?php echo $cv_row['js_email']; ?>" data-valuetwo="<?php echo $cv_row['cv_id'];  ?>" data-valueone="<?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ echo $cv_row['js_resume']; } ?>" class="chkbx" /> -->
                           </div>
                           <div class="card content">
                              <div class="front">
                                 <?php
                                    if($on_ocean == 'Yes')
                                      {
                                    if(!empty($photo)){ ?>
                                 <img src="<?php echo  base_url(); ?>upload/<?php if(!empty($photo[0]['photo_path'])){echo $photo[0]['photo_path'];} ?>" style="height:25px; width:25px;border-radius:5px;float:left" />
                                 <?php }else{ ?>
                                 <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                                 <?php } }else{ ?>
                                 <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                                 <?php } ?>
                                 <div class="job-info">
                                    <div class="a">
                                       <li class="right-title" style="font-size:19px;margin-top:-4px;"  ><?php echo $tests['test_name']; ?></li>
                                    </div>
                                 </div>
                                 <div class="following-info">
                                    <li class="left-title"
                                       >Type</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['type']; ?></li>
                                    <li class="left-title">Total Questions</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['total_questions']; ?></li>
                                    <li class="left-title">Timer on Each Question</li>
                                    <li class="right-title">&nbsp;: <?php echo $tests['timer_on_each_que']; ?></li>
                                    <li class="left-title">Display Correct Answer</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['correct_ans_each_ques']; ?></li>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="following-info2">
                                    <li class="left-title">Level</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['level']; ?></li>
                                    <li class="left-title">Total Duration</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['test_duration']; ?></li>
                                    <li class="left-title">Allowed to Go back</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['previous_option']; ?></li>
                                    <li class="left-title">Display Result </li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['final_result']; ?></li>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="following-info3">
                                    <li class="left-title">Topics</li>
                                    <li class="right-title">&nbsp;: <?php echo $tests['topics']; ?></li>
                                    <li class="left-title">Allowed to Review</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['review_option']; ?></li>
                                    <li class="left-title">Negative Marking</li>
                                    <li class="right-title">&nbsp;:<?php echo $tests['negative_marks']; ?></li>
                                    <div class="clear"></div>
                                 </div>
                                 <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:47px;">
                                    <li ><a class="dropdown-item" href="#" id="div_frwrd" data-toggle="modal" data-target="#rotateModal<?php echo $tests['test_id'] ?>" >Forward This Test</a></li>
                                    <li> <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#edit_test<?php echo $tests['test_id'] ?>" >Edit Test</a></li>
                                    <!--  <li><a class="dropdown-item" class="dropdown-item" href="#"  data-toggle="modal" data-target="#move_cv" href="#">Move this CV</a></li> -->
                                 </div>
                              </div>
                           </div>
                        </label>
                        <?php
                           $key++;
                             endforeach;  
                           ?>     
                        <?php else : ?> 
                        <li colspan="3">
                           <strong> No Tests Created. Click on "Create A Test" !</strong>
                        </li>
                        <?php endif; ?>
                     </div>
                  </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="create_test">
                           <form method="post" action="<?php echo base_url(); ?>employer/randomly_create_test">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group technical_id">                                       
                                       <label for="exampleInputEmail1">Test Name <span class="required">*</span></label>
                                       <input type="text" class="form-control" id="test_name" name="test_name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group technical_id">                                       
                                       <label for="exampleInputEmail1">Duration<span class="required">*</span></label>
                                       <input type="Number" max="60" min="1" class="form-control" id="time" name="test_duration">
                                    </div>
                                 </div>
                                   <div class="col-md-4">
                                    <div class="form-group technical_id">
                                       <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                       <select id="subject" name="technical_id" required class="form-control select2"  onchange="getTopicocean(this.value)">
                                          <option value="">Select Subject</option>
                                          <?php if (!empty($skill_master))
                                             foreach($skill_master as $skill) 
                                             {
                                             ?>   
                                          <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <?php echo form_error('technical_id'); ?>   
                                    </div>
                                 </div>
                                 
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group topic_id">
                                       <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                                       <select id="topic_id_ocean" name="topic_id" class="form-control select2" onchange="getSubtopics(this.value)">
                                          <option value="">Select Topic</option>
                                          <!-- <option value="1">HTML 5</option>  -->
                                       </select>
                                       <?php echo form_error('topic_id'); ?>   
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group subtopic_id">
                                       <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                                       <select id="subtopic_id_ocean" name="subtopic_id" class="form-control select2" >
                                       </select> <?php echo form_error('subtopic_id'); ?>   
                                    </div>
                                 </div>
                              
                                 <div class="col-md-4">
                                   <div class="form-group level">
                                     <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                                       <select name="level" onchange="get_questuions();" id="level" class="form-control select2">                                     
                                         <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                                         <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                                         <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                                       </select> <?php echo form_error('level'); ?>   
                                   </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <div class="form-group ques_type">
                                     <label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
                                     <select name="ques_type" id="ques_type" class="form-control select2" type="text" onchange="get_questuions();">
                                       <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                                         <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                                         <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
                                     </select> <?php echo form_error('ques_type'); ?>   
                                   </div>
                                 </div>
                                 
                              </div>
                          
                               <div class="row">
                                 <div class="col-md-6"></div>
                                 <div class="col-md-6">
                                    <div class="col-md-3">
                                       <button class="btn btn-primary" type="reset">Discard</button>
                                    </div>
                                    <div class="col-md-3" style="margin-left: 20;">
                                       <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                 
               <div role="tabpanel" class="tab-pane fade active" id="qbank">
                
                   <a id="qbottons" style="margin-top: -41px;" href="<?php echo base_url(); ?>employer/add-question"><button type="button" id="question_add" class="btn btn-primary"><i class="fa fa-plus"> Add a Question</i></button></a><br>
              
                   <a id="qbottons" style="margin-top: -25px;" href="<?php echo base_url(); ?>employer/add-question"><button type="button" id="question_add" class="btn btn-primary"><i class="fa fa-plus"> Bulk Upload Questions</i></button></a>
              
               
               
               
                  <div class="select-option">
                     <p style="FONT-SIZE: 12PX;COLOR: #0a5854;">Total No. Of Question:10</p>
                    
                     <label class="dropdown">
                        <div class="dd-button">
                           Filter
                        </div>
                        <input type="checkbox" class="dd-input" id="test">
                        <ul class="dd-menu">
                           <li>Action</li>
                           <li>Another action</li>
                           <li>Something else here</li>
                           <li class="divider"></li>
                           <li>
                              <a href="http://rane.io">Link to Rane.io</a>
                           </li>
                        </ul>
                     </label>
                    <label style=" width: 86px;float: right;">
                     <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                     <span>Select all</span>
                     </label>
                  </div>
                  <?php $key = 1; if (!empty($questionbank)): foreach ($questionbank as $ct_row) : ?>
                  <div class="question-box">
                     <div class="border-top"></div>
                     <div class="panel-heading">
                        <img src="https://blog.oxiane.com/wp-content/uploads/2017/04/java-logo-oracle.png" class="logo-subject" />
                        <li><span style="color:#949694;float:left;width:150px;"><?php echo $ct_row['skill_name'] ?>(<?php echo $ct_row['topic_name'] ?>)</span></li>
                        <li><span style="color:#949694;">subtopic&nbsp;:<?php echo $ct_row['subtopic_name'] ?></span></li>
                        <li style="float: right;"><span style="color:#949694;"><b>Time</b>&nbsp;:<?php echo $ct_row['time_for_question'] ?> sec</span></li>
                        <li><span style="color:#949694;float:left;width:150px;"><?php echo $ct_row['title'] ?></span></li>
                        <li><span style="color:#949694;"><?php echo $ct_row['titles'] ?></span></li>
                        <div class="a">
                           <p class="question">
                              <?php echo $ct_row['question'] ?>
                           </p>
                        </div>
                     </div>
                     <!--.panel-heading-->
                     <div class = "panel-body">
                        <ul class = "list-group">
                           <div class="col-md-12" style="margin-left: -27px;">
                              <div class="optionbox-1 col-md-3">
                                 <li class = "list-group-item">
                                    <div class="checkbox">
                                       <input type="checkbox" id="checkbox" />
                                       <label for="checkbox">
                                       <?php echo $ct_row['option1'] ?>
                                       </label>
                                    </div>
                                 </li>
                                 <li class = "list-group-item" >
                                    <div class="checkbox">
                                       <input type="checkbox" id="checkbox" />
                                       <label for="checkbox">
                                       <?php echo $ct_row['option2'] ?>
                                       </label>
                                    </div>
                                 </li>
                              </div>
                              <div class="optionbox-2 col-md-3">
                                 <li class = "list-group-item">
                                    <div class="checkbox">
                                       <input type="checkbox" id="checkbox" />
                                       <label for="checkbox">
                                       <?php echo $ct_row['option3'] ?>
                                       </label>
                                    </div>
                                 </li>
                                 <li class = "list-group-item">
                                    <div class="checkbox">
                                       <input type="checkbox" id="checkbox" />
                                       <label for="checkbox">
                                       <?php echo $ct_row['option4'] ?>
                                       </label>
                                    </div>
                                 </li>
                              </div>
                           </div>
                        </ul>
                     </div>
                     <p>
                        <a class="toggle btn " href="#example">show answer</a>
                     </p>
                     <div class="toggle-content" id="example">
                        <?php echo $ct_row['answer_id'] ?>
                     </div>
                     <div class="btn-group">
                        <a href=" <?php echo base_url('employer/edit_questionbank/' . $ct_row['ques_id']); ?>"><i class="far fa-edit icon_backg"></i></a>
                        <a href="<?php echo base_url('employer/delete_questionbank/' . $ct_row['ques_id']); ?>"><i class="fas fa-trash-alt icon_backg"></i></a>
                     </div>
                  </div>
                  <?php
                     $key++;
                     endforeach;
                     ?>
                  <?php else : ?> 
                  <div colspan="3">
                     <strong>There is no record for display</strong>
                  </div>
                  <?php
                     endif; ?>
                  <div class=""></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $key = 1; if (!empty($oceanchamp_tests)): foreach ($oceanchamp_tests as $tests) : ?>
<div class="modal" id="rotateModal<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Test</h5>
         </div>
         <form action="<?php echo base_url() ?>employer/forword_test" class="sendEmail" method="post" autocomplete="off">
            <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
            <div class="modal-body" style="padding:15px 40px;">
               <input type="hidden" name="consultant" value="JobSeeker">  
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <label class="mdl-textfield__label" for="sample3">E-mail:</label>
                  <input type="email"  name="candiate_email"  id="email" placeholder="Enter comma seperated Emails"  id="subject" data-required="true" multiple style="display: inline-block;" required>
               </div>
               <input type="hidden" name="job_post_id" value="" id="auto-value">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label" for="sample3">Message:</label>
                  <textarea class="form-control" name="message" rows="5" id="comment" value="" required></textarea>
               </div>
               <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-save">Send</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal" id="edit_test<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Test</h5>
         </div>
         <form action="<?php echo base_url() ?>employer/update_test" class="sendEmail" method="post" autocomplete="off">
            <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
            <div class="modal-body" style="padding:15px 40px;">
               <div class="col-md-6">
                  <div class="form-group ques_type">
                     <label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
                     <select name="ques_type" id="ques_type" class="form-control select2" type="text" onchange="get_questuions();">
                        <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                        <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                        <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
                     </select>
                     <?php echo form_error('ques_type'); ?>   
                  </div>
               </div>
               <div class="col-md-6"></div>
               <div class="col-md-4">
                  <div class="form-group timer">
                     <label for="male">Timer On each Question</label><br>
                     <label class="radio-inline" >
                     <input type="radio" name="timer" style=" margin-right: 11px;" value="Y" checked> Yes
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="timer" value="N" style="margin-left: -30px;">No
                     </label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group previous_option">
                     <label for="male">Allowed to Go back</label><br>
                     <label class="radio-inline">
                     <input type="radio" name="previous_option"  style=" margin-right: 11px;" value="Y" checked> Yes
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="previous_option" value="N" style="margin-left: -30px;">No
                     </label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group review_option">
                     <label for="male">Allowed to Review</label><br>
                     <label class="radio-inline">
                     <input type="radio" name="review_option" style=" margin-right: 11px;" value="Y" checked> Yes
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="review_option" value="N" style="margin-left: -30px;">No
                     </label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group negative">
                     <label for="male">Negative Marking</label><br>
                     <label class="radio-inline">
                     <input type="radio" name="negative" style=" margin-right: 11px;" value="Y" checked> Yes
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="negative" value="N" style="margin-left: -30px;">No
                     </label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group each_question_ans">
                     <label for="male">Display Correct Answer for each Question</label><br>
                     <label class="radio-inline">
                     <input type="radio" name="each_question_ans" style=" margin-right: 11px;" value="Y" checked> Yes
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="each_question_ans" value="N" style="margin-left: -30px;">No
                     </label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group display_result">
                     <label for="male">Display Test Result to Candidate</label><br>
                     <label class="radio-inline">
                     <input type="radio" name="display_result" style=" margin-right: 11px;" value="Y" checked> Yes
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="display_result" value="N" style="margin-left: -30px;">No
                     </label>
                  </div>
               </div>
               <input type="hidden" name="job_post_id" value="" id="auto-value">
               <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
            </div>
            <div class="modal-footer"  style="    margin-top: 340px;">
               <button type="submit" class="btn btn-save">update</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php
   endforeach;endif;?>
<script>
   // Show an element
   var show = function (elem) {
   
    // Get the natural height of the element
    var getHeight = function () {
      elem.style.display = 'block'; // Make it visible
      var height = elem.scrollHeight + 'px'; // Get it's height
      elem.style.display = ''; //  Hide it again
      return height;
    };
   
    var height = getHeight(); // Get the natural height
    elem.classList.add('is-visible'); // Make the element visible
    elem.style.height = height; // Update the max-height
   
    // Once the transition is complete, remove the inline max-height so the content can scale responsively
    window.setTimeout(function () {
      elem.style.height = '';
    }, 350);
   
   };
   
   // Hide an element
   var hide = function (elem) {
   
    // Give the element a height to change from
    elem.style.height = elem.scrollHeight + 'px';
   
    // Set the height back to 0
    window.setTimeout(function () {
      elem.style.height = '0';
    }, 1);
   
    // When the transition is complete, hide it
    window.setTimeout(function () {
      elem.classList.remove('is-visible');
    }, 350);
   
   };
   
   // Toggle element visibility
   var toggle = function (elem, timing) {
   
    // If the element is visible, hide it
    if (elem.classList.contains('is-visible')) {
      hide(elem);
      return;
    }
   
    // Otherwise, show it
    show(elem);
    
   };
   
   // Listen for click events
   document.addEventListener('click', function (event) {
   
    // Make sure clicked element is our toggle
    if (!event.target.classList.contains('toggle')) return;
   
    // Prevent default link behavior
    event.preventDefault();
   
    // Get the content
    var content = document.querySelector(event.target.hash);
    if (!content) return;
   
    // Toggle the content
    toggle(content);
   
   }, false);
</script>
 <script>
 function getTopic(id){
        if(id){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>employer/gettopic',
            data:{id:id},
            success:function(res){
              $('#topic_id').html(res);
            }
            
          }); 
          }
       }
       function getTopicocean(id){
        if(id){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>employer/gettopic',
            data:{id:id},
            success:function(res){
              $('#topic_id_ocean').html(res);
            }
            
          }); 
          }
       }
       function getSubtopic(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                }
                
            }); 
          }
   
    }
    function getSubtopics(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id_ocean').html(res);
                }
                
            }); 
          }
   
    }
  function get_total(){
    // if ($('#checkbox').is(':checked')) {
      // alert('ff');
      var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                   return this.getAttribute("data-valueone");
               }).get();
               var data_arr1= (checkedValsofname.join(","));
      
            // alert();
            var myNameArray =  data_arr1.split(',');
              // var sum = 0;
          var total_time = sum(myNameArray);

             $('#total_time').html(total_time+' seconds');
             $('#total_questions').html(myNameArray.length);

  }

  function get_questuions(job_id)
  {
   var subject = $('#subject').val();
   var topic_id = $('#topic_id').val();
   var subtopic_id = $('#subtopic_id').val();
   var ques_type = $('#ques_type').val();
   var level = $('#level').val();
    $.ajax({
              url: "<?php echo base_url();?>employer/get_test_questions",
              type: "POST",
              data: {subject:subject,topic_id:topic_id,subtopic_id:subtopic_id,ques_type:ques_type,level:level},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('tbody').html(data);
              }
        });
       
  }
   
  
     $(function(){
      var test_name = $('#test_name').val();
  $("#frwd_btn").on("click", function() {
    // if (confirm("Selected Rows will be updated in external tracker!!")) {
    //         var data = [];
            var checkedVals = $('.chkbx:checkbox:checked').map(function() {
                   return this.value;
               }).get();
               var data_arr= (checkedVals.join(","));
               $('#question_id').val(data_arr);

               var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                   return this.getAttribute("data-valueone");
               }).get();
               var data_arr1= (checkedValsofname.join(","));
      
            // alert();
            var myNameArray =  data_arr1.split(',');
              // var sum = 0;
          var total_time = sum(myNameArray);

            var level_val = $('')
             $('#test_time').val(total_time+' seconds');
             $('#level_data').val($('#level').val());
             $('#subject_data').val($('#subject').val());
             $('#type').val($('#ques_type').val());

             $('#timer_data').val($('input[name=timer]:checked').val());
             $('#previous_option_data').val($('input[name=previous_option]:checked').val());
             $('#review_option_data').val($('input[name=review_option]:checked').val());
             $('#negative_data').val($('input[name=negative]:checked').val());
             $('#each_question_ans_data').val($('input[name=each_question_ans]:checked').val());
             $('#display_result_data').val($('input[name=display_result]:checked').val());
              
                      if($('#js').valid()) 
                      {
                          $('#add_test').modal('show');


                      }


    
  });
});
function sum(input){
             
 if (toString.call(input) !== "[object Array]")
    return false;
      
            var total =  0;
            for(var i=0;i<input.length;i++)
              {                  
                if(isNaN(input[i])){
                continue;
                 }
                  total += Number(input[i]);
               }
             return total;
            }

  </script> 
<script>
   $('.select2').select2();
   </script>