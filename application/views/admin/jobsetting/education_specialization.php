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
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/education_specialization/save_education_specializaton/<?php  if (!empty($edit_spectial_info)) { foreach($edit_spectial_info as $row)
                        echo $row['id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">

                                <div class="col-md-6">
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
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Education Specialization <span class="required">*</span></label>
                                      <input type="text" name="specialization" class="form-control" value="<?php  if (!empty($edit_spectial_info)) echo $row['education_specialization'];?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course Type <span class="required">*</span></label>
                                        <select id="course_type"  name="course_type" class="form-control" >
                                           <option value="">Select Type</option> 
                                           <option value="Full Time">Full Time</option> 
                                           <option value="Part Time">Part Time</option> 
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
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
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active">SL</th>
                        <th class="active">Education Level</th>
                        <th class="active">Education Specialization</th>
                        <th class="active">Course Type</th>
                        <th class=" active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($edu_spectial_info)): foreach ($edu_spectial_info as $edu_spec) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $edu_spec['education_level_name'] ?></td>
                        
                            <td><?php echo $edu_spec['education_specialization'] ?></td>
                            <td><?php echo $edu_spec['course_type'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/education_specialization/edit_education_specialzation/' . $edu_spec['id']); ?>
                                <?php echo btn_delete('admin/education_specialization/delete_education_specialzation/' . $edu_spec['edu_level_id']); ?>
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
