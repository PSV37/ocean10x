<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Exam Instruction</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#">Home</a> / <span>Exam Instruction</span></div>
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
                  <form id="submit" class="submit-form" action="<?php echo base_url(); ?>exam/ocean_exam_start/<?php if(!empty($skill))echo base64_encode($skill); ?>" method="post">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <label>Instruction:</label> 
                          <ul>
                            <li>This is a FREE online test. DO NOT pay money to anyone to attend this test.</li>
                            <li>All Questions are compulsory.</li>
                            <li>Total number of questions : 10.</li>
                            <li>Time alloted : 30 minutes.</li>
                            <li>Each question carry 1 mark, no negative marks.</li>
                            <li>DO NOT refresh the page.</li>
                            <li>All the best.</li>
                          </ul>
                          <button type="submit" class="btn btn-primary pull-right">Start Test</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div><!-- end post-padding -->
            <div class="content col-md-2"></div>
          </div><!-- end col -->
        </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>