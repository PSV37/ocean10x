
             <div class="totalcandi">Total Questions <span style="margin-left: 2px;"><?php print_r($exam_res['0']['total_questions']);?></span>Attempted Questions<span style="margin-left: 2px;" ><?php  echo NUMBER_QUESTIONS; ?></span>Total Marks <span style="margin-left: 2px;"><?php print_r($exam_res['0']['total_marks']);?></span> </div>
          <!--  <p>Total questions=<?php print_r($exam_res['0']['total_questions']); ?></p> -->
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
                <tr>
                  <th class="active">SL</th>
                  <th class="active">Question</th>
                  <th class="active">Level</th>
                  <th class="active">Result</th>
                  <th class="active">Time taken</th>
                </tr>
              </thead>
              <tbody>
                <?php $key = 1; 

                  $js_id = $ct_row['js_id'];
                  // $exam_res = getExamResultByID($js_id,$job_id); 
                  if (!empty($exam_result)): foreach ($exam_result as $res_row) :
                  $marks = $res_row['total_marks']; 
                  $percentage = ($marks * 100)/$exam_res['0']['total_questions'];
                  if ($key==1) {
                    $start_time=$exam_start['0']['updated_on'];
                    $end_time=$res_row['date_time'];
                    // $Time_taken=$end_time-$start_time;
                    $Time_taken=date_diff($start_time,$end_time);
                  }
                ?>
                    <tr>
                      <td><?php echo $key ?></td>
                      <td><?php echo $res_row['question']; ?></td>
                      <td><?php echo $res_row['level']; ?></td>
                      <td><?php if ($res_row['correct_status']=='Yes') {
                        echo "Correct";
                      }elseif ($res_row['correct_status']=='No') {
                         echo "Wrong";
                      }  ?></td>
                      <td><?php echo $Time_taken; ?></td>
                     
                  </tr>
                  <?php
                      $key++;
                     
                      endforeach;
                  ?>
                  <?php else : ?> 
                      <td colspan="3">
                          <strong>There is no record for display</strong>
                      </td>
                  <?php
                    endif; ?>
              </tbody>
          </table>




