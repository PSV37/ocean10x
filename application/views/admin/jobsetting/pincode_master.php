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
                        <h3 class="box-title ">Pincode Master</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/pincode_master/save_pincode/<?php  if (!empty($pincode)) { foreach($pincode as $row)
                        echo $row['pincode_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
								 <div class="box-body">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pincode <span class="required">*</span></label>
                                      <input type="text" name="pincode" id="pincode" class="form-control" value="<?php if (!empty($pincode)) echo $row['pincode'];?>" required>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save Pincode
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
                        <th class="active">PinCode</th>
						<th class="active">Created Date</th>
						<th class="active">Updated Date</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($pincode)): foreach ($pincode as $ct_row) : ?>
                        <tr>
							<td><?php echo $key; ?></td>
                            <td><?php echo $ct_row['pincode'] ?></td>
							<td><?php echo $ct_row['pincode_created_date'] ?></td>
							<td><?php echo $ct_row['pincode_updated_date'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/pincode_master/edit_pincode/' . $ct_row['pincode_id']); ?>
                                <?php echo btn_delete('admin/pincode_master/delete_pincode/' . $ct_row['pincode_id']); ?>
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

       
<?php $this->load->view('admin/components/footer'); ?>
