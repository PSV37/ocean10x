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
                        <h3 class="box-title ">Topic Master</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/topic_master/save_industry/<?php  if (!empty($edit_industry_info)) { foreach($edit_industry_info as $row)
                        echo $row['id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject<span class="required">*</span></label>
                                        <select id="subject" class="form-control" name="technical_id" required>
                                           <option value="">Select Level</option> 
                                        <?php if (!empty($educaiton_level_info))
                                           foreach($educaiton_level_info as $edu_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $edu_row['education_level_id']; ?>"<?php if (!empty($edit_spectial_info)) if($row['edu_level_id']==$edu_row['education_level_id'])echo "selected";?>><?php echo $edu_row['education_level_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Industry Description </label>
                                      <textarea name="industry_desc" class="form-control"><?php if (!empty($edit_industry_info)) echo $row['description'];?></textarea>
                                    </div>
                                </div>
                            
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save Industry
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
                        <th class="active">Industry Name</th>
                        <th class="active">Description</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($industry_data)): foreach ($industry_data as $st_row) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $st_row['industry_name'] ?></td>
                            <td><?php echo $st_row['description'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/industry_master/edit_industry/' . $st_row['id']); ?>
                                <?php echo btn_delete('admin/industry_master/delete_industry/' . $st_row['id']); ?>
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
<script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script>