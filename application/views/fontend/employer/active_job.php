<?php 
    $this->load->view('fontend/layout/employer_header.php');
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
                     <?php $this->load->view('fontend/layout/employer_left.php'); ?>
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
								   <?php echo $v_companyjobs->job_deadline; ?>
                               </div>
                                    
                                </div>
                                <div class="col-md-2">
                                	<div class="jobpt">
                                	<div class="status">Job Status</div>
                                    <?php if($v_companyjobs->job_status=="1"){
                                        echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';}
                                        else {
                                        echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                	<div class="jobpt">
                                    <div class="status">Applications</div>
                                    <strong><?php echo  $this->job_apply_model->count_job_apply($v_companyjobs->job_post_id,$employer_id); ?></strong>
                                    <div class="viewapp"><a href="<?php echo base_url(); ?>employer/all-applicants/<?php echo $v_companyjobs->job_post_id; ?>" class="btn">View List</a></div>
                                    
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
                                    <a href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a></span>
                                    <span data-placement="top" data-toggle="tooltip" title="Remove"><a href="<?php echo base_url() ?>employer/delete_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></span>
                                    <span data-placement="top" data-toggle="tooltip" title="Remove"><a href="<?php echo base_url() ?>employer/forword_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-primary btn-xs"><i class="fa fa-paper-plane"></i> Forword</a></span>
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