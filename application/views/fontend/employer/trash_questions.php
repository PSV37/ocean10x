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
                                       <input type="checkbox" id="checkbox"  />
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
                     <br><p>
                        <a class="toggle btn " href="#example<?php echo $ct_row['question_id'] ?>">show answer</a>
                     </p>
                     <div class="toggle-content" id="example<?php echo $ct_row['question_id'] ?>">
                        <?php echo 'option'.$ct_row['answer_id'] .': '. $ct_row['option'.$ct_row['answer_id']] ?>
                     </div>
                     <div class="btn-group">
                        <a title="restore" href=" <?php echo base_url('employer/recover_questionbank/' . $ct_row['ques_id']); ?>" ><i class="fas fa-trash-restore icon_backg"></i></a>
                      
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

                  <div>
                      <button id="submit" type="button" onclick="history.back()" class="save_question">Cancel</button>
                  </div>