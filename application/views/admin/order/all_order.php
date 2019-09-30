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

            <div class="box box-primary ">
                <div class="box-header box-header-background with-border">
                        <h3 class="box-title ">Manage Order</h3>
                </div>



                <div class="box-body">

                    <div id="printableArea">

                        <!-- Table -->
                        <table id="dataTables-example" class="table table-striped table-bordered datatable-buttons">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active">Sl</th>
                                <th class="active">Order No</th>
                                <th class="active">Order Date</th>
                                <th class="active">Order Status</th>
                                <th class="active">Company Name</th>
                                <th class="active">Action</th>

                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->
                      <?php if (!empty($orders)): foreach ($orders as $v_order) : ?>
                                    <td class="vertical-td">
                                        1                                    </td>
                                    <td class="vertical-td highlight">
                                        <a href="<?php echo base_url(); ?>admin/order/view_order/<?php echo $v_order->package_order_id;?>"><?php echo $v_order->order_no; ?></a>
                                    </td>
                                    <td class="vertical-td"><?php echo date("jS F, Y", strtotime($v_order->order_date)); ?></td>
                                    <td class="vertical-td">
                                    <?php if($v_order->order_status==0){
                                        echo '<span class="label label-info">Pending Order</span>';
                                    } else {
                                            echo '<span class="label label-success">Sucess Order</span>';
                                        }
                                        ?>
                                      </td>
                                    <td class="vertical-td"><?php echo $this->company_profile_model->company_name($v_order->company_profile_id); ?></td>

                                    <td class="vertical-td">

                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                More <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">

                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin/order/view_order/<?php echo $v_order->package_order_id;?>"><i class="glyphicon glyphicon-search text-success"></i><span>View Order</span></a>
                                                </li>
                                                <li>
                                                <?php if($v_order->order_status==0):?>
                                                    <a href="<?php echo base_url(); ?>admin/order/update_order/<?php echo $v_order->package_order_id;?>"><i class="glyphicon glyphicon-search text-success"></i><span>Approve Order</span></a>';
                                                  <?php endif; ?>
                                                </li>
                                                
                                            </ul>
                                        </div>
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



                            <!--get all sub category if not this empty-->
                                                        </tbody><!-- / Table body -->
                        </table> <!-- / Table -->
                        </div>

                </div><!-- /.box-body -->
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
