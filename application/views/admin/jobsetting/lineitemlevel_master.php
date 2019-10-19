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
                        <h3 class="box-title ">Add LineItem Level</h3>
                    </div>
                </div>
               <div class="box-background">
              
                <form role="form" enctype="multipart/form-data" action="" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
									 <input type="hidden" name="technical_id" id="technical_id"  class="form-control" value="<?php if (!empty($lineitem_data)) echo $lineitem_data[0]['technical_id'];?>" required/>
                                    <input type="hidden" name="topic_id" id="topic_id"  class="form-control" value="<?php if (!empty($lineitem_data)) echo $lineitem_data[0]['topic_id'];?>" required/>
                                    <input type="hidden" name="subtopic_id" id="subtopic_id"  class="form-control" value="<?php if (!empty($lineitem_data)) echo $lineitem_data[0]['subtopic_id'];?>" required/>
									 <input type="hidden" name="subtopic_id" id="subtopic_id"  class="form-control" value="<?php if (!empty($lineitem_data)) echo $lineitem_data[0]['lineitem_id'];?>" required/>
                                   
									 <div class="box-body">

                                    <div class="form-group">
									<div class="col-md-12">
                                        <label for="exampleInputEmail1">Title<span class="required">*</span></label>
                                      <input type="text" name="titles" id="titles"  class="form-control" value="<?php  if(isset($line_itemlevel_data)){ echo $line_itemlevel_data[0]['titles'];  } ?>" required/>
                                     </div>
									</div>
                                </div>
								 <div class="box-body">

                                    <div class="form-group">
									<div class="col-md-12">
                                        <label for="exampleInputEmail1">Description<span class="required">*</span></label>
                                      <textarea name="lineitemlevel_desc" id="lineitemlevel_desc" class="form-control ckeditor" required><?php  if(isset($line_itemlevel_data)){ echo $line_itemlevel_data[0]['lineitemlevel_desc'];  } ?></textarea>
                                    </div>
									</div>
                                </div>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" name="save_lineitemlevel" type="submit">Save Lineitem
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