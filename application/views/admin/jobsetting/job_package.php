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
                        <h3 class="box-title ">Job Package Name</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data"

                      action="<?php echo base_url(); ?>admin/job_package/save_package/<?php
                      if (!empty($category_info->job_category_id)) {
                          echo $category_info->job_category_id;
                      }
                      ?>" method="post">

                      <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Package Name:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="job_package_service_name" id="email" placeholder="Enter Package Name" value="<?php
                                           if (!empty($category_info->job_category_name)) {
                                               echo $category_info->job_category_name;
                                           }
                                           ?>">
                            </div>
                          </div>

                            <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Cv Search Quantity:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="package_cv_search" id="email" placeholder="Enter Cv Search Quantity" value="<?php
                                           if (!empty($category_info->job_category_name)) {
                                               echo $category_info->job_category_name;
                                           }
                                           ?>">
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Category Job Quantity:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="package_category_job" id="email" placeholder="Enter Job Quantity" value="<?php
                                           if (!empty($category_info->job_category_name)) {
                                               echo $category_info->job_category_name;
                                           }
                                           ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Hot Jobs Quantity :</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="package_hotjobs" id="email" placeholder="Enter Hot Jobs Quantity" value="<?php
                                           if (!empty($category_info->job_category_name)) {
                                               echo $category_info->job_category_name;
                                           }
                                           ?>">
                            </div>
                          </div>

                         <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Job Package Price :</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="package_price" id="email" placeholder="Enter Hot Jobs Quantity" value="<?php
                                           if (!empty($category_info->job_category_name)) {
                                               echo $category_info->job_category_name;
                                           }
                                           ?>">
                            </div>
                          </div>


                            <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Package Duration :</label>
                            <div class="col-sm-8">
                           <select name="package_duration" class="form-control" id="sel1">
                                        <option value="1">1 Months</option>
                                        <option value="3">2 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="12">12 Months</option>
                                      </select>
                                </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Package description:</label>
                            <div class="col-sm-8">
                               <textarea name="package_desc" class="form-control" rows="5" id="comment"><?php
                                           if (!empty($category_info->job_category_name)) {
                                               echo $category_info->job_category_name;
                                           }
                                           ?></textarea>
                            </div>
                          </div>

          

                 
                                <button type="submit" class="btn bg-navy" type="submit">Save Job Pacakge
                                </button><br/><br/>
                            </div>
                            <!-- /.box-body -->
                </form>

                    </div>
                <div class="box-footer">

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
