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
                        <div class="userccount">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive job-table">
                                            <table id="mytable" class="table table-bordred table-striped">

                                                <thead>
                                                    <tr>
                                                    <th>Job Title</th>
                                                    <th>Company Name</th>
                                                    <th>Expected Salary</th>
                                                    <th>Applied Date</th>
                                                    <th>Employer Activity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               <?php if (!empty($applicationlist)): foreach ($applicationlist as $applicaiton) : ?>
                                                    <tr>
                                                        <td>
                                                            <h4>
                                                            <a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton->job_post_id) ?>"><?php echo $this->job_posting_model->job_title_by_name($applicaiton->job_post_id); ?></a><br>
                                                         
                                                            </h4>
                                                        </td>
                                                         <td> <?php echo $this->company_profile_model->company_name($applicaiton->company_id); ?></td>
                                                         <td> <?php echo $applicaiton->expected_salary; ?> TK.</td>
                                                         <td> <?php echo date('F j, Y',strtotime($applicaiton->apply_date));  ?></td>
                                                       
                                                        <td>
                                                         <?php
                                          if($applicaiton->apply_status == 0)
                                        { ?>
                                            <span class="label label-warning"><?php echo 'Not Sorted' ?></span>
                                        <?php } elseif($applicaiton->apply_status == 1) { ?>
                                            <span class="label label-primary"><?php echo 'Sorted' ?></span>
                                       <?php } elseif($applicaiton->apply_status == 2) { ?>
                                            <span class="label label-primary"><?php echo 'Interview' ?></span>
                                         <?php } elseif($applicaiton->apply_status == 3) { ?>
                                            <span class="label label-primary"><?php echo 'Final' ?></span>
                                        <?php } ?>
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
                                        </div><!-- end table -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end post-padding -->
                            
                        <!-- </div> -->

              <!-- <div class="col-md-12 col-sm-12 col-xs-12"> -->
                <div class="x_panel">
                  <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Send Applicaitons</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Forwarded Applicaitons</a>
                    </li>
                  </ul>
                <div class="x_content">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">

                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_title">
                          <h2>Recent Applied Job Applicaiton List</h2>
                          <div class="clearfix"></div>
                        </div>
                      <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Send By</th>
                              <th>Message</th>
                              <th>Attachment</th>
                              <th>Date And Time</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                        <small>*Note: Applications in this tab only appeas when you apply for any job from site. </small>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <div class="x_title">
                          <h2>Recent Received Job Applicaiton List</h2>
                          <div class="clearfix"></div>
                        </div>
                        <table id="myTable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Send By</th>
                              <th>Message</th>
                              <th>Attachment</th>
                              <th>Date And Time</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                        <small>*Note: All these applications send by Company or HR Consultant to you. </small>
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