<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Active Jobs</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Active Jobs</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->             

          <div class="section lb">
                <div class="container">
                   <div class="row">
                    <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
                    <div class="content col-md-9">
         
                    <div class="x_panel">
                      <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">My Applied Jobs</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">My Job Invitations</a>
                        </li>
                      </ul>
                    <div class="x_content">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">

                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="x_title">
                              <div class="clearfix"></div>
                            </div>
                            <table id="mytable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Sr.No</th>
                                  <th>Job Title</th>
                                  <th>Company Name</th>
                                  <th>Expected Salary</th>
                                  <th>Applied Date</th>
                                  <th>Employer Activity</th>
                                  <?php if(EXAM_RESULT_SHOW ==1){ ?>
                                  <th>Exam Result</th>
                                  <?php } ?>
                                  <th>Exam</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                 $sr_no=0;
                               if (!empty($applicationlist)): foreach ($applicationlist as $applicaiton) : $sr_no++; ?>
                                <tr>
                                    <?php if ($singlejob->job_deadline > date('Y-m-d')){ echo "s"} else{ echo 'n'; }?>
                                  <td><?php echo $sr_no; ?></td>
                                  <td>
                                    <h4>
                                      <a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton->job_post_id) ?>"><?php echo $this->job_posting_model->job_title_by_name($applicaiton->job_post_id); ?></a><br>
                                    </h4>
                                  </td>
                                  <td><?php echo $this->company_profile_model->company_name($applicaiton->company_id); ?></td>
                                  <td><?php echo $applicaiton->expected_salary; ?></td>
                                  <td><?php echo date('F j, Y',strtotime($applicaiton->apply_date));  ?></td>
                                  <td>
                                    <?php
                                      if($applicaiton->apply_status == 0)
                                        { 
                                    ?>
                                        <span class="label label-warning"><?php echo 'Not Sorted' ?></span>
                                      <?php } elseif($applicaiton->apply_status == 1) { ?>
                                        <span class="label label-primary"><?php echo 'Sorted' ?></span>
                                      <?php } elseif($applicaiton->apply_status == 2) { ?>
                                        <span class="label label-primary"><?php echo 'Interview' ?></span>
                                      <?php } elseif($applicaiton->apply_status == 3) { ?>
                                        <span class="label label-primary"><?php echo 'Final' ?></span>
                                    <?php } ?>
                                    

                                  </td>
                                  <?php if(EXAM_RESULT_SHOW ==1){ ?>
                                    <td><a href="<?php echo base_url(); ?>job/all-results/<?php echo $applicaiton->job_post_id; ?>" class="btn btn-success btn-xs">View Result</a></td>
                                   <?php }?>

                                  <td>
                                  <?php
                                    $is_exam_required = getExamRequired($applicaiton->job_post_id);

                                   if($is_exam_required['is_test_required'] =='Yes')
                                    {
                                      if($applicaiton->is_test_done == 0)
                                      { 
                                  ?>
                                      <a href="<?php echo base_url(); ?>exam/index/<?php echo base64_encode($applicaiton->job_post_id); ?>" class="btn btn-success btn-xs">Give Exam</a>
                                  <?php }else if($applicaiton->is_test_done == 2)
                                        { 
                                  ?>
                                    <a href="<?php echo base_url(); ?>exam/restart_exam/<?php echo base64_encode($applicaiton->job_post_id); ?>" class="btn btn-success btn-xs">Restart Exam</a>
                                  <?php
                                    } else{
                                          echo "<span class='label label-primary'>Done</span>";
                                        } 
                                    }else{
                                      echo "<span class='label label-info'>Not Required</span>";
                                    }

                                  ?>
                                  </td>
                                  
                                </tr>
                                <?php
                                  endforeach;
                                ?>
                                <?php else : ?> 
                                  <td colspan="8">
                                      <strong>There is no data to display</strong>
                                  </td><!--/ get error message if this empty-->
                                <?php endif; ?>
                              </tbody>
                            </table>
                            <small>*Note: Jobs in this tab only appears when you apply for any job from site.</small>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <div class="x_title">
                              <div class="clearfix"></div>
                            </div>
                            <table id="myTable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Sr.No</th>
                                  <th>Job Title</th>
                                  <th>Company Name</th>
                                  <th>Expected Salary</th>
                                  <th>Applied Date</th>
                                  <th>Employer Activity</th>
                                  <?php if(EXAM_RESULT_SHOW ==1){ ?>
                                    <th>Exam Result</th>
                                  <?php } ?>
                                  <th>Exam</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $sr_no=0;
                               if (!empty($forward_applicationlist)): foreach ($forward_applicationlist as $forward_applicaiton) : $sr_no++; ?>
                                <tr>
                                  <td><?php echo $sr_no; ?></td>
                                  <td>
                                    <h4>
                                      <a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($forward_applicaiton->job_post_id) ?>"><?php echo $this->job_posting_model->job_title_by_name($forward_applicaiton->job_post_id); ?></a><br>
                                    </h4>
                                  </td>
                                  <td><?php echo $this->company_profile_model->company_name($forward_applicaiton->company_id); ?></td>
                                  <td><?php echo $forward_applicaiton->expected_salary; ?></td>
                                  <td><?php echo date('F j, Y',strtotime($forward_applicaiton->apply_date));  ?></td>
                                  <td>
                                    <?php

                                      if($forward_applicaiton->apply_status == 0)
                                        { 
                                    ?>
                                        <span class="label label-warning"><?php echo 'Not Sorted' ?></span>
                                      <?php } elseif($forward_applicaiton->apply_status == 1) { ?>
                                        <span class="label label-primary"><?php echo 'Sorted' ?></span>
                                      <?php } elseif($forward_applicaiton->apply_status == 2) { ?>
                                        <span class="label label-primary"><?php echo 'Interview' ?></span>
                                      <?php } elseif($forward_applicaiton->apply_status == 3) { ?>
                                        <span class="label label-primary"><?php echo 'Final' ?></span>
                                    <?php } ?>
                                   
                                  </td>
                                  <?php if(EXAM_RESULT_SHOW ==1){ ?>
                                  <td>
                                    <a href="<?php echo base_url(); ?>job/all-results/<?php echo $forward_applicaiton->job_post_id; ?>" class="btn btn-success btn-xs">View Result</a>
                                  </td>
                                  <?php }?>
                                  
                                  <td>
                                  <?php
                                   $is_exam_required = getExamRequired($forward_applicaiton->job_post_id);

                                   if($is_exam_required['is_test_required'] =='Yes')
                                    {
                                      
                                      if($forward_applicaiton->is_test_done == 0)
                                        { 
                                  ?>
                                    <a href="<?php echo base_url(); ?>exam/index/<?php echo base64_encode($forward_applicaiton->job_post_id); ?>" class="btn btn-success btn-xs">Give Exam</a>
                                  <?php }else if($forward_applicaiton->is_test_done == 2)
                                        { 
                                  ?>
                                    <a href="<?php echo base_url(); ?>exam/restart_exam/<?php echo base64_encode($forward_applicaiton->job_post_id); ?>" class="btn btn-success btn-xs">Restart Exam</a>
                                  <?php
                                    }
                                    else{
                                          echo "<span class='label label-primary'>Done</span>";
                                        } 
                                    }else{
                                      echo "<span class='label label-info'>Not Required</span>";
                                    }
                                  ?>
                                  </td>
                                
                                 
                                </tr>
                                <?php
                                  endforeach;
                                ?>
                                <?php else : ?> 
                                  <td colspan="8">
                                      <strong>There is no data to display</strong>
                                  </td><!--/ get error message if this empty-->
                                <?php endif; ?>
                              </tbody>
                            </table>
                            <small>*Note: Jobs in this tab only appears when Company or HR Consultant invite to you.</small>
                          </div>
                         
                        </div>
                      </div>
                    </div>
                </div>
              </div>

      </div> <!--end row -->
    </div><!-- end container -->
</div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>