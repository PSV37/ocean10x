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

                        <h3 class="box-title ">All Public Demand List</h3>


                </div>


                <div class="box-body">


                        <!-- Table -->
                        <table class="table table-bordered table-striped" id="dataTables-example">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active">SL NO.</th>
                                <th class="active">Public  Name</th>
                                <th class="active">E-mail</th>
                                <th class="active">Comment</th>
                                <th class="active">Action</th>

                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->

                            <?php $i=1; if (!empty($publicdemandlist)): foreach ($publicdemandlist as $v_public) : ?>
                                <tr class="custom-tr">
                                   <td class="vertical-td"><?php echo $i++; ?></td>
                                    <td class="vertical-td highlight">
                                            <?php echo $v_public->public_name; ?>
                                    </td>
                                    <td class="vertical-td"><?php echo $v_public->public_email; ?></td>
                                    <td class="vertical-td"><?php echo $v_public->public_comment; ?> </td>
                                    <td class="vertical-td">
                                        <?php echo btn_delete('admin/public-demand/delete-demand/' . $v_public->public_demand_id); ?>

                                        <?php echo btn_edit('admin/public_demand/edit_demand/' . $v_public->public_demand_id); ?>
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
