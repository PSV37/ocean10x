<?php $this->load->view('admin/components/header'); ?>
<body class="skin-blue" data-baseurl="<?php // echo base_url(); ?>">
    <div class="wrapper">

    <?php $this->load->view('admin/components/user_profile'); ?>
       
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
        <?php $this->load->view('admin/components/navigation'); ?>
        
                  </section>
        <!-- /.sidebar -->
      </aside>

        <div class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <ol class="breadcrumb">
                   <?php  echo $user_id=$this->session->userdata('name');?>;
                </ol>
            </section>

            <br/>
            <div class="container-fluid">
           <section class="content">
           <!-- Main row -->
            <div class="row">
                <!-- Left col -->
         <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $this->company_profile_model->company_name($company_id); ?></h3>
              <h5 class="widget-user-desc">Job Title: <?php echo $this->job_posting_model->job_title_by_name($job_id); ?></h5>
              <h5 class="widget-user-desc">Contact Number: <?php echo $this->company_profile_model->get_phone_number($company_id); ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_id); ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
               <div class="col-sm-3">
                  <div class="description-block">
                    <h5 class="description-header"><a href="<?php echo base_url() ?>admin/jobs/job_details/<?php echo $job_id.'/'.$company_id; ?>"><?php echo $this->job_apply_model->count_job_apply($job_id,$company_id);?></a></h5>
                    <span class="description-text">Total Applicant</span>
                  </div>
                  <!-- /.description-block -->
                </div>

                <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><a href="<?php echo base_url() ?>admin/jobs/sortlist_cv/<?php echo $job_id.'/'.$company_id; ?>"><?php echo $this->job_apply_model->count_job_apply_sortedlist($job_id,$company_id);?></a></h5>
                    <span class="description-text">Sorted List</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><a href="<?php echo base_url() ?>admin/jobs/interview_cv/<?php echo $job_id.'/'.$company_id; ?>"><?php echo $this->job_apply_model->count_job_apply_inteviewlist($job_id,$company_id);?></a></h5>
                    <span class="description-text">Interview List</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                  <div class="description-block">
                    <h5 class="description-header"><a href="<?php echo base_url() ?>admin/jobs/final_cv/<?php echo $job_id.'/'.$company_id; ?>"><?php echo $this->job_apply_model->count_job_apply_finallist($job_id,$company_id);?></a></h5>
                    <span class="description-text">Final List</span>
                  </div>
                  <!-- /.description-block -->
                </div>

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        
            </div><!-- /.row -->
        <div class="row">
         <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">

                        <h3 class="box-title "> Softlist CV</h3>

                </div>


                <div class="box-body">


                        <!-- Table -->
                        <table class="table table-bordered table-striped" id="dataTables-example">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active"> SL.  </th>
                                <th class="active"> Profile Picture </th>
                                <th class="active">Full Name</th>
                                <th class="active">Email</th>
                                <th class="active">Title </th>
                                <th class="active">Phone </th>
                                <th class="active">Status</th>
                                <th class="active">Select Status</th>
                                <th class="active">Download CV</th>
                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->
                            <?php $i=1; if (!empty($sortlist_cvs)): foreach ($sortlist_cvs as $v_applicant) : $seeker_info=$this->job_seeker_model->applicant_job_seeker($v_applicant->job_seeker_id);?>
                                <tr class="custom-tr">
                                 <td class="vertical-td"><?php echo $i++; ?> </td>
                                 <td class="product-img">
                                        <?php if (!empty($seeker_info->photo_path)):  ?>
                                            <img src="<?php echo base_url(); ?>upload/<?php echo $seeker_info->photo_path; ?>" />
                                        <?php else:?>
                                            <img src="<?php echo base_url() ?>upload/compnay/company.png" alt="company Image">
                                        <?php endif; ?>
                                    </a>
                                    </td>
                                    <td class="vertical-td"><?php echo $seeker_info->full_name; ?> </td>
                                    <td class="vertical-td"><?php echo $seeker_info->email; ?> </td>
                                    <td class="vertical-td"><?php echo $seeker_info->resume_title; ?> </td>
                                    <td class="vertical-td"><?php echo $seeker_info->mobile; ?> </td>
                                    <td class="vertical-td">
                                         <?php
                                          if($v_applicant->apply_status == 0)
                                        { ?>
                                            <span class="label label-warning"><?php echo 'Not Sorted' ?></span>
                                        <?php } elseif($v_applicant->apply_status == 1) { ?>
                                            <span class="label label-primary"><?php echo 'Sorted' ?></span>
                                       <?php } elseif($v_applicant->apply_status == 2) { ?>
                                            <span class="label label-primary"><?php echo 'Interview' ?></span>
                                         <?php } elseif($v_applicant->apply_status == 3) { ?>
                                            <span class="label label-primary"><?php echo 'Final' ?></span>
                                        <?php } ?>

                                    </td>
                                    <td class="vertical-td">
                                      <?php 
                                      if($v_applicant->apply_status==0){
                                      echo btn_sorted('admin/job_applicant/update_sortlist/' . $v_applicant->job_apply_id).'<br> sorted list'; }
                                      else if($v_applicant->apply_status==1) {
                                   echo btn_interview('admin/job_applicant/update_interviewlist/' . $v_applicant->job_apply_id).'<br> interview list';
                                      } 
                                  else if($v_applicant->apply_status==2) {
                                   echo btn_final('admin/job_applicant/update_finallist/' . $v_applicant->job_apply_id).'<br> final list';
                                      } 
                                 else if($v_applicant->apply_status==3) {
                                    echo '<span class="label label-primary">Selected</span>';
                                      } 


                                      ?>

                                    </td>
                                   <td class="vertical-td">
                                      <a href="<?php echo base_url() ?>admin/seeker/downloadcv/<?php echo $v_applicant->job_seeker_id; ?>"><span class="label label-primary">Download CV </span></a>
                                    </td>
                                </tr>
                            <?php

                            endforeach;
                            ?><!--get all sub category if not this empty-->
                            <?php else : ?> <!--get error message if this empty-->
                                <td colspan="8">
                                    <strong>There is no data to display</strong>
                                </td><!--/ get error message if this empty-->
                            <?php endif; ?>
                            </tbody><!-- / Table body -->
                        </table> <!-- / Table -->

                </div><!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        </div>
        <!--/.col end -->

    <!-- /.row -->
        </section>



            </div>

            <br />

        </div><!-- /.right-side -->

        <?php ///$this->load->view('admin/_layout_modal'); ?>
        <?php //$this->load->view('admin/_layout_modal_small'); ?>
        <?php $this->load->view('admin/components/footer'); ?>
