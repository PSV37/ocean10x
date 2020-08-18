<!---header-->
<?php  $this->load->view('fontend/layout/employer_new_header.php'); ?>
<!---header--->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/oceanchamp_exp.css">
<style>
   .employ_tab {
   margin-top: 55px;
   border: solid 1px #cecbcb;
   padding: 20px;
   border-radius: 13px;   
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
   input[type="text"] {
   border: solid 1px #dcdede;
   border-radius: 0px 22px 22px 0px;
   padding: 4px 12px;
   margin-bottom: 25px;
   }
</style>
<body>
   <div class="container-fluid main-d">
      <div class="container">
         <div class="col-md-12">
            <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
            <div class="col-md-6" style="margin-top:75px;">
               <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
                  <li class="active"><a href="#Commentary" data-toggle="tab">Corporate QuestionBank</a></li>
                  <li><a href="#Videos" data-toggle="tab">Ocean QuestionBank !</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="Commentary">
                     <div class="row note">
                        <div class="box" >
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
                  <div role="tabpanel" class="tab-pane fade" id="Videos">
                     <div class="table-responsive">
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="Events">
                     <div class="table-responsive">
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="music">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">
      function gettopic(value)
      {
         
          $.ajax({
                  url:'<?php echo base_url();?>employer/gettopics',
                  type: "POST",
                  data:{id:value},
                  success: function(data)
                  {
                    // alert(data);
                     $('#topic').html(data);
                     $('#skill_name').val(value);
                  }
              });//end ajax
      
      }
      
        function getval(value,id)
      {
           $('.exp-box-active').removeClass('exp-box-active');
           var v = document.getElementById(id); 
         v.className += " exp-box-active";
          $('#level').val(value);
            
      
      }
   </script>