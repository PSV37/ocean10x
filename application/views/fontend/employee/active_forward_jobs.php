<?php 
    $this->load->view('fontend/layout/employee_header.php');
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
        <?php $this->load->view('fontend/layout/employee_left.php'); ?>
            <div class="content col-md-9">
            <h2>Posted Jobs</h2>
                <ul class="myjobslist">
            		<?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
                    <li>
                        <div class="row">
                            <div class="col-md-4">
                                <h4><a href="<?php echo base_url(); ?>job/show/<?php echo $v_companyjobs->job_slugs; ?>"><?php echo $v_companyjobs->job_title; ?></a></h4>
                               
                               <div class="posted"><strong>Published:</strong> <?php if(!is_null($v_companyjobs->created_at)) { echo date('F j Y',strtotime($v_companyjobs->created_at)); } ?></div>
                               <div class="posted"><strong>Deadline:</strong> 
            				    <!-- <?php echo $v_companyjobs->job_deadline; ?> -->
                                <?php if(!is_null($v_companyjobs->job_deadline)) { echo date('F j Y',strtotime($v_companyjobs->job_deadline)); } ?>
                               </div>

                               <div class="posted"><strong>Job Status:</strong>
                                <?php 
                                    if ($v_companyjobs->job_deadline > date('Y-m-d')){
                                        // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
                                        echo '<span class="label label-success">Live</span>';
                                    }
                                    else {
                                        // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
                                        echo '<span class="label label-danger">Expired</span>';
                                    }
                                ?>
                               </div>
                                
                            </div>
                           
                            <div class="col-md-2">
                            	<div class="jobpt">
                                <div class="status">Applications</div>
                                <strong><?php echo  $this->job_apply_model->count_job_apply($v_companyjobs->job_post_id,$employer_id); ?></strong>
                                <div class="viewapp"><a href="<?php echo base_url(); ?>all-applicants/<?php echo $v_companyjobs->job_post_id; ?>" class="btn">View List</a></div>
                                
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="jobpt">
                                    <div class="status">Exam Results</div>
                                    <strong><?php echo  $this->job_apply_model->count_exam_attended($v_companyjobs->job_post_id); ?></strong>
                                    <div class="viewapp"><a href="<?php echo base_url(); ?>all-results/<?php echo $v_companyjobs->job_post_id; ?>" class="btn">View List</a></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="jobpt">
                                <div class="status">View Job</div>
                                <a href="<?php echo base_url(); ?>job/show/<?php echo $v_companyjobs->job_slugs; ?>">Link</a></div>
                            </div>
                            
                            <div class="col-md-2">
                            	<div class="jobpt">
                                    <div class="status">Actions</div>
                                    <span data-placement="top" data-toggle="tooltip" title="Update">
                                    <a href="<?php echo base_url() ?>update-job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a></span>
                                    <span data-placement="top" data-toggle="tooltip" title="Remove"><a href="<?php echo base_url() ?>employee/delete_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></span>
                                    <?php   if ($v_companyjobs->job_deadline > date('Y-m-d')){ ?>
                                    <span data-placement="top" data-toggle="tooltip" title="Forward Job"><a href="<?php echo base_url() ?>employee/forword_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-primary btn-xs"><i class="fa fa-paper-plane"></i> Forward</a></span>
                                    <?php }else{} ?>
                                    <?php   if ($v_companyjobs->is_test_required =="Yes"){ ?>
                                    <span data-placement="top" data-toggle="tooltip" title="Add Topics For Test"><a href="<?php echo base_url() ?>employer/topics_for_test/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i> Test Topic's</a></span>
                                    <?php }else{} ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <li>
                            <strong>There is no active Vacancy Post to Show</strong>
                        </li>
                    <?php endif; ?>
                </ul>
            
            </div>

        </div> <!--end row -->
    </div><!-- end container -->
</div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>