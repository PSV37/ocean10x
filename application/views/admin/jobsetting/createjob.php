<?php $this->load->view('admin/components/header'); ?>
<link rel="stylesheet" type="text/css" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/select2/select2.min.css">

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
                   
                        <h3 class="box-title ">Post a new Job</h3>
                   
                </div>
                <!-- /.box-header -->
                    <?php  echo $this->session->flashdata('msg');?>
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" id="addJobForm"
                      action="<?php echo base_url(); ?>admin/job_posting/save_job/<?php if(!empty($job_info)){
                          echo $job_info->job_post_id;}?>"
                      method="post">

                    <div class="row">
                      
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">


                            <div class="row">
                            <div class="col-md-6">
                                <!-- /.Job title Name -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Job Title <span class="required">*</span></label>
                                    <input type="text" name="job_title" placeholder="Job Title Name" required
                                            value="<?php if(!empty($job_info)) echo $job_info->job_title ?>"
                                           class="form-control">
                                </div>
                                </div>
                                   <div class="col-md-6">
                                        <!-- / Job Category -->
                                        <div class="form-group">
                                            <label>Job Industry <span class="required">*</span></label>
                                            <select name="job_category" class="form-control col-sm-5">
                                                <option value="">Select Job Industry</option>
                                                <?php if(!empty($job_info)) {
                                                echo $this->job_category_model->selected($job_info->job_category);
                                                } else {
                                                   echo $this->job_category_model->selected();
                                                }
                                                 ?>
                                             
                                            </select>
                                        </div>
                                    </div>

                                </div>


                            <div class="row">
                               <div class="col-md-4">
                                     <!-- /. Job Salary Range -->
                                        <div class="form-group">
                                            <label>Salary Offered<span class="required">*</span></label>
                                            <input type="number" name="salary_range" id="salary_range" onKeyUp="javascript:changeSalary();" class="form-control col-sm-5"  value="<?php if(!empty($job_info)) echo $job_info->salary_range; ?>">       
                                            
                                        </div>
                                        </div>

                                    <div class="col-md-4">
                                     <!-- /. Job level -->
                                        <div class="form-group">
                                            <label>Job Level <span class="required">*</span></label>
                                            <select name="job_level" class="form-control col-sm-5">
                                                <option value="">Select Job Level</option>
                                                <?php if(!empty($job_info)) {
                                                echo $this->job_level_model->selected($job_info->job_level);
                                                } else {
                                                   echo $this->job_level_model->selected();
                                                }
                                                 ?>
                                             
                                            </select>
                                        </div>
                                    </div>

                                         <div class="col-md-4 col-sm-12"> 
                                            <div class="formrow">  
                                            <label class="control-label ">Number of Vacancy </label>
                                            <input type="number" class="form-control"  name="no_jobs" value="<?php 
                                                 if(!empty($job_info->no_jobs)){
                                                    echo $job_info->no_jobs;
                                                 }
                                            ?>" />
                                          </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                         
                                        <div class="col-md-4 col-sm-12"> 
                                          <div class="formrow">  
                                            <label class="control-label ">Years of Experience  </label>
                                            <input type="number" class="form-control"  name="experience" value="<?php 
                                                 if(!empty($job_info->experience)){
                                                    echo $job_info->experience;
                                                 }
                                            ?>" />
                                          </div>
                                        </div>
                                      
                                            
                                          <div class="col-md-4 col-sm-12"> 
                                          	<div class="formrow">  
                                              <label class="control-label ">Required Education   </label>

                                              <select name="job_edu" class="form-control"  data-style="btn-default" data-live-search="true">
                                               <option value="">Select Education </option>
                                                  <?php if(!empty($job_info->job_edu)) {
                                                  echo $this->education_level_model->selected($job_info->job_edu);
                                                  } else {
                                                     echo $this->education_level_model->selected();
                                                  }
                                                   ?>
                                              </select> 
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                     <!-- /. Job Natuere -->
                                            <div class="form-group">
                                              <label>Job Nature <span class="required">*</span></label>
                                              <select name="job_nature" class="form-control col-sm-5">
                                                <option value="">Select Job Nature</option>
                                                   <?php if(!empty($job_info)) {
                                                    echo $this->job_nature_model->selected($job_info->job_nature);
                                                    } else {
                                                       echo $this->job_nature_model->selected();
                                                    }
                                                     ?>                                             
                                                </select>
                                            </div>
                                          </div>
                                    </div>
                                    </hr>
                                  <div class="row">
                                
                                      <div class="col-md-4">
                                        <!-- /. Job Location -->
                                        <div class="form-group">
                                            <label>Job Country <span class="required">*</span></label>
                                            <select name="job_location" class="form-control col-sm-5">
                                                <option value="">Select Job Location</option>
                                              <?php if(!empty($job_info)) {
                                                echo $this->job_location_model->selected($job_info->job_location);
                                                } else {
                                                   echo $this->job_location_model->selected();
                                                }
                                                 ?>                                             
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <!-- /. Job Location -->
                                        <div class="form-group">
                                            <label>Job State <span class="required">*</span></label>
                                            <select name="job_location" class="form-control col-sm-5">
                                                <option value="">Select Job Location</option>
                                              <?php if(!empty($job_info)) {
                                                echo $this->job_location_model->selected($job_info->job_location);
                                                } else {
                                                   echo $this->job_location_model->selected();
                                                }
                                                 ?>                                             
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <!-- /. Job Location -->
                                        <div class="form-group">
                                            <label>Job City <span class="required">*</span></label>
                                            <select name="job_location" class="form-control col-sm-5">
                                                <option value="">Select Job Location</option>
                                              <?php if(!empty($job_info)) {
                                                echo $this->job_location_model->selected($job_info->job_location);
                                                } else {
                                                   echo $this->job_location_model->selected();
                                                }
                                                 ?>                                             
                                            </select>
                                        </div>
                                      </div>

                                  </div>
                                <div class="row">
                                  <div class="col-md-6">

                                 <!-- /.Working Hours-->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Working Hours <span
                                            class="required">*</span></label>
                                    <input type="number" placeholder="Working Hours" name="working_hours" required
                                           value="<?php if(!empty($job_info)) echo $job_info->working_hours; ?>"
                                           class="form-control">
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                     <!-- /. Job Salary Range -->
                                        <div class="form-group">
                                            <label>Select Compnay<span class="required">*</span></label>
                                            <select name="company_profile_id" class="form-control col-sm-5">
                                                <option value="">Select Company</option>
                                               <?php if(!empty($job_info)) {
                                                echo $this->company_profile_model->selected($job_info->company_profile_id);
                                                } else {
                                                   echo $this->company_profile_model->selected();
                                                }
                                                 ?>        
                                            </select>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                        <!-- /.Job Daeadeline -->
                                            <div class="form-group form-group-bottom">
                                                <label>Job Deadline</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" value="<?php
                                                if (!empty($job_info)) {
                                                    $job_deadline = date('m/d/Y', strtotime($job_info->job_deadline));
                                                    echo $job_deadline;
                                                }
                                                ?>" class="form-control datepicker" id="job_deadline" name="job_deadline">

                                                <div class="input-group-addon">
                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                </div>
                                    </div>

                                    </div>

                                    <div class="col-md-6">
                                 <!-- /.Prefere Age -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Preferred Age <span
                                            class="required">*</span></label>
                                    <input type="number" placeholder="Preferred Age" name="preferred_age" required
                                           value="<?php if(!empty($job_info)) echo $job_info->preferred_age; ?>"
                                           class="form-control">
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Job Status <span
                                            class="required">*</span></label>
                                    <select required name="job_status" class="form-control col-sm-5">
                                                <option value="">Select Job Status</option>
                                                <?php  if(!empty($job_info)): ?>
                                                   <option value="1" <?php if($job_info->job_status == "1"){?> selected="selected" <?php }?>>Active</option>
                                                   <option value="2" <?php if($job_info->job_status == "2"){?> selected="selected" <?php }?>>Deactive</option>
                                                 <?php else: ?>
                                                  <option value="1">Active</option>
                                                  <option value="2">Deactive</option>
                                                <?php endif; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Job Types <span class="required">*</span></label>
                                     <select required name="job_types" class="form-control col-sm-5">
                                     <option value="">Select Job Types</option>
                                               <?php if(!empty($job_info)) {
                                                echo $this->job_types_model->selected($job_info->job_types);
                                                } else {
                                                   echo $this->job_types_model->selected();
                                                }
                                                 ?>           
                                            </select>
                                    </div>
                                </div>

                                </div>


                            <!-- /.JOb Descption -->
                                 <div class="row">
                                      
                                       <div class="col-md-4 col-sm-12"> 
                                       	<div class="formrow">   
                                            <label class="control-label mandatory">Vacancy Description <span class="required">*</span></label>
                                               <textarea name="job_desc" required class="form-control" required><?php if(!empty($job_info)) echo $job_info->job_desc; ?></textarea>
</div>
                                        </div>
 <div class="col-md-4 col-sm-12"> 
                                       	<div class="formrow">   
                                            <label class="control-label mandatory">Education </label>
                                               <textarea name="education" required class="form-control" ><?php if(!empty($job_info)) echo $job_info->education; ?></textarea>
</div>
                                        </div>
 <div class="col-md-4 col-sm-12"> 
                                       	<div class="formrow">   
                                            <label class="control-label mandatory">Benefits</label>
                                               <textarea name="benefits" required class="form-control" ><?php if(!empty($job_info)) echo $job_info->benefits; ?></textarea>
</div>
                                        </div>
                                      

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>


					        <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box-footer">
                      <div id="job_result"></div>
                    <?php if(!empty($job_info)): ?> 
                        <button type="submit" id="submitjobs" class="btn btn-content">Update Job
                        </button>
                       <?php else :?>
                      <button type="submit" id="submitjobs" class="btn btn-content">Submit Job
                        </button>
                       <?php endif; ?>
                    </div>
                  </div>
                
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
    </form>
    
    
</section>

     <script type="text/javascript">  
       function changeSalary(){
        var salary = $("#salary_range").val();
        var job_post_format = $("#job_desc").text();
        
        job_post_format = job_post_format.replace("<h3>Salary Range:</h3>", "<h3>Salary Range: "+salary+"</h3>");
        tinyMCE.get('job_desc').setContent(job_post_format);
        //$("#job_desc").html(job_post_format);
    }

</script>

            </div>

            <br />
            

        </div><!-- /.right-side -->
<script type="text/javascript" src="https://almsaeedstudio.com/themes/AdminLTE/plugins/select2/select2.full.min.js" ></script>
<script type="text/javascript">
 
    $(".select2").select2({
      language: {
             noResults: function() {
                 return "No company found by the name. Please check or <a href='http://localhost/vacancy/admin/company/create-company'>add the company</a>";
            }
     },
    escapeMarkup: function (markup) {
        return markup;
    }
});

</script>

<?php $this->load->view('admin/components/footer'); ?>
