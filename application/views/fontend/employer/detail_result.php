
           <p>Total questions=</p><?php print_r($exam_res['total_questions']); ?>
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
                <tr>
                  <th class="active">SL</th>
                  <th class="active">Total Question</th>
                  <th class="active">Attended Question</th>
                  <th class="active">Total Marks</th>
                  <th class="active">Percenage</th>
                </tr>
              </thead>
              <tbody>
                <?php $key = 1; 

                  $js_id = $ct_row['js_id'];
                  // $exam_res = getExamResultByID($js_id,$job_id); 
                  if (!empty($exam_res)): foreach ($exam_res as $res_row) :
                  $marks = $res_row['total_marks']; 
                  $percentage = ($marks * 100)/NUMBER_QUESTIONS;
                ?>
                    <tr>
                      <td><?php echo $key ?></td>
                      <td><?php echo NUMBER_QUESTIONS; ?></td>
                      <td><?php echo $res_row['total_questions'] ?></td>
                      <td><?php echo $res_row['total_marks'] ?></td>
                      <td><?php echo round($percentage, 2).'%'; ?></td>
                     
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




