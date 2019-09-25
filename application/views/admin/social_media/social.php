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
        <div class="col-md-11 text-right">
          <button id="popup" class="btn btn-success" onClick="social_show()">Add New</button>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="populate-cms-data" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th bgcolor="#FFFFFF">Title</th>
              <th bgcolor="#FFFFFF">Social Media icon</th>
              <th bgcolor="#FFFFFF">Link</th>
              <th bgcolor="#FFFFFF">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($get_social): foreach ($get_social as $row): ?>
            <tr id="row_<?php echo $row->ID; ?>">
              <td bgcolor="#FFFFFF"><?php echo $row->title; ?></td>
              <td bgcolor="#FFFFFF"><?php echo $row->class; ?></td>
              <td bgcolor="#FFFFFF"><?php echo $row->link; ?></td>
              <td bgcolor="#FFFFFF"><button id="popup" onClick="load_social_edit_form(<?php echo $row->ID; ?>);" class="btn btn-success btn-xs">
                Edit
                </button>
                <a href="javascript:delete_social(<?php echo $row->ID; ?>);" class="btn btn-danger btn-xs">Delete</a></td>
            </tr>
            <?php endforeach;
                            else: ?>
            <tr>
              <td colspan="7" align="center" bgcolor="#FFFFFF" class="text-red">No Record found!</td>
            </tr>
            <?php endif; ?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </section>
    <div id="social"> 
      <!-- Popup Div Starts Here -->
      <div id="popupContact"> 
        <!-- Contact Us Form -->
        <form name="frm_blog_post" id="frm_blog_post" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/social_media/add_social'); ?>">
          <img id="close" src="<?php echo base_url();?>asset/img/3.png" onclick ="social_hide()">
          <h2>Add New Social Media Icon</h2>
          <hr>
          <input id="title" class="form-control" name="title" placeholder="Title" type="text">
          <input id="class" class="form-control" name="class" placeholder="Icon Class" type="text">
          <input id="link" class="form-control" name="link" placeholder="Link" type="text">
          <input type="submit" value="Submit" class="btn-content"/>
        </form>
      </div>
      <!-- Popup Div Ends Here --> 
    </div>
    <div id="edit_social"> 
      <!-- Popup Div Starts Here -->
      <div id="popupContact"> 
        <!-- Contact Us Form -->
        <form name="frm_post" id="edit_frm_post" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/social_media/edit_social'); ?>">
          <img id="close" src="<?php echo base_url();?>asset/img/3.png" onclick ="social_hide_edit()">
          <h2>Social Media Icon</h2>
          <hr>
          <input id="edit_title" class="form-control" name="edit_title" placeholder="Title" type="text">
          <input id="social_id" class="form-control" name="social_id" placeholder="Meta Title" type="hidden">
          <input id="edit_class" class="form-control" name="edit_class" placeholder="Edit Social Class" type="text">
          <input id="edit_link" class="form-control" name="edit_link" placeholder="Edit Social Link" type="text">
          <input type="submit" value="Submit" class="btn-content"/>
        </form>
      </div>
      <!-- Popup Div Ends Here --> 
    </div>
  </div>
</div>

<!-- Display Popup Button -->

<?php $this->load->view('admin/components/footer'); ?>
