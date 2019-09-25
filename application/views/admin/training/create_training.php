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
                        <?php if(!empty($training_info)): ?>
                        <h3 class="box-title ">Update Training</h3>
                    <?php else : ?>
                        <h3 class="box-title ">Add New Training</h3>
                    <?php endif; ?>
                </div>
                <div class="box-body">
                        <?php echo $this->session->flashdata('msg'); ?>
                            <form 
                       action="<?php echo base_url().'admin/training/save_training' ?>"  id="add_Training" method="POST" enctype="multipart/form-data">
                       <input type="hidden" name="training_id" value="<?php if(!empty($training_info)) {echo $training_info->training_id;} ?>">
                             <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                           <label class="control-label">Training Title <span class="required">*</span></label>
                                            <input type="text" name="training_title"  class="form-control" id="training_title" value="<?php if(!empty($training_info)) { echo $training_info->training_title;} ?>">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                             <label class="control-label">Trainer Name:  <span class="required">*</span></label>
                                            <input type="text" name="trainar_name" class="form-control" value="<?php if(!empty($training_info)) { echo $training_info->trainar_name;} ?>">
                                        </div>
                                     <div class="col-md-4 col-sm-4">
                                             <label class="control-label">Training Type:  <span class="required">*</span></label>
                                             <select name="training_type" class="form-control" id="training_type">
                                             <option value="">Select One</option> 
                                             <?php  if(!empty($training_info)):?>
                                              <option value="1" <?php if($training_info->training_type == "1"){?> selected="selected" <?php }?>>Workshop</option>
                                              <option value="2" <?php if($training_info->training_type == "2"){?> selected="selected" <?php }?>>Customized course</option>
                                              <option value="3" <?php if($training_info->training_type == "3"){?> selected="selected" <?php }?>>International</option>
                                            <?php else:?> 
                                                <option value="1">Workshop</option>
                                                <option value="2">Customized course</option>
                                                <option value="3">International</option>
                                            <?php endif; ?>
                                            </select>
                                        </div>
                                    </div><!-- end row -->
                    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                           <label class="control-label">Start Date:  <span class="required">*</span></label>
                                                   <div class="input-group">
                                                <input type="text" value="<?php
                                                if (!empty($training_info)) {
                                                    echo  date('d-m-Y', strtotime($training_info->start_date));  
                                                }
                                                ?>" class="form-control datepicker" id=" datepicker" name="start_date">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                    </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                           <label class="control-label">End Date:  <span class="required">*</span></label>
                                                   <div class="input-group">
                                                <input required type="text" value="<?php
                                              if (!empty($training_info)) {
                                                    echo  date('d-m-Y', strtotime($training_info->end_date));  
                                                }
                                                ?>" class="form-control datepicker" id="    end_date" name="end_date">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                    </div>
                                        </div>

                                     <div class="col-md-4 col-sm-4">
                                           <label class="control-label">Deadline :  <span class="required">*</span></label>
                                                   <div class="input-group">
                                                <input type="text" required value="<?php
                                                 if (!empty($training_info)) {
                                                    echo  date('d-m-Y', strtotime($training_info->deadline));  
                                                }
                                                ?>" class="form-control datepicker" id="deadline" name="deadline">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                    </div>
                                        </div>
                                    </div><!-- end row -->

                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                           <label class="control-label">Trainer Details:  <span class="required">*</span></label>
                                            <textarea name="trainer_details" class="form-control" rows="4" id="trainer_details"><?php if(!empty($training_info)) { echo $training_info->trainer_details;} ?></textarea>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                             <label class="control-label">Benifits After The Courses:</label>
                                         <textarea name="benefits" class="form-control" rows="4" id="benefits"><?php if(!empty($training_info)) { echo $training_info->benefits;} ?></textarea>
                                        </div>

                                          <div class="col-md-4 col-sm-4">
                                             <label class="control-label">Venue:  <span class="required">*</span></label>
                                         <textarea name="venus" class="form-control" rows="4" id="venus"> <?php if(!empty($training_info)) { echo $training_info->venus;} ?></textarea>
                                        </div>
               
                                    </div><!-- end row -->
                                         <input type="hidden" name="training_logo_db" value="<?php if(!empty($training_info)) {echo $training_info->training_logo;}?>" />
                                         <input type="hidden" name="trainer_image_db" value="<?php if(!empty($training_info)) {echo $training_info->trainer_image;}?>" />
                                    <div class="row">

                              <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <label class="control-label">Training Logo : <small>(Upload logo 300*300 pixel)</small></label> <br>
                                   <div class="fileinput fileinput-new"  data-provides="fileinput">
                                      <div class="fileinput-new thumbnail g-logo-img" >
              <img src="<?php echo base_url().'upload/training/';?><?php if(!empty($training_info)) {echo $training_info->training_logo ;}?>" alt="Trainner Image">
                                      </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail g-logo-img"  ></div>
                                      <div>
                                         <span class="btn btn-default btn-file">
                                         <span class="fileinput-new">
                                         <input type="file" name="training_logo" value="<?php if(!empty($training_info)) {echo $training_info->training_logo;}?>" />
</span>
                                        
                                         <span class="fileinput-exists">Change</span>
                                         </span>
                                         <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                      <div id="valid_msg" class="required"></div>
                                   </div>
                                </div>  </div>



                                 <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <label class="control-label">Trainer's Image : <small>(Upload logo 300*300 pixel)</small></label> <br>
                                   <div class="fileinput fileinput-new"  data-provides="fileinput">
                                      <div class="fileinput-new thumbnail g-logo-img" >
                <img src="<?php echo base_url().'upload/training/';?><?php if(!empty($training_info)) {echo $training_info->trainer_image ;}?>" alt="Trainar Image">
                                      </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail g-logo-img"  ></div>
                                      <div>
                                         <span class="btn btn-default btn-file">
                                         <span class="fileinput-new">
                                         <input type="file" name="trainer_image" value="<?php if(!empty($training_info)) {echo $training_info->trainer_image ;}?>" /></span>
                                         <span class="fileinput-exists">Change</span>
                                         </span>
                                         <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                      <div id="valid_msg" class="required"></div>
                                   </div>
                                </div>  </div>
                                             <div class="col-md-4 col-sm-4">
                                             <label class="control-label">Training Fee:  <span class="required">*</span></label>
                                            <input type="text" id="training_fee" name="training_fee" class="form-control" value="<?php if(!empty($training_info)) { echo $training_info->training_fee;} ?>">
                                        </div>
                                    </div>

                                <div class="row">
                            <!-- /.JOb Descption -->
                             <div class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Training Content</label>
                                    <textarea name="training_content" class="form-control myTextEditor autogrow"><?php if(!empty($training_info)) {echo $training_info->training_content;} ?></textarea>

                                </div>
                                </div>
                                </div>
                <?php if(!empty($training_info)): ?>
                     <button type="submit" class="btn bg-navy" id="submitTraining" >Update Training</button>
                 <?php else : ?>
                <button type="submit" class="btn bg-navy" id="submitTraining" >Save Training</button>
            <?php endif; ?>

                </form>

                </div><!-- /.box-body -->
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

        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        mode : "specific_textareas",
        editor_selector : "myTextEditor",
        theme: "modern",
        width: 700,
        height: 300,
        relative_urls: false,
        remove_script_host: false,
         menubar:false,
           plugins: [
            "advlist autolink link image code lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],

        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        external_filemanager_path:"<?php echo base_url() ?>filemanager/",
        filemanager_title:"File Manager " ,
        external_plugins: { "filemanager" : "<?php echo base_url() ?>filemanager/plugin.min.js"}



    });
</script>

        <?php ///$this->load->view('admin/_layout_modal'); ?>
        <?php //$this->load->view('admin/_layout_modal_small'); ?>
        <?php $this->load->view('admin/components/footer'); ?>
