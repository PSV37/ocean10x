<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                
             
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Pending Jobs</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Pending Jobs</span></div>
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
                        <div class="userccount">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive job-table">
                                            <table id="mytable" class="table table-bordred table-striped">

                                                <thead>
                                                    <tr>
                                                    <th>Job Title</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                               <?php if (!empty($company_pending_jobs)): foreach ($company_pending_jobs as $v_companyjobs) : ?>
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
                                                        <span data-placement="top" data-toggle="tooltip" title="Remove"><a href="<?php echo base_url() ?>employer/delete_job/<?php echo $v_companyjobs->job_post_id ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></span>
                                                        </td>
                                                    </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                            <?php else : ?> 
                                                <td colspan="8">
                                                    <strong>There is no Pending  Vacancy Post to show!</strong>
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