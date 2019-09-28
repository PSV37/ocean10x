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
                    
                    <form id="email_frm" enctype="multipart/form-data" role="form" method="post" action="">
                    
                    <h2>Add Email</h2>

                    <input id="email" class="form-control" name="email" placeholder="Add Email" type="email">
                    <div id="email_result"></div>
                    
                    <input type="submit" value="Add Email" class="btn-content"/>
                    </form>
                  
                </div>
            </section>
            
            <section>                
                <div class="settingbox">
                    <form id="addr_frm" enctype="multipart/form-data" role="form" method="post" action="">                    
                    <h2>Add Address</h2>
                    <input id="address" class="form-control" name="address" placeholder="Add Address" type="text">
                    <div id="addr_result"></div>                   
                    <input type="submit" value="Add Address" class="btn-content"/>
                    </form>
                  
                </div>
            </section>
            
            <section>                
                <div class="settingbox">                    
                    <form id='phn_frm' enctype="multipart/form-data" role="form" method="post" action="">
                    
                    <h2>Add Phone Number</h2>
                    <input id="phone" class="form-control" name="phone" placeholder="Add Phone Number" type="number" maxlength="10">    
                    <div id='phn_result'></div>                
                    <input type="submit" value="Add Phone Number" class="btn-content"/>
                    </form>                  
                </div>
            </section>
            
            <section>                
                <div class="settingbox">                    
                    <form id='metas_frm' enctype="multipart/form-data" role="form" method="post" action="">
                    
                    <h2>Add Metas</h2>
                    <label>Add Meta Title</label>
                    <input id="meta_title" class="form-control" name="meta_title" placeholder="Add Meta Title" type="text">
                    
                    <label>Add Meta Keywords</label>
                    <input id="meta_keywords" class="form-control" name="meta_keywords" placeholder="Add Meta Keywords" type="text">
                    
                    <label>Add Meta Description</label>
                    <input id="meta_description" class="form-control" name="meta_description" placeholder="Add Meta Description" type="text">    
                    <div id="meta_result"></div>                
                    <input type="submit" value="Add " class="btn-content"/>
                    </form>
                  
                </div>
            </section>
            
            
          </div>



</div>
    <?php $this->load->view('admin/components/footer'); ?>
<script>
// Email form submit
$('form#email_frm').submit(function(e)
  {
      e.preventDefault();
    
      $.ajax({
                url: "<?php echo base_url('admin/settings/add_email'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                 dataType: "json",
                success: function(data)
                {
                    if($.isEmptyObject(data.error)){

                        $("#email_result").html('<div class="alert alert-success"><button type="button" class="close">×</button>'+data.success+'</div>');
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
                            $("#email_result").html('<div class="alert alert-danger"><button type="button" class="close">×</button>'+data.error+'</div>');
                        }
                }
          });
       
  }); 
// Address form submit
$('form#addr_frm').submit(function(e)
  {
      e.preventDefault();
    
      $.ajax({
                url: "<?php echo base_url('admin/settings/add_address'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                 dataType: "json",
                success: function(data)
                {
                    if($.isEmptyObject(data.error)){

                        $("#addr_result").html('<div class="alert alert-success"><button type="button" class="close">×</button>'+data.success+'</div>');
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
                            $("#addr_result").html('<div class="alert alert-danger"><button type="button" class="close">×</button>'+data.error+'</div>');
                        }
                }
          });
       
  }); 

//Phone number form submit
$('form#phn_frm').submit(function(e)
  {
      e.preventDefault();
    
      $.ajax({
                url: "<?php echo base_url('admin/settings/add_phone'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                 dataType: "json",
                success: function(data)
                {
                    if($.isEmptyObject(data.error)){

                        $("#phn_result").html('<div class="alert alert-success"><button type="button" class="close">×</button>'+data.success+'</div>');
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
                            $("#phn_result").html('<div class="alert alert-danger"><button type="button" class="close">×</button>'+data.error+'</div>');
                        }
                }
          });
       
  }); 

//Metas form submit
$('form#metas_frm').submit(function(e)
  {
      e.preventDefault();
    
      $.ajax({
                url: "<?php echo base_url('admin/settings/add_metas'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                 dataType: "json",
                success: function(data)
                {
                    if($.isEmptyObject(data.error)){

                        $("#meta_result").html('<div class="alert alert-success"><button type="button" class="close">×</button>'+data.success+'</div>');
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
                            $("#meta_result").html('<div class="alert alert-danger"><button type="button" class="close">×</button>'+data.error+'</div>');
                        }
                }
          });
       
  });
</script>

