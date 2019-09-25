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

                        <h3 class="box-title ">Active Company List</h3>


                </div>


                <div class="box-body">


                        <!-- Table -->
                        <table class="table table-bordered table-striped" id="dataTables-example">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active">Logo</th>
                                <th class="active">Company Name</th>
                                <th class="active">E-mail</th>
                                <th class="active">Website</th>
                                <th class="active">Phone</th>
                                <th class="active">Status</th>
                                <th class="active">Action</th>

                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->

                            <?php if (!empty($active_companys)): foreach ($active_companys as $v_company) : ?>
                                <tr class="custom-tr">
                                    <td class="product-img">
                                        <?php if (!empty($v_company->company_logo)):  ?>
                                            <img src="<?php echo base_url(); ?>upload/<?php echo $v_company->company_logo; ?>" />
                                        <?php else:?>
                                            <img src="<?php echo base_url() ?>upload/notfound.gif" alt="company Image">
                                        <?php endif; ?>
                                    </td>
                                    <td class="vertical-td highlight">
                                        <a href="<?php echo base_url(); ?>admin/company/<?php echo $v_company->company_profile_id; ?>">
                                            <?php echo $v_company->company_name; ?></a>
                                    </td>
                                    <td class="vertical-td"><?php echo $v_company->company_email; ?></td>
                                    <td class="vertical-td"><?php echo $v_company->company_url; ?> </td>
                                    <td class="vertical-td"><?php echo $v_company->company_phone; ?> </td>
                                    <td class="vertical-td">
                                        <?php
                                          if($v_company->company_status == 0)
                                        { ?>
                                            <span class="label label-warning"><?php echo 'Inactive' ?></span>
                                        <?php } else { ?>
                                            <span class="label label-primary"><?php echo 'Active' ?></span>
                                        <?php } ?>

                                    </td>
                                    <td class="vertical-td">
                                        <?php echo btn_view('admin/company/' . $v_company->company_profile_id); ?>
                                        <?php echo btn_delete('admin/company/delete_company/' . $v_company->company_profile_id); ?>
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
