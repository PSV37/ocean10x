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
        <form name="frm_blog_post" id="frm_blog_post" enctype="multipart/form-data" role="form" method="post" action="">
          <img id="close" src="<?php echo base_url();?>asset/img/3.png" onclick ="social_hide()">
          <h2>Add New Social Media Icon</h2>
          <hr>
          <input id="title" class="form-control" name="title" placeholder="Title" type="text">
          <input id="class" class="form-control" name="class" placeholder="Icon Class" type="text">
          <input id="link" class="form-control" name="link" placeholder="Link" type="text">
          <div id="social_add_result"></div>
          <input type="submit" value="Submit" class="btn-content"/>
        </form>
      </div>
      <!-- Popup Div Ends Here --> 
    </div>
    <div id="edit_social"> 
      <!-- Popup Div Starts Here -->
      <div id="popupContact"> 
        <!-- Contact Us Form -->
        <form name="frm_post" id="edit_frm_post" enctype="multipart/form-data" role="form" method="post" action="">
          <img id="close" src="<?php echo base_url();?>asset/img/3.png" onclick ="social_hide_edit()">
          <h2>Social Media Icon</h2>
          <hr>
          <input id="edit_title" class="form-control" name="edit_title" placeholder="Title" type="text">
          <input id="social_id" class="form-control" name="social_id" placeholder="Meta Title" type="hidden">
          <input id="edit_class" class="form-control" name="edit_class" placeholder="Edit Social Class" type="text">
          <input id="edit_link" class="form-control" name="edit_link" placeholder="Edit Social Link" type="text">
          <div id="social_edit_result"></div>
          <input type="submit" value="Submit" class="btn-content"/>
        </form>
      </div>
      <!-- Popup Div Ends Here --> 
    </div>
  </div>
</div>

<!-- Display Popup Button -->

<?php $this->load->view('admin/components/footer'); ?>
<script>
// Social Icon Add form submit
$('form#frm_blog_post').submit(function(e)
  {
      e.preventDefault();
    
      $.ajax({
                url: "<?php echo base_url('admin/social_media/add_social'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                dataType: "json",
                success: function(data)
                {
                    if($.isEmptyObject(data.error)){

                        $("#social_add_result").html('<div class="alert alert-success"><button type="button" class="close">×</button>'+data.success+'</div>');
                            window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                            location.reload();
                            }, 1500);
                          $('.alert .close').on("click", function(e){
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                          });

                        }else{
                            $("#social_add_result").html('<div class="alert alert-danger"><button type="button" class="close">×</button>'+data.error+'</div>');
                        }
                }
          });
       
  }); 

// Social Icon Edit form submit
$('form#edit_frm_post').submit(function(e)
  {
      e.preventDefault();
    
      $.ajax({
                url: "<?php echo base_url('admin/social_media/edit_social'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                dataType: "json",
                success: function(data)
                {
                    if($.isEmptyObject(data.error)){

                        $("#social_edit_result").html('<div class="alert alert-success"><button type="button" class="close">×</button>'+data.success+'</div>');
                            window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                            location.reload();
                            }, 1500);
                          $('.alert .close').on("click", function(e){
                                $(this).parent().fadeTo(500, 0).slideUp(500);
                          });

                        }else{
                            $("#social_edit_result").html('<div class="alert alert-danger"><button type="button" class="close">×</button>'+data.error+'</div>');
                        }
                }
          });
       
  }); 
</script>