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
                        <h3 class="box-title ">Education Specialization</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/education_level/save_educaiton/" method="post">

                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">

                            <div class="box-body">

                                <!-- /.Company Name -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Education Level <span class="required">*</span></label>
                                        <select id="education_level_name"  name="education_level_name" class="form-control" >
                                           <option value="">Select Level</option> 
                                        <?php if (!empty($educaiton_level_info))
                                           foreach($educaiton_level_info as $edu_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $edu_row['education_level_id']; ?>"><?php echo $edu_row['education_level_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Education Specialization <span class="required">*</span></label>
                                      <input type="text" name="specialization" class="form-control">
                                </div>

                                <button type="submit" class="btn bg-navy" type="submit">Save Education Specialization
                                </button><br/><br/>
                            </div>
                            <!-- /.box-body -->

                        </div>
                    </div>

                </form>
                    </div>
                <div class="box-footer">

                </div>
            <!--     <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active">SL</th>
                        <th class="active">Education Level Name</th>
                        <th class=" active col-sm-2">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ?>
                    <?php if (!empty($all_educationlevels)): foreach ($all_educationlevels as $v_level) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                        
                            <td><?php echo $v_level->education_level_name ?></td>
                            <td>
                                <?php echo btn_edit('admin/education_level/edit_education_level/' . $v_level->education_level_id); ?>
                                <?php echo btn_delete('admin/education_level/delete_education_level/' . $v_level->education_level_id); ?>
                            </td>

                        </tr>
                    <?php
                    $key++;
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <td colspan="3">
                            <strong>There is no record for display</strong>
                        </td>
                    <?php
                    endif; ?>
                    </tbody>
                </table>

                    </div>
                </div> -->
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
