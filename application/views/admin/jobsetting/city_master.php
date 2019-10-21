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
                        <h3 class="box-title ">City Master</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/city_master/save_city/<?php  if (!empty($edit_city_info)) { foreach($edit_city_info as $row)
                        echo $row['id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country <span class="required">*</span></label>
                                        <select id="country_name" name="country_name" class="form-control" required onchange="getStates(this.value)">
                                           <option value="">Select Country</option> 
                                        <?php if (!empty($country_data))
                                           foreach($country_data as $cnt_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $cnt_row['country_id']; ?>"<?php if (!empty($edit_city_info)) if($row['country_id']==$cnt_row['country_id'])echo "selected";?>><?php echo $cnt_row['country_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State <span class="required">*</span></label>
                                        <select id="state_name"  name="state_name" class="form-control" required>
                                           <option value="">Select State</option> 
                                        
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">City Name <span class="required">*</span></label>
                                      <input type="text" name="city_name" class="form-control" value="<?php if (!empty($edit_city_info)) echo $row['city_name'];?>" required>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save City
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
                        <th class="active">City Name</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($city_info)): foreach ($city_info as $ct_row) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $ct_row['country_name'] ?></td>
                            <td><?php echo $ct_row['state_name'] ?></td>
                            <td><?php echo $ct_row['city_name'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/city_master/edit_city/' . $ct_row['id']); ?>
                                <?php echo btn_delete('admin/city_master/delete_city/' . $ct_row['id']); ?>
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
  $(document).ready(function(){



    function getStates_load(){
        var id = $('#country_name').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/city_master/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_name').html(res);
                    $('#state_name').val(<?php echo $row['state_id']; ?>);
					getStates_load();
                }
                
            }); 
          }
   
       }
       getStates_load();
    });
</script>
<script>
    function getStates(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/city_master/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_name').html(res);
                }
                
            }); 
          }
   
       }

       
</script>