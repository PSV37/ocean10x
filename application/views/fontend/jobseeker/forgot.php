<?php 
    $this->load->view('fontend/layout/header.php');
?> 


<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Seeker Password Recovery</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Password</span></div>
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
          	
          <h5>Jobseeker Forgot Password</h5>
          <!-- login form -->
           <form class="submit-form customform forgotform" action="<?php echo base_url() ?>register/forgot_pass" method="post">
           <?php echo $this->session->flashdata('verify_msg'); ?>
           <?php echo $this->session->flashdata('invalid'); ?>
          <div class="formpanel">
            <div class="formrow">
              <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            
            
            <input type="submit" class="btn" value="Retrieve Password">
          </div>
           </form>
          <!-- login form  end--> 

          
        </div>
      </div>
    </div>
  </div>
</div>




               
              <!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>