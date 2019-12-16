<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
<link rel="stylesheet" href="<?php echo base_url('asset/crop/dist/cropper.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/crop/css/main.css');?>">

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
        <div class="content col-md-9">
          <div class="userccount">
            <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
            <div class="tab-content">
            <!-- Your Personal Information -->
              <div id="vspinfo" class="tab-pane fade in active">
                <h5>My Profile</h5>
								<div id="vsphoto" class="tab-pane fade in">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php  $job_seeker=$this->session->userdata('job_seeker_id'); ?>   
            <div class="row">
              <div class="col-md-4">
                <div class="containe1r" id="crop-avatar">

                  <!-- Current avatar -->
                  <div class="avatar-view" title="Change the Photo">
                   <br/> <img src="<?php echo base_url() ?>upload/<?php if(!empty($job_seeker_photo->photo_path)) { echo $job_seeker_photo->photo_path;} else { echo "image-notfound.png";} ?>" alt="Photo" class="img img-thumbnail">
                  </div>

                  <!-- Cropping modal -->
                  <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form class="avatar-form" action="<?php echo base_url('Job_seeker/save_photo');?>/<?php if(!empty($job_seeker_photo->js_photo_id)){echo $job_seeker_photo->js_photo_id;} ?>" enctype="multipart/form-data" method="post">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="avatar-modal-label">Change Photo</h4>
                          </div>
                          <div class="modal-body">
                            <div class="avatar-body">

                              <!-- Upload image and data -->
                              <div class="avatar-upload">
                                <input type="hidden" class="avatar-src" name="avatar_src">
                                <input type="hidden" class="avatar-data" name="avatar_data">
                                <label for="avatarInput">Upload Photo</label>
                                <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                              </div>

                              <!-- Crop and preview -->
                              <div class="row">
                                <div class="col-md-9">
                                  <div class="avatar-wrapper"></div>
                                  <div class="dragtxt">Drag frame to adjust portrait.</div>
                                </div>
                                <div class="col-md-3">
                                  <div class="avatar-preview preview-lg"></div>
                                  <p>Must be an actual picture of you! Logos, clip-art, group pictures, and digitally-altered images not allowed.</p>
                                </div>
                              </div>

                              <div class="row avatar-btns">
                                <div class="col-md-9">
                                </div>
                                <div class="col-md-3">
                                  <button type="submit" class="btn btn-primary btn-block avatar-save2">Save Photo</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div> -->
                        </form>
                      </div>
                    </div>
                  </div><!-- /.modal -->

                  <!-- Loading state -->
                  <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                </div>
                                          
              </div>
            <div class="col-md-8">
                          
            <?php if(!empty($error)){
              echo $error;
              };?>
            <?php if($job_seeker_photo->photo_path==""){
                  echo "Please Upload Your Photo ";
              } ?>
              <div class="formpanel">
  							<h6 style="font-size: 13px;font-family: 'Roboto', sans-serif;font-weight: 500;">Profiles with Photos get better attending from Recruiters / Employers !</h6><br/>
                <h6 style="font-size: 13px;font-family: 'Roboto', sans-serif;font-weight: 500;">Upload Max Size 300*300 pixel</h6><br>
                <a href="#." onClick="runit();" class="btn">Click here to Upload Photo</a>
              </div>  
            </div>
          </div>
        </div>
								 
								 
        <div class="table-responsive">          
          <table class="table">
						<span><a href="#" data-toggle="modal" data-target="#PersonalinfoUpdate" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top" style="font-size:18px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> </span>
            <tbody>
							<tr>
                <td> First Name | Last Name:</td>
                <td><?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?></td>
              </tr> 
								  
							<tr>
                <td>Date of Birth:</td>
                <td><?php if($js_personal_info->date_of_birth=="0000-00-00") {
                    echo "";
                  } else {
                        echo date('j M Y',strtotime($js_personal_info->date_of_birth)); 
                        if($js_personal_info->dob_visiblity=="Yes") {
                          echo "  (Birthday not visible to my network)";
                        }else{
                          echo "  (Birthday visible to my network)";
                        }
                  }
                 ?></td>
              </tr>
				
              <tr>
                <td>Primary Phone No:</td>
                <td><?php echo $js_personal_info->country_code.'- '.$js_personal_info->mobile; ?></td>
              </tr>

              <tr>
                <td>Alternate Phone No:</td>
                <td><?php echo $js_personal_info->alternatecountry_code.'- '.$js_personal_info->alternatemobile; ?></td>
              </tr>
              <tr>
                <td>Present Address:</td>
                <td><?php echo $js_personal_info->present_address; ?></td>
              </tr>
							<tr>
                <td>City:</td>
                <td><?php echo $js_personal_info->city_name; ?></td>
              </tr>
							<tr>
                <td>State:</td>
                <td><?php echo $js_personal_info->state_name; ?></td>
              </tr>
							<tr>
                <td>country:</td>
                <td><?php echo $js_personal_info->country_name; ?></td>
              </tr>
             
              <tr>
                <td>Marital Status:</td>
                <td><?php if(!empty($js_personal_info->marital_status))
                  echo $js_personal_info->marital_status; ?></td>
              </tr>
              <tr>
                <td>Work Permit for USA: </td>
                <td><?php if(!empty($js_personal_info->work_permit_usa))
                  echo $js_personal_info->work_permit_usa; ?></td>
              </tr>
              <tr>
                <td>Work Permit for Other Countries: </td>
                <td><?php if(!empty($js_personal_info->work_permit_countries))
                  echo $js_personal_info->work_permit_countries; ?></td>
              </tr>
              <tr>
                <td>Website: </td>
                <td><?php if(!empty($js_personal_info->website))
                  echo $js_personal_info->website; ?></td>
              </tr>

              <tr>
                <td>My Tagline: </td>
                <td><?php if(!empty($js_personal_info->resume_title))
                  echo $js_personal_info->resume_title; ?></td>
              </tr>

            </tbody>
          </table>

          <h6>Languages: </h6><button class="btn btn-success btn-xs pull-right add-more"  data-toggle="modal" data-target="#Addlanguage" class="btn pull-right bg-navy btn-xs" title="add" data-toggle="tooltip" data-placement="top" type="button"><i class="fa fa-plus"></i> Add Language</button> <br>
        
          <table class="table">
            <thead><th>Languages</th><th>Proficiency</th><th>Read</th><th>Write</th><th>Speak</th><th>Edit</th></thead>
            <tbody><?php if(!empty($languages)) foreach($languages as $lrow){ ?>
              <tr>
                <td><?php echo $lrow['language']; ?></td>
                <td><?php echo $lrow['proficiency']; ?></td>
                <td><?php if($lrow['lang_read']=='Yes'){echo "<i class='fa fa-check' style='color:green;'></i>";}else{echo "<i class='fa fa-remove' style='color:red;'></i>";} ?></td>
                <td><?php if($lrow['lang_write']=='Yes'){echo "<i class='fa fa-check' style='color:green;'></i>";}else{echo "<i class='fa fa-remove' style='color:red;'></i>";}  ?></td>
                <td><?php if($lrow['lang_speak']=='Yes'){echo "<i class='fa fa-check' style='color:green;'></i>";}else{echo "<i class='fa fa-remove' style='color:red;'></i>";}  ?></td>
                <td> <button class="fa fa-pencil-square-o" value="<?php echo($lrow['id']) ?>" onclick="getlanguage_data(this.value);">Edit</button></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>

        </div>
        <!-- end post-padding -->
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->

</div>
  
<!-- Popup Modal-->
<div id="addPhotomy" class="modal" role="dialog">
  <div class="modal-dialog" style="width:800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Photo</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
        	<div class="col-md-8">
            <div class="previewbox">
              <form class="form-inline" action="<?php echo base_url(); ?>job_seeker/save_photo/<?php if(!empty($job_seeker_photo->js_photo_id)){echo $job_seeker_photo->js_photo_id;} ?>" method="post" enctype="multipart/form-data" onsubmit="return checkCoords();">
                <div class="formrow">
                  <label class="" for="email">Upload Image:
                  <input type="file" class="form-control" id="photo_path"  name="photo_path" value="<?php if(!empty($job_seeker_photo->photo_path)){
                    echo $job_seeker_photo->photo_path;
                    } ?>">
                  </label>
                </div>
                <br>
                  <img src="" id="cropbox" />
                  <input type="hidden" id="x" name="x" />
                  <input type="hidden" id="y" name="y" />
                  <input type="hidden" id="w" name="w" />
                  <input type="hidden" id="h" name="h" />
                <br />
                <button type="submit" class="btn btn-default">Save Photo</button>
              </form>
            </div>
          </div>
          <div class="col-md-4">
          	<div class="preview"><img src="" id="preview" /></div>
          </div>
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
  <script type="text/javascript">
    $("#photo_path").change(function(){
        readURL(this);    	
    	setTimeout(function(){ 
    	 $(function(){

        $('#cropbox').Jcrop({
          aspectRatio: 1,
          onSelect: updateCoords
        });

      });
    }, 1000);
    	
    });

    function runit(){
    	$('.avatar-view').click();	
    }
  </script>

<script src="<?php echo base_url('asset/crop/dist/cropper.min.js');?>"></script>
<script src="<?php echo base_url('asset/crop/js/main.js');?>"></script>
                              
    </div>
	</div>
</div>
<!-- end col -->
<!-- end section -->

<!-- Modal -->
<div id="langulagedata" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
       
  <div class="modal-body">
    <form id="Personal-info" class="form-horizontal" action="<?php echo base_url('job_seeker/add_language');?>"  method="post" autocomplete="off">
    <input type="hidden" value="<?php echo $js_personal_info->job_personal_info_id; ?>" name="js_personal_info_id">
            
   
		 
	 <div class="panel-body"></div>   
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
          <div class="input-group">
              <h6>Languages</h6><br>
              
              <div class="input-group control-group after-add-more">
                <div>
                <?php foreach ($language_data as $lrow) {?>
                 
                
                  <div class="col-md-12">
                    <div class="col-md-6"> 
                       <label>Language</label>
                      <input type="text" name="language" id="language" class="form-control" value="<?php echo $lrow['language']; ?>">

                      <input type="hidden" name="languageid" id="languageid" class="form-control" value="<?php echo $lrow['id']; ?>">
                    </div>
                    <div class="col-md-6">  
                      <label>Proficiency</label>
                      <select class="form-control" name="proficiency" id="proficiency">
                        <option value="">Select Proficiency</option>
                        <option value="Beginner"<?php if($lrow['proficiency']=='Beginner'){ echo ' selected="selected"';} ?>>Beginner</option>
                        <option value="Proficient"<?php if ($lrow['proficiency']=='Proficient'){ echo ' selected="selected"';} ?>>Proficient</option>
                        <option value="Expert"<?php if($lrow['proficiency']=='Expert'){echo ' selected="selected"';} ?>>Expert</option>
                        
                      </select>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">  
                      <input type="checkbox" name="lang_read" id="lang_read" style="margin: 0 15px;" value="Yes"<?php if($lrow['lang_read']=='Yes'){echo "<i class='fa fa-check' style='color:green;'></i>";}else{} ?> > Read

                    <input type="checkbox" name="lang_write"  id="lang_write" style="margin: 0 15px;" value="Yes"<?php if($lrow['lang_write']=='Yes'){echo "<i class='fa fa-check' style='color:green;'></i>";}else{}?>> Write
                   
                      <input type="checkbox" name="lang_speak" id="lang_speak" value="Yes"<?php if($lrow['lang_speak']=='Yes'){echo "<i class='fa fa-check' style='color:green;'></i>";}else{} ?> > Speak
                   
                  
                    </div>
                  </div>
                <?php }?>
                </div>
              </div>
          </div>     
        </div>
      </div>
    </div>
		   
               <div class="modal-footer">
               	 
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
            </form>
     
        </div>
      </div>
    </div>
  </div>
  <div id="Addlanguage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
       
  <div class="modal-body">
    <form id="Personal-info" class="form-horizontal" action="<?php echo base_url('job_seeker/add_language');?>"  method="post" autocomplete="off">
    <input type="hidden" value="<?php echo $js_personal_info->job_personal_info_id; ?>" name="js_personal_info_id">
            
   
     
   <div class="panel-body"></div>   
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
          <div class="input-group">
              <h6>Languages</h6><br>
              
              <div class="input-group control-group after-add-more">
                <div>
                
                  <div class="col-md-12">
                    <div class="col-md-6"> 
                       <label>Language</label>
                      <input type="text" name="language" id="language" class="form-control" value="">

                      
                    </div>
                    <div class="col-md-6">  
                      <label>Proficiency</label>
                      <select class="form-control" name="proficiency" id="proficiency">
                        <option value="">Select Proficiency</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Proficient">Proficient</option>
                        <option value="Expert">Expert</option>
                        
                      </select>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">  
                      <input type="checkbox" name="lang_read" id="lang_read" style="margin: 0 15px;" value="Yes" > Read

                      <input type="checkbox" name="lang_write"  id="lang_write" style="margin: 0 15px;" value="Yes"> Write
                   
                      <input type="checkbox" name="lang_speak" id="lang_speak" value="Yes" > Speak
                   
                  
                    </div>
                  </div>
              
                </div>
              </div>
          </div>     
        </div>
      </div>
    </div>
       
               <div class="modal-footer">
                 
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
            </form>
     
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
<div id="PersonalinfoUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Personal Information</h4>
      </div>
      <script>
      $(document).on("click", ".modal-body", function () {
       $(".datepicker").datepicker({
         // dateFormat: 'dd-mm-yy'     
          //changeMonth: true,

          //changeYear: true,

          dateFormat: 'dd-mm-yy',

         // yearRange: '1980:2010',                               
         });
       });  
    </script> 
  <div class="modal-body">
    <form id="Personal-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_personalinfo');?>"  method="post" autocomplete="off">
    <input type="hidden" value="<?php echo $js_personal_info->job_personal_info_id; ?>" name="js_personal_info_id">
            
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12 col-sm-12">
            <div class="input-group">
              <label class="control-label" for="email">Name:<span class="required">*</span></label>
              <input type="text" class="form-control" name="full_name" value="<?php if(!empty($intro_data)) echo $intro_data['full_name']; ?>">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12 col-sm-12">
            <div class="input-group">
              <label class="control-label" for="email">Date of Birth:<span class="required">*</span></label>
              <input type="text" class="form-control datepicker" name="date_of_birth" value="<?php echo date('d-m-Y', strtotime($js_personal_info->date_of_birth)); ?>">
              <input type="checkbox" name="dobmake_public" value="No"<?php if($js_personal_info->dob_visiblity=='No') {echo 'checked'; }else{}?>> Birthday not visible to my network
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <label class="control-label" for="pwd"> Country Code:<span class="required">*</span></label>
                  <select id="country" name="country_code" class="form-control">
                    <option><?php echo $js_personal_info->country_code?></option>
                    <option value="AD - Andorra (+376)">AD - Andorra (+376)</option>
                    <option value="AE - United Arab Emirates (+971)">AE - United Arab Emirates (+971)</option>
                    <option value="AF - Afghanistan (+93)">AF - Afghanistan (+93)</option>
                    <option value="AG - Antigua And Barbuda (+1268)">AG - Antigua And Barbuda (+1268)</option>
                    <option value="AI - Anguilla (+1264)">AI - Anguilla (+1264)</option>
                    <option value="AL - Albania (+355)">AL - Albania (+355)</option>
                    <option value="AM - Armenia (+374)">AM - Armenia (+374)</option>
                    <option value="AN - Netherlands Antilles (+599)">AN - Netherlands Antilles (+599)</option>
                    <option value="AO - Angola (+244)">AO - Angola (+244)</option>
                    <option value="AQ - Antarctica (+672)">AQ - Antarctica (+672)</option>
                    <option value="AR - Argentina (+54)">AR - Argentina (+54)</option>
                    <option value="AS - American Samoa (+1684)">AS - American Samoa (+1684)</option>
                    <option value="AT - Austria (+43)">AT - Austria (+43)</option>
                    <option value="AU - Australia (+61)">AU - Australia (+61)</option>
                    <option value="AW - Aruba (+297)">AW - Aruba (+297)</option>
                    <option value="AZ - Azerbaijan (+994)">AZ - Azerbaijan (+994)</option>
                    <option value="BA - Bosnia And Herzegovina (+387)">BA - Bosnia And Herzegovina (+387)</option>
                    <option value="BB - Barbados (+1246)">BB - Barbados (+1246)</option>
                    <option value="BD - Bangladesh (+880)">BD - Bangladesh (+880)</option>
                    <option value="BE - Belgium (+32)">BE - Belgium (+32)</option>
                    <option value="BF - Burkina Faso (+226)">BF - Burkina Faso (+226)</option>
                    <option value="BG - Bulgaria (+359)">BG - Bulgaria (+359)</option>
                    <option value="BH - Bahrain (+973)">BH - Bahrain (+973)</option>
                    <option value="BI - Burundi (+257)">BI - Burundi (+257)</option>
                    <option value="BJ - Benin (+229)">BJ - Benin (+229)</option>
                    <option value="BL - Saint Barthelemy (+590)">BL - Saint Barthelemy (+590)</option>
                    <option value="BM - Bermuda (+1441)">BM - Bermuda (+1441)</option>
                    <option value="BN - Brunei Darussalam (+673)">BN - Brunei Darussalam (+673)</option>
                    <option value="BO - Bolivia (+591)">BO - Bolivia (+591)</option>
                    <option value="BR - Brazil (+55)">BR - Brazil (+55)</option>
                    <option value="BS - Bahamas (+1242)">BS - Bahamas (+1242)</option>
                    <option value="BT - Bhutan (+975)">BT - Bhutan (+975)</option>
                    <option value="BW - Botswana (+267)">BW - Botswana (+267)</option>
                    <option value="BY - Belarus (+375)">BY - Belarus (+375)</option>
                    <option value="BZ - Belize (+501)">BZ - Belize (+501)</option>
                    <option value="CA - Canada (+1)">CA - Canada (+1)</option>
                    <option value="CC - Cocos (keeling) Islands (+61)">CC - Cocos (keeling) Islands (+61)</option>
                    <option value="CD - Congo, The Democratic Republic Of The (+243)">CD - Congo, The Democratic Republic Of The (+243)</option>
                    <option value="CF - Central African Republic (+236)">CF - Central African Republic (+236)</option>
                    <option value="CG - Congo (+242)">CG - Congo (+242)</option>
                    <option value="CH - Switzerland (+41)">CH - Switzerland (+41)</option>
                    <option value="CI - Cote D Ivoire (+225)">CI - Cote D Ivoire (+225)</option>
                    <option value="CK - Cook Islands (+682)">CK - Cook Islands (+682)</option>
                    <option value="CL - Chile (+56)">CL - Chile (+56)</option>
                    <option value="CM - Cameroon (+237)">CM - Cameroon (+237)</option>
                    <option value="CN - China (+86)">CN - China (+86)</option>
                    <option value="CO - Colombia (+57)">CO - Colombia (+57)</option>
                    <option value="CR - Costa Rica (+506)">CR - Costa Rica (+506)</option>
                    <option value="CU - Cuba (+53)">CU - Cuba (+53)</option>
                    <option value="CV - Cape Verde (+238)">CV - Cape Verde (+238)</option>
                    <option value="CX - Christmas Island (+61)">CX - Christmas Island (+61)</option>
                    <option value="CY - Cyprus (+357)">CY - Cyprus (+357)</option>
                    <option value="CZ - Czech Republic (+420)">CZ - Czech Republic (+420)</option>
                    <option value="DE - Germany (+49)">DE - Germany (+49)</option>
                    <option value="DJ - Djibouti (+253)">DJ - Djibouti (+253)</option>
                    <option value="DK - Denmark (+45)">DK - Denmark (+45)</option>
                    <option value="DM - Dominica (+1767)">DM - Dominica (+1767)</option>
                    <option value="DO - Dominican Republic (+1809)">DO - Dominican Republic (+1809)</option>
                    <option value="DZ - Algeria (+213)">DZ - Algeria (+213)</option>
                    <option value="EC - Ecuador (+593)">EC - Ecuador (+593)</option>
                    <option value="EE - Estonia (+372)">EE - Estonia (+372)</option>
                    <option value="EG - Egypt (+20)">EG - Egypt (+20)</option>
                    <option value="ER - Eritrea (+291)">ER - Eritrea (+291)</option>
                    <option value="ES - Spain (+34)">ES - Spain (+34)</option>
                    <option value="ET - Ethiopia (+251)">ET - Ethiopia (+251)</option>
                    <option value="FI - Finland (+358)">FI - Finland (+358)</option>
                    <option value="FJ - Fiji (+679)">FJ - Fiji (+679)</option>
                    <option value="FK - Falkland Islands (malvinas) (+500)">FK - Falkland Islands (malvinas) (+500)</option>
                    <option value="FM - Micronesia, Federated States Of (+691)">FM - Micronesia, Federated States Of (+691)</option>
                    <option value="FO - Faroe Islands (+298)">FO - Faroe Islands (+298)</option>
                    <option value="FR - France (+33)">FR - France (+33)</option>
                    <option value="GA - Gabon (+241)">GA - Gabon (+241)</option>
                    <option value="GB - United Kingdom (+44)">GB - United Kingdom (+44)</option>
                    <option value="GD - Grenada (+1473)">GD - Grenada (+1473)</option>
                    <option value="GE - Georgia (+995)">GE - Georgia (+995)</option>
                    <option value="GH - Ghana (+233)">GH - Ghana (+233)</option>
                    <option value="GI - Gibraltar (+350)">GI - Gibraltar (+350)</option>
                    <option value="GL - Greenland (+299)">GL - Greenland (+299)</option>
                    <option value="GM - Gambia (+220)">GM - Gambia (+220)</option>
                    <option value="GN - Guinea (+224)">GN - Guinea (+224)</option>
                    <option value="GQ - Equatorial Guinea (+240)">GQ - Equatorial Guinea (+240)</option>
                    <option value="GR - Greece (+30)">GR - Greece (+30)</option>
                    <option value="GT - Guatemala (+502)">GT - Guatemala (+502)</option>
                    <option value="GU - Guam (+1671)">GU - Guam (+1671)</option>
                    <option value="GW - Guinea-bissau (+245)">GW - Guinea-bissau (+245)</option>
                    <option value="GY - Guyana (+592)">GY - Guyana (+592)</option>
                    <option value="HK - Hong Kong (+852)">HK - Hong Kong (+852)</option>
                    <option value="HN - Honduras (+504)">HN - Honduras (+504)</option>
                    <option value="HR - Croatia (+385)">HR - Croatia (+385)</option>
                    <option value="HT - Haiti (+509)">HT - Haiti (+509)</option>
                    <option value="HU - Hungary (+36)">HU - Hungary (+36)</option>
                    <option value="ID - Indonesia (+62)">ID - Indonesia (+62)</option>
                    <option value="IE - Ireland (+353)">IE - Ireland (+353)</option>
                    <option value="IL - Israel (+972)">IL - Israel (+972)</option>
                    <option value="IM - Isle Of Man (+44)">IM - Isle Of Man (+44)</option>
                    <option value="IN - India (+91)">IN - India (+91)</option>
                    <option value="IQ - Iraq (+964)">IQ - Iraq (+964)</option>
                    <option value="IR - Iran, Islamic Republic Of (+98">IR - Iran, Islamic Republic Of (+98)</option>
                    <option value="IS - Iceland (+354)">IS - Iceland (+354)</option>
                    <option value="IT - Italy (+39)">IT - Italy (+39)</option>
                    <option value="JM - Jamaica (+1876)">JM - Jamaica (+1876)</option>
                    <option value="JO - Jordan (+962)">JO - Jordan (+962)</option>
                    <option value="JP - Japan (+81)">JP - Japan (+81)</option>
                    <option value="KE - Kenya (+254)">KE - Kenya (+254)</option>
                    <option value="KG - Kyrgyzstan (+996)">KG - Kyrgyzstan (+996)</option>
                    <option value="KH - Cambodia (+855)">KH - Cambodia (+855)</option>
                    <option value="KI - Kiribati (+686)">KI - Kiribati (+686)</option>
                    <option value="KM - Comoros (+269)">KM - Comoros (+269)</option>
                    <option value="KN - Saint Kitts And Nevis (+1869)">KN - Saint Kitts And Nevis (+1869)</option>
                    <option value="KP - Korea Democratic Peoples Republic Of (+850)">KP - Korea Democratic Peoples Republic Of (+850)</option>
                    <option value="KR - Korea Republic Of (+82)">KR - Korea Republic Of (+82)</option>
                    <option value="KW - Kuwait (+965)">KW - Kuwait (+965)</option>
                    <option value="KY - Cayman Islands (+1345)">KY - Cayman Islands (+1345)</option>
                    <option value="KZ - Kazakstan (+7)">KZ - Kazakstan (+7)</option>
                    <option value="LA - Lao Peoples Democratic Republic (+856)">LA - Lao Peoples Democratic Republic (+856)</option>
                    <option value="LB - Lebanon (+961)">LB - Lebanon (+961)</option>
                    <option value="LC - Saint Lucia (+1758)">LC - Saint Lucia (+1758)</option>
                    <option value="LI - Liechtenstein (+423)">LI - Liechtenstein (+423)</option>
                    <option value="LK - Sri Lanka (+94)">LK - Sri Lanka (+94)</option>
                    <option value="LR - Liberia (+231)">LR - Liberia (+231)</option>
                    <option value="LS - Lesotho (+266)">LS - Lesotho (+266)</option>
                    <option value="LT - Lithuania (+370)">LT - Lithuania (+370)</option>
                    <option value="LU - Luxembourg (+352)">LU - Luxembourg (+352)</option>
                    <option value="LV - Latvia (+371)">LV - Latvia (+371)</option>
                    <option value="LY - Libyan Arab Jamahiriya (+218)">LY - Libyan Arab Jamahiriya (+218)</option>
                    <option value="MA - Morocco (+212)">MA - Morocco (+212)</option>
                    <option value="MC - Monaco (+377)">MC - Monaco (+377)</option>
                    <option value="MD - Moldova, Republic Of (+373)">MD - Moldova, Republic Of (+373)</option>
                    <option value="ME - Montenegro (+382)">ME - Montenegro (+382)</option>
                    <option value="MF - Saint Martin (+1599)">MF - Saint Martin (+1599)</option>
                    <option value="MG - Madagascar (+261)">MG - Madagascar (+261)</option>
                    <option value="MH - Marshall Islands (+692)">MH - Marshall Islands (+692)</option>
                    <option value="MK - Macedonia, The Former Yugoslav Republic Of (+389)">MK - Macedonia, The Former Yugoslav Republic Of (+389)</option>
                    <option value="ML - Mali (+223)">ML - Mali (+223)</option>
                    <option value="MM - Myanmar">MM - Myanmar (+95)</option>
                    <option value="MN - Mongolia (+976)">MN - Mongolia (+976)</option>
                    <option value="MO - Macau (+853)">MO - Macau (+853)</option>
                    <option value="MP - Northern Mariana Islands (+1670)">MP - Northern Mariana Islands (+1670)</option>
                    <option value="MR - Mauritania (+222)">MR - Mauritania (+222)</option>
                    <option value="MS - Montserrat (+1664)">MS - Montserrat (+1664)</option>
                    <option value="MT - Malta (+356)">MT - Malta (+356)</option>
                    <option value="MU - Mauritius (+230)">MU - Mauritius (+230)</option>
                    <option value="MV - Maldives (+960)">MV - Maldives (+960)</option>
                    <option value="MW">MV - Maldives (+960)</option>
                    <option value="MX - Mexico (+52)">MX - Mexico (+52)</option>
                    <option value="MY - Malaysia (+60)">MY - Malaysia (+60)</option>
                    <option value="MZ - Mozambique (+258)">MZ - Mozambique (+258)</option>
                    <option value="NA - Namibia (+264)">NA - Namibia (+264)</option>
                    <option value="NC - New Caledonia (+687)">NC - New Caledonia (+687)</option>
                    <option value="NE - Niger (+227)">NE - Niger (+227)</option>
                    <option value="NG - Nigeria (+234)">NG - Nigeria (+234)</option>
                    <option value="NI - Nicaragua (+505)">NI - Nicaragua (+505)</option>
                    <option value="NL - Netherlands (+31)">NL - Netherlands (+31)</option>
                    <option value="NO - Norway (+47)">NO - Norway (+47)</option>
                    <option value="NP - Nepal (+977)">NP - Nepal (+977)</option>
                    <option value="NR - Nauru (+674)">NR - Nauru (+674)</option>
                    <option value="NU - Niue (+683)">NU - Niue (+683)</option>
                    <option value="NZ - New Zealand (+64)">NZ - New Zealand (+64)</option>
                    <option value="OM - Oman (+968)">OM - Oman (+968)</option>
                    <option value="PA - Panama (+507)">PA - Panama (+507)</option>
                    <option value="PE - Peru (+51)">PE - Peru (+51)</option>
                    <option value="PF - French Polynesia (+689)">PF - French Polynesia (+689)</option>
                    <option value="PG - Papua New Guinea (+675)">PG - Papua New Guinea (+675)</option>
                    <option value="PH - Philippines (+63)">PH - Philippines (+63)</option>
                    <option value="PK - Pakistan (+92)">PK - Pakistan (+92)</option>
                    <option value="PL - Poland (+48)">PL - Poland (+48)</option>
                    <option value="PM - Saint Pierre And Miquelon (+508)">PM - Saint Pierre And Miquelon (+508)</option>
                    <option value="PN - Pitcairn (+870)">PN - Pitcairn (+870)</option>
                    <option value="PR - Puerto Rico (+1)">PR - Puerto Rico (+1)</option>
                    <option value="PT - Portugal (+351)">PT - Portugal (+351)</option>
                    <option value="PW - Palau (+680)">PW - Palau (+680)</option>
                    <option value="PY - Paraguay (+595">PY - Paraguay (+595)</option>
                    <option value="QA - Qatar (+974)">QA - Qatar (+974)</option>
                    <option value="RO - Romania (+40)">RO - Romania (+40)</option>
                    <option value="RS - Serbia (+381)">RS - Serbia (+381)</option>
                    <option value="RU - Russian Federation (+7)">RU - Russian Federation (+7)</option>
                    <option value="RW - Rwanda (+250)">RW - Rwanda (+250)</option>
                    <option value="SB - Solomon Islands (+677)">SA - Saudi Arabia (+966)</option>
                    <option value="SB">SB - Solomon Islands (+677)</option>
                    <option value="SC - Seychelles (+248)">SC - Seychelles (+248)</option>
                    <option value="SD - Sudan (+249)">SD - Sudan (+249)</option>
                    <option value="SE - Sweden (+46)">SE - Sweden (+46)</option>
                    <option value="SG - Singapore (+65)">SG - Singapore (+65)</option>
                    <option value="SH - Saint Helena (+290)">SH - Saint Helena (+290)</option>
                    <option value="SI - Slovenia (+386)">SI - Slovenia (+386)</option>
                    <option value="SK - Slovakia (+421)">SK - Slovakia (+421)</option>
                    <option value="SL - Sierra Leone (+232)">SL - Sierra Leone (+232)</option>
                    <option value="SM - San Marino (+378)">SM - San Marino (+378)</option>
                    <option value="SN - Senegal (+221)">SN - Senegal (+221)</option>
                    <option value="SO - Somalia (+252)">SO - Somalia (+252)</option>
                    <option value="SR - Suriname (+597)">SR - Suriname (+597)</option>
                    <option value="ST - Sao Tome And Principe (+239)">ST - Sao Tome And Principe (+239)</option>
                    <option value="SV - El Salvador (+503)">SV - El Salvador (+503)</option>
                    <option value="SY - Syrian Arab Republic (+963)">SY - Syrian Arab Republic (+963)</option>
                    <option value="SZ - Swaziland (+268)">SZ - Swaziland (+268)</option>
                    <option value="TC - Turks And Caicos Islands (+1649)">TC - Turks And Caicos Islands (+1649)</option>
                    <option value="TD - Chad (+235)">TD - Chad (+235)</option>
                    <option value="TG - Togo (+228)">TG - Togo (+228)</option>
                    <option value="TH - Thailand (+66)">TH - Thailand (+66)</option>
                    <option value="TJ - Tajikistan (+992)">TJ - Tajikistan (+992)</option>
                    <option value="TK - Tokelau (+690)">TK - Tokelau (+690)</option>
                    <option value="TL - Timor-leste (+670)">TL - Timor-leste (+670)</option>
                    <option value="TM - Turkmenistan (+993)">TM - Turkmenistan (+993)</option>
                    <option value="TN - Tunisia (+216)">TN - Tunisia (+216)</option>
                    <option value="TO - Tonga (+676)">TO - Tonga (+676)</option>
                    <option value="TR - Turkey (+90)">TR - Turkey (+90)</option>
                    <option value="TT - Trinidad And Tobago (+1868)">TT - Trinidad And Tobago (+1868)</option>
                    <option value="TV - Tuvalu (+688)">TV - Tuvalu (+688)</option>
                    <option value="TW - Taiwan, Province Of China (+886)">TW - Taiwan, Province Of China (+886)</option>
                    <option value="TZ - Tanzania, United Republic Of (+255)">TZ - Tanzania, United Republic Of (+255)</option>
                    <option value="UA - Ukraine (+380)">UA - Ukraine (+380)</option>
                    <option value="UG - Uganda (+256)">UG - Uganda (+256)</option>
                    <option value="US - United States (+1)">US - United States (+1)</option>
                    <option value="UY - Uruguay (+598)">UY - Uruguay (+598)</option>
                    <option value="UZ - Uzbekistan (+998)">UZ - Uzbekistan (+998)</option>
                    <option value="VA - Holy See (vatican City State) (+39)">VA - Holy See (vatican City State) (+39)</option>
                    <option value="VC - Saint Vincent And The Grenadines (+1784)">VC - Saint Vincent And The Grenadines (+1784)</option>
                    <option value="VE - Venezuela (+58)">VE - Venezuela (+58)</option>
                    <option value="VG - Virgin Islands, British (+1284)">VG - Virgin Islands, British (+1284)</option>
                    <option value="VI - Virgin Islands, U.s. (+1340)">VI - Virgin Islands, U.s. (+1340)</option>
                    <option value="VN - Viet Nam (+84)">VN - Viet Nam (+84)</option>
                    <option value="VU - Vanuatu (+678)">VU - Vanuatu (+678)</option>
                    <option value="WF - Wallis And Futuna (+681)">WF - Wallis And Futuna (+681)</option>
                    <option value="WS - Samoa (+685)">WS - Samoa (+685)</option>
                    <option value="XK - Kosovo (+381)">XK - Kosovo (+381)</option>
                    <option value="YE - Yemen (+967)">YE - Yemen (+967)</option>
                    <option value="YT - Mayotte (+262)">YT - Mayotte (+262)</option>
                    <option value="ZA - South Africa (+27)">ZA - South Africa (+27)</option>
                    <option value="ZM - Zambia (+260)">ZM - Zambia (+260)</option>
                    <option value="ZW - Zimbabwe (+263)">ZW - Zimbabwe (+263)</option>
                  </select>

             </div>
            </div>
      
            <div class="col-md-6 col-sm-12">
              <div class="input-group">
          <label class="control-label" for="pwd"> Primary Phone No:<span class="required">*</span></label>
            <input name="mobile" type="text"  class="form-control"  maxlength="10" id="number" 
                 value="<?php
                         if (!empty($js_personal_info->mobile)) {
                           echo $js_personal_info->mobile;
                           }
                       ?>">&nbsp;<span id="errmsg"></span>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <label class="control-label" for="pwd"> Country Code:</label>
                <select id="country" name="alternatecountry_code" class="form-control">
                  <option><?php echo $js_personal_info->alternatecountry_code?></option>
                  <option value="AD - Andorra (+376)">AD - Andorra (+376)</option>
                  <option value="AE - United Arab Emirates (+971)">AE - United Arab Emirates (+971)</option>
                  <option value="AF - Afghanistan (+93)">AF - Afghanistan (+93)</option>
                  <option value="AG - Antigua And Barbuda (+1268)">AG - Antigua And Barbuda (+1268)</option>
                  <option value="AI - Anguilla (+1264)">AI - Anguilla (+1264)</option>
                  <option value="AL - Albania (+355)">AL - Albania (+355)</option>
                  <option value="AM - Armenia (+374)">AM - Armenia (+374)</option>
                  <option value="AN - Netherlands Antilles (+599)">AN - Netherlands Antilles (+599)</option>
                  <option value="AO - Angola (+244)">AO - Angola (+244)</option>
                  <option value="AQ - Antarctica (+672)">AQ - Antarctica (+672)</option>
                  <option value="AR - Argentina (+54)">AR - Argentina (+54)</option>
                  <option value="AS - American Samoa (+1684)">AS - American Samoa (+1684)</option>
                  <option value="AT - Austria (+43)">AT - Austria (+43)</option>
                  <option value="AU - Australia (+61)">AU - Australia (+61)</option>
                  <option value="AW - Aruba (+297)">AW - Aruba (+297)</option>
                  <option value="AZ - Azerbaijan (+994)">AZ - Azerbaijan (+994)</option>
                  <option value="BA - Bosnia And Herzegovina (+387)">BA - Bosnia And Herzegovina (+387)</option>
                  <option value="BB - Barbados (+1246)">BB - Barbados (+1246)</option>
                  <option value="BD - Bangladesh (+880)">BD - Bangladesh (+880)</option>
                  <option value="BE - Belgium (+32)">BE - Belgium (+32)</option>
                  <option value="BF - Burkina Faso (+226)">BF - Burkina Faso (+226)</option>
                  <option value="BG - Bulgaria (+359)">BG - Bulgaria (+359)</option>
                  <option value="BH - Bahrain (+973)">BH - Bahrain (+973)</option>
                  <option value="BI - Burundi (+257)">BI - Burundi (+257)</option>
                  <option value="BJ - Benin (+229)">BJ - Benin (+229)</option>
                  <option value="BL - Saint Barthelemy (+590)">BL - Saint Barthelemy (+590)</option>
                  <option value="BM - Bermuda (+1441)">BM - Bermuda (+1441)</option>
                  <option value="BN - Brunei Darussalam (+673)">BN - Brunei Darussalam (+673)</option>
                  <option value="BO - Bolivia (+591)">BO - Bolivia (+591)</option>
                  <option value="BR - Brazil (+55)">BR - Brazil (+55)</option>
                  <option value="BS - Bahamas (+1242)">BS - Bahamas (+1242)</option>
                  <option value="BT - Bhutan (+975)">BT - Bhutan (+975)</option>
                  <option value="BW - Botswana (+267)">BW - Botswana (+267)</option>
                  <option value="BY - Belarus (+375)">BY - Belarus (+375)</option>
                  <option value="BZ - Belize (+501)">BZ - Belize (+501)</option>
                  <option value="CA - Canada (+1)">CA - Canada (+1)</option>
                  <option value="CC - Cocos (keeling) Islands (+61)">CC - Cocos (keeling) Islands (+61)</option>
                  <option value="CD - Congo, The Democratic Republic Of The (+243)">CD - Congo, The Democratic Republic Of The (+243)</option>
                  <option value="CF - Central African Republic (+236)">CF - Central African Republic (+236)</option>
                  <option value="CG - Congo (+242)">CG - Congo (+242)</option>
                  <option value="CH - Switzerland (+41)">CH - Switzerland (+41)</option>
                  <option value="CI - Cote D Ivoire (+225)">CI - Cote D Ivoire (+225)</option>
                  <option value="CK - Cook Islands (+682)">CK - Cook Islands (+682)</option>
                  <option value="CL - Chile (+56)">CL - Chile (+56)</option>
                  <option value="CM - Cameroon (+237)">CM - Cameroon (+237)</option>
                  <option value="CN - China (+86)">CN - China (+86)</option>
                  <option value="CO - Colombia (+57)">CO - Colombia (+57)</option>
                  <option value="CR - Costa Rica (+506)">CR - Costa Rica (+506)</option>
                  <option value="CU - Cuba (+53)">CU - Cuba (+53)</option>
                  <option value="CV - Cape Verde (+238)">CV - Cape Verde (+238)</option>
                  <option value="CX - Christmas Island (+61)">CX - Christmas Island (+61)</option>
                  <option value="CY - Cyprus (+357)">CY - Cyprus (+357)</option>
                  <option value="CZ - Czech Republic (+420)">CZ - Czech Republic (+420)</option>
                  <option value="DE - Germany (+49)">DE - Germany (+49)</option>
                  <option value="DJ - Djibouti (+253)">DJ - Djibouti (+253)</option>
                  <option value="DK - Denmark (+45)">DK - Denmark (+45)</option>
                  <option value="DM - Dominica (+1767)">DM - Dominica (+1767)</option>
                  <option value="DO - Dominican Republic (+1809)">DO - Dominican Republic (+1809)</option>
                  <option value="DZ - Algeria (+213)">DZ - Algeria (+213)</option>
                  <option value="EC - Ecuador (+593)">EC - Ecuador (+593)</option>
                  <option value="EE - Estonia (+372)">EE - Estonia (+372)</option>
                  <option value="EG - Egypt (+20)">EG - Egypt (+20)</option>
                  <option value="ER - Eritrea (+291)">ER - Eritrea (+291)</option>
                  <option value="ES - Spain (+34)">ES - Spain (+34)</option>
                  <option value="ET - Ethiopia (+251)">ET - Ethiopia (+251)</option>
                  <option value="FI - Finland (+358)">FI - Finland (+358)</option>
                  <option value="FJ - Fiji (+679)">FJ - Fiji (+679)</option>
                  <option value="FK - Falkland Islands (malvinas) (+500)">FK - Falkland Islands (malvinas) (+500)</option>
                  <option value="FM - Micronesia, Federated States Of (+691)">FM - Micronesia, Federated States Of (+691)</option>
                  <option value="FO - Faroe Islands (+298)">FO - Faroe Islands (+298)</option>
                  <option value="FR - France (+33)">FR - France (+33)</option>
                  <option value="GA - Gabon (+241)">GA - Gabon (+241)</option>
                  <option value="GB - United Kingdom (+44)">GB - United Kingdom (+44)</option>
                  <option value="GD - Grenada (+1473)">GD - Grenada (+1473)</option>
                  <option value="GE - Georgia (+995)">GE - Georgia (+995)</option>
                  <option value="GH - Ghana (+233)">GH - Ghana (+233)</option>
                  <option value="GI - Gibraltar (+350)">GI - Gibraltar (+350)</option>
                  <option value="GL - Greenland (+299)">GL - Greenland (+299)</option>
                  <option value="GM - Gambia (+220)">GM - Gambia (+220)</option>
                  <option value="GN - Guinea (+224)">GN - Guinea (+224)</option>
                  <option value="GQ - Equatorial Guinea (+240)">GQ - Equatorial Guinea (+240)</option>
                  <option value="GR - Greece (+30)">GR - Greece (+30)</option>
                  <option value="GT - Guatemala (+502)">GT - Guatemala (+502)</option>
                  <option value="GU - Guam (+1671)">GU - Guam (+1671)</option>
                  <option value="GW - Guinea-bissau (+245)">GW - Guinea-bissau (+245)</option>
                  <option value="GY - Guyana (+592)">GY - Guyana (+592)</option>
                  <option value="HK - Hong Kong (+852)">HK - Hong Kong (+852)</option>
                  <option value="HN - Honduras (+504)">HN - Honduras (+504)</option>
                  <option value="HR - Croatia (+385)">HR - Croatia (+385)</option>
                  <option value="HT - Haiti (+509)">HT - Haiti (+509)</option>
                  <option value="HU - Hungary (+36)">HU - Hungary (+36)</option>
                  <option value="ID - Indonesia (+62)">ID - Indonesia (+62)</option>
                  <option value="IE - Ireland (+353)">IE - Ireland (+353)</option>
                  <option value="IL - Israel (+972)">IL - Israel (+972)</option>
                  <option value="IM - Isle Of Man (+44)">IM - Isle Of Man (+44)</option>
                  <option value="IN - India (+91)">IN - India (+91)</option>
                  <option value="IQ - Iraq (+964)">IQ - Iraq (+964)</option>
                  <option value="IR - Iran, Islamic Republic Of (+98">IR - Iran, Islamic Republic Of (+98)</option>
                  <option value="IS - Iceland (+354)">IS - Iceland (+354)</option>
                  <option value="IT - Italy (+39)">IT - Italy (+39)</option>
                  <option value="JM - Jamaica (+1876)">JM - Jamaica (+1876)</option>
                  <option value="JO - Jordan (+962)">JO - Jordan (+962)</option>
                  <option value="JP - Japan (+81)">JP - Japan (+81)</option>
                  <option value="KE - Kenya (+254)">KE - Kenya (+254)</option>
                  <option value="KG - Kyrgyzstan (+996)">KG - Kyrgyzstan (+996)</option>
                  <option value="KH - Cambodia (+855)">KH - Cambodia (+855)</option>
                  <option value="KI - Kiribati (+686)">KI - Kiribati (+686)</option>
                  <option value="KM - Comoros (+269)">KM - Comoros (+269)</option>
                  <option value="KN - Saint Kitts And Nevis (+1869)">KN - Saint Kitts And Nevis (+1869)</option>
                  <option value="KP - Korea Democratic Peoples Republic Of (+850)">KP - Korea Democratic Peoples Republic Of (+850)</option>
                  <option value="KR - Korea Republic Of (+82)">KR - Korea Republic Of (+82)</option>
                  <option value="KW - Kuwait (+965)">KW - Kuwait (+965)</option>
                  <option value="KY - Cayman Islands (+1345)">KY - Cayman Islands (+1345)</option>
                  <option value="KZ - Kazakstan (+7)">KZ - Kazakstan (+7)</option>
                  <option value="LA - Lao Peoples Democratic Republic (+856)">LA - Lao Peoples Democratic Republic (+856)</option>
                  <option value="LB - Lebanon (+961)">LB - Lebanon (+961)</option>
                  <option value="LC - Saint Lucia (+1758)">LC - Saint Lucia (+1758)</option>
                  <option value="LI - Liechtenstein (+423)">LI - Liechtenstein (+423)</option>
                  <option value="LK - Sri Lanka (+94)">LK - Sri Lanka (+94)</option>
                  <option value="LR - Liberia (+231)">LR - Liberia (+231)</option>
                  <option value="LS - Lesotho (+266)">LS - Lesotho (+266)</option>
                  <option value="LT - Lithuania (+370)">LT - Lithuania (+370)</option>
                  <option value="LU - Luxembourg (+352)">LU - Luxembourg (+352)</option>
                  <option value="LV - Latvia (+371)">LV - Latvia (+371)</option>
                  <option value="LY - Libyan Arab Jamahiriya (+218)">LY - Libyan Arab Jamahiriya (+218)</option>
                  <option value="MA - Morocco (+212)">MA - Morocco (+212)</option>
                  <option value="MC - Monaco (+377)">MC - Monaco (+377)</option>
                  <option value="MD - Moldova, Republic Of (+373)">MD - Moldova, Republic Of (+373)</option>
                  <option value="ME - Montenegro (+382)">ME - Montenegro (+382)</option>
                  <option value="MF - Saint Martin (+1599)">MF - Saint Martin (+1599)</option>
                  <option value="MG - Madagascar (+261)">MG - Madagascar (+261)</option>
                  <option value="MH - Marshall Islands (+692)">MH - Marshall Islands (+692)</option>
                  <option value="MK - Macedonia, The Former Yugoslav Republic Of (+389)">MK - Macedonia, The Former Yugoslav Republic Of (+389)</option>
                  <option value="ML - Mali (+223)">ML - Mali (+223)</option>
                  <option value="MM - Myanmar">MM - Myanmar (+95)</option>
                  <option value="MN - Mongolia (+976)">MN - Mongolia (+976)</option>
                  <option value="MO - Macau (+853)">MO - Macau (+853)</option>
                  <option value="MP - Northern Mariana Islands (+1670)">MP - Northern Mariana Islands (+1670)</option>
                  <option value="MR - Mauritania (+222)">MR - Mauritania (+222)</option>
                  <option value="MS - Montserrat (+1664)">MS - Montserrat (+1664)</option>
                  <option value="MT - Malta (+356)">MT - Malta (+356)</option>
                  <option value="MU - Mauritius (+230)">MU - Mauritius (+230)</option>
                  <option value="MV - Maldives (+960)">MV - Maldives (+960)</option>
                  <option value="MW">MV - Maldives (+960)</option>
                  <option value="MX - Mexico (+52)">MX - Mexico (+52)</option>
                  <option value="MY - Malaysia (+60)">MY - Malaysia (+60)</option>
                  <option value="MZ - Mozambique (+258)">MZ - Mozambique (+258)</option>
                  <option value="NA - Namibia (+264)">NA - Namibia (+264)</option>
                  <option value="NC - New Caledonia (+687)">NC - New Caledonia (+687)</option>
                  <option value="NE - Niger (+227)">NE - Niger (+227)</option>
                  <option value="NG - Nigeria (+234)">NG - Nigeria (+234)</option>
                  <option value="NI - Nicaragua (+505)">NI - Nicaragua (+505)</option>
                  <option value="NL - Netherlands (+31)">NL - Netherlands (+31)</option>
                  <option value="NO - Norway (+47)">NO - Norway (+47)</option>
                  <option value="NP - Nepal (+977)">NP - Nepal (+977)</option>
                  <option value="NR - Nauru (+674)">NR - Nauru (+674)</option>
                  <option value="NU - Niue (+683)">NU - Niue (+683)</option>
                  <option value="NZ - New Zealand (+64)">NZ - New Zealand (+64)</option>
                  <option value="OM - Oman (+968)">OM - Oman (+968)</option>
                  <option value="PA - Panama (+507)">PA - Panama (+507)</option>
                  <option value="PE - Peru (+51)">PE - Peru (+51)</option>
                  <option value="PF - French Polynesia (+689)">PF - French Polynesia (+689)</option>
                  <option value="PG - Papua New Guinea (+675)">PG - Papua New Guinea (+675)</option>
                  <option value="PH - Philippines (+63)">PH - Philippines (+63)</option>
                  <option value="PK - Pakistan (+92)">PK - Pakistan (+92)</option>
                  <option value="PL - Poland (+48)">PL - Poland (+48)</option>
                  <option value="PM - Saint Pierre And Miquelon (+508)">PM - Saint Pierre And Miquelon (+508)</option>
                  <option value="PN - Pitcairn (+870)">PN - Pitcairn (+870)</option>
                  <option value="PR - Puerto Rico (+1)">PR - Puerto Rico (+1)</option>
                  <option value="PT - Portugal (+351)">PT - Portugal (+351)</option>
                  <option value="PW - Palau (+680)">PW - Palau (+680)</option>
                  <option value="PY - Paraguay (+595">PY - Paraguay (+595)</option>
                  <option value="QA - Qatar (+974)">QA - Qatar (+974)</option>
                  <option value="RO - Romania (+40)">RO - Romania (+40)</option>
                  <option value="RS - Serbia (+381)">RS - Serbia (+381)</option>
                  <option value="RU - Russian Federation (+7)">RU - Russian Federation (+7)</option>
                  <option value="RW - Rwanda (+250)">RW - Rwanda (+250)</option>
                  <option value="SB - Solomon Islands (+677)">SA - Saudi Arabia (+966)</option>
                  <option value="SB">SB - Solomon Islands (+677)</option>
                  <option value="SC - Seychelles (+248)">SC - Seychelles (+248)</option>
                  <option value="SD - Sudan (+249)">SD - Sudan (+249)</option>
                  <option value="SE - Sweden (+46)">SE - Sweden (+46)</option>
                  <option value="SG - Singapore (+65)">SG - Singapore (+65)</option>
                  <option value="SH - Saint Helena (+290)">SH - Saint Helena (+290)</option>
                  <option value="SI - Slovenia (+386)">SI - Slovenia (+386)</option>
                  <option value="SK - Slovakia (+421)">SK - Slovakia (+421)</option>
                  <option value="SL - Sierra Leone (+232)">SL - Sierra Leone (+232)</option>
                  <option value="SM - San Marino (+378)">SM - San Marino (+378)</option>
                  <option value="SN - Senegal (+221)">SN - Senegal (+221)</option>
                  <option value="SO - Somalia (+252)">SO - Somalia (+252)</option>
                  <option value="SR - Suriname (+597)">SR - Suriname (+597)</option>
                  <option value="ST - Sao Tome And Principe (+239)">ST - Sao Tome And Principe (+239)</option>
                  <option value="SV - El Salvador (+503)">SV - El Salvador (+503)</option>
                  <option value="SY - Syrian Arab Republic (+963)">SY - Syrian Arab Republic (+963)</option>
                  <option value="SZ - Swaziland (+268)">SZ - Swaziland (+268)</option>
                  <option value="TC - Turks And Caicos Islands (+1649)">TC - Turks And Caicos Islands (+1649)</option>
                  <option value="TD - Chad (+235)">TD - Chad (+235)</option>
                  <option value="TG - Togo (+228)">TG - Togo (+228)</option>
                  <option value="TH - Thailand (+66)">TH - Thailand (+66)</option>
                  <option value="TJ - Tajikistan (+992)">TJ - Tajikistan (+992)</option>
                  <option value="TK - Tokelau (+690)">TK - Tokelau (+690)</option>
                  <option value="TL - Timor-leste (+670)">TL - Timor-leste (+670)</option>
                  <option value="TM - Turkmenistan (+993)">TM - Turkmenistan (+993)</option>
                  <option value="TN - Tunisia (+216)">TN - Tunisia (+216)</option>
                  <option value="TO - Tonga (+676)">TO - Tonga (+676)</option>
                  <option value="TR - Turkey (+90)">TR - Turkey (+90)</option>
                  <option value="TT - Trinidad And Tobago (+1868)">TT - Trinidad And Tobago (+1868)</option>
                  <option value="TV - Tuvalu (+688)">TV - Tuvalu (+688)</option>
                  <option value="TW - Taiwan, Province Of China (+886)">TW - Taiwan, Province Of China (+886)</option>
                  <option value="TZ - Tanzania, United Republic Of (+255)">TZ - Tanzania, United Republic Of (+255)</option>
                  <option value="UA - Ukraine (+380)">UA - Ukraine (+380)</option>
                  <option value="UG - Uganda (+256)">UG - Uganda (+256)</option>
                  <option value="US - United States (+1)">US - United States (+1)</option>
                  <option value="UY - Uruguay (+598)">UY - Uruguay (+598)</option>
                  <option value="UZ - Uzbekistan (+998)">UZ - Uzbekistan (+998)</option>
                  <option value="VA - Holy See (vatican City State) (+39)">VA - Holy See (vatican City State) (+39)</option>
                  <option value="VC - Saint Vincent And The Grenadines (+1784)">VC - Saint Vincent And The Grenadines (+1784)</option>
                  <option value="VE - Venezuela (+58)">VE - Venezuela (+58)</option>
                  <option value="VG - Virgin Islands, British (+1284)">VG - Virgin Islands, British (+1284)</option>
                  <option value="VI - Virgin Islands, U.s. (+1340)">VI - Virgin Islands, U.s. (+1340)</option>
                  <option value="VN - Viet Nam (+84)">VN - Viet Nam (+84)</option>
                  <option value="VU - Vanuatu (+678)">VU - Vanuatu (+678)</option>
                  <option value="WF - Wallis And Futuna (+681)">WF - Wallis And Futuna (+681)</option>
                  <option value="WS - Samoa (+685)">WS - Samoa (+685)</option>
                  <option value="XK - Kosovo (+381)">XK - Kosovo (+381)</option>
                  <option value="YE - Yemen (+967)">YE - Yemen (+967)</option>
                  <option value="YT - Mayotte (+262)">YT - Mayotte (+262)</option>
                  <option value="ZA - South Africa (+27)">ZA - South Africa (+27)</option>
                  <option value="ZM - Zambia (+260)">ZM - Zambia (+260)</option>
                  <option value="ZW - Zimbabwe (+263)">ZW - Zimbabwe (+263)</option>
                </select>
              </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <label class="control-label" for="pwd">Alternate Phone No:</label>
              <input name="alternatemobile" type="text"  class="form-control"  maxlength="10" id="number" 
               value="<?php
                         if (!empty($js_personal_info->alternatemobile)) {
                           echo $js_personal_info->alternatemobile;
                           }
                       ?>">&nbsp;<span id="errmsg"></span>
            </div>
          </div>
        
        </div>
      </div>
         
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12 col-sm-12">  
            <div class="input-group">
              <label class="control-label" for="pwd">Present Address<span class="required">*</span></label>
              <textarea name="present_address" class="form-control ckeditor" rows="5" id="comment"><?php 
                       if (!empty($js_personal_info->present_address)) {
                         echo $js_personal_info->present_address;
                         }
                     ?></textarea>
            </div>
        </div>
        <div class="panel-body"></div>

        </div>
      </div>
     
      <div class="row">
        <div class="col-md-12">
            
            <div class="col-md-6 col-sm-12">
          <div class="input-group">
                  <label class="control-label" for="pwd">Country<span class="required">*</span></label>
                  <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
          <option value="">Select Country</option>
          <?php foreach($country as $key){?>
          <option value="<?php echo $key['country_id']; ?>"<?php if($js_personal_info->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
          <?php } ?>
          </select>
                </div>
          </div>
      
      <div class="col-md-6 col-sm-12">
        <div class="input-group">
                  <label class="control-label" for="pwd">State<span class="required">*</span></label>
                 <select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
         <option value="">Select State</option>
         <?php foreach($state as $val){?>
          <option value="<?php echo $val['state_id']; ?>"<?php if($js_personal_info->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
          <?php } ?>
         </select>
              </div>
            </div>
      
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <label class="control-label" for="pwd">City<span class="required">*</span></label>
              <select  name="city_id" id="city_id" class="form-control">
                <option value="">Select City</option>
               <?php foreach($city as $valu){?>
                <option value="<?php echo $valu['id']; ?>"<?php if($js_personal_info->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                <?php } ?>
             </select>
              </div>
            </div>
      
      <div class="col-md-6 col-sm-12">
        <div class="input-group">
          <label class="control-label" for="pwd">Pincode<span class="required">*</span></label>
          <input type="text" name="pincode" id="seeker_pincode" class="form-control" maxlength="6"  value="<?php
                 if (!empty($js_personal_info->pincode)) {
                   echo $js_personal_info->pincode;
                   }
               ?>" required onkeypress="return isNumber(event)">
        </div>
      </div>
      </div>
      
       </div>
     <!--   <input type="checkbox" name="billingtoo" onclick="FillBilling(this.form)">
        
       <em>Check this box if Present Address and Parmanent Address are the same.</em> -->
      
        
    <!--    <div class="row">
              <div class="col-md-12">
            <div class="col-md-12 col-sm-12">
              <div class="input-group">
               <br/> <label class="control-label" for="pwd">Parmanent Address</label>
                <textarea name="parmanent_address" class="form-control ckeditor" rows="5" id="comment"><?php 
                    if (!empty($js_personal_info->parmanent_address)) {
                           echo $js_personal_info->parmanent_address;
                        }
                    ?></textarea>
              </div>
            </div>    
                   
             
      </div>
      </div>
     <div class="panel-body"></div>   
      <div class="row">
              <div class="col-md-12">
        <div class="col-md-6 col-sm-12">
        <div class="input-group">
          <label class="control-label" for="pwd">Country</label>
          <select  name="country1_id" id="country1_id" class="form-control" onchange="getStatess(this.value)">
            <option value="">Select Country</option>
            <?php foreach($country as $keys){?>
            <option value="<?php echo $keys['country_id']; ?>"<?php if($js_personal_info->country1_id==$keys['country_id']){ echo "selected"; }?>><?php echo $keys['country_name']; ?></option>
            <?php } ?>
          </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
        <div class="input-group">
                 <label class="control-label" for="pwd">State</label>
                 <select  name="state1_id" id="state1_id" class="form-control" onchange="getCityss(this.value)">
         <option value="">Select Country First</option>
         <?php foreach($state as $value){?>
          <option value="<?php echo $value['state_id']; ?>"<?php if($js_personal_info->state1_id==$value['state_id']){ echo "selected"; }?>><?php echo $value['state_name']; ?></option>
          <?php } ?>
         </select>
              </div>
            </div> 
    </div>      
      </div>
     <div class="panel-body"></div>   
    <div class="row">
    <div class="col-md-12">
     <div class="col-md-6 col-sm-12">
        <div class="input-group">
                  <label class="control-label" for="pwd">City</label>
                  <select  name="city1_id" id="city1_id" class="form-control">
           <option value="">Select State First</option>
            <?php foreach($city as $valuee){?>
            <option value="<?php echo $valuee['id']; ?>"<?php if($js_personal_info->city1_id==$valuee['id']){ echo "selected"; }?>><?php echo $valuee['city_name']; ?></option>
            <?php } ?>
           </select>
              </div>
            </div> -->
       <!-- <div class="col-md-6 col-sm-12">
        <div class="input-group">
                  <label class="control-label" for="pwd">Pincode</label>
                 <input type="text" name="pincode1" id="pincode1" maxlength="6" class="form-control"  value="<?php
                           if (!empty($js_personal_info->pincode1)) {
                             echo $js_personal_info->pincode1;
                             }
                         ?>" required onkeypress="return isNumber(event)">
              </div>
            </div> -->
    <!-- </div>
   </div> -->
    <!-- <div class="panel-body"></div>   
    <div class="row">
              <div class="col-md-12">
                <div class="col-md-6 col-sm-12">
                  <div class="input-group">
                    <label class="control-label" for="email">Father Name</label>
                    <input type="text" name="father_name" class="form-control name-valid" id="father_name"
                     value="<?php
                           if (!empty($js_personal_info->father_name)) {
                             echo $js_personal_info->father_name;
                             }
                         ?>">
                  </div>     
              </div>
                <div class="col-md-6 col-sm-12">         
                <div class="input-group">
                    <label class="control-label" for="email">Mother Name</label>
                    <input type="text" name="mother_name" class="form-control name-valid" id="mother_name"
                     value="<?php
                           if (!empty($js_personal_info->mother_name)) {
                             echo $js_personal_info->mother_name;
                             }
                         ?>">
                </div>
              </div>
            </div>
      </div> -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">My Tagline<span class="required">*</span></label>
              <textarea name="tagline" class="form-control" rows="3" placeholder="Enter Your Tagline"><?php 
                       if (!empty($js_personal_info->resume_title)) {
                         echo $js_personal_info->resume_title;
                         }
                     ?></textarea>          
          </div>  

        </div>
      </div>
    </div>

    <div class="panel-body"></div>   
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">Marital Status<span class="required">*</span></label>
                <select class="form-control" name="matrial_status" id="matrial_status">
                  <option value="">Select Marital Status</option>
                  <option value="Single/unmarried"<?php if($js_personal_info->marital_status=='Single/unmarried'){echo 'selected';} ?>>Single/unmarried</option>
                  <option value="Married"<?php if($js_personal_info->marital_status=='Married'){echo 'selected';} ?>>Married</option>
                  <option value="Widowed"<?php if($js_personal_info->marital_status=='Widowed'){echo 'selected';} ?>>Widowed</option>
                  <option value="Divorded"<?php if($js_personal_info->marital_status=='Divorded'){echo 'selected';} ?>>Divorced</option>
                  <option value="Separated"<?php if($js_personal_info->marital_status=='Separated'){echo 'selected';} ?>>Separated</option>
                  <option value="Other"<?php if($js_personal_info->marital_status=='Other'){echo 'selected';} ?>>Other</option>
                  
                </select>
          </div>     
        </div>
        
        <div class="col-md-6 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">Work Permit for USA</label>
                <select class="form-control" name="work_permit_usa" id="work_permit_usa">
                  <option value="">Select Work Permit</option>
                  <option value="Have H1 Visa"<?php if($js_personal_info->work_permit_usa=='Have H1 Visa'){echo 'selected';} ?>>Have H1 Visa</option>
                  <option value="Need H1 Visa"<?php if($js_personal_info->work_permit_usa=='Need H1 Visa'){echo 'selected';} ?>>Need H1 Visa</option>
                  <option value="TN Permit Holder"<?php if($js_personal_info->work_permit_usa=='TN Permit Holder'){echo 'selected';} ?>>TN Permit Holder</option>
                  <option value="Green Card Holder"<?php if($js_personal_info->work_permit_usa=='Green Card Holder'){echo 'selected';} ?>>Green Card Holder</option>
                  <option value="US Citizen"<?php if($js_personal_info->work_permit_usa=='US Citizen'){echo 'selected';} ?>>US Citizen</option>
                  <option value="Authorized to work in US"<?php if($js_personal_info->work_permit_usa=='Authorized to work in US'){echo 'selected';} ?>>Authorized to work in US</option>
                </select>
          </div>     
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">Work Permit for Other Countries</label>
              <input type="text" name="other_country_work_permit" class="form-control" id="tokenfield" placeholder="Enter Country" value="<?php
                           if (!empty($js_personal_info->work_permit_countries)) {
                             echo $js_personal_info->work_permit_countries;
                             }
                         ?>">
            <p>You can choose upto 3 Countries</p>  
          </div>  

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">Website (Personal / Company / Blog / Other)</label>
              <input type="text" name="website" class="form-control" placeholder="Enter Your Website (Personal / Company / Blog / Other)" value="<?php
                           if (!empty($js_personal_info->website)) {
                             echo $js_personal_info->website;
                             }
                         ?>">
          </div>  

        </div>
      </div>
    </div>


    <div class="panel-body"></div>   
           <!-- Copy Fields -->
      
      <!--<div class="row">
       <div class="col-md-12">
      <div class="col-md-6 col-sm-12">         
                <div class="input-group">
                    <label class="control-label" for="email">Preferable Job Location:</label>
           
                    <input type="text" name="job_area" class="form-control form-control ui-autocomplete-input" id="job_area" placeholder="Preferable Job Area"
                   value="<?php
                        /* if (!empty($job_career_info[0]->job_area)) {
                           echo $job_career_info[0]->job_area;
                           }
                       */ ?>">
                </div>
              </div>
      </div>
      </div>-->
      
              
            </form>
     
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  

    


</script>
<script type="text/javascript">


    $('#tokenfield').tokenfield({
      autocomplete: {
        source: "<?php echo base_url('job_seeker/get_country_autocomplete'); ?>",
        delay: 100
      },
      showAutocompleteOnFocus: true,
      limit: 3,

    });
    // to avoid duplications
 $('#tokenfield').on('tokenfield:createtoken', function (event) {
      var existingTokens = $(this).tokenfield('getTokens');
      $.each(existingTokens, function(index, token) {
          if (token.value === event.attrs.value)
              event.preventDefault();

      });
  });


	// Personal Info
  	$( document ).ready( function () {
            $( "#Personal-info" ).validate( {
                rules: {

                    resume_title: {
                        required: true,
                    },

                    father_name: {
                        required: true,
                    },

                    mother_name: {
                        required: true,
                    },

                    date_of_birth: {
                        required: true,
                    },
                    matrial_status: {
                        required: true,
                    },
                    nationality: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                        minlength:10,
                    },

                    present_address: {
                        required: true,
                    },
                     parmanent_address : {
                        required: true,
                    },
                     country_id: {
                        required: true,
                    },
                    state_id: {
                        required: true,
                    },
                    city_id: {
                        required: true,
                    },


                },
                messages: {
                    email: "Please enter a valid email address",
                    father_name: "Please enter your father name ",
                    mother_name: "Please enter your mother name",
                    date_of_birth: "Please enter your birthday",
                    matrial_status: "Please select your matarial",
                    nationality: "Please select your nationality" ,
                    present_address: "Please enter your present address ",
                    parmanent_address: "Please enter your parmanent address ",
                    country_id: "Please select country ",
                    state_id: "Please select state ",
                    city_id: "Please select city ",

                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
	
	// Experience
	$( document ).ready( function () {
               // Education Add form Valiaton
        $( "#addExperience-info" ).validate( {
                rules: {

                    company_name: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },

                    job_level: {
                        required: true,
                    },

                    job_nature: {
                        required: true,
                    },
                    department: {
                        required: true,
                    },
                      duration: {
                        required: true,
                    },

                },
                messages: {
                    company_name: "Please enter company name",
                    designation: "Please designation name ",
                    job_level: "Please select job level",
                    job_nature: "Please select job nature",
                    department: "Please enter your department",
                    duration: "Please enter your duration",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateExperience-info" ).validate( {
                rules: {

                    company_name: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },

                    job_level: {
                        required: true,
                    },

                    job_nature: {
                        required: true,
                    },
                    department: {
                        required: true,
                    },
                      duration: {
                        required: true,
                    },

                },
              messages: {
                    company_name: "Please enter company name",
                    designation: "Please designation name ",
                    job_level: "Please select job level",
                    job_nature: "Please select job nature",
                    department: "Please enter your department",
                    duration: "Please enter your duration",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
	
	// Reference
    $( document ).ready( function () {
               
        $( "#Reference-info" ).validate( {
                rules: {

                    name: {
                        required: true,
                        minlength: 5
                    },

                    org_name: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                realtion: {
                        required: true,
                    },

                },
                messages: {
                    name: "Please enter a full name",
                    org_name: "Please enter organization name ",
                    mobile: "Please enter  mobile number",
                    designation: "Please enter designation ",
                    email: "Please enter email",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateEducational-info" ).validate( {
                rules: {

                    name: {
                        required: true,
                        minlength: 5
                    },

                    org_name: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },

                },
                messages: {
                    name: "Please enter a full name",
                    org_name: "Please enter organization name ",
                    mobile: "Please enter  mobile number",
                    designation: "Please enter designation ",
                    email: "Please enter email",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
		
	// Career Info
	$( document ).ready( function () {
            $( "#Career-info" ).validate( {
                rules: {

                    js_career_obj: {
                        required: true,
                    },

                    js_career_sum: {
                        required: true,
                    },

                    js_career_salary: {
                        required: true,
                    },

                    avaliable: {
                        required: true,
                    },
               },
                messages: {

                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
	
	//
	$( document ).ready( function () {
            $( "#addLanguage-info" ).validate( {
                rules: {

                    language: {
                        required: true,
                    },

                    reading: {
                        required: true,
                    },

                    writing: {
                        required: true,
                    },

                    speaking: {
                        required: true,
                    },
               },
                messages: {

                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
	
	// Education
	$( document ).ready( function () {
               // Education Add form Valiaton
        $( "#Educational-info" ).validate( {
                rules: {

                    js_degree: {
                        required: true,
                    },

                    js_group: {
                        required: true,
                    },

                    js_resut: {
                        required: true,
                    },

                    js_institute_name: {
                        required: true,
                    },
                    js_year_of_passing: {
                        required: true,
                    },

                },
                messages: {
                    js_degree: "Please your degree",
                    js_group: "Please enter your group name ",
                    js_resut: "Please enter your result",
                    js_institute_name: "Please institute name",
                    js_year_of_passing: "Please your passing years",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateEducational-info" ).validate( {
                rules: {

                    js_degree: {
                        required: true,
                    },

                    js_group: {
                        required: true,
                    },

                    js_resut: {
                        required: true,
                    },

                    js_institute_name: {
                        required: true,
                    },
                    js_year_of_passing: {
                        required: true,
                    },

                },
                messages: {
                    js_degree: "Please your degree",
                    js_group: "Please enter your group name ",
                    js_resut: "Please enter your result",
                    js_institute_name: "Please institute name",
                    js_year_of_passing: "Please your passing years",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
	
	// Training
	$( document ).ready( function () {
               // Education Add form Valiaton
        $( "#Training-info").validate( {
                rules: {

                    training_title: {
                        required: true,
                        minlength: 5
                    },
                    country: {
                        required: true,
                    },

                    institute: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    duration: {
                      required: true,
                    },
                     training_year: {
                      required: true,
                    },

                },
                messages: {
                    training_title: "Please enter a valid Title",
                    country: "Please enter your country name",
                    institute: "Please enter your institue",
                    location: "Please enter your location",
                    duration: "Please enter your duration",
                    training_year: "Please enter training year",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateEducational-info" ).validate( {
                rules: {

                    training_title: {
                        required: true,
                        minlength: 5
                    },
                    country: {
                        required: true,
                    },

                    institute: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    duration: {
                      required: true,
                    },     
                     training_year: {
                      required: true,
                    },

                },
                messages: {
                    training_title: "Please enter a valid Title",
                    country: "Please enter your country name",
                    institute: "Please enter your institue",
                    location: "Please enter your location",
                    duration: "Please enter your duration",
                    training_year: "Please enter training year",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
		
	
</script>

<script>$(document).ready(function () {
  //called when key is pressed in textbox
  $("#number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});</script>
<script>
$(document).ready(function(){
    $("#father_name").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });
});

</script>
<script>
$(document).ready(function(){
    $("#mother_name").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });
});

</script>
            
<script>
function FillBilling(f) {
  if(f.billingtoo.checked == true) {
    f.parmanent_address.value = f.present_address.value;
	f.country1_id.value = f.country_id.value;
    f.state1_id.value = f.state_id.value;
	f.city1_id.value = f.city_id.value;
	f.pincode1.value = f.pincode.value;
  }else{

  	f.parmanent_address.value = '';
	f.country1_id.value = '';
    f.state1_id.value ='';
	f.city1_id.value = '';
	f.pincode1.value = '';
  }
}
</script>    

<script>
	  function getStates(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
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
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	 //  function getStatess(id){
		// if(id){
  //           $.ajax({
  //               type:'POST',
  //               url:'<?php echo base_url();?>Job_seeker/getstate',
  //               data:{id:id},
  //               success:function(res){
  //                   $('#state1_id').html(res);
  //               }
				
  //           }); 
  //         }
   
	 //   }
	   
	 //  function getCityss(id){
		// if(id){
  //           $.ajax({
  //               type:'POST',
  //               url:'<?php echo base_url();?>Job_seeker/getcity',
  //               data:{id:id},
  //               success:function(res){
  //                   $('#city1_id').html(res);
  //               }
				
  //           }); 
  //         }
   
	 //   }
	   
$(document).ready(function(){

    function getStates_load(){
        var id = $('#country_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                    $('#state_id').val(<?php echo $js_personal_info->state_id; ?>);
                     getCitys_load(<?php echo $js_personal_info->state_id; ?>);
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
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                    $('#city_id').val(<?php echo $js_personal_info->city_id; ?>);
                }
                
            }); 
          }
   
       }

    // function getStates_load_permant(){
    //     var id = $('#country1_id').val();

    //     if(id){
    //         $.ajax({
    //             type:'POST',
    //             url:'<?php echo base_url();?>Job_seeker/getstate',
    //             data:{id:id},
    //             success:function(res){
    //                 $('#state1_id').html(res);
    //                 $('#state1_id').val(<?php echo $js_personal_info->state_id; ?>);
    //                  getCitys_load_permant(<?php echo $js_personal_info->state_id; ?>);
    //             }
                
    //         }); 
    //       }
   
    //    }
    
    // function getCitys_load_permant(id){
    //   //var id = $('#state_id').val();
    //   // alert(id);
    //     if(id){
    //         $.ajax({
    //             type:'POST',
    //             url:'<?php echo base_url();?>Job_seeker/getcity',
    //             data:{id:id},
    //             success:function(res){
    //                 $('#city1_id').html(res);
    //                 $('#city1_id').val(<?php echo $js_personal_info->city_id; ?>);
    //             }
                
    //         }); 
    //       }
   
    //    }

  getCitys_load();
  getStates_load();
  // getCitys_load_permant();
  // getStates_load_permant();
});

</script>        
<style>
  .datepicker{z-index:1151 !important;}
</style> 



<script>        
           function phoneno(){          
            $('#pincode').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
	   
	   
	   <script>        
           function phoneno(){          
            $('#pincode1').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
<!--Only Numbers are allowed validation-->
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<!--Only Character and Space are allowed validation-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {
         $('.name-valid').on('keypress', function(e) {
          var regex = new RegExp("^[a-zA-Z ]*$");
          var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
          if (regex.test(str)) {
             return true;
          }
          e.preventDefault();
          return false;
         });
        });
</script>




<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#job_area" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "job_seeker/search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.city_name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
 
</script>
<script type="text/javascript">
  function getlanguage_data(id)
  {
   
   
    $.ajax({
             url:'<?php echo base_url()?>job_seeker/edit_language',
             type: 'post',
            
             data: {language_id:id},
              dataType: 'json',
             // content_type:'application/json',
             success: function(data){
               
               console.log(data);
              
                // $('#candiate_email').val(emails);
                     
              
             }
        });
  }
</script>
<style>
  ul.ui-autocomplete {
      z-index: 1100;
  }
  .tokenfield .token .close {
    font-family: Arial !important;
    display: inline-block !important;
    line-height: 100% !important;
    font-size: 1.1em !important;
    line-height: 1.49em !important;
    margin-left: 5px !important;
    float: none !important;
    height: 100% !important;
    vertical-align: top !important;
    padding-right: 4px !important;

    color: #989090f2; 

}
</style>
