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
                        <h3 class="box-title ">Jobs Package Category</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active">SL</th>
                        <th class="active">Job Package Name</th>
                        <th class="active">CV Search Quantity</th>
                        <th class="active">Category Job Quantity</th>
                        <th class="active">Hot Jobs Quanity</th>
                        <th class="active">Package Price</th>
                        <th class="active">Package Duration Month</th>
                        <th class=" active col-sm-2">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ?>
                    <?php if (!empty($package_list)): foreach ($package_list as $v_package) : ?><!--get all category if not this empty-->
                        <tr>
                            <td><?php echo $key ?></td>
                            <!--Serial No> -->
                            <td><?php echo $v_package->job_package_service_name; ?></td>
                            <td><?php echo $v_package->package_cv_search; ?></td>
                            <td><?php echo $v_package->package_category_job; ?></td>
                            <td><?php echo $v_package->package_hotjobs; ?></td>
                            <td><?php echo $v_package->package_price; ?> TK.</td>
                            <td><?php echo $v_package->package_duration/30; ?></td>
                            <td>
                                <?php echo btn_edit('admin/job_category/edit_category/' . $v_package->job_package_service_id); ?>
                                <?php echo btn_delete('admin/job_category/delete_category/' . $v_package->job_package_service_id); ?>
                                 <?php echo btn_view('' . $v_package->job_package_service_id); ?>
                            </td>

                        </tr>
                    <?php
                    $key++;
                    endforeach;
                    ?><!--get all category if not this empty-->
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
