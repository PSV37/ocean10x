<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                

<div class="section lb">
  <div class="container">
     <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
         <h5>Outbound Job Applications</h5>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Job Title</th>
              <th>Company Name</th>
              <th>Applied Date</th>
              <th>Employer Activity</th>
              <?php if(EXAM_RESULT_SHOW ==1){ ?>
              <th>Exam Result</th>
              <?php } ?>
              <th>Exam</th>
              <th>Schedule Interview</th>
            </tr>
          </thead>
          <tbody>
          <?php
             $sr_no=0;
             
           if (!empty($applicationlist)): foreach ($applicationlist as $applicaiton) : $sr_no++; ?>
            <tr>
              <td><?php echo $sr_no; ?></td>
              <td>
                <h4>
                  <a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton->job_post_id) ?>"><?php echo $this->job_posting_model->job_title_by_name($applicaiton->job_post_id); ?></a><br>
                </h4>
              </td>
              <td><?php echo $this->company_profile_model->company_name($applicaiton->company_id); ?></td>
              <td><?php echo date('M j, Y',strtotime($applicaiton->apply_date));  ?></td>
              <td>
                <?php
                  if($applicaiton->apply_status == 0)
                    { 
                ?>
                    <span class="label label-warning"><?php echo 'Not Sorted' ?></span>
                  <?php } elseif($applicaiton->apply_status == 1) { ?>
                    <span class="label label-primary"><?php echo 'Sorted' ?></span>
                  <?php } elseif($applicaiton->apply_status == 2) { ?>
                    <span class="label label-primary"><?php echo 'Interview' ?></span>
                  <?php } elseif($applicaiton->apply_status == 3) { ?>
                    <span class="label label-primary"><?php echo 'Final' ?></span>
                <?php } ?>
              </td>
              <?php if(EXAM_RESULT_SHOW ==1){ ?>
                <td><a href="<?php echo base_url(); ?>job/all-results/<?php echo $applicaiton->job_post_id; ?>" class="btn btn-success btn-xs">View Result</a></td>
               <?php }?>

              <td>
              <?php $job_deadline = $this->job_posting_model->job_deadline($applicaiton->job_post_id); 
                if ($job_deadline > date('Y-m-d')){
              ?>

              <?php
                $is_exam_required = getExamRequired($applicaiton->job_post_id);

               if($is_exam_required['is_test_required'] =='Yes')
                {
                  if($applicaiton->is_test_done == 0)
                  { 
              ?>
                  <a href="<?php echo base_url(); ?>exam/index/<?php echo base64_encode($applicaiton->job_post_id); ?>" class="btn btn-success btn-xs">Give Exam</a>
              <?php }else if($applicaiton->is_test_done == 2)
                    { 
              ?>
                <a href="<?php echo base_url(); ?>exam/restart_exam/<?php echo base64_encode($applicaiton->job_post_id); ?>" class="btn btn-success btn-xs">Restart Exam</a>
              <?php
                } else{
                      echo "<span class='label label-primary'>Done</span>";
                    } 
                }else{
                  echo "<span class='label label-info'>Not Required</span>";
                }
              }else{
                echo "<span class='label label-danger'>Job Expired</span>";
              }

              ?>
              </td>

              </td>
              <td>
                <a href="<?php echo base_url(); ?>job/all-scheduled-interviews/<?php echo $applicaiton->job_post_id; ?>" class="btn btn-success btn-xs">View Interviews</a>
              </td>
            
              
            </tr>
            <?php
              endforeach;
            ?>
            <?php else : ?> 
            
                <td colspan="7">
                    <strong>There is no data to display</strong>
                </td><!--/ get error message if this empty-->
              
            <?php endif; ?>
          </tbody>
        </table>
                          
      </div>
    </div> <!--end row -->
  </div><!-- end container -->
</div><!-- end section -->
  
<?php $this->load->view("fontend/layout/footer.php"); ?>