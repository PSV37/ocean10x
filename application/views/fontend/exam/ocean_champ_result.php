<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
            

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <h5>Inbound Job Invitations</h5>
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
              <!-- <th>Exam</th> -->
              
            </tr>
          </thead>
          <tbody>
          <?php
           $jobseeker_id = $this->session->userdata('job_seeker_id');
            $sr_no=0;
           if (!empty($final_result)): foreach ($final_result as $result) : $sr_no++; 

              $skill_id = $result['skill_id'];
             
              $exam_res = getOceanExamResultByID($jobseeker_id,$skill_id); 
              // echo "<pre>";
              // print_r($exam_res);
              if (!empty($exam_res)): foreach ($exam_res as $res_row) :
              $marks = $res_row['total_marks']; 
              $percentage = ($marks * 100)/NUMBER_QUESTIONS;

            ?>

            <tr>
              <td><?php echo $sr_no; ?></td>
              <td>
               <?php echo $result['skill_name']; ?>
              </td>
              <td><?php echo $result['topic_id']; ?></td>
              <td><?php echo $result['level']; ?></td>
              <td><?php echo NUMBER_QUESTIONS; ?></td>
              <td><?php echo $result['total_questions']; ?></td>
              <td><?php echo $res_row['total_marks']; ?></td>
              <td>
               <?php echo round($percentage, 2).'%'; ?>
              </td>
               <td><?php echo date('M j, Y',strtotime($result['created_on']));  ?></td>
            
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