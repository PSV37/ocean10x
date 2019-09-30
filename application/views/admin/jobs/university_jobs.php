<?php $this->load->view('admin/components/header'); ?>
<body class="skin-blue" data-baseurl="<?php echo base_url(); ?>">
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

                
            </section>

            <br/>
            <div class="container-fluid">
           <section class="content">
    <div class="row">
        <div class="col-md-12">
      <div class="box box-primary">
                <div class="box-header box-header-background with-border">

                        <h3 class="box-title ">Total Univeristy Jobs</h3>

                </div>


                <div class="box-body">


                        <!-- Table -->
                        <table class="table table-bordered table-striped" id="dataTables-example">
                            <thead ><!-- Table head -->
                            <tr>
                                 <th class="active"> SL.  </th>
                                <th class="active">Job Title  </th>
                                <th class="active">Company</th>
                                <th class="active">Job Types</th>
                                <th class="active">Applied </th>
                                <th class="active">Posting date </th>
                                <th class="active">Deadline</th>
                                <th class="active">Status</th>
                                <th class="active">Action</th>
                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->

                            <?php $i=1; if (!empty($university_jobs)): foreach ($university_jobs as $v_companyjobs) : ?>
                                <tr class="custom-tr">
                                 <td class="vertical-td"><?php echo $i++; ?> </td>
                                    <td class="vertical-td highlight">
                                   <a href="<?php echo base_url(); ?>job/show/<?php echo $v_companyjobs->job_slugs; ?>">
                                            <?php echo $v_companyjobs->job_title; ?></a>
                                    </td>
                                     <td class="vertical-td"><a href="<?php echo base_url() ?>admin/company/<?php echo $v_companyjobs->company_profile_id; ?>"><span class="label label-primary"><?php echo $this->company_profile_model->company_name($v_companyjobs->company_profile_id); ?></span></a></td>
                                    <td class="vertical-td">
                                
                                            <span class="label label-primary">University</span>
                                    
                                     </td>
                                       <td class="vertical-td">
                                    <?php  $job_id=$v_companyjobs->job_post_id; $company_id=$v_companyjobs->company_profile_id; ?>
                                    <a href="<?php  echo base_url()?>admin/jobs/job_details/<?php echo $job_id.'/'.$company_id; ?>"><?php 
                        
                                    echo $this->job_apply_model->count_job_apply($job_id,$company_id); ?></a> 
                                    </td>
                                    <td class="vertical-td"><?php echo date('F j, Y', strtotime($v_companyjobs->created_at)); ?></td>
                                    <td class="vertical-td"><?php echo date('F j, Y', strtotime($v_companyjobs->job_deadline)); ?></td>
                                    <td class="vertical-td">
                                        <?php
                                          if($v_companyjobs->job_status == 0)
                                        { ?>
                                            <span class="label label-warning"><?php echo 'Pending' ?></span>
                                        <?php } elseif($v_companyjobs->job_status == 1) { ?>
                                            <span class="label label-primary"><?php echo 'Active' ?></span>
                                       <?php } elseif($v_companyjobs->job_status == 2) { ?>
                                            <span class="label label-primary"><?php echo 'deactive' ?></span>
                                        <?php } ?>

                                    </td>
                                    <td class="vertical-td">
                                      <?php echo btn_edit('admin/job_posting/edit_jobs/' . $v_companyjobs->job_post_id); ?>
                                        <?php echo btn_view_modal('admin/company_profile/jobs_view/' . $v_companyjobs->job_post_id); ?>
                                        <?php echo btn_delete('admin/company_profile/jobs_delete/' . $v_companyjobs->job_post_id); ?>
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
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>

<!-- Modal -->


            </div>

            <br />
            

        </div><!-- /.right-side -->

        <?php ///$this->load->view('admin/_layout_modal'); ?>
        <?php //$this->load->view('admin/_layout_modal_small'); ?>
        <?php $this->load->view('admin/components/footer'); ?>
