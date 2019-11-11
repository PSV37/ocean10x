<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
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
                                 <!-- <div class="dragtxt">Drag frame to adjust portrait.</div>-->
                                </div>
                                <div class="col-md-3">
                                  <div class="avatar-preview preview-lg"></div>
                                 <!-- <p>Must be an actual picture of you! Logos, clip-art, group pictures, and digitally-altered images not allowed.</p>-->
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
                <td>Name:</td>
                <td><?php echo $name->full_name; ?></td>
              </tr> 
								  
							<tr>
                <td>Date of Birth:</td>
                <td><?php if($js_personal_info->date_of_birth=="0000-00-00") {
                  echo "";
                } else {
                        echo date('j F Y',strtotime($js_personal_info->date_of_birth));
                  }
                 ?></td>
              </tr>
									
							<tr>
                <td>Nationality:</td>
                <td><?php echo $js_personal_info->nationality; ?></td>
              </tr>  
                                        
            <!--<tr>
              <td>Adhar No:</td>
            <td><?php /*if($js_personal_info->national_id=="0") { echo "";} else { echo $js_personal_info->national_id;} */ ?></td>
            </tr>-->
                                   
							<tr>
                <td>Country Code:</td>
                <td><?php echo $js_personal_info->country_code; ?></td>
              </tr>

              <tr>
                <td>Primary Phone No:</td>
                <td><?php echo $js_personal_info->mobile; ?></td>
              </tr>

							<tr>
                <td>Country Code:</td>
                <td><?php echo $js_personal_info->alternatecountry_code; ?></td>
              </tr>
              <tr>
                <td>Alternate Phone No:</td>
                <td><?php echo $js_personal_info->alternatemobile; ?></td>
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
                <td>Parmanent Address:</td>
                <td><?php echo $js_personal_info->parmanent_address; ?></td>
              </tr>
							<tr>
                <td>City:</td>
                <td><?php echo $results['city_name']; ?></td>
              </tr>
							<tr>
                <td>State:</td>
                <td><?php echo $results['state_name']; ?></td>
              </tr>
							<tr>
                <td>Country:</td>
                <td><?php echo $results['country_name']; ?></td>
              </tr>
							<tr>
                <td width="30%">Father Name:</td>
                <td><?php if(!empty($js_personal_info->father_name))
                        echo $js_personal_info->father_name;
                        else echo "";
                 ?></td>
              </tr>
    
              <tr>
                <td>Mother Name:</td>
                  <td><?php if(!empty($js_personal_info->mother_name))
                  echo $js_personal_info->mother_name; ?></td>
              </tr>
									
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

              	<div class="col-md-6 col-sm-12">
	              	<div class="input-group">
	                 <label class="control-label" for="email">Date of Birth:</label>
	                  <input type="text" class="form-control datepicker" name="date_of_birth" value="<?php echo date('d-m-Y', strtotime($js_personal_info->date_of_birth)); ?>">
	             
	              	</div>
          		</div>
				
				    <div class="col-md-6 col-sm-12">
              <div class="input-group">
                  <label class="control-label" for="email">Nationality:</label>
                  <select name="nationality" class="form-control" id="national_id">
          					<option value="<?php echo $js_personal_info->nationality; ?>"><?php echo $js_personal_info->nationality; ?></option>
          					<option value="Afganistan">Afghanistan</option>
          					<option value="Albania">Albania</option>
          					<option value="Algeria">Algeria</option>
          					<option value="American Samoa">American Samoa</option>
          					<option value="Andorra">Andorra</option>
          					<option value="Angola">Angola</option>
          					<option value="Anguilla">Anguilla</option>
          					<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
          					<option value="Argentina">Argentina</option>
          					<option value="Armenia">Armenia</option>
          					<option value="Aruba">Aruba</option>
          					<option value="Australia">Australia</option>
          					<option value="Austria">Austria</option>
          					<option value="Azerbaijan">Azerbaijan</option>
          					<option value="Bahamas">Bahamas</option>
          					<option value="Bahrain">Bahrain</option>
          					<option value="Bangladesh">Bangladesh</option>
          					<option value="Barbados">Barbados</option>
          					<option value="Belarus">Belarus</option>
          					<option value="Belgium">Belgium</option>
          					<option value="Belize">Belize</option>
          					<option value="Benin">Benin</option>
          					<option value="Bermuda">Bermuda</option>
          					<option value="Bhutan">Bhutan</option>
          					<option value="Bolivia">Bolivia</option>
          					<option value="Bonaire">Bonaire</option>
          					<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
          					<option value="Botswana">Botswana</option>
          					<option value="Brazil">Brazil</option>
          					<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
          					<option value="Brunei">Brunei</option>
          					<option value="Bulgaria">Bulgaria</option>
          					<option value="Burkina Faso">Burkina Faso</option>
          					<option value="Burundi">Burundi</option>
          					<option value="Cambodia">Cambodia</option>
          					<option value="Cameroon">Cameroon</option>
          					<option value="Canada">Canada</option>
          					<option value="Canary Islands">Canary Islands</option>
          					<option value="Cape Verde">Cape Verde</option>
          					<option value="Cayman Islands">Cayman Islands</option>
          					<option value="Central African Republic">Central African Republic</option>
          					<option value="Chad">Chad</option>
          					<option value="Channel Islands">Channel Islands</option>
          					<option value="Chile">Chile</option>
          					<option value="China">China</option>
          					<option value="Christmas Island">Christmas Island</option>
          					<option value="Cocos Island">Cocos Island</option>
          					<option value="Colombia">Colombia</option>
          					<option value="Comoros">Comoros</option>
          					<option value="Congo">Congo</option>
          					<option value="Cook Islands">Cook Islands</option>
          					<option value="Costa Rica">Costa Rica</option>
          					<option value="Cote DIvoire">Cote D'Ivoire</option>
          					<option value="Croatia">Croatia</option>
          					<option value="Cuba">Cuba</option>
          					<option value="Curaco">Curacao</option>
          					<option value="Cyprus">Cyprus</option>
          					<option value="Czech Republic">Czech Republic</option>
          					<option value="Denmark">Denmark</option>
          					<option value="Djibouti">Djibouti</option>
          					<option value="Dominica">Dominica</option>
          					<option value="Dominican Republic">Dominican Republic</option>
          					<option value="East Timor">East Timor</option>
          					<option value="Ecuador">Ecuador</option>
          					<option value="Egypt">Egypt</option>
          					<option value="El Salvador">El Salvador</option>
          					<option value="Equatorial Guinea">Equatorial Guinea</option>
          					<option value="Eritrea">Eritrea</option>
          					<option value="Estonia">Estonia</option>
          					<option value="Ethiopia">Ethiopia</option>
          					<option value="Falkland Islands">Falkland Islands</option>
          					<option value="Faroe Islands">Faroe Islands</option>
          					<option value="Fiji">Fiji</option>
          					<option value="Finland">Finland</option>
          					<option value="France">France</option>
          					<option value="French Guiana">French Guiana</option>
          					<option value="French Polynesia">French Polynesia</option>
          					<option value="French Southern Ter">French Southern Ter</option>
          					<option value="Gabon">Gabon</option>
          					<option value="Gambia">Gambia</option>
          					<option value="Georgia">Georgia</option>
          					<option value="Germany">Germany</option>
          					<option value="Ghana">Ghana</option>
          					<option value="Gibraltar">Gibraltar</option>
          					<option value="Great Britain">Great Britain</option>
          					<option value="Greece">Greece</option>
          					<option value="Greenland">Greenland</option>
          					<option value="Grenada">Grenada</option>
          					<option value="Guadeloupe">Guadeloupe</option>
          					<option value="Guam">Guam</option>
          					<option value="Guatemala">Guatemala</option>
          					<option value="Guinea">Guinea</option>
          					<option value="Guyana">Guyana</option>
          					<option value="Haiti">Haiti</option>
          					<option value="Hawaii">Hawaii</option>
          					<option value="Honduras">Honduras</option>
          					<option value="Hong Kong">Hong Kong</option>
          					<option value="Hungary">Hungary</option>
          					<option value="Iceland">Iceland</option>
          					<option value="India">India</option>
          					<option value="Indonesia">Indonesia</option>
          					<option value="Iran">Iran</option>
          					<option value="Iraq">Iraq</option>
          					<option value="Ireland">Ireland</option>
          					<option value="Isle of Man">Isle of Man</option>
          					<option value="Israel">Israel</option>
          					<option value="Italy">Italy</option>
          					<option value="Jamaica">Jamaica</option>
          					<option value="Japan">Japan</option>
          					<option value="Jordan">Jordan</option>
          					<option value="Kazakhstan">Kazakhstan</option>
          					<option value="Kenya">Kenya</option>
          					<option value="Kiribati">Kiribati</option>
          					<option value="Korea North">Korea North</option>
          					<option value="Korea Sout">Korea South</option>
          					<option value="Kuwait">Kuwait</option>
          					<option value="Kyrgyzstan">Kyrgyzstan</option>
          					<option value="Laos">Laos</option>
          					<option value="Latvia">Latvia</option>
          					<option value="Lebanon">Lebanon</option>
          					<option value="Lesotho">Lesotho</option>
          					<option value="Liberia">Liberia</option>
          					<option value="Libya">Libya</option>
          					<option value="Liechtenstein">Liechtenstein</option>
          					<option value="Lithuania">Lithuania</option>
          					<option value="Luxembourg">Luxembourg</option>
          					<option value="Macau">Macau</option>
          					<option value="Macedonia">Macedonia</option>
          					<option value="Madagascar">Madagascar</option>
          					<option value="Malaysia">Malaysia</option>
          					<option value="Malawi">Malawi</option>
          					<option value="Maldives">Maldives</option>
          					<option value="Mali">Mali</option>
          					<option value="Malta">Malta</option>
          					<option value="Marshall Islands">Marshall Islands</option>
          					<option value="Martinique">Martinique</option>
          					<option value="Mauritania">Mauritania</option>
          					<option value="Mauritius">Mauritius</option>
          					<option value="Mayotte">Mayotte</option>
          					<option value="Mexico">Mexico</option>
          					<option value="Midway Islands">Midway Islands</option>
          					<option value="Moldova">Moldova</option>
          					<option value="Monaco">Monaco</option>
          					<option value="Mongolia">Mongolia</option>
          					<option value="Montserrat">Montserrat</option>
          					<option value="Morocco">Morocco</option>
          					<option value="Mozambique">Mozambique</option>
          					<option value="Myanmar">Myanmar</option>
          					<option value="Nambia">Nambia</option>
          					<option value="Nauru">Nauru</option>
          					<option value="Nepal">Nepal</option>
          					<option value="Netherland Antilles">Netherland Antilles</option>
          					<option value="Netherlands">Netherlands (Holland, Europe)</option>
          					<option value="Nevis">Nevis</option>
          					<option value="New Caledonia">New Caledonia</option>
          					<option value="New Zealand">New Zealand</option>
          					<option value="Nicaragua">Nicaragua</option>
          					<option value="Niger">Niger</option>
          					<option value="Nigeria">Nigeria</option>
          					<option value="Niue">Niue</option>
          					<option value="Norfolk Island">Norfolk Island</option>
          					<option value="Norway">Norway</option>
          					<option value="Oman">Oman</option>
          					<option value="Pakistan">Pakistan</option>
          					<option value="Palau Island">Palau Island</option>
          					<option value="Palestine">Palestine</option>
          					<option value="Panama">Panama</option>
          					<option value="Papua New Guinea">Papua New Guinea</option>
          					<option value="Paraguay">Paraguay</option>
          					<option value="Peru">Peru</option>
          					<option value="Phillipines">Philippines</option>
          					<option value="Pitcairn Island">Pitcairn Island</option>
          					<option value="Poland">Poland</option>
          					<option value="Portugal">Portugal</option>
          					<option value="Puerto Rico">Puerto Rico</option>
          					<option value="Qatar">Qatar</option>
          					<option value="Republic of Montenegro">Republic of Montenegro</option>
          					<option value="Republic of Serbia">Republic of Serbia</option>
          					<option value="Reunion">Reunion</option>
          					<option value="Romania">Romania</option>
          					<option value="Russia">Russia</option>
          					<option value="Rwanda">Rwanda</option>
          					<option value="St Barthelemy">St Barthelemy</option>
          					<option value="St Eustatius">St Eustatius</option>
          					<option value="St Helena">St Helena</option>
          					<option value="St Kitts-Nevis">St Kitts-Nevis</option>
          					<option value="St Lucia">St Lucia</option>
          					<option value="St Maarten">St Maarten</option>
          					<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
          					<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
          					<option value="Saipan">Saipan</option>
          					<option value="Samoa">Samoa</option>
          					<option value="Samoa American">Samoa American</option>
          					<option value="San Marino">San Marino</option>
          					<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
          					<option value="Saudi Arabia">Saudi Arabia</option>
          					<option value="Senegal">Senegal</option>
          					<option value="Serbia">Serbia</option>
          					<option value="Seychelles">Seychelles</option>
          					<option value="Sierra Leone">Sierra Leone</option>
          					<option value="Singapore">Singapore</option>
          					<option value="Slovakia">Slovakia</option>
          					<option value="Slovenia">Slovenia</option>
          					<option value="Solomon Islands">Solomon Islands</option>
          					<option value="Somalia">Somalia</option>
          					<option value="South Africa">South Africa</option>
          					<option value="Spain">Spain</option>
          					<option value="Sri Lanka">Sri Lanka</option>
          					<option value="Sudan">Sudan</option>
          					<option value="Suriname">Suriname</option>
          					<option value="Swaziland">Swaziland</option>
          					<option value="Sweden">Sweden</option>
          					<option value="Switzerland">Switzerland</option>
          					<option value="Syria">Syria</option>
          					<option value="Tahiti">Tahiti</option>
          					<option value="Taiwan">Taiwan</option>
          					<option value="Tajikistan">Tajikistan</option>
          					<option value="Tanzania">Tanzania</option>
          					<option value="Thailand">Thailand</option>
          					<option value="Togo">Togo</option>
          					<option value="Tokelau">Tokelau</option>
          					<option value="Tonga">Tonga</option>
          					<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
          					<option value="Tunisia">Tunisia</option>
          					<option value="Turkey">Turkey</option>
          					<option value="Turkmenistan">Turkmenistan</option>
          					<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
          					<option value="Tuvalu">Tuvalu</option>
          					<option value="Uganda">Uganda</option>
          					<option value="Ukraine">Ukraine</option>
          					<option value="United Arab Erimates">United Arab Emirates</option>
          					<option value="United Kingdom">United Kingdom</option>
          					<option value="United States of America">United States of America</option>
          					<option value="Uraguay">Uruguay</option>
          					<option value="Uzbekistan">Uzbekistan</option>
          					<option value="Vanuatu">Vanuatu</option>
          					<option value="Vatican City State">Vatican City State</option>
          					<option value="Venezuela">Venezuela</option>
          					<option value="Vietnam">Vietnam</option>
          					<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
          					<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
          					<option value="Wake Island">Wake Island</option>
          					<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
          					<option value="Yemen">Yemen</option>
          					<option value="Zaire">Zaire</option>
          					<option value="Zambia">Zambia</option>
          					<option value="Zimbabwe">Zimbabwe</option>
                  </select>
              </div>
          </div>
				
				
          		
	          </div>
	      </div>
	      <div class="row">
              <div class="col-md-12">
				<div class="col-md-6 col-sm-12">
              <div class="input-group">
                <label class="control-label" for="pwd"> Country Code:</label>
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
                  <label class="control-label" for="pwd"> Primary Phone No:</label>
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
         
            <!--<div class="col-md-6 col-sm-12">
              <div class="input-group">
                  <label class="control-label" for="pwd">Adhar NO:</label>
                  <input name="national_id" type="text"  class="form-control" id="national_id" 

               value="<?php
                         if (!empty($js_personal_info->national_id)) {
                           echo $js_personal_info->national_id;
                           }
                       ?>">
              </div>
          	</div>-->
         
		     <div class="row">
              <div class="col-md-12">
            <div class="col-md-12 col-sm-12">  
              	<div class="input-group">
                  	<label class="control-label" for="pwd">Present Address</label>
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
                  <label class="control-label" for="pwd">Country</label>
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
                  <label class="control-label" for="pwd">State</label>
                 <select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
				 <option value="">Select Country First</option>
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
                 <label class="control-label" for="pwd">City</label>
                 <select  name="city_id" id="city_id" class="form-control">
				 <option value="">Select State First</option>
				 <?php foreach($city as $valu){?>
					<option value="<?php echo $valu['id']; ?>"<?php if($js_personal_info->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
					<?php } ?>
				 </select>
              </div>
            </div>
			
			<div class="col-md-6 col-sm-12">
				<div class="input-group">
	                <label class="control-label" for="pwd">Pincode</label>
	               <input type="text" name="pincode" id="seeker_pincode" class="form-control" maxlength="6"  value="<?php
	                         if (!empty($js_personal_info->pincode)) {
	                           echo $js_personal_info->pincode;
	                           }
	                       ?>" required onkeypress="return isNumber(event)">
	            </div>
          	</div>
			</div>
			
			 </div>
       <input type="checkbox" name="billingtoo" onclick="FillBilling(this.form)">
			  
			 <em>Check this box if Present Address and Parmanent Address are the same.</em>
			
        
		   <div class="row">
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
          	</div>
			 <div class="col-md-6 col-sm-12">
				<div class="input-group">
	                <label class="control-label" for="pwd">Pincode</label>
	               <input type="text" name="pincode1" id="pincode1" maxlength="6" class="form-control"  value="<?php
	                         if (!empty($js_personal_info->pincode1)) {
	                           echo $js_personal_info->pincode1;
	                           }
	                       ?>" required onkeypress="return isNumber(event)">
	            </div>
          	</div>
	  </div>
   </div>
    <div class="panel-body"></div>   
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
		  </div>

    <div class="panel-body"></div>   
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">Marital Status</label>
                <select class="form-control" name="matrial_status" id="matrial_status">
                  <option value="">Select Marital Status</option>
                  <option value="Single/unmarried">Single/unmarried</option>
                  <option value="Married">Married</option>
                  <option value="Widowed">Widowed</option>
                  <option value="Divorded">Divorced</option>
                  <option value="Separated">Separated</option>
                  <option value="Other">Other</option>
                  
                </select>
          </div>     
        </div>
        <!-- <div class="col-md-6 col-sm-12">         
          <div class="input-group">
            <label class="control-label" for="email">Differently Abled</label>
            <input type="radio" name="differently_abled" id="differently_abled" value="Yes"> Yes
            <input type="radio" name="differently_abled" id="differently_abled" value="No" checked> No
          </div>
        </div> -->
        
        <div class="col-md-6 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">Work Permit for USA</label>
                <select class="form-control" name="work_permit_usa" id="work_permit_usa">
                  <option value="">Select Work Permit</option>
                  <option value="Have H1 Visa">Have H1 Visa</option>
                  <option value="Need H1 Visa">Need H1 Visa</option>
                  <option value="TN Permit Holder">TN Permit Holder</option>
                  <option value="Green Card Holder">Green Card Holder</option>
                  <option value="US Citizen">US Citizen</option>
                  <option value="Authorized to work in US">Authorized to work in US</option>
                </select>
          </div>     
        </div>
      </div>
    </div>
    <div class="panel-body"></div>   
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
          <div class="input-group">
            <label class="control-label" for="email">Work Permit for Other Countries</label>
              <input type="text" name="other_country_work_permit" class="form-control" id="tokenfield" placeholder="Enter Country" value="">
          </div>     
        </div>
      </div>
    </div>

    <div class="panel-body"></div>   
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
          <div class="input-group">
              <h6>Languages</h6><br>
              <button class="btn btn-success btn-xs pull-right add-more" type="button"><i class="fa fa-plus"></i> Add Language</button> <br>
              <div class="input-group control-group after-add-more">
                <div>
                  <?php if(!empty($languages)) foreach($languages as $lrow){?>
                  <div class="col-md-12">
                    <div class="col-md-6"> 
                       <label>Language</label>
                      <input type="text" name="language[]" id="language1" class="form-control" value="<?php echo $lrow['language']; ?>">
                    </div>
                    <div class="col-md-6">  
                      <label>Proficiency</label>
                      <select class="form-control" name="proficiency[]" id="proficiency">
                        <option value="">Select Proficiency</option>
                        <option value="Beginner"<?php if($lrow['proficiency']=='Beginner'){echo 'selected';} ?>>Beginner</option>
                        <option value="Proficient"<?php if($lrow['proficiency']=='Proficient'){echo 'selected';} ?>>Proficient</option>
                        <option value="Expert"<?php if($lrow['proficiency']=='Expert'){echo 'selected';} ?>>Expert</option>
                        
                      </select>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">  
                      <input type="checkbox" name="lang_read[]" id="lang_read" value="Yes"<?php if($lrow['lang_read']=='Yes'){echo 'checked';} ?> style="margin: 0 15px;"> Read
                      <input type="checkbox" name="lang_write[]" id="lang_write" value="Yes"<?php if($lrow['lang_write']=='Yes'){echo 'checked';} ?> style="margin: 0 15px;"> Write
                      <input type="checkbox" name="lang_speak[]" id="lang_speak" value="Yes"<?php if($lrow['lang_speak']=='Yes'){echo 'checked';} ?> style="margin: 0 15px;"> Speak
                      <button class="btn btn-danger btn-xs pull-right remove" type="button"><i class="fa fa-trash"></i> Remove</button><br/>
                    </div>
                  </div>
                <?php }else{ ?>
                  <div class="col-md-12">
                    <div class="col-md-6"> 
                       <label>Language</label>
                      <input type="text" name="language[]" id="language1" class="form-control" >
                    </div>
                    <div class="col-md-6">  
                      <label>Proficiency</label>
                      <select class="form-control" name="proficiency[]" id="proficiency">
                        <option value="">Select Proficiency</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Proficient">Proficient</option>
                        <option value="Expert">Expert</option>
                        
                      </select>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">  
                      <input type="checkbox" name="lang_read[]" id="lang_read" value="Yes" style="margin: 0 15px;"> Read
                      <input type="checkbox" name="lang_write[]" id="lang_write" value="Yes" style="margin: 0 15px;"> Write
                      <input type="checkbox" name="lang_speak[]" id="lang_speak" value="Yes" style="margin: 0 15px;"> Speak

                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
          </div>     
        </div>
      </div>
    </div>
		   <!-- Copy Fields -->
      <div class="copy hide">
        <div class="control-group input-group" style="margin-top:10px">
          <div>
            <div class="col-md-12">
              <div class="col-md-6"> 
                 <label>Language</label>
                <input type="text" name="language[]" id="language2" class="form-control">
              </div>
              <div class="col-md-6">  
                <label>Proficiency</label>
                <select class="form-control" name="proficiency[]" id="proficiency">
                  <option value="">Select Proficiency</option>
                  <option value="Beginner">Beginner</option>
                  <option value="Proficient">Proficient</option>
                  <option value="Expert">Expert</option>
                </select>
              </div>
              <div class="col-md-12" style="margin-top:10px;">  
                <input type="checkbox" name="lang_read[]" id="lang_read" value="Yes" style="margin: 0 15px;"> Read
                <input type="checkbox" name="lang_write[]" id="lang_write" value="Yes" style="margin: 0 15px;"> Write
                <input type="checkbox" name="lang_speak[]" id="lang_speak" value="Yes" style="margin: 0 15px;"> Speak

                <button class="btn btn-danger btn-xs pull-right remove" type="button"><i class="fa fa-trash"></i> Remove</button><br/>
              </div>

            </div>
          </div>
        
          <br/>
        </div>
      </div>
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
			
               <div class="modal-footer">
               	 
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
            </form>
     
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });


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
	   
	  function getStatess(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
                data:{id:id},
                success:function(res){
                    $('#state1_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	  function getCityss(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city1_id').html(res);
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

    function getStates_load_permant(){
        var id = $('#country1_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
                data:{id:id},
                success:function(res){
                    $('#state1_id').html(res);
                    $('#state1_id').val(<?php echo $js_personal_info->state_id; ?>);
                     getCitys_load_permant(<?php echo $js_personal_info->state_id; ?>);
                }
                
            }); 
          }
   
       }
    
    function getCitys_load_permant(id){
      //var id = $('#state_id').val();
      // alert(id);
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city1_id').html(res);
                    $('#city1_id').val(<?php echo $js_personal_info->city_id; ?>);
                }
                
            }); 
          }
   
       }

  getCitys_load();
  getStates_load();
  getCitys_load_permant();
  getStates_load_permant();
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
