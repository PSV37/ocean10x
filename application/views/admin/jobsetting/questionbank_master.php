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
                        <h3 class="box-title ">Question Bank Master</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/questionbank/save_subtopic/<?php  if (!empty($edit_subtopic_info)) { foreach($edit_subtopic_info as $row)
                        echo $row['subtopic_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                        <select id="subject"  name="technical_id" class="form-control" required onchange="getTopic(this.value)">
                                           <option value="">Select Subject</option> 
                                        <?php if (!empty($skill_master))
                                           foreach($skill_master as $skill) 
                                           {
                                        ?>   
                                            <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_subtopic_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option> 
                                        <?php } ?>
                                        </select>
										</div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Topic <span class="required">*</span></label>
                                        <select id="topic_id"  name="topic_id" class="form-control" required>
                                           <option value="">Select Topic</option> 
                                        <?php if (!empty($topic))
                                           foreach($topic as $st_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $st_row['topic_id']; ?>"<?php if (!empty($edit_subtopic_info)) if($row['topic_id']==$st_row['topic_id'])echo "selected";?>><?php echo $st_row['topic_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                                     <select id="subtopic_id"  name="subtopic_id" class="form-control" required>
                                           <option value="">Select Subopic</option> 
                                        <?php if (!empty($subtopic))
                                           foreach($subtopic as $stt_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $stt_row['subtopic_id']; ?>"<?php if (!empty($edit_subtopic_info)) if($row['subtopic_id']==$stt_row['subtopic_id'])echo "selected";?>><?php echo $stt_row['subtopic_name']; ?></option> 
                                        <?php } ?>
                                        </select> </div>
									</div>
									</div>
									 <div class="box-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subtopic Description<span class="required">*</span></label>
                                      <textarea name="subtopic_desc" class="form-control"><?php if (!empty($edit_subtopic_info)) echo $row['subtopic_desc'];?></textarea>
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save Subtopic
                                </button><br/><br/>
                            
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
                        <th class="active">Subject</th>
                        <th class="active">Topic</th>
                        <th class="active">Subtopic</th>
						<th class="active">Description</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($subtopic)): foreach ($subtopic as $ct_row) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $ct_row['skill_name'] ?></td>
                            <td><?php echo $ct_row['topic_name'] ?></td>
                            <td><?php echo $ct_row['subtopic_name'] ?></td>
							<td><?php echo $ct_row['subtopic_desc'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/questionbank/edit_subtopic/' . $ct_row['subtopic_id']); ?>
                                <?php echo btn_delete('admin/questionbank/delete_subtopic/' . $ct_row['subtopic_id']); ?>
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
	  function getTopic(id){
		
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/questionbank/gettopic',
                data:{id:id},
                success:function(res){
                    $('#topic_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	   </script>
       
</script>
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script>