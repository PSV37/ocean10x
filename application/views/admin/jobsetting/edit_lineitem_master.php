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
                        <h3 class="box-title ">Edit Line Item's</h3>
                    </div>
                </div>
               <div class="box-background">
              
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/lineitem/save_lineitem/<?php  if (!empty($edit_lineitem_info)) { foreach($edit_lineitem_info as $row)
                        echo $row['lineitem_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
									 <input type="hidden" name="technical_id" id="technical_id"  class="form-control" value="<?php if (!empty($edit_lineitem_info)) echo $row['technical_id'];?>" required/>
                                    <input type="hidden" name="topic_id" id="topic_id"  class="form-control" value="<?php if (!empty($edit_lineitem_info)) echo $row['topic_id'];?>" required/>
                                    <input type="hidden" name="subtopic_id" id="subtopic_id"  class="form-control" value="<?php if (!empty($edit_lineitem_info)) echo $row['subtopic_id'];?>" required/>
                                   
									 <div class="box-body">

                                    <div class="form-group">
									<div class="col-md-12">
                                        <label for="exampleInputEmail1">Title<span class="required">*</span></label>
                                      <input type="text" name="title" id="title"  class="form-control" value="<?php if (!empty($edit_lineitem_info)) echo $row['title'];?>" required/>
                                     </div>
									</div>
                                </div>
								 <div class="box-body">

                                    <div class="form-group">
									<div class="col-md-12">
                                        <label for="exampleInputEmail1">Description<span class="required">*</span></label>
                                      <textarea name="lineitem_desc" id="lineitem_desc" class="form-control ckeditor" required><?php if (!empty($edit_lineitem_info)) echo $row['lineitem_desc'];?></textarea>
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