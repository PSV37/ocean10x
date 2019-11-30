<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
   <style>
.cont {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  /*margin-right: 350px;*/
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
  /*margin: 0px 0px 10px 350px;*/

}

.cont::after {
  content: "";
  clear: both;
  display: table;
}

.cont img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.cont img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>         
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <h5>Chat Messages</h5>
        
         <?php 
            $jobseeker_id   = $this->session->userdata('job_seeker_id');
           
              if(!empty($message_data))
              foreach($message_data as $msg_his)
                {
                  $dt =$msg_his['created_on'];
                  $month = date("M-d", strtotime($dt));
                  $time = date("h:i A",strtotime($dt));
                  $eid =$msg_his['created_by'];
          ?>
            <div class="cont">
              <strong><?php echo $this->Job_seeker_model->jobseeker_name($msg_his['created_by']); ?></strong>
              <span class="time-right"><?php echo $month.' At '. $time; ?></span>
              <p><?php echo $msg_his['message_desc']; ?></p>
            </div>
          
          <?php } ?>
      </div>
    </div> <!--end row -->
  </div><!-- end container -->
</div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>