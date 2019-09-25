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
                        <h3 class="box-title ">All Training</h3>
                </div>
                <div class="box-body">
                        <!-- Table -->
                        <table class="table table-bordered table-striped" id="dataTables-example">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active"> SL.  </th>
                                <th class="active"> Training Title  </th>
                                <th class="active">Trainer Name</th>
                                <th class="active">Training Types</th>
                                <th class="active">Duration </th>
                                <th class="active">Deadline </th>
                                <th class="active">Status</th>
                                <th class="active">Action</th>
                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->
                            <tr>
                             <?php $key=1;if (!empty($training_list)): foreach ($training_list as $v_training) : ?>
                            <td><?php echo $key; ?></td>
                            <td><a href="<?php echo base_url().'training/show/'.$v_training->training_slug; ?>"><?php echo $v_training->training_title; ?></a></td>
                            <td><?php echo $v_training->trainar_name; ?></td>
                            <td>
                                <?php 
                                    if($v_training->training_type=='1'){
                                        echo "Workshop";
                                    } else if($v_training->training_type=='2'){
                                        echo "Customized course";
                                    } else {
                                        echo "International";
                                    }
                                ?>

                            </td>
                            <td> <?php echo date('j F',strtotime($v_training->start_date)) ?> - <?php echo date('j F Y',strtotime($v_training->end_date)) ?></td>
                            <td><?php echo date('j F Y',strtotime($v_training->deadline)) ?></td>
                            <td>Active</td>
                            <td>
                                <a href="<?php echo base_url().'admin/training/edit_training/'.$v_training->training_id; ?>" class="btn bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-edit"></i></a>

                                <?php echo btn_delete('admin/training/training_delete/' . $v_training->training_id); ?>
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
