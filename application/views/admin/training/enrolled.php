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
                        <h3 class="box-title ">Enrolled List</h3>
                </div>
                <div class="box-body">
                        <!-- Table -->
                        <table class="table table-bordered table-striped" id="dataTables-example">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active"> SL.  </th>
                                <th class="active"> Training Title  </th>
                                <th class="active">User Name</th>
                                <th class="active">Email</th>
                                <th class="active">Voice</th>
                                <th class="active">Training Fee </th>
                                <th class="active">Payment Method</th>
                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->
                            <tr>
                             <?php $key=1;if (!empty($enrolled_list)): foreach ($enrolled_list as $v_enrolled) : ?>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $this->training_info_model->training_title_by_id($v_enrolled->training_info_id); ?></td>
                            <td><?php echo $v_enrolled->full_name; ?></td>
                            <td><?php echo $v_enrolled->email; ?></td>
                            <td><?php echo $v_enrolled->voice; ?></td>
                            <td><?php echo $v_enrolled->training_fee; ?></td>
                            <td>
                                <?php 
                                    if($v_enrolled->payment_method=='1'){
                                        echo "bKash";
                                    } else if($v_enrolled->payment_method=='2'){
                                        echo "Cheque";
                                    } else {
                                        echo "Cash";
                                    }
                                ?>

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
