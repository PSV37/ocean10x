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
                    <div class="col-md-offset-3">
                        <h3 class="box-title ">Jobs Levels</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data"

                      action="<?php echo base_url(); ?>admin/job_level/save_level/<?php
                      if (!empty($joblevel_info->job_level_id)) {
                          echo $joblevel_info->job_level_id;
                      }
                      ?>" method="post">

                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">

                            <div class="box-body">

                                <!-- /.Company Name -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jobs level <span class="required">*</span></label>
                                    <input type="text" required name="job_level_name" placeholder="level Name"
                                           value="<?php
                                           if (!empty($joblevel_info->job_level_name)) {
                                               echo $joblevel_info->job_level_name;
                                           }
                                           ?>"
                                           class="form-control">
                                </div>

                                <button type="submit" class="btn bg-navy" type="submit">Save Jobs level
                                </button><br/><br/>
                            </div>
                            <!-- /.box-body -->

                        </div>
                    </div>
                </form>
                    </div>
                <div class="box-footer">

                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active">SL</th>
                        <th class="active">level Name</th>
                        <th class=" active col-sm-2">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ?>
                    <?php if (!empty($all_joblevels)): foreach ($all_joblevels as $v_level) : ?><!--get all level if not this empty-->
                        <tr>
                            <td><?php echo $key; ?></td>
                            <!--Serial No> -->
                            <td><?php echo $v_level->job_level_name; ?></td>
                            <td>
                                <?php echo btn_edit('admin/job_level/edit_level/' . $v_level->job_level_id); ?>
                                <?php echo btn_delete('admin/job_level/delete_level/' . $v_level->job_level_id); ?>
                            </td>

                        </tr>
                    <?php
                    $key++;
                    endforeach;
                    ?><!--get all level if not this empty-->
                    <?php else : ?> <!--get error message if this empty-->
                        <td colspan="3">
                            <strong>There is no record for display</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>
                    </tbody>
                </table>

                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>
            </div>

            <br />
            

        </div><!-- /.right-side -->

        <?php ///$this->load->view('admin/_layout_modal'); ?>
        <?php //$this->load->view('admin/_layout_modal_small'); ?>
        <?php $this->load->view('admin/components/footer'); ?>
