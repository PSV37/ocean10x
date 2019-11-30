<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>   
<style>
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
           
           if (!empty($saved_job_data)): foreach ($saved_job_data as $js_row) : $sr_no++; 

            ?>

            <tr>
              <td><?php echo $sr_no; ?></td>
              <td>
                <?php echo $this->Job_seeker_model->jobseeker_name($js_row['chat_js_id']); ?>
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
                <a href="#" class="btn btn-primary btn-xs" onclick="openForm(<?php echo $js_row['chat_js_id']; ?>)">Message</a>
                <a href="<?php echo base_url(); ?>seeker/message-history/<?php echo $js_row['chat_js_id']; ?>" class="btn btn-success btn-xs">View History</a>
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

 <div class="chat-popup" id="myForm">
  
    <form id="Career-info" class="form-container" action="<?php echo base_url('job_seeker/instant_message');?>" method="post">
    <!-- <h1>Message</h1> -->
    <input type="text" name="send_to" id="send_to">
    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="user_msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
  
 <?php $this->load->view("fontend/layout/footer.php"); ?>
 <script>
  function openForm(id) {
    $('#send_to').val(id);
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>