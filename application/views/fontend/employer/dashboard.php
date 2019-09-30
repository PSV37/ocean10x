<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Edit Profile</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Edit Profile</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->     
          <div class="section lb">
                <div class="container">
                    <div class="row">
                     <?php $this->load->view('fontend/layout/employer_left.php'); ?>


                        <div class="content col-md-9">
                         
							<div class="userccount empdash">
                            <div class="formpanel">
                                <?php echo $this->session->flashdata('msg'); ?>
                                <?php echo $this->session->flashdata('success_msg'); ?>
                                <form id="submit" action="" method="post" class="submit-form" enctype="multipart/form-data">
                                <input type="hidden" name="company_profile_id" value="<?php echo $company_info->company_profile_id;?>">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">   
                                           <div class="formrow">
                                            <input type="text" name="company_name" value="<?php 
                                            	 if(!empty($company_info->company_name)){
                                            	 	echo $company_info->company_name;
                                            	 }
                                            ?>" class="form-control" placeholder="Company Name">
                                            </div>
                                        </div>











                                        <div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
                                            <input type="text" readonly name="company_email" value="<?php 
                                            	 if(!empty($company_info->company_email)){
                                            	 	echo $company_info->company_email;
                                            	 }
                                            ?>" class="form-control" placeholder="Company Email">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
                                            <input type="text" name="company_url" value="<?php 
                                            	 if(!empty($company_info->company_url)){
                                            	 	echo $company_info->company_url;
                                            	 }
                                            ?>" class="form-control" placeholder="Company Website">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
                                            <!--<input type="text" name="company_phone" value="<?php 
                                            	 if(!empty($company_info->company_phone)){
                                            	 	echo $company_info->company_phone;
                                            	 }
                                            ?>" class="form-control" maxlength="10" id="phone" placeholder="Phone Number">-->
											 <input id="phone" name="company_phone" type="tel" value="<?php 
                                            	 if(!empty($company_info->company_phone)){
                                            	 	echo $company_info->company_phone;
                                            	 }
                                            ?>" class="form-control" maxlength="10" cols="40">
                                            </div>
                                        </div>
                                    </div><!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                        <div class="formrow">
                                            <select name="company_category" class="selectpicker" data-style="btn-default" data-live-search="true">
                                                <?php if(!empty($company_info->company_category)) {
                                                echo $this->job_category_model->selected($company_info->company_category);
                                                } else {
                                                   echo $this->job_category_model->selected();
                                                }
                                                 ?>
                                            </select>  
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                        	<div class="formrow">
                                            <input type="text" name="contact_name"  value="<?php 
                                            	 if(!empty($company_info->contact_name)){
                                            	 	echo $company_info->contact_name;
                                            	 }
                                            ?>" class="form-control" id="name" placeholder="Contact Name">
                                            </div>
                                        </div>
                                   
 </div><!-- end row -->
 
 <div class="row">
 <div class="col-md-6 col-sm-6">
<div class="formrow">
<select name="hot_jobs" required id="hot_jobs" class="selectpicker">
<option value="">Select Type</option> 
<option value="1" <?php echo ( ($company_info->hot_jobs =='1')?'selected':''); ?>>Selected Resume</option> 
<option value="2" <?php echo ( ($company_info->hot_jobs=='2')?'selected':''); ?>>University</option> 
<option value="3" <?php echo ( ($company_info->hot_jobs=='3')?'selected':''); ?>>Bank Books</option> 
</select>
</div>
</div>
 <div class="col-md-6 col-sm-6">
<div class="formrow">
<input type="text" name="company_career_link"  id="company_career_link" class="form-control" value="<?php 
if(!empty($company_info->company_career_link)){
echo $company_info->company_career_link;
}
?>" placeholder="Company Career Link">
</div>
</div>
 </div>
 
 
                                    <!-- end row -->


 									<div class="row">
                                        <div class="col-md-6 col-sm-6">
                                        	<div class="formrow">
                                            <textarea name="company_service" class="form-control" placeholder="Company Service"><?php
                                            	if(!empty($company_info->company_service)){
                                            	 	echo $company_info->company_service;
                                            	 }
                                             ?></textarea>
                                             </div>
                                        </div>

                                         <div class="col-md-6 col-sm-6">
                                         <div class="formrow">
                                            <textarea name="company_address" class="form-control" placeholder="Company Address"><?php if(!empty($company_info->company_address)){
                                            	 	echo $company_info->company_address;
                                            	 } ?></textarea>
                                                 </div>
                                        </div>
                                    </div><!-- end row -->


<div class="row">
                                        <div class="col-md-12 col-sm-12">
                                         <div class="formrow">
                                           <label class="control-label">Special Features:</label>
                                            <textarea  name="company_aboutus"  id="company_aboutus" class="form-control" rows="8"><?php
                                            	if(!empty($company_info->company_aboutus)){
                                            	 	echo $company_info->company_aboutus;
                                            	 }
                                             ?></textarea></textarea>
                                            </div>
                                        </div>

                                      
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                        	<div class="formrow">
                                            <label class="control-label">Company Logo<small> company logo measures 300 x 300 pixels </small></label>
                                            <input type="file" name="company_logo"  value="<?php 
                                                 if(!empty($company_info->company_logo)){
                                                    echo $company_info->company_logo;
                                                 }
                                            ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        	<div class="formrow">
                                            <img class="thumbnail" src="<?php echo base_url(); ?>upload/<?php 
                                                 if(!empty($company_info->company_logo)){
                                                    echo $company_info->company_logo;
                                                 } else { echo "notfound.gif";}
                                            ?>">
                                            </div>
                                        </div>

                                    </div><!-- end row -->

                                    <button class="btn btn-primary" id="submit" type="submit">Update Profile</button>
                                </form>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="text-center">
  <img src="<?php echo base_url(); ?>/fontend/images/loader.gif">
</div>
  </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#submit').submit(function(){
            $('#myModal').modal();
        })
    })

</script>


<script>
$(document).ready(function(){
    $("#name").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });
});

</script>
  <script src="<?php echo base_url(); ?>asset/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "asset/js/utils.js",
    });
  </script>
  
 <?php $this->load->view("fontend/layout/footer.php"); ?>