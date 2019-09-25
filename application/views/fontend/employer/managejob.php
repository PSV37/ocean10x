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
                                                    <th>Apply</th>
                                                    <th>CV View</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                               <?php if (!empty($company_all_jobs)): foreach ($company_all_jobs as $v_companyjobs) : ?>
                                                    <tr>
                                                        <td>
                                                            <h4>
                                                            <a href="#"><?php echo $v_companyjobs->job_title; ?></a><br>
                                                            <small>Deadline date : <?php echo $v_companyjobs->job_deadline; ?></small>
                                                            </h4>
                                                        </td>
                                                        <td><a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>employer/applicants/<?php echo  $v_companyjobs->job_post_id."/". $employer_id; ?>"><?php echo $this->job_apply_model->count_job_apply($v_companyjobs->job_post_id,$employer_id); ?></a></td>
                                                        <td><a class="btn btn-info btn-xs" href="">30</a></td>
                                                        <td>
                                                        <?php if($v_companyjobs->job_status=="1"){
                                                        echo '<button class="btn btn-warning btn-xs">Active</button>';}
                                                        else {
                                                            echo'<button class="btn btn-danger btn-xs">deactive</button> ';
                                                        }
                                                         ?>

                                                       

                                                        </td>
                                                        <td>
                                                        <span data-placement="top" data-toggle="tooltip" title="update"><a href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a></span>
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
                            
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                </div> <!--end row -->
                </div><!-- end container -->
            </div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>