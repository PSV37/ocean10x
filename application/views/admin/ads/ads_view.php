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
                        <h3 class="box-title ">Ads Management</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/ads/save_ads/<?php
                      if (!empty($ads_row->ID)) {
                          echo $ads_row->ID;
                      }
                      ?>" method="post">

                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">

                            <div class="box-body">

                                <!-- /.Company Name -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ads Image <span class="required">*</span></label>
                                    <input type="file" required name="ad_image" placeholder="Ad Image" value="" class="form-control">
                                    <label for="exampleInputEmail1">Ads Link <span class="required">*</span></label>
                                    <input type="text" required name="ad_link" placeholder="Ad Link" value=""class="form-control">
                                    <label for="exampleInputEmail1">Ads Position <span class="required">*</span></label>
                                   <select name="position" class="form-control">
                                   <option value="leftside">Left Side</option>
                                   <option value="rightside">Right Side</option>
                                   </select>
                                </div>

                                <button type="submit" class="btn bg-navy" type="submit">Save Ad</button><br/><br/>
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
                    <div class="clear clearfix"><h2>Homepage Ads</h2></div>
                <table class="table table-bordered table-striped" id="dataTables-example22">
                    <thead>
                    <tr>
                        <th class="active">Image</th>
                        <th class="active">Link</th>
                        <th class="active">Position</th>
                        <th class=" active col-sm-2">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php  if ($res_home): foreach ($res_home as $row_home) : ?><!--get all category if not this empty-->
                        <tr>
                            <td><img src="<?php echo base_url('upload/ads/'.$row_home->ad_image); ?>" width="150" />
                            <br />
                            <?php echo $row_home->ad_size;?>
                            </td>
                            <td><?php echo $row_home->ad_link ?></td>
                            <!--Serial No> -->
                            <td><?php echo $row_home->position ?></td>
                            <td>
                                <?php echo btn_edit('admin/ads/edit_ads/' . $row_home->ID); ?>
                            </td>

                        </tr>
                    <?php
                    endforeach;
                    ?><!--get all category if not this empty-->
                    <?php else : ?> <!--get error message if this empty-->
                        <td colspan="3">
                            <strong>There is no record for display</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>
                    </tbody>
                </table>

                    </div>
                </div>
                
                <div class="clear clearfix">&nbsp;</div>
                 
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="clear clearfix"><h2>Other Ads</h2></div>
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active">Image</th>
                        <th class="active">Link</th>
                        <th class="active">Position</th>
                        <th class=" active col-sm-2">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ?>
                    <?php  if ($res): foreach ($res as $row) : ?><!--get all category if not this empty-->
                        <tr>
                            <td><img src="<?php echo base_url('upload/ads/'.$row->ad_image); ?>" width="150" /></td>
                            <td><?php echo $row->ad_link ?></td>
                            <!--Serial No> -->
                            <td><?php echo $row->position ?></td>
                            <td>
                                <?php echo btn_edit('admin/ads/edit_ads/' . $row->ID); ?>
                                <?php echo btn_delete('admin/ads/del_ads/' . $row->ID); ?>
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
