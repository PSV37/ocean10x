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
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/topic/save_topic/<?php  if (!empty($edit_spectial_info)) { foreach($edit_spectial_info as $row)
                        echo $row['topic_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject<span class="required">*</span></label>
                                        <select id="subject"  name="technical_id" class="form-control" required>
                                           <option value="">Select Subject</option> 
                                        <?php if (!empty($skill_master))
                                           foreach($skill_master as $skill) 
                                           {
                                        ?>   
                                            <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_spectial_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Topic<span class="required">*</span></label>
                                     <input type="text" name="topic_name" id="topic_name" class="form-control" value="<?php if (!empty($edit_spectial_info)) echo $row['topic_name'];?>" placeholder='Topic Name' required autocomplete="off">
                                    
									</div>
                                </div>
                            </div>
                                <div class="panel-body"></div>
								<div class="box-body">
                            
                                <div class="col-md-12">
                                    <div class="form-group">
									<label for="exampleInputEmail1">Description</label>
                                         <textarea name="topic_desc" class="form-control ckeditor" required><?php if (!empty($edit_spectial_info)) echo $row['topic_desc'];?></textarea>
                                    </div>
                                </div>                            

                                <button type="submit" class="btn bg-navy" type="submit">Save Topic
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
                        <th class="active">Subject Name</th>
                        <th class="active">Topic Name</th>
                        <th class="active">Description</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($edu_spectial_info)): foreach ($edu_spectial_info as $edu_spec) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $edu_spec['skill_name'] ?></td>
                            <td><?php echo $edu_spec['topic_name'] ?></td>
                            <td><?php echo $edu_spec['topic_desc'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/topic/edit_topic/' . $edu_spec['topic_id']); ?>
                                <?php echo btn_delete('admin/topic/delete_topic/' .$edu_spec['topic_id']); ?>
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


<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script>


 <script>
$(function() {
  // choose target dropdown
  var select = $('#subject');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  // $('select').get(0).selectedIndex = 0;
});
</script>
