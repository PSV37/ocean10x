<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <style>
   body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
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
}

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
            <div class="col-md-6 col-sm-12">
              <input type="text" name="search_people" id="search_people" placeholder="Search People..">
            </div>
             <?php echo $this->session->flashdata('change_password'); ?>
              <form id="submit" class="submit-form" action="<?php echo base_url(); ?>job_seeker/change_password" method="post">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <label class="control-label">Current Password </label>
                    <input type="password" name="oldpassword" class="form-control" placeholder="Type your current password">
                      <br>
                    <label class="control-label">New Password</label>
                    <input type="password" name="newpassword" class="form-control" placeholder="Type your new password">
                      <br>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                  </div>
                </div>
              </form>
            </div><!-- end post-padding -->
          </div>
        </div>

        <button class="open-button" onclick="openForm()">Message</button>

        <div class="chat-popup" id="myForm">
          <form action="/action_page.php" class="form-container">
            <h1>Message</h1>

            <label for="msg"><b>Message</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>

            <button type="submit" class="btn">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
        </div>

       
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
  $(function() {
      $("#search_people").autocomplete({
          source: "<?php echo base_url('job_seeker/get_autocomplete'); ?>",
          select: function(a,b)
            {
              $(this).val(b.item.value); //grabed the selected value
            }
        });
    });
</script>
