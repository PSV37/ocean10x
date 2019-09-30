
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
                        <h3 class="box-title ">Update Public Demand</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- form start -->
                <form role="form" id="publicDeamnd" enctype="multipart/form-data"

                      action="<?php echo base_url(); ?>admin/Public_demand/update_demand"method="post">

                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">

                            <div class="box-body">
                            <input type="hidden" name="public_demand_id" value="<?php
                      if (!empty($public->public_demand_id)) {
                          echo $public->public_demand_id;
                      }
                      ?>"">
                                <!-- /.Full  Name -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                                    <input type="text"  id="public_name" name="public_name" placeholder="public_name"
                                           value="<?php
                                           if (!empty($public->public_name)) {
                                               echo $public->public_name;
                                           }
                                           ?>"
                                           class="form-control">
                                </div>


                                <!-- /.Email -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email <span class="required">*</span></label>
                                    <input type="text" id="public_email"  name="public_email" placeholder="Email Name"
                                           value="<?php
                                           if (!empty($public->public_email)) {
                                               echo $public->public_email;
                                           }
                                           ?>"
                                           class="form-control">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Comment <span class="required">*</span></label>
                                  <textarea name="public_comment" class="form-control"><?php
                                           if (!empty($public->public_comment)) {
                                               echo $public->public_comment;
                                           }
                                           ?></textarea>
                                </div>


                                <button class="btn bg-navy" type="submit">Update
                                </button><br/><br/>
                            </div>
                            <!-- /.box-body -->

                        </div>
                    </div>

                </form>
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
