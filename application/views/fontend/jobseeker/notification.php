<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
            
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <h5>Instant Messages</h5>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Name</th>
              <th>Message</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sr_no=0;
            $jobseeker_id   = $this->session->userdata('job_seeker_id');
           if (!empty($notification_data)): foreach ($notification_data as $js_row) : $sr_no++; 

            ?>

            <tr>
              <td><?php echo $sr_no; ?></td>
              <td>
                <?php echo $js_row['full_name']; ?>
              </td>
               <td>
              <?php
               // echo $js_row['message_desc']; 
                $message = $js_row['message_desc'];
                if(strlen($message)>100)
                  {
                    echo substr($message, 0, 100);
                   echo '...';  
                  }else{echo $message; }
              ?>
              </td>
            
              <td>
                <a href="<?php echo base_url();?>confirm_interview/accept_invitation?apply_id=<?php echo base64_encode($jobseeker_id); ?>&connection_id=<?php echo base64_encode($js_row['created_by']); ?>" class="btn btn-primary" value="Accept" align="center">Accept</a>
              </td>
              
             
            </tr>
            <?php
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