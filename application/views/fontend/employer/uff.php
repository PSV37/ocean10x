<?php 
    $this->load->view('fontend/layout/header.php');
?>                
             

          <div class="section lb">
                <div class="container">
                    <div class="row">
                     <?php $this->load->view('fontend/layout/employer_left.php'); ?>

                        <div class="content col-md-9">
                          <div class="post-padding">
                                <div class="job-title nocover hidden-sm hidden-xs"><h5>Edit Employer Profile</h5></div>
                                <form id="submit" action="<?php echo base_url() ?>employer/job_post" method="post" class="submit-form">
                                <input type="hidden" name="job_post_id" value="<?php if(!empty($job_info->job_post_id)){echo $job_info->job_post_id;} ?>">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">   
                                            <label class="control-label">Job Title</label>
                                            <input type="text" name="job_title" required value="<?php 
                                            	 if(!empty($job_info->job_title)){
                                            	 	echo $job_info->job_title;
                                            	 }
                                            ?>" class="form-control" >
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label class="control-label">Job Position</label>
                                            <input type="text" name="job_position" required value="<?php 
                                            	 if(!empty($job_info->job_position)){
                                            	 	echo $job_info->job_position;
                                            	 }
                                            ?>" class="form-control">
                                        </div>
                                    </div>

                                    <hr class="invis">

                                    <div class="row">
                                          <div class="col-md-6 col-sm-12">
                                            <label class="control-label">Job Category</label>
                                            <select name="job_category" required class="selectpicker" data-style="btn-default" data-live-search="true">
                                            <option value="">Select Job Category</option>
                                                <?php if(!empty($job_info->job_category)) {
                                                echo $this->job_category_model->selected($job_info->job_category);
                                                } else {
                                                   echo $this->job_category_model->selected();
                                                }
                                                 ?>
                                            </select>  
                                        </div>
                                          <div class="col-md-6 col-sm-12">
                                            <label class="control-label">Job Level</label>
                                            <select name="job_level" required class="selectpicker" data-style="btn-default" data-live-search="true">
                                             <option value="">Select Job Level</option>
                                                <?php if(!empty($job_info->job_level)) {
                                                echo $this->job_level_model->selected($job_info->job_level);
                                                } else {
                                                   echo $this->job_level_model->selected();
                                                }
                                                 ?>
                                            </select>  
                                        </div>
                                    </div><!-- end row -->

                                    <hr class="invis">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label class="control-label">Job Nature</label>
                                            <select name="job_nature" required class="selectpicker" data-style="btn-default" data-live-search="true">
                                             <option value="">Select Job Nature</option>
                                                <?php if(!empty($job_info->job_nature)) {
                                                echo $this->job_nature_model->selected($job_info->job_nature);
                                                } else {
                                                   echo $this->job_nature_model->selected();
                                                }
                                                 ?>
                                            </select>  
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label class="control-label">Job Location</label>
                                            <select name="job_location" required class="selectpicker" data-style="btn-default" data-live-search="true">
                                             <option value="">Select Location</option>
                                                <?php if(!empty($job_info->company_category)) {
                                                echo $this->job_location_model->selected($job_info->company_category);
                                                } else {
                                                   echo $this->job_location_model->selected();
                                                }
                                                 ?>
                                            </select>  
                                        </div>
                                    </div><!-- end row -->
                                   

                                    <hr class="invis">
 									<div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label class="control-label">Salary Range</label>
                                            <select name="salary_range" required class="selectpicker" data-style="btn-default" data-live-search="true">
                                             <option value="">Select Salary Range</option>
                                                <?php if(!empty($job_info->salary_range)) {
                                                echo $this->job_salary_range_model->selected($job_info->salary_range);
                                                } else {
                                                   echo $this->job_salary_range_model->selected();
                                                }
                                                 ?>
                                            </select>  
                                        </div>

                                   <div class="col-md-6 col-sm-12">   
                                            <label class="control-label">Job Deadline</label>
                                            <input type="text" required name="job_deadline" value="<?php 
                                                 if(!empty($job_info->job_deadline)){
                                                    echo $job_info->job_deadline;
                                                 }
                                            ?>" class="form-control" >
                                        </div>

                                    </div><!-- end row -->

                                      <hr class="invis">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">   
                                            <label class="control-label">Preferred Age</label>
                                            <input type="text" required name="preferred_age" value="<?php 
                                                 if(!empty($job_info->preferred_age)){
                                                    echo $job_info->preferred_age;
                                                 }
                                            ?>" class="form-control" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">   
                                            <label class="control-label">Working Hours</label>
                                            <input type="text" required name="working_hours" value="<?php 
                                                 if(!empty($job_info->working_hours)){
                                                    echo $job_info->working_hours;
                                                 }
                                            ?>" class="form-control" >
                                        </div>
                                    </div><!-- end row -->
                                     <hr class="invis">
                                       <div class="row">
                                        <div class="col-md-12 col-sm-12">   
                                            <label class="control-label">Job Tags</label>
                                            <input type="text" required name="preferred_age" value="<?php 
                                                 if(!empty($job_info->preferred_age)){
                                                    echo $job_info->preferred_age;
                                                 }
                                            ?>" class="form-control" >
                                        </div>
                                    </div><!-- end row -->
                                     <hr class="invis">
                                      <div class="row">
                                       <div class="col-md-12 col-sm-12">   
                                            <label class="control-label">Job Description</label>
                                               <textarea name="job_desc" required class="form-control autogrow" required>
                                        <?php if(!empty($job_info)) echo $job_info->job_desc; else {
                                            echo '<h3>Job Description</h3>
                                    <p>What is the job about? Enter overall description of your job.</p>
                                    <h3>Benefits</h3>
                                    <ul>
                                    <li>What candidate can get from the position?</li>
                                    <li>What candidate can get from the position?</li>
                                    <li>What candidate can get from the position?</li>
                                    </ul>
                                    <h3>Job Requirements</h3>
                                    <ol>
                                    <li>Detailed requirement for the vacancy.?</li>
                                    <li>Detailed requirement for the vacancy.?</li>
                                    <li>Detailed requirement for the vacancy.?</li>
                                    </ol>
                                    <h3>How To Apply</h3>
                                    <p>How candidate can apply for your job. You can leave your contact, address to receive hard copy application or any detailed guide for application.</p>';
                                            } ?>
                                    </textarea>

                                        </div>
                                      </div>
                                      <hr class="invis">
                                    <button class="btn btn-primary" type="submit">Post a Job</button>
                                </form>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->




   <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
        selector: "textarea",
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
  
 <?php $this->load->view("fontend/layout/footer.php"); ?>