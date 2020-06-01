<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                

<div class="section lb">
  <div class="container">
     <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <h5>Saved Job Searches in the Ocean</h5>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Job Title</th>
              <th>Company Name</th>
              <th>Location</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
             $sr_no=0;
            
           if (!empty($saved_job_data)): foreach ($saved_job_data as $applicaiton) : $sr_no++;
            ?>
            <tr>
              <td><?php echo $sr_no; ?></td>
              <td>
                <h4>
                  <a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton['job_post_id']) ?>"><?php echo $this->job_posting_model->job_title_by_name($applicaiton['job_post_id']); ?></a><br>
                </h4>
              </td>
              <td><?php echo $this->company_profile_model->company_name($applicaiton['company_profile_id']); ?></td>
              <td><?php echo $applicaiton['city_name'];  ?></td>
              <!-- <td><?php echo date('M j, Y',strtotime($applicaiton['created_on']));  ?></td> -->
              
              <td>
                <a href="<?php echo base_url(); ?>job/show/<?php echo $applicaiton['job_slugs']; ?>" class="btn btn-success btn-xs">Apply</a>
                <a href="<?php echo base_url(); ?>job/delete_saved_job/<?php echo $applicaiton['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this saved job?');">Delete</a>
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