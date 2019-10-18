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
            
             <?php /* print_r($subtopic); */ ?> 

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                    <div class="col-md-offset-3">
                        <h3 class="box-title ">Add Line Item</h3>
                    </div>
                </div>
               <div class="box-background">
              
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/lineitemlevel/save_lineitemlevel/<?php  if (!empty($lineitem)) { foreach($lineitem as $row)
                        echo $row['lineitemlevel_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
									 <input type="hidden" name="technical_id" id="technical_id"  class="form-control" value="<?php if (!empty($lineitem)) echo $row['technical_id'];?>" required/>
                                    <input type="hidden" name="topic_id" id="topic_id"  class="form-control" value="<?php if (!empty($lineitem)) echo $row['topic_id'];?>" required/>
                                    <input type="hidden" name="subtopic_id" id="subtopic_id"  class="form-control" value="<?php if (!empty($lineitem)) echo $row['subtopic_id'];?>" required/>
									<input type="hidden" name="lineitem_id" id="lineitem_id"  class="form-control" value="<?php if (!empty($lineitem)) echo $row['lineitem_id'];?>" required/>
                                   
									 <div class="box-body">

                                    <div class="form-group">
									<div class="col-md-12">
                                        <label for="exampleInputEmail1">Title<span class="required">*</span></label>
                                      <input type="text" name="titles" id="titles"  class="form-control" value="<?php if (!empty($lineitem)) echo $row['titles'];?>" required/>
                                     </div>
									</div>
                                </div>
								 <div class="box-body">

                                    <div class="form-group">
									<div class="col-md-12">
                                        <label for="exampleInputEmail1">Description<span class="required">*</span></label>
                                      <textarea name="lineitemlevel_desc" id="lineitemlevel_desc" class="form-control ckeditor" required><?php if (!empty($lineitem)) echo $row['lineitemlevel_desc'];?></textarea>
                                    </div>
									</div>
                                </div>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save Lineitem
                                </button><br/><br/>
                            
                          

                        </div>
                    </div>

                </form>
                    </div>
         
        
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>
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
						<th class="active">Line Item(Level 1)</th>
						<th class="active">Line Item(Level 2)</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($lineitemlevel)): foreach ($lineitemlevel as $ct_row) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $ct_row['skill_name'] ?></td>
                            <td><?php echo $ct_row['topic_name'] ?></td>
                            <td><?php echo $ct_row['subtopic_name'] ?></td>
							<td><?php echo $ct_row['title'] ?></td>
							<td><?php echo $ct_row['titles'] ?></td>
							
                            <td>
                                <?php echo btn_edit('admin/subtopic/edit_subtopic/' . $ct_row['subtopic_id']); ?>
                                <?php echo btn_delete('admin/subtopic/delete_subtopic/' . $ct_row['subtopic_id']); ?>
								<?php echo btn_add('admin/lineitem/index/'. $ct_row['subtopic_id']); ?>
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

<br />


</div><!-- /.right-side -->
<br/><br/><br/><br/>
       
<?php $this->load->view('admin/components/footer'); ?>

<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script>