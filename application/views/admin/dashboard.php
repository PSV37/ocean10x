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
  <section class="content-header"> </section>
  <br/>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h2> <?php echo $this->job_seeker_model->seeker_list_count();; ?> </h2>
            <h4>Total CV</h4>
          </div>
          <div class="icon"><i class="fa fa-files-o" aria-hidden="true"></i>  </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h2> <?php echo $this->job_seeker_model->ative_seeker_list_count(); ?> </h2>
            <h4> Active CV</h4>
          </div>
          <div class="icon"> <i class="fa fa-file-text-o" aria-hidden="true"></i> </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h2><?php echo $this->company_profile_model->company_list_count(); ?></h2>
            <h4>Total Companies</h4>
          </div>
          <div class="icon"> <i class="fa fa-briefcase" aria-hidden="true"></i> </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h2><?php echo $this->company_profile_model->active_company_list_count(); ?></h2>
            <h4>Active Companies</h4>
          </div>
          <div class="icon"><i class="fa fa-building-o" aria-hidden="true"></i> </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
            <h2> <?php echo $this->job_posting_model->count_all_job(); ?> </h2>
            <h4>Total Jobs</h4>
          </div>
          <div class="icon"> <i class="fa fa-file-code-o" aria-hidden="true"></i> </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner">
            <h2> <?php echo $this->job_posting_model->count_selected_jobs(); ?> </h2>
            <h4> Selected Jobs</h4>
          </div>
          <div class="icon"> <i class="fa fa-check-circle-o" aria-hidden="true"></i> </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h2><?php echo $this->job_posting_model->count_nonselected_jobs(); ?></h2>
            <h4>Non Selected Jobs</h4>
          </div>
          <div class="icon"> <i class="fa fa-times-circle-o" aria-hidden="true"></i> </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-sm-6 col-sx-12"> 
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h2><?php echo $this->job_posting_model->count_internship_jobs(); ?></h2>
            <h4>University Jobs</h4>
          </div>
          <div class="icon"> <i class="fa fa-university" aria-hidden="true"></i> </div>
        </div>
      </div>
      <!-- ./col --> 
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header box-header-background with-border">
            <h3 class="box-title ">Recent 5 CV</h3>
          </div>
          <div class="box-body"> 
            
            <!-- Table -->
            <table class="table table-bordered table-striped">
              <thead >
                <!-- Table head -->
                <tr>
                  <th class="active">Full Name</th>
                  <th class="active">Phone</th>
                  <th class="active">E-mail</th>
                  <th style="width: 20%" class="active">Download CV</th>
                </tr>
              </thead>
              <!-- / Table head -->
              <tbody>
                <!-- / Table body -->
                
                <?php $i=1;if (!empty($recentSeekerlist)): foreach ($recentSeekerlist as $v_seeker) : ?>
                <tr class="custom-tr">
                  <td class="vertical-td highlight"><a href="#"> <?php echo $v_seeker->full_name; ?></a></td>
                  <td class="vertical-td"><?php echo $v_seeker->mobile; ?></td>
                  <td class="vertical-td"><?php echo $v_seeker->email; ?></td>
                  <td class="vertical-td"><a href="<?php echo base_url() ?>admin/seeker/downloadcv/<?php echo $v_seeker->job_seeker_id; ?>"><span class="label label-primary">Download CV </span></a></td>
                </tr>
                <?php

                            endforeach;
                            ?>
                <!--get all sub category if not this empty-->
                <?php else : ?>
                <!--get error message if this empty-->
              
                <td colspan="8"><strong>There is no data to display</strong></td>
                <!--/ get error message if this empty-->
                <?php endif; ?>
                  </tbody>
                <!-- / Table body -->
            </table>
            <!-- / Table --> 
            
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header box-header-background with-border">
            <h3 class="box-title ">Recent 5 Job</h3>
          </div>
          <div class="box-body"> 
            
            <!-- Table -->
            <table class="table table-bordered table-striped">
              <thead >
                <!-- Table head -->
                <tr>
                  <th class="active">Job Title </th>
                  <th class="active">Company</th>
                  <th class="active">Job Types</th>
                  <th class="active">Status</th>
                </tr>
              </thead>
              <!-- / Table head -->
              <tbody>
                <!-- / Table body -->
                
                <?php $i=1; if (!empty($recentJoblist)): foreach ($recentJoblist as $v_recentjobs) : ?>
                <tr class="custom-tr">
                  <td class="vertical-td highlight"><a href="<?php echo base_url(); ?>job/show/<?php echo $v_recentjobs->job_slugs; ?>"> <?php echo $v_recentjobs->job_title; ?></a></td>
                  <td class="vertical-td"><a href="<?php echo base_url() ?>admin/company/<?php echo $v_recentjobs->company_profile_id; ?>"><span class="label label-primary"><?php echo $this->company_profile_model->company_name($v_recentjobs->company_profile_id); ?></span></a></td>
                  <td class="vertical-td"><?php 
                                          if($v_recentjobs->job_types == 1)
                                        { ?>
                    <span class="label label-warning"><?php echo 'Commonly' ?></span>
                    <?php } elseif($v_recentjobs->job_types == 2) { ?>
                    <span class="label label-primary"><?php echo 'Selected' ?></span>
                    <?php } elseif($v_recentjobs->job_types == 3) { ?>
                    <span class="label label-success"><?php echo 'University' ?></span>
                    <?php } elseif($v_recentjobs->job_types == 4) { ?>
                    <span class="label label-info"><?php echo 'Training' ?></span>
                    <?php } elseif($v_recentjobs->job_types == 5) { ?>
                    <span class="label label-danger"><?php echo 'Bank Books' ?></span>
                    <?php } elseif($v_recentjobs->job_types == 6) { ?>
                    <span class="label label-default"><?php echo 'Others' ?></span>
                    <?php } ?></td>
                  <td class="vertical-td"><?php
                                          if($v_recentjobs->job_status == 0)
                                        { ?>
                    <span class="label label-warning"><?php echo 'Pending' ?></span>
                    <?php } elseif($v_recentjobs->job_status == 1) { ?>
                    <span class="label label-primary"><?php echo 'Active' ?></span>
                    <?php } elseif($v_recentjobs->job_status == 2) { ?>
                    <span class="label label-primary"><?php echo 'deactive' ?></span>
                    <?php } ?></td>
                </tr>
                <?php

                            endforeach;
                            ?>
                <!--get all sub category if not this empty-->
                <?php else : ?>
                <!--get error message if this empty-->
              
                <td colspan="8"><strong>There is no data to display</strong></td>
                <!--/ get error message if this empty-->
                <?php endif; ?>
                  </tbody>
                <!-- / Table body -->
            </table>
            <!-- / Table --> 
            
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
    </div>
  </div>
  <br />
</div>
<!-- /.right-side -->

<?php ///$this->load->view('admin/_layout_modal'); ?>
<?php //$this->load->view('admin/_layout_modal_small'); ?>
<?php $this->load->view('admin/components/footer'); ?>
