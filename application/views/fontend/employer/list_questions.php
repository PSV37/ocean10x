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
</style>
<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
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
            <ul id="myTabs" class="nav nav-justified" role="tablist" data-tabs="tabs">
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
                     <label>
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