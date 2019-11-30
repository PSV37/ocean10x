<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <style>
  /*use-itty-bitty-template*/
  /*.formpanel {background: #ececec;}*/
  h1, h2, h4, h5 {
    /*border-bottom: 1px solid #ccc;*/
    /*color: #3F51B5;*/
    padding-bottom: 10px
  }

  .listFlex {display: flex; /*justify-content: center;*/}

  
  .career{
    border-radius: 6px;
    /*background: #cbced247;*/
    margin: 2px;
    padding: 15px;
  }
  .tag_line{
    text-align: unset !important;
  }
  .title-career{
    font-size: 20px;
    font-style: bold;
  }

 /* .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}*/

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="job-header">
          <div class="contentbox">
            <div class="formpanel">
             
              <?php echo $this->session->flashdata('con_message'); ?>
                <h2 align="center">Personal Profile</h2>
                <?php if(!empty($intro_data['photo_path'])){ ?>
                <img src="<?php echo base_url() ?>upload/<?php echo $intro_data['photo_path'];?>" alt="profile-picture" border="0" class="img img-thumbnail" style="width: 20%;">
              <?php }else{ ?>
                 <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" border="0" alt="profile-picture" class="img img-thumbnail" style="width: 20%;">
              <?php } ?>
              <div class="row">
                <div class="col-md-8">
                  <h3><?php echo $intro_data['full_name']; ?> </h3>
                  <p><?php echo $personal_data['city_name'].', '.$personal_data['state_name'].', '.$personal_data['country_name']; ?></p>
                </div>
                <div class="col-md-4">
                <?php   
                 $jobseeker_id   = $this->session->userdata('job_seeker_id');
                  if (!empty($connect_data)) {

                    if($connect_data['connect_status']==0){
                      echo $connect_data['created_by'];
                      if($connect_data['created_by']!=$jobseeker_id)
                        {
                ?>
                  <a href="#" class="btn btn-primary" disabled>Awaiting</a>

                <?php }else{ ?>
                   <a href="#" class="btn btn-primary">Accept</a>
                <?php } }else if($connect_data['connect_status']==1){ ?>
                  <a href="#" class="btn btn-primary" onclick="openForm(<?php echo $intro_data['job_seeker_id']; ?>)">Message</a>
                <?php }else{
                ?>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#connect" onclick="$('#js_id').val(<?php echo $intro_data['job_seeker_id']; ?>);">Connect</a>
                <?php
                } }else{?>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#connect" onclick="$('#js_id').val(<?php echo $intro_data['job_seeker_id']; ?>);">Connect</a>
                <?php } ?>
                  
                </div>
              </div>
                <hr>
                 <h4>About Me</h4>
                 <p><?php echo $intro_data['about_me']; ?></p>
                <hr>
                 <h4>Skills</h4>
                 <div class="listFlex">
                  <?php if (!empty($skill_data)): foreach ($skill_data as $sk_row) : ?>
                      <div>
                        <ul>
                          <li><?php echo $sk_row['skills']; ?></li>
                        </ul>
                      </div>
                  <?php endforeach;  ?>
                  <?php else : ?> 
                    <div>
                      <strong>There is no data to display</strong>
                    </div>
                  <?php endif; ?>
                 </div>
                  <hr>
                 <h4>Experience</h4>
                  <div class="row career">
                    <?php if (!empty($exp_data)): foreach ($exp_data as $exp_row) : 
                      if($exp_row->end_date!='') {
                      $end =  date('M Y', strtotime($exp_row->end_date));
                     }else{
                       $end = "Present";
                     }
                      ?>
                    <div class="col-md-12">
                      <div class="col-md-1"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                      <div class="col-md-11">
                        <sapn class="title-career"><b><?php echo $exp_row->designation_name.' ('.$exp_row->department_name.')'; ?></b></sapn> <br>
                        <span><?php echo $exp_row->company_profile_id; ?></span><br>
                        <p class="tag_line"><?php echo date('M Y', strtotime($exp_row->start_date)).' - '.$end; ?></p>
                        <p class="tag_line"><?php echo $exp_row->address; ?></p><br>
                        <p class="tag_line"><?php echo $exp_row->responsibilities; ?></p><hr>
                      </div>
                    </div>
                  <?php endforeach;  ?>
                  <?php else : ?> 
                    <div>
                      <strong>There is no data to display</strong>
                    </div>
                  <?php endif; ?>
                  </div>


                 <!-- Catch me on Twitter - <a href="https://twitter.com/DanEnglishby">@DanEnglishby</a> -->
                 <hr>
            </div><!-- end post-padding -->
          </div>
        </div>

       
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->
 <div class="chat-popup" id="myForm">
  
    <form id="Career-info" class="form-container" action="<?php echo base_url('job_seeker/instant_message');?>" method="post">
    <!-- <h1>Message</h1> -->
    <input type="hidden" name="send_to" id="send_to">
    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="user_msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<!-- Modal -->
<div id="connect" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">You can customize this invitation</h4>
      </div>
      <div class="modal-body">
        <form id="Career-info" class="form-horizontal" action="<?php echo base_url('job_seeker/connection_request');?>" method="post">
          <input type="hidden" name="js_id" id="js_id" value="">
          
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Message</label>
            <div class="col-sm-9">
              <textarea class="form-control" name='message' placeholder="Enter message"></textarea>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
            
        </form>
      </div>
    
    </div>
  
  </div>
</div>

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 
 <script>
  $(document).ready (function(){
    $("#con_message").fadeTo(2000, 500).slideUp(500, function(){
    $("#con_message").slideUp(500);
    });   
  });
 </script>
 <script>
  function openForm(id) {
    $('#send_to').val(id);
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>