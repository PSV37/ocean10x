
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

                  $size=sizeof($exam_result);
                  // print_r($size);

                  for ($i=0; $i <$size ; $i++) { 
                    if ($i==0) {
                     $start_time=$exam_start['0']['updated_on'];
                    }
                    else
                    {
                      $j=$i-1;
                     $start_time=$exam_result[$j]['date_time'];

                    }
                   
                      $end_time=$exam_result[$i]['date_time'];
                      $datetime1 = new DateTime($end_time);
                      $datetime2 = new DateTime($start_time);
                      $interval = $datetime1->diff($datetime2);
                      $elapsed = $interval->format('%i minutes %s seconds');
                      // echo $elapsed;?>
                       <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $exam_result[$i]['question']; ?></td>
                      <td><?php echo $exam_result[$i]['level']; ?></td>
                      <td><?php if ($exam_result[$i]['correct_status']=='Yes') {
                        echo "Correct";
                      }elseif ($exam_result[$i]['correct_status']=='No') {
                         echo "Wrong";
                      }  ?></td>
                      
                      <td><?php echo $elapsed; ?></td>
                     
                  </tr>
                 <?php  }
                  
                  // $exam_res = getExamResultByID($js_id,$job_id); 
                  ?>
              </tbody>
          </table>




