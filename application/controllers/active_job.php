<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                
          <div class="section lb">
                <div class="container">
                   <div class="row">
                     <?php $this->load->view('fontend/layout/employer_left.php'); ?>
                        <div class="content col-md-9">
                        <div class="post-padding">
                                <div class="job-title nocover hidden-sm hidden-xs"><h5>Active Jobs</h5></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive job-table">
                                            <table id="mytable" class="table table-bordred table-striped">

                                                <thead>
                                                    <tr>
                                                    <th>Job Title</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th>Applicants</th>
                                                    <th>Link</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                               <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
                                                    <tr>
                                                        <td>
                                                            <h4>
                                                            <a href="#"><?php echo $v_companyjobs->job_title; ?></a><br>
                                                         
                                                            </h4>
                                                        </td>
                                                         <td> <?php if(!is_null($v_companyjobs->job_deadline)) { echo date('F j Y',strtotime($v_companyjobs->job_deadline)); } ?></td>
                                                       
                                                        <td>
                                                        <?php if($v_companyjobs->job_status=="1"){
                                                        echo '<button class="btn btn-warning btn-xs">Active</button>';}
                                                        else {
                                                            echo'<button class="btn btn-danger btn-xs">deactive</button> ';
                                                        }
                                                         ?>
                                                        </td>
                                                        <td>
                                                  
                                                     <a href="<?php echo base_url(); ?>employer/all-applicants/<?php echo $v_companyjobs->job_post_id; ?>" class="btn btn-warning btn-xs"><?php echo  $this->job_apply_model->count_job_apply($v_companyjobs->job_post_id,$employer_id); ?></a>
    
                                                        </td>
                                                        <td><a href="<?php echo base_url(); ?>job/show/<?php echo $v_companyjobs->job_slugs; ?>">Link</a></td>
                                                                                                        <td>
                                                        <span data-placement="top" data-toggle="tooltip" title="Update"><a href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a></span>
                                                        <span data-placement="top" data-toggle="tooltip" title="Remove"><a href="<?php echo base_url() ?>employer/delete_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></span>
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