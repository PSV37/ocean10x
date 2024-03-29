<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
            

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <h5>Ocean Champ Exam Result's </h5>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Skill Title</th>
              <th>Topics</th>
              <th>Exam Level</th>
              <th>Total Questions</th>
              <th>Attended Questions</th>
              <th>Total Marks</th>
              <th>Exam Result</th>
              <th>Exam Date</th>
              <th>Performance</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
           $jobseeker_id = $this->session->userdata('job_seeker_id');
            $sr_no=0;
           if (!empty($final_result)): foreach ($final_result as $result) : $sr_no++; 

              $skill_id = $result['skill_id'];
             
              $exam_res = getOceanExamResultByID($jobseeker_id,$skill_id); 

              $exam_topic = getOceanExamTopicByID($result['topic_id']); 
              // echo "<pre>";
              // print_r($exam_topic);
              if (!empty($exam_res)): foreach ($exam_res as $res_row) :
              $marks = $res_row['total_marks']; 
              $percentage = ($marks * 100)/NUMBER_QUESTIONS;

            ?>

            <tr>
              <td><?php echo $sr_no; ?></td>
              <td>
               <?php echo $result['skill_name']; ?>
              </td>
              <td>
              <?php
                if (!empty($exam_topic)){ 
                  foreach ($exam_topic as $top_row) { 
                    echo  $top_row['topic_name'].', '; 
                  } 
                } 
              ?>
              </td>
              <td><?php echo $result['level']; ?></td>
              <td><?php echo NUMBER_QUESTIONS; ?></td>
              <td><?php echo $res_row['total_questions']; ?></td>
              <td><?php echo $res_row['total_marks']; ?></td>
              <td>
               <?php echo round($percentage, 2).'%'; ?>
              </td>
              <td><?php echo date('M j, Y',strtotime($result['created_on']));  ?></td>
              <td>
                <?php
                   $per = round($percentage, 2).'%'; 
                   if($per<=25)
                   {
                      echo '<span class="label label-danger">Average</span>';
                   }
                   else if($per > 25 && $per <= 50)
                   {
                      echo '<span class="label label-warning">Good</span>';
                   } else if($per > 50 && $per <= 75)
                   {
                      echo '<span class="label label-info">Very Good</span>';
                   }
                   else if($per > 75 && $per <= 100)
                   {
                      echo '<span class="label label-success">Excelent</span>';
                   }
                ?>
              </td>
            </tr>
            <?php
              endforeach;
              endif; 
              endforeach;
            ?>
            <?php else : ?> 
              <td colspan="7">
                  <strong>There is no data to display</strong>
              </td>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div> <!--end row -->
  </div><!-- end container -->
</div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>