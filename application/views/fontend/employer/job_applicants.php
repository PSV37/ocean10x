<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                
             

          <div class="section lb">
                <div class="container">
                   <div class="row">
                     <?php $this->load->view('fontend/layout/employer_left.php'); ?>

                        <div class="content col-md-9">
                        <div class="post-padding">
                                <div class="job-title nocover hidden-sm hidden-xs"><h5>Manage Jobs</h5></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive job-table">
                                            <table id="mytable" class="table table-bordred table-striped">

                                                <thead>
                                                    <tr>
                                                    <th>Job Title</th>
                                                    <th>Applicant Name</th>
                                                    <th>Applicant Email</th>
                                                    <th>Applicant CV Link</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                               <?php if (!empty($applicants)): foreach ($applicants as $applicant) : ?>
                                                    <tr>

                                     
                                                        <td>

                                                            <h4>
                                                            <a href="#"><?php  echo $this->job_posting_model->job_title_by_name($applicant->job_post_id); ?></a>
                                                            </h4>
                                                        </td>
                                                        <td><?php echo $data= $this->job_seeker_model->get_jobseeker_fullname($applicant->job_seeker_id); ?></td>

                                                        <td><?php echo $data= $this->job_seeker_model->get_jobseeker_email($applicant->job_seeker_id); ?></td>

                                                        <td><a class="btn btn-info btn-xs" href=" <?php echo base_url(); ?>employer/view_cv/<?php echo $applicant->job_seeker_id .'/'. $applicant->job_post_id; ?>">Resume Link</a></td>
                                                        <td>Active</td>
                                                        <td>
                                                        <!--  -->
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
                        </div>

                </div> <!--end row -->
                </div><!-- end container -->
            </div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>