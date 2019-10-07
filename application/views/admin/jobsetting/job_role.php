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
                        <h3 class="box-title ">Job Role</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/job_role/save_role/<?php  if (!empty($edit_role_info)) { foreach($edit_role_info as $row)
                        echo $row['id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role Title <span class="required">*</span></label>
                                      <input type="text" name="job_role_title" class="form-control" value="<?php if (!empty($edit_role_info)) echo $row['job_role_title'];?>" placeholder='Role Title' required>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Skill Set <span class="required">*</span></label> <br>
                                        <?php 
                                            if (!empty($edit_role_info)) 
                                            $aa =  explode(',',  $row['skill_set']);

                                            if(!empty($skills_data)) foreach ($skills_data as $skill_value) {

                                              $checked="";
                                              for($i=0;$i<sizeof($aa);$i++){

                                                if($skill_value['id']==$aa[$i]){
                                                  $checked ="checked";
                                                  break;
                                                }
                                            }
                                        ?> 
                                        <input type="checkbox"  <?php echo $checked; ?> name="skill_set[]" id="skill_set[]" value="<?php echo $skill_value['id'];?>"> <?php echo $skill_value['skill_name'];?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-navy" type="submit">Save Role
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
                        <th class="active">Role Title</th>
                        <th class="active">Skill Set</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($job_role_data)): foreach ($job_role_data as $st_row) : 

                            $skill =  explode(',',  $st_row['skill_set']);

                            
                        ?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $st_row['job_role_title']; ?></td>
                            <td><?php
                                if(!empty($skills_data)) foreach ($skills_data as $skill_value) {

                                  $skills=array();
                                  for($i=0;$i<sizeof($skill);$i++){

                                    if($skill_value['id']==$skill[$i]){
                                      $skills = $skill_value['skill_name'];
                                      break;
                                    }
                                }
                                echo $skills; } ?>
                                    
                                </td>
                            <td>
                                <?php echo btn_edit('admin/job_role/edit_role/' . $st_row['id']); ?>
                                <?php echo btn_delete('admin/job_role/delete_role/' . $st_row['id']); ?>
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
