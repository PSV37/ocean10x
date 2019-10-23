<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Exam Started</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#">Home</a> / <span>Exam Started</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

  <div class="section lb">
    <div class="container">
      <div class="row">
        <div class="content col-md-2"></div>
          <div class="content col-md-8">
            <div class="job-header">
              <div class="contentbox">
                <div class="formpanel">

                  <div id="nextshow">
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="userccount">
                             <h2 align="center">Thank You <span>!</span></h2> 
                              <p>Your test completed successfully this job . <br>
                                
                              <br>Please go to <a href="<?php echo base_url(); ?>">Home </a> or search something from search form.</p>
                              <div class="backtohome"><a href="<?php echo base_url(); ?>" class="btn btn-custom">Back to Home</a></div>
                          </div>
                        </div>
                      </div>
                    
                  </div>

                </div>
              </div>
            </div><!-- end post-padding -->
            <div class="content col-md-2"></div>
          </div><!-- end col -->
        </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>
 