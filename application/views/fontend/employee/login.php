<?php 
    $this->load->view('fontend/layout/header.php');
?>                
          
          <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Employee Login</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Employee Login</span></div>
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
          	
          <h5>Employee Login</h5>
          <!-- login form -->
           <form class="submit-form customform loginform" action="<?php echo base_url() ?>employee_login/check_login?redirect=<?php echo $this->input->get('redirect'); ?>" method="post">
           <?php echo $this->session->flashdata('emp_msg');; ?>
          <div class="formpanel">
            <div class="formrow">
              <input type="text" class="form-control" name="email" placeholder="Email Address">
            </div>
            <div class="formrow">
              <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="formrow">                          	
              <a href="<?php echo base_url() . 'employee_login/forgot_pass' ?>">Forgot Password?</a>              
            </div>
            <input type="submit" class="btn" value="Login Account">
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