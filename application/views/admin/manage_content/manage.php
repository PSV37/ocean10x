
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
                <div class="row">
                    <div class="col-md-12 col-md-offset-9">
                <button id="popup" class="btn btn-success" onClick="div_show()">Add New Content</button> 
                
                </div>
                    
                </div>
                <div class="box-body table-responsive">
      
        <table id="populate-cms-data" class="table table-bordered table-hover">
            <thead>
                <tr>
                   
                    <th width="20%" bgcolor="#FFFFFF">Title</th>
                    <th width="65%" bgcolor="#FFFFFF">Description</th>
                    <th width="15%" bgcolor="#FFFFFF">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php if ($get_posts): foreach ($get_posts as $row): ?>
                    <tr id="row_<?php echo $row->ID; ?>">
                       
                        <td bgcolor="#FFFFFF">
                            <?php echo $row->heading; ?>
                        </td>
                        <td bgcolor="#FFFFFF">
                            <?php echo character_limiter($row->description, 200); ?>
                        </td>

                        <td bgcolor="#FFFFFF">
                            <button id="popup" onClick="load_content_edit_form(<?php echo $row->ID; ?>);" class="btn btn-success btn-xs">Edit</button>
                            <a href="javascript:delete_post(<?php echo $row->ID; ?>);" class="btn btn-danger btn-xs">Delete</a> 
                        </td>
                    </tr>
                    <?php endforeach;
                            else: ?>
                        <tr>
                            <td colspan="7" align="center" class="text-red">No Record found!</td>
                        </tr>
                        <?php endif; ?>
            </tbody>
            <tfoot> </tfoot>
        </table>
    </div>
            </section>
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form name="frm_blog_post" id="frm_blog_post" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/manage_content/add_content'); ?>">
<img id="close" src="<?php echo base_url();?>asset/img/3.png" onclick ="div_hide()">
<h2>Add Page</h2>
<hr>

<input id="heading" class="form-control" name="heading" placeholder="Heading" type="text">

<input id="slug" class="form-control" name="slug" placeholder="Slug" type="text">
<input id="meta_title_cms" class="form-control" name="meta_title" placeholder="Meta Title" type="text">
<input id="meta_keywords_cms" class="form-control" name="meta_keywords" placeholder="Meta Keywords" type="text">
<input id="meta_description_cms" class="form-control" name="meta_description" placeholder="Meta dicription" type="text">
<br>
<textarea id="content_ck" class="form-control" name="content_ck" placeholder="Content"></textarea>
<input type="submit" value="Submit" class="btn-content"/>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<div id="edit_abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form name="frm_post" id="edit_frm_post" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/manage_content/edit_content'); ?>">
<img id="close" src="<?php echo base_url();?>asset/img/3.png" onclick ="div_hide_edit()">
<h2>Edit Page</h2>
<hr>

<input id="edit_heading" class="form-control" name="edit_heading" placeholder="Heading" type="text">
<input id="cms_id" class="form-control" name="cms_id" placeholder="Meta Title" type="hidden">
<input id="edit_slug" class="form-control" name="edit_slug" placeholder="Slug" type="text">
<input id="edit_meta_title_cms" class="form-control" name="edit_meta_title" placeholder="Meta Title" type="text">
<input id="edit_meta_keywords_cms" class="form-control" name="edit_meta_keywords" placeholder="Meta Keywords" type="text">
<input id="edit_meta_description_cms" class="form-control" name="edit_meta_description" placeholder="Meta dicription" type="text">
<br>
<textarea id="edit_content_ck" class="form-control" name="edit_content_ck" placeholder="Content"></textarea>
<input type="submit" value="Submit" class="btn-content"/>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
          </div>
 
    </div>

<!-- Display Popup Button -->


    <?php $this->load->view('admin/components/footer'); ?>

       
