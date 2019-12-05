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

                <ol class="breadcrumb">
                   <?php echo $user_id=$this->session->userdata('name');?>;
                </ol>
            </section>

            <br/>
            <div class="container-fluid">
           <section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                        <h3 class="box-title ">Update Company</h3>
                </div>
                <div class="box-body">
                        <?php echo $this->session->flashdata('msg'); ?>
                            <form 
                       action="<?php echo base_url() ?>admin/company/update_company" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="company_profile_id" value="<?php 
                             if(!empty($company_profile->company_profile_id)){
                                echo $company_profile->company_profile_id;
                             }
                        ?>">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                  <label class="control-label">Company Type: <span class="required">*</span></label>
                                  <select name="company_type" id="company_type"  class="form-control">
                                    <option value="">Select Type</option> 
                                    <option value="Company"<?php if($company_profile->comp_type == "Company") echo "selected"; ?>>Company</option> 
                                    <option value="HR Consultant"<?php if($company_profile->comp_type == "HR Consultant") echo "selected"; ?>>HR Consultant</option> 
                                  </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                               <label class="control-label">Company Name <span class="required">*</span></label>
                                <input type="text" name="company_name" value="<?php 
                                     if(!empty($company_profile->company_name)){
                                        echo $company_profile->company_name;
                                     }
                                ?>" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                 <label class="control-label">Company Email:<span class="required">*</span></label>
                                <input type="email" name="company_email" value="<?php 
                                     if(!empty($company_profile->company_email)){
                                        echo $company_profile->company_email;
                                     }
                                ?>" class="form-control" >
                            </div>
                            
                        </div><!-- end row -->
                    
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                               <label class="control-label">Phone Number:</label>
                                <input type="text" name="company_phone" value="<?php 
                                     if(!empty($company_profile->company_phone)){
                                        echo $company_profile->company_phone;
                                     }
                                ?>" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                 <label class="control-label">Company Industry:</label>
                                 <select name="company_category" class="form-control" id="category"><?php 
                                  if(!empty($company_profile->company_category)){
                                       echo $this->job_category_model->selected($company_profile->company_category);;
                                     } else {
                                   echo $this->job_category_model->selected(); }?>
                                  </select>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <label class="control-label">Company Website:<span class="required">*</span></label>
                                <input type="text" name="company_url" value="<?php 
                                     if(!empty($company_profile->company_url)){
                                        echo $company_profile->company_url;
                                     }
                                ?>" class="form-control" >
                            </div>

                            
                        </div><!-- end row -->

                       

                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                         <label class="control-label">Contact Person: <span class="required">*</span></label>
                          <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?php 
                                     if(!empty($company_profile->contact_name)){
                                        echo $company_profile->contact_name;
                                     }
                                ?>">
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">Contact Person Email: <span class="required">*</span></label>
                            <input type="text" name="cont_person_email" id="cont_person_email"  class="form-control" value="<?php 
                                     if(!empty($company_profile->cont_person_email)){
                                        echo $company_profile->cont_person_email;
                                     }
                                ?>" >
                        </div>
                      </div>

                       <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">Contact Person Mobile: <span class="required">*</span></label>
                            <input type="text" name="cont_person_mobile" id="cont_person_mobile"  class="form-control" value="<?php 
                                     if(!empty($company_profile->cont_person_mobile)){
                                        echo $company_profile->cont_person_mobile;
                                     }
                                ?>">
                        </div>
                      </div>

                    </div><!-- end row -->

                    <div class="row">
                      <!-- <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                         <label class="control-label">Password: <span class="required">*</span></label>
                          <input type="password" name="comp_password" id="comp_password" class="form-control" value="<?php 
                                     if(!empty($company_profile->cont_person_email)){
                                        echo $company_profile->cont_person_email;
                                     }
                                ?>">
                          </div>
                      </div> -->
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Company Career Link: <span class="required">*</span></label>
                            <input type="text" name="company_career_link"  id="company_career_link" value="<?php  if(!empty($company_profile->company_career_link)){
                                    echo $company_profile->company_career_link;
                                 } ?>" class="form-control">
                            </div>
                        </div>
                      <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">GSTN No:</label>
                            <input type="text" name="comp_gst_no" id="comp_gst_no"  class="form-control" value="<?php 
                                     if(!empty($company_profile->comp_gstn_no)){
                                        echo $company_profile->comp_gstn_no;
                                     }
                                ?>">
                        </div>
                      </div>

                       <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                            <label class="control-label">PAN No:</label>
                            <input type="text" name="comp_pan_no" id="comp_pan_no"  class="form-control" value="<?php 
                                     if(!empty($company_profile->comp_pan_no)){
                                        echo $company_profile->comp_pan_no;
                                     }
                                ?>">
                        </div>
                      </div>

                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                              <label>Company Country <span class="required">*</span></label>
                              <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                                <option value="">Select Country</option>
                                <?php foreach($country as $key){?>
                                <option value="<?php echo $key['country_id']; ?>" <?php if($company_profile->company_status == $key['country_id']) echo "selected"; ?>><?php echo $key['country_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                              <label>Company State <span class="required">*</span></label>
                              <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                               <option value="">Select State</option>
                               
                              </select>
                            </div>
                        </div>
                          
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                              <label>Company City <span class="required">*</span></label>
                              <select  name="city_id" id="city_id" class="form-control">
                                <option value="">Select City</option>
                              </select>
                            </div>
                        </div>

                    </div>

                     <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <label class="control-label">Company Status:</label>
                                <select name="company_status" class="form-control" id="sel1">
                                <?php if(!empty($company_profile->company_status)): ?>
                                    <option value="1" <?php if($company_profile->company_status == "1") echo "selected"; ?>>Active</option>
                                    <option value="0" <?php if($company_profile->company_status == "0") echo "selected"; ?>>Deactive</option>
                                     <?php else: ?>
                                    <option value="">Select One</option> 
                                    <option value="1">Active</option> 
                                    <option value="0">Deactive</option> 
                                 <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Select Type:<span class="required">*</span></label>
                                    <select name="hot_jobs" required id="hot_jobs" class="form-control" id="sel1">
                                        <option value="">Select One</option> 
                                        <option value="1" <?php echo $company_profile->hot_jobs=='1' ? 'selected="selected"' : ''; ?> >Selected Resume</option>
                                        <option value="2" <?php echo $company_profile->hot_jobs=='2' ? 'selected="selected"' : ''; ?> >University</option>
                                        <option value="3" <?php echo $company_profile->hot_jobs=='3' ? 'selected="selected"' : ''; ?> >Bank Books</option>

                                    </select>
                                </div>
                            </div>

                           
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                   <label class="control-label">Company Logo:<small>Upload logo 200*200 pixel</small></label> <br>
                                   <div class="fileinput fileinput-new"  data-provides="fileinput">
                                    <div class="fileinput-new thumbnail g-logo-img" >
                                    <?php if(!empty($company_profile->company_logo)) echo '  <img src="'.base_url().'/upload/'.$company_profile->company_logo.'" alt="Product Image">';
                                        else {
                                            echo '<img src="http://venusitltd.com/venusit/images/logo.png" alt="Product Image">';          
                                        }
                                     ?>
                                    </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail g-logo-img"  ></div>
                                      <div>
                                         <span class="btn btn-default btn-file">
                                         <span class="fileinput-new">
                                         <input type="file" name="company_logo" value="<?php  if(!empty($company_profile->company_logo)){
                                                    echo $company_profile->company_logo;
                                                 } ?>" /></span>
                                         <span class="fileinput-exists">Change</span>
                                         </span>
                                         <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                      <div id="valid_msg" class="required"></div>
                                   </div>
                                </div>
                            </div>
                        </div><!-- end row -->

                      <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Head Office Address: <span class="required">*</span></label>
                                <textarea  name="company_address"  id="company_address" class="form-control ckeditor" rows="8" id="comment"><?php if(!empty($company_profile->company_address)){
                                        echo $company_profile->company_address;
                                     }
                                ?></textarea>
                            </div>
                        </div>
                        <div class="panel-body"></div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Attractive Offers: <span class="required">*</span></label>
                             <textarea  name="company_service" id="company_service" class="form-control ckeditor" rows="8" id="comment"><?php if(!empty($company_profile->company_service)){
                                        echo $company_profile->company_service;
                                     }
                                ?></textarea>
                            </div>
                        </div>
                        <div class="panel-body"></div>
                        <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                           <label class="control-label">Special Features: <span class="required">*</span></label>
                            <textarea  name="company_aboutus"  id="company_aboutus" class="form-control ckeditor" rows="8"><?php  if(!empty($company_profile->company_aboutus)){
                                    echo $company_profile->company_aboutus;
                                 } ?></textarea>
                            </div>
                        </div>
                       

                      
                    </div><!-- end row -->

                    <button type="submit" class="btn bg-navy" type="submit">Save Company</button>
                                
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

        <?php ///$this->load->view('admin/_layout_modal'); ?>
        <?php //$this->load->view('admin/_layout_modal_small'); ?>
        <?php $this->load->view('admin/components/footer'); ?>
<script>
    
 function getStates(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/company/getstate',
                data:{id:id},
                success:function(res){
                  $('#state_id').html(res);
                }
        
            }); 
        }
    }
     
  function getCitys(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/company/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
        
            }); 
          }
   
    }

$(document).ready(function(){

    function getStates_load(){
        var id = $('#country_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/company/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                    $('#state_id').val(<?php echo $company_profile->state_id; ?>);
                     getCitys_load(<?php echo $company_profile->state_id; ?>);
                }
                
            }); 
          }
   
       }
    
    function getCitys_load(id){
      //var id = $('#state_id').val();
      // alert(id);
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/company/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                    $('#city_id').val(<?php echo $company_profile->city_id; ?>);
                }
                
            }); 
          }
   
       }

  getCitys_load();
  getStates_load();
 
});
</script>