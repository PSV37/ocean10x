<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                

<div class="section lb">
  <div class="container">
     <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Job Title</th>
              <th>Company Name</th>
              <th>Saved Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
             $sr_no=0;
             print_r($saved_job_data);
           if (!empty($saved_job_data)): foreach ($saved_job_data as $applicaiton) : $sr_no++;
              echo 'dasd'.$applicaiton['job_post_id'];
                echo $applicaiton->job_post_id;
            ?>
            <tr>
              <td><?php echo $sr_no; ?></td>
              <td>
                <h4>
                  <a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton->job_post_id) ?>"><?php echo $this->job_posting_model->job_title_by_name($applicaiton->job_post_id); ?></a><br>
                </h4>
              </td>
              <td><?php echo $this->company_profile_model->company_name($applicaiton->company_profile_id); ?></td>
              <td><?php echo date('M j, Y',strtotime($applicaiton->created_on));  ?></td>
              
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