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
  <section class="content-header"> </section>
  <br/>
  <div class="container-fluid">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header box-header-background with-border">
              <div class="col-md-offset-3">
                <h3 class="box-title ">Admin User</h3>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-background"> <?php echo $this->session->flashdata('msg'); ?> 
              <!-- form start -->
            <form role="form" id="userCreate" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/admin_user/save_admin/<?php if (!empty($user_info->job_category_id)) { echo $user_info->job_category_id;}
              ?>" method="post">
                <div class="row">
                  <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                    <div class="box-body"> 
                       <!-- /.Full  Name -->
                      <input type="hidden"  id="id" name="id" value="<?php if(is_numeric(end($this->uri->segment_array()))){
												 echo   end($this->uri->segment_array()); } ?>" >
                      <div class="form-group">
                        <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                        <input type="text"  id="name" name="name" placeholder="Name" value="<?php if (!empty($user_info->name)) { echo $user_info->name; } ?>" class="form-control">
                      </div>
                      
                      <!-- /.User Name -->
                      <div class="form-group">
                        <label for="exampleInputEmail1">User Name <span class="required">*</span></label>
                        <input type="text" id="user_name"  name="user_name" placeholder="User Name" value="<?php if (!empty($user_info->user_name)) { echo $user_info->user_name; } ?>" class="form-control">
                      </div>
                      
                      <!-- /.Email -->
                      <div class="form-group">
                        <label >Email <span class="required">*</span></label>
                        <input type="email" id="email1"  name="email" placeholder="Email Name" value="<?php if (!empty($user_info->email)) { echo $user_info->email; } ?>" class="form-control">
                      </div>
                       <!-- /.User Type -->
                      <div class="form-group">
                        <label >User Type <span class="required">*</span></label>
						            <select id="user_type"  name="user_type" class="form-control" >
                          <option value="super" <?php
                                           if ($user_info->user_type=='super') {
                                               echo 'selected="selected"';
                                           }
                                           ?>>Super Admin</option>
					                <option value="admin" <?php
                                           if ($user_info->user_type=='admin') {
                                               echo 'selected="selected"';
                                           }
                                           ?>>Admin User</option>
					   
					             </select>
                      </div>
                      <!-- /.Password -->
                      <?php  if (!empty($user_info->password)) { }else{?>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Password <span class="required">*</span></label>
                          <input type="password"  name="password" id="password" placeholder="password"
                                             value="<?php
                                             if (!empty($user_info->password)) {
                                                 echo $user_info->password;
                                             }
                                             ?>"
                                             class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Confirm Password <span class="required">*</span></label>
                          <input type="password"  id="retypepassword" name="retypepassword" placeholder="Confirm Password"
                                             value="<?php
                                             if (!empty($user_info->password)) {
                                                 echo $user_info->password;
                                             }
                                             ?>"
                                             class="form-control">
                        </div>
                      <?php } ?>
                      <button class="btn bg-navy" type="submit">Save User </button>
                      <br/>
                      <br/>
                    </div>
                    <!-- /.box-body --> 
                    
                  </div>
                </div>
              </form>
            </div>
            <div class="box-footer"> </div>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-striped" id="dataTables-example">
                  <thead>
                    <tr>
                      <th class="active">SL</th>
                      <th class="active">Full Name</th>
                      <th class="active">Email </th>
					            <th class="active">User Type </th>
                      <th class=" active col-sm-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $key = 1 ?>
                    <?php if (!empty($all_user)): foreach ($all_user as $v_user) : ?>
                    <!--get all category if not this empty-->
                    <tr>
                      <td><?php echo $key ?></td>
                      <!--Serial No> -->
                      <td><?php echo $v_user->name; ?></td>
                      <td><?php echo $v_user->email; ?></td>
					  
                      <td><?php echo $v_user->user_type; ?></td>
                      <td><?php echo btn_edit('admin/admin_user/edit_admin/' . $v_user->admin_user_id); ?> <?php echo btn_delete('admin/admin_user/delete_admin/' . $v_user->admin_user_id); ?></td>
                    </tr>
                    <?php
                    $key++;
                    endforeach;
                    ?>
                    <!--get all category if not this empty-->
                    <?php else : ?>
                    <!--get error message if this empty-->
                  
                    <td colspan="3"><strong>There is no record for display</strong></td>
                    <!--/ get error message if this empty-->
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
</div>
<!-- /.right-side -->

<?php ///$this->load->view('admin/_layout_modal'); ?>
<?php //$this->load->view('admin/_layout_modal_small'); ?>
<?php $this->load->view('admin/components/footer'); ?>
