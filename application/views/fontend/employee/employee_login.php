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
           <form method="post" name="organization" action="">
           <p style="color:red;"><?php  $this->load->view('alert_message'); ?></p>	
          <div class="formpanel">
            <div class="formrow">
              <input type="email" name="txtUserName" id="txtUserName" class="form-control" placeholder="Enter your email">
            </div>
            <div class="formrow">
             <input type="password"  name="txtPassword" id="txtPassword" class="form-control" placeholder="Password">
            </div>
           
            <input type="submit" value="SignIn" name="submit" id="submit" class="btn btn-success btn-block"/>
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