<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 
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
                      <div class="col-md-12">
                        <div class="userccount">
                           <h2 align="center">Thank You <span>!</span></h2> 
                            <p>Your Test Submited successfully . <br>
                              
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
 