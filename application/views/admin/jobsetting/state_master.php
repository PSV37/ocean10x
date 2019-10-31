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
                        <h3 class="box-title ">State Master</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/state_master/save_state/<?php  if (!empty($edit_state_info)) { foreach($edit_state_info as $row)
                        echo $row['state_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country <span class="required">*</span></label>
                                        <select id="country_name" name="country_name" class="form-control country" required>
                                           <option value="">Select Country</option> 
                                        <?php if (!empty($country_data))
                                           foreach($country_data as $cnt_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $cnt_row['country_id']; ?>"<?php if (!empty($edit_state_info)) if($row['country_id']==$cnt_row['country_id'])echo "selected";?>><?php echo $cnt_row['country_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State Name <span class="required">*</span></label>
                                      <input type="text" name="state_name" class="form-control" value="<?php if (!empty($edit_state_info)) echo $row['state_name'];?>" required>
                                    </div>
                                </div>
                            
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save State
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
                        <th class="active">Country Name</th>
                        <th class="active">State Name</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($state_info)): foreach ($state_info as $st_row) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $st_row['country_name'] ?></td>
                            <td><?php echo $st_row['state_name'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/state_master/edit_state/' . $st_row['state_id']); ?>
                                <?php echo btn_delete('admin/state_master/delete_state/' . $st_row['state_id']); ?>
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
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#country_name").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script>
 <script>
$(function() {
  // choose target dropdown
  var select = $('#country_name');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>
</div><!-- /.right-side -->

       
<?php $this->load->view('admin/components/footer'); ?>
