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
            <section>                
                <div class="settingbox">                    
                    <form  enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/settings/do_upload'); ?>">
                    <h2>Add Site Logo</h2>
                    <input id="post_img" class="form-control" name="post_img" placeholder="Upload Logo" type="file">
                    <div id="logo_apend">
                  	</div>
                    <input type="submit" value="Upload" class="btn-content"/>
                    </form>
                </div>
            </section>
            
            
			<section>
                
                <div class="settingbox">
                    
                    
                    <form  enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/settings/add_email'); ?>">
                    
                    <h2>Add Email</h2>

                    <input id="email" class="form-control" name="email" placeholder="Add Email" type="email">
                    
                    <input type="submit" value="Add Email" class="btn-content"/>
                    </form>
                  
                </div>
            </section>
            
            <section>                
                <div class="settingbox">
                    <form  enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/settings/add_address'); ?>">                    
                    <h2>Add Address</h2>
                    <input id="address" class="form-control" name="address" placeholder="Add Address" type="text">                    
                    <input type="submit" value="Add Address" class="btn-content"/>
                    </form>
                  
                </div>
            </section>
            
            <section>                
                <div class="settingbox">                    
                    <form  enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/settings/add_phone'); ?>">
                    
                    <h2>Add Phone Number</h2>
                    <input id="phone" class="form-control" name="phone" placeholder="Add Phone Number" type="number">                    
                    <input type="submit" value="Add Phone Number" class="btn-content"/>
                    </form>                  
                </div>
            </section>
            
            <section>                
                <div class="settingbox">                    
                    <form  enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/settings/add_metas'); ?>">
                    
                    <h2>Add Metas</h2>
                    <label>Add Meta Title</label>
                    <input id="meta_title" class="form-control" name="meta_title" placeholder="Add Meta Title" type="text">
                    
                    <label>Add Meta Keywords</label>
                    <input id="meta_keywords" class="form-control" name="meta_keywords" placeholder="Add Meta Keywords" type="text">
                    
                    <label>Add Meta Description</label>
                    <input id="meta_description" class="form-control" name="meta_description" placeholder="Add Meta Description" type="text">                    <input type="submit" value="Add " class="btn-content"/>
                    </form>
                  
                </div>
            </section>
            
            
          </div>



</div>
    <?php $this->load->view('admin/components/footer'); ?>


