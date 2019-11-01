<?php 

  $company_profile_id = $this->session->userdata('company_profile_id');
 $jobseeker_id = $this->session->userdata('job_seeker_id');
        if ($company_profile_id != null) {
             $this->load->view('fontend/layout/employer_header.php');
            }
        elseif($jobseeker_id != null) {
             $this->load->view('fontend/layout/seeker_header.php');
        } else {
    $this->load->view('fontend/layout/header.php');
    }
?>  
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Apply Online</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Apply Online</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->


<div class="section lb">
  <div class="container">
      <div class="row">
          <div class="content col-md-8 col-sm-8">
                 
            <div class="userccount">
              <div class="formpanel">
                <?php if ($jobseeker_id !=null): ?>
                <form  action="<?php echo base_url() ?>/job/apply_job" method="post" class="form-horizontal">

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">User Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder=""
                       value="<?php echo $this->Job_seeker_model->jobseeker_name($jobseeker_id); ?>">
                    </div>
                  </div>
                  <input type="hidden" name="job_seeker_id" value="<?php echo $jobseeker_id ?>">
                  <input type="hidden" name="job_post_id" value="<?php echo $singlejob->job_post_id; ?>">

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Company Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder=""
                       value="<?php
                       $company_id=$singlejob->company_profile_id;
                             echo $this->company_profile_model->company_name($company_id);
                           ?>">
                    </div>
                  </div>
                 <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email"> Expected Salary:</label>
                    <div class="col-sm-9">
                      <input type="text" name="expected_salary" required class="form-control" id="avaliable" placeholder="Expected Salary"
                       >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-9">
                      <button type="submit" class="btn btn-default">Apply Now</button>
                    </div>
                  </div>
                </form>

                <?php else : ?>
                <form action="<?php echo base_url() ?>jobapply/check_login" method="post" class="form-horizontal">
                  <div class="form-group">
                  <?php echo $this->session->flashdata('verify_msg'); ?>
                        <?php echo $this->session->flashdata('invalid'); ?>
                    <label class="control-label col-sm-3" for="email">Company Name:</label>
                    <div class="col-sm-9">
                      <input type="email" disabled class="form-control" id="company_name" value="<?php
                                   $company_id=$singlejob->company_profile_id;
                                         echo $this->company_profile_model->company_name($company_id);
                                       ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="pwd">Email:</label>
                    <div class="col-sm-9">
                      <input type="email" name="email" class="form-control" required id="pwd" placeholder="Enter Email">
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="control-label col-sm-3" for="pwd">Password:</label>
                    <div class="col-sm-9">
                      <input type="password" name="password" required class="form-control" id="pwd" placeholder="Enter password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-9">
                      <button type="submit" class="btn btn-default">Apply Now</button>
                    </div>
                  </div>
                </form>
                <?php endif; ?>
              </div>
            </div>
          </div><!-- end col -->

        <div class="col-md-4 col-sm-4">
        <?php $ads_right = get_ads('rightside');
          if($ads_right): foreach($ads_right as $row_right):?>
          <div class="adbanner2"><a href="<?php echo $row_right->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$row_right->ad_image); ?>" alt=""></a></div>
          <?php endforeach; endif;?>
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>