<!-- <div class="box" >  -->
               <?php $key = 1; if (!empty($test_questions)): foreach ($test_questions as $question) : 
                 
                $questions = explode(',',$question['questions']);
                print_r($questions);
                $i=0;
                foreach ($questions as $row) {
                  print_r($row);
                  $where['ques_id']   = $row[$i];
                   $join_emp  = array(
                  'skill_master' => 'skill_master.id=questionbank.technical_id |left outer',
                  'topic' => 'topic.topic_id=questionbank.topic_id |left outer',
                  'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |left outer',
                  'lineitem' => 'lineitem.lineitem_id=questionbank.lineitem_id |left outer',
                  'lineitemlevel' => 'lineitemlevel.lineitemlevel_id=questionbank.lineitemlevel_id |left outer',
                  'questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER'
              );
                  $question_data  = $this->Master_model->get_master_row('questionbank', $select = FALSE, $where, $join = $join_emp)
                
                              ?><tr>

                                <input class="attrValue" type="hidden" name="" id="ques_id" value="<?php echo $question['ques_id']; ?>">
                                 <td ><?php echo $key; ?></td>

                                <td ><?php echo $question_data['skill_name']; ?></td>

                                <td ><?php echo $question_data['topic_name']; ?></td>

                                <td ><?php echo $question_data['subtopic_name']; ?></td>
                                <td ><?php echo $question_data['title']; ?></td>
                                <td ><?php echo $question_data['titles']; ?></td>
                                <td ><?php echo $question_data['question']; ?></td>
                                <td ><?php echo $question_data['level']; ?></td>

                               

                                   
                             

                           
               <?php
                  $i++;
                  $key++;
                }
                    endforeach;  
                  ?>     
               <?php else : ?> 
               <td colspan="3">
                  <strong>There is no record for display</strong>
               </td>
               <?php endif; ?>
            <!-- </div>
              xcccc-->

            