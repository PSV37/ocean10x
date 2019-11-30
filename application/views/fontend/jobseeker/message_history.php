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
<!-- page content -->
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <<!-- div class="x_title">
          <h2>Message History</h2> 
            <ul class="nav navbar-right panel_toolbox">
              <a href="<?php echo base_url(); ?>seeker/instant-message"><button class="btn btn-primary btn-sm deal-value"><i class="fa fa-back"></i>Go To Back</button></a>
            </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"> -->
          <h2>Chat Messages</h2>
          <?php 
            $jobseeker_id    = $this->session->userdata('job_seeker_id');
           
              if(!empty($message_history))
              foreach($message_history as $msg_his)
                {
                  $dt =$msg_his['created_on'];
                  $month = date("M-d", strtotime($dt));
                  $time = date("h:i A",strtotime($dt));
                  $eid =$msg_his['created_by'];
          ?>
            <div class="cont">
              <strong><?php echo $msg_his['chat_js_id']; ?></strong>
              <span class="time-right"><?php echo $month.' At '. $time; ?></span>
              <p><?php echo $msg_his['message_desc']; ?></p>
            </div>
          
          <?php } ?>
        <!-- </div> -->
      </div>
    </div> <!--end row -->
  </div><!-- end container -->
</div><!-- end section -->

<!-- /page content -->
<?php $this->load->view("fontend/layout/footer.php"); ?>
