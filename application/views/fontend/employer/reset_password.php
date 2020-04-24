<?php 
    $this->load->view('fontend/layout/header.php');
?> 


 <script> 
          
            // Function to check Whether both passwords 
            // is same or not. 
            function checkPassword(form) { 
                password1 = form.password.value; 
                password2 = form.confirm_password.value; 
  
                // If password not entered 
                if (password1 == '') 
                    alert ("Please enter Password"); 
                      
                // If confirm password not entered 
                else if (password2 == '') 
                    alert ("Please enter confirm password"); 
                      
                // If Not same return False.     
                else if (password1 != password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 
  
                // If same return True. 
                else{ 
                    // alert("Password Match: Welcome to GeeksforGeeks!") 
                    return true; 
                } 
            } 
        </script> 





<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Employer Reset Password</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Reset Account</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 


<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          	
          <h5>Please enter new password</h5>
          <!-- login form -->
           <form class="submit-form customform loginform" action="" method="post" onSubmit = "return checkPassword(this)">
           <?php echo $this->session->flashdata('verify_msg'); ?>
           <?php echo $this->session->flashdata('invalid'); ?>
          <div class="formpanel">
            
            <div class="formrow">
              <input name="password" type="password" id="myInput" class="form-control" placeholder="Password" min="5" required><?php echo form_error('password'); ?>
             

            </div>

            <div class="formrow">
              <input name="confirm_password" type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" min="5" required>
              <input type="checkbox" onclick="myFunction()">Show Password

            </div>
            <div class="formrow"></div>
            <button class="btn btn-primary" type="submit">Reset Password</button>
            <!-- <input type="submit" class="btn" value="Reset Password"> -->
          </div>
           </form>
          <!-- login form  end--> 
          
         <!-- sign up form -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="<?php echo base_url() . 'employer_register' ?>">Register Here</a></div>
          <!-- sign up form end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>

<script>
   function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
 </script>


               
              <!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>