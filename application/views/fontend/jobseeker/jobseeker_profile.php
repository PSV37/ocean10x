<!---header---->

<?php 
    $this->load->view('fontend/layout/new_seeker_header.php');

?>
<!---header end--->
<div class="container-fluid">
  <div class="container">
        <div class="col-md-12">
    <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
     <?php  $job_seeker=$this->session->userdata('job_seeker_id'); ?>
          

      <div class="col-md-9 profile-section">
              <div class="profile-tabs">      
               
                <ul class="nav nav-tabs profile-nav ">
                            <li class="active"><a data-toggle="tab" href="#home">My Profile</a></li>
                            <li><a data-toggle="tab" href="#menu1">Education</a></li>
                            <li><a data-toggle="tab" href="#menu2">Skills</a></li>
                            <li><a data-toggle="tab" href="#menu3">Work Experience</a></li>
                            <li><a data-toggle="tab" href="#menu4">Certs & Trainning</a></li>
                 </ul>
                
                </div>
            
    <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
       

    <div class="header-p-img" style="position:relative;">
        
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS-7Q995g-7kjzS1RbQh7zaxf4eBCciNVp8ebwgueosDLSMFkC0&usqp=CAU" style="width:100%; height:140px;position:relative;margin-bottom:140px;"></img>

<!-- </div></div></div> -->
            
            
        <div class="text-center" style="position:absolute;top:50px;left:-50px;">
        <img src="<?php echo base_url() ?>upload/<?php if(!empty($job_seeker_photo->photo_path)) { echo $job_seeker_photo->photo_path;} else { echo "image-notfound.png";} ?>" class="avatar img-circle img-thumbnail" alt="avatar">
       
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
         <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal50">Edit</a></span> 
      </div>
                
           
                 
                 
                <div class="row">
                    <div class="col-md-6">
                    <ul class="jobinfolist">
                      <li>
                        <h4>First Name | Last name</h4>
                        <strong>: <?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?></strong></li>
                      <li>
                        <h4>Date of birth</h4>
                        <strong>: <?php if($js_personal_info->date_of_birth=="0000-00-00") {
                    echo "";
                  } else {
                        echo date('j M Y',strtotime($js_personal_info->date_of_birth)); 
                        if($js_personal_info->dob_visiblity=="Yes") {
                          echo "  (Birthday not visible to my network)";
                        }else{
                          echo "  (Birthday visible to my network)";
                        }
                  }
                 ?></strong></li>
                      <li>
                        <h4>Primary phone no</h4>
                        <strong>: <?php echo $js_personal_info->country_code.'- '.$js_personal_info->mobile; ?></strong></li>
                      <li>
                        <h4>Alternate phone no</h4>
                        <strong>: <?php echo $js_personal_info->alternatecountry_code.'- '.$js_personal_info->alternatemobile; ?></strong></li>
                      <li>
                        <h4>Present Address</h4>
                        <strong>: <?php echo $js_personal_info->present_address; ?></strong></li>
                     <li>

                        <h4>Address</h4>
                        <strong>: <?php echo $js_personal_info->present_address; ?></strong></li>
                     <li>   <h4>City</h4>
                        <strong>: <?php echo $js_personal_info->city_name; ?></strong></li>
                       
                                                                                           
                                                        
                        
                      
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul class="jobinfolist">
                      <li>
                        <h4>State</h4>
                        <strong>: <?php echo $js_personal_info->state_name; ?></strong></li>
                      <li>
                        <h4>Country</h4>
                        <strong>: <?php echo $js_personal_info->country_name; ?></strong></li>
                      <li>
                        <h4>Marital Status</h4>
                        <strong>: <?php if(!empty($js_personal_info->marital_status))
                  echo $js_personal_info->marital_status; ?></strong></li>
                      <li>
                        <h4>Work premit for USA</h4>
                        <strong>: <?php if(!empty($js_personal_info->work_permit_usa))
                  echo $js_personal_info->work_permit_usa; ?></strong></li>
                      <li>
                        <h4>Work premit for Other Country</h4>
                        <strong>: <?php if(!empty($js_personal_info->work_permit_countries))
                  echo $js_personal_info->work_permit_countries; ?></strong></li>
                     <li>
                        <h4>Website</h4>
                        <strong>: <?php if(!empty($js_personal_info->website))
                  echo $js_personal_info->website; ?></strong></li>
                        <li>
                        <h4>My Tagline</h4>
                        <strong>: <?php if(!empty($js_personal_info->resume_title))
                  echo $js_personal_info->resume_title; ?></strong></li>
                                                                                           
                                                        
                        
                      
                    </ul>
                  </div>
                </div>
            
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/save_profile_details');?>" method="post" style="padding: 30px;">    
            <div class="col-md-12">
             <div class="uplode-resume">
                <label for="avatarInput">Upload Resume<span class="required">*</span></label>
                 <input type="file" class="form-control" id="txt_resume" name="txt_resume" required="">

                 <input type="hidden" class="form-control" id="" name="oldresume" value="<?php if(!empty($job_seeker_resume['resume'])){echo $job_seeker_resume['resume'];} ?>">
              </div>
                
            
              <div class="Profile-summery">
                <h4>Profile summery</h4>
                  <textarea name="profile_summary" id="profile_summary" class="form-control" placeholder="Profile Summary" rows="5"></textarea>
                  <p>Add or link to external documents, photos, sites, videos, and presentations.</p>
              </div>
            </div>
          <div class="col-md-12 resume-link">
              <div class="col-md-6">
                <label for="avatarInput">Upload Media</label>
                <input type="file" class="form-control" id="txt_media" name="txt_media">
                <input type="hidden" class="form-control" id="" name="oldmedia" value="">
                <p style="font-size:12px;margin-top:10px;">Supported Formats: doc, docx, rtf, pdf, gif, jpg, png, ppt, pps, pptx, ppsx, pot, potx, upto 100 MB</p><br>
              </div>
                <div class="col-md-6">
                <label for="avatarInput">Media Link</label>
                <input type="text" class="form-control" id="txt_link" name="txt_link" value="">
                </div>
                <button class="save-apply-btn">save</button>
            </div>
          </form>
        </div>  
    </div>

      <div class="modal fade" id="myModal50" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Personal Information</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_personalinfo');?>" method="post" style="padding: 30px;">
         <input type="hidden" name="js_experience_id" value="286">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Name:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_company_profile_id" required name="full_name" value="<?php echo $this->Job_seeker_model->jobseeker_name($job_seeker); ?>">

                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Date of Birth:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control datepicker" id="edit_company_profile_id" required name="date_of_birth" value="<?php echo date('d-m-Y', strtotime($js_personal_info->date_of_birth)); ?>">
                <input type="checkbox" required name="dobmake_public" value="No"<?php if($js_personal_info->dob_visiblity=='No') {echo 'checked'; }else{}?>  > Birthday not visible to my network

                </div>
              </div>

        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country Code:</label>
                <div class="col-sm-9">
                  <div class="col-sm-3">
                     <select id="country" name="country_code" class="form-control" required>
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
                  <label class="control-label col-sm-3" for="email">Primary Phone No:</label>
                  <div class="col-sm-6">
                     <input name="mobile" type="text"  class="form-control" required maxlength="10" id="number" value="<?php if (!empty($js_personal_info->mobile)) {
                           echo $js_personal_info->mobile;}
                       ?>">&nbsp;<span id="errmsg"></span>
                  </div>
                  

                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country Code:</label>
                <div class="col-sm-9">
                  <div class="col-sm-3">
                     <select id="country" name="alternatecountry_code" class="form-control" required>
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
                  <label class="control-label col-sm-3" for="email">Alternate Phone No:</label>
                  <div class="col-sm-6">
                     <input name="alternatemobile" type="text"  class="form-control" required maxlength="10" id="number" value="<?php if (!empty($js_personal_info->mobile)) {
                           echo $js_personal_info->mobile;}
                       ?>">&nbsp;<span id="errmsg"></span>
                  </div>
                  

                </div>
              </div>

              <!--<div class="form-group">
                <label class="control-label col-sm-3" for="email">Job Level</label>
                <div class="col-sm-9">
                    <select name="job_level" class="form-control" id="job_level" >
                                             </select>
                </div>
              </div>-->

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Present Address<span class="required">*</span>:</label>
                <div class="col-sm-9">
                   <textarea name="present_address" class="form-control ckeditor" rows="5" id="comment" required><?php 
                       if (!empty($js_personal_info->present_address)) {
                         echo $js_personal_info->present_address;
                         }
                     ?></textarea>
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:<span class="required">*</span></label>
                  <div class="col-sm-9">
                    <select name="country_id" class="form-control" onchange="getStates(this.value)">
                    <option value="">Select Country</option>
                      <?php foreach($country as $key){?>
                      <option value="<?php echo $key['country_id']; ?>"<?php if($js_personal_info->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">State:<span class="required">*</span></label>
                  <div class="col-sm-9">
                    <select name="state_id" class="form-control" onchange="getCitys(this.value)">
                    <option value="">Select State</option>
                     <?php foreach($state as $val){?>
                    <option value="<?php echo $val['state_id']; ?>"<?php if($js_personal_info->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">City:<span class="required">*</span></label>
                  <div class="col-sm-9">
                    <select name="city_id" class="form-control" onchange="getStates(this.value)">
                    <option value="">Select City</option>
                      <?php foreach($city as $valu){?>
                    <option value="<?php echo $valu['id']; ?>"<?php if($js_personal_info->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
              </div>

          <div class="form-group">
                <label class="control-label col-sm-3" for="email">Pincode:</label>
                <div class="col-sm-9">
                <input type="text" name="pincode" id="seeker_pincode" class="form-control" maxlength="6"  value="<?php
                 if (!empty($js_personal_info->pincode)) {
                   echo $js_personal_info->pincode;
                   }
               ?>" required onkeypress="return isNumber(event)">

                </div>
          </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="email">My Tagline:</label>
                <div class="col-sm-9"><input id="resDate_1" class="datepicker form-control" required name="tagline" placeholder="Enter Your Tagline" value="<?php 
                       if (!empty($js_personal_info->resume_title)) {
                         echo $js_personal_info->resume_title;
                         }
                     ?>" disabled="disabled">
                 
                </div>
              </div>

 
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Marital Status</label>
                <div class="col-sm-9">
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
        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Work Permit for USA:</label>
                <div class="col-sm-9">
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
        
         <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Work Permit for Other Countries</label>
                <div class="col-sm-9">
                 <input type="text" name="other_country_work_permit" class="form-control" id="tokenfield" placeholder="Enter Country" value="<?php
                           if (!empty($js_personal_info->work_permit_countries)) {
                             echo $js_personal_info->work_permit_countries;
                             }
                         ?>">
            <p>You can choose upto 3 Countries</p>  
                </div>
              </div>
        
        <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Website (Personal / Company / Blog / Other)</label>
                <div class="col-sm-9">
                <input type="text" name="website" class="form-control" placeholder="Enter Your Website (Personal / Company / Blog / Other)" value="<?php
                           if (!empty($js_personal_info->website)) {
                             echo $js_personal_info->website;
                             }
                         ?>">
                </div>
              </div>

                <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                <div class="col-sm-9">
                 <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
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
    <div id="menu1" class="tab-pane fade">
    
      <div class="education_header" style="position:relative;">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQofjuD4yOHnpJHZSgGYZucvlOH6nukw95LkKub_HxNl3N6cpTL&usqp=CAU" style="width:100%;position:relative;"></img>
            <div class="icon-education" style="position:absolute;bottom:23px;right:53%;">
            <i class="fas fa-graduation-cap edu-i"></i>
            </div>
        </div>
 
    
    
    
    
      <ul style="margin-top:50px;">
      <li class="bullet"><a href="#" value='1' id="ed" data-toggle="modal" data-target="#myModal">Ph.d / Doctorate</a>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button"   class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ph.d / Doctorate</h4>
        </div>
        <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                        $seeker_edu_level_id = '1';
                         $education_data = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                        // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                        // print_r($education_data);die;
                      ?>
    

        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
         <input type="hidden" name="js_education_id" value="<?php echo $education_data[0]->js_education_id; ?>">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                  <option value="1">Ph.D / Doctorate</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
            <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          
                      
          <label class="control-label" for="email">Specialization<span class="required">*</span></label>
          <select name="specialization_id" id="specialization_id" class="form-control" required="">
            <option value="">Select One</option>
            <?php foreach($phdspecial as $edu_special){?>
              <option value="<?php echo $edu_special['id']; ?>"<?php if(!empty($education_data)) if($education_data[0]->specialization_id==$edu_special['id']) echo "selected";?>><?php echo $edu_special['education_specialization']; ?></option>
            <?php } ?>
                           <!-- <option value="6">Computer SC.</option> -->
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University / Name of Institution<span class="required">*</span></label>
          <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name" required value="<?php if(!empty($education_data)) echo $education_data[0]->js_institute_name; ?>">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type<span class="required">*</b></label>
                    
                <?php foreach($course as $courses){?>
            <input type="radio" name="education_type_id" required id="education_type_id" value="<?php echo $courses['education_type_id']; ?>"<?php if(!empty($education_data)) if($education_data[0]->education_type_id==$courses['education_type_id']) echo "checked";?> style="margin: 0 1px;"> <?php echo $courses['education_type']; ?>
          <?php } ?>                      

        </div>
        <div class="col-sm-1"></div>
      </div>
        
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
            <?php
              $currently_selected = date('Y'); 
              $earliest_year = 1940; 
              $latest_year = date('Y'); 
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
              ?>
              <option value="<?php echo $i; ?>"<?php if(!empty($education_data)) if($education_data[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
            <?php } ?>
         
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Score<span class="required">*</span></label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Score" value="<?php if(!empty($education_data)) echo $education_data[0]->js_resut; ?>" onkeypress="javascript:return isNumber1(event)" required>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
        

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
                            <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" value='1' onclick="get_specialization(this.value);"  data-target="#myModal">Edit</a></span> 

      </li>
      
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal1">Masters / Post-Graduation</a>
      <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Masters / Post-Graduation</h4>
        </div>
         <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                        $seeker_edu_level_id = '2';
                         $education_data2 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                        // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                        // print_r($education_data);die;
                      ?>
     

        <div class="modal-body education_frm">
  <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
         <input type="hidden" name="js_education_id" value="<?php echo $education_data2[0]->js_education_id; ?>">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="2">Masters/Post-Graduation</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
            <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Specialization<span class="required">*</span></label>
          <select name="specialization_id" id="specialization_id" class="form-control" required="">
            <option value="">Select One</option>
                         <?php foreach($pgdspecial as $edu_special){?>
              <option value="<?php echo $edu_special['id']; ?>"<?php if(!empty($$education_data2)) if($$education_data2[0]->specialization_id==$edu_special['id']) echo "selected";?>><?php echo $edu_special['education_specialization']; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University / Name of Institution<span class="required">*</span></label>
          <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name" required value="<?php if(!empty($education_data)) echo $education_data2[0]->js_institute_name; ?>">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type<span class="required">*</span></label>
                       <?php foreach($course as $courses){?>
            <input type="radio" name="education_type_id" required id="education_type_id" value="<?php echo $courses['education_type_id']; ?>"<?php if(!empty($education_data2)) if($education_data2[0]->education_type_id==$courses['education_type_id']) echo "checked";?> style="margin: 0 1px;"> <?php echo $courses['education_type']; ?>
          <?php } ?>                   

        </div>
        <div class="col-sm-1"></div>
      </div>
        
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                         <?php
              $currently_selected = date('Y'); 
              $earliest_year = 1940; 
              $latest_year = date('Y'); 
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
              ?>
              <option value="<?php echo $i; ?>"<?php if(!empty($education_data2)) if($education_data2[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 
     <!--  <div class="form-group">
         <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <label class="control-label" for="email">Grading System</label>
          <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
            <option value="">Select Grading System</option>
            <option value="Scale 10 Grading System">Scale 10 Grading System</option>
            <option value="Scale 4 Grading System">Scale 4 Grading System</option>
            <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
            <option value="Course Requires a Pass">Course Requires a Pass</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div> -->
    
      <!-- <div class="form-group" id="comp_name" style="display:none;"> -->
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Score<span class="required">*</span></label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Score" value="<?php if(!empty($education_data2)) echo $education_data2[0]->js_resut; ?>" onkeypress="javascript:return isNumber1(event)" required>
        </div>
        <div class="col-sm-1"></div>
      </div>

      
        

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
  </div>
        
      </div>
    </div>
  </div>
                          <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal1">Edit</a></span>  

      </li>
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal2">Graduation / Diploma</a>
      <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Graduation / Diploma</h4>
        </div>
         <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                        $seeker_edu_level_id = '3';
                         $education_data3 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                        // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                        // print_r($education_data);die;
                      ?>
        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
         <input type="hidden" name="js_education_id" value="<?php echo $education_data3[0]->js_education_id; ?>">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="3">Graduation/Diploma</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
            <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Specialization<span class="required">*</span></label>
          <select name="specialization_id" id="specialization_id" class="form-control" required="">
            <option value="">Select One</option>
                         <?php foreach($gddspecial as $edu_special){?>
              <option value="<?php echo $edu_special['id']; ?>"<?php if(!empty($education_data3)) if($education_data3[0]->specialization_id==$edu_special['id']) echo "selected";?>><?php echo $edu_special['education_specialization']; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University&emsp;/&emsp;Name of Institution<span class="required">*</span></label>
         <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name" required value="<?php if(!empty($education_data3)) echo $education_data3[0]->js_institute_name; ?>">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type<span class="required">*</span></label>
                    <?php foreach($course as $courses){?>
            <input type="radio" name="education_type_id" required id="education_type_id" value="<?php echo $courses['education_type_id']; ?>"<?php if(!empty($education_data3)) if($education_data3[0]->education_type_id==$courses['education_type_id']) echo "checked";?> style="margin: 0 1px;"> <?php echo $courses['education_type']; ?>
          <?php } ?>                    

        </div>
        <div class="col-sm-1"></div>
      </div>
        
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
              <?php
              $currently_selected = date('Y'); 
              $earliest_year = 1940; 
              $latest_year = date('Y'); 
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
              ?>
              <option value="<?php echo $i; ?>"<?php if(!empty($education_data3)) if($education_data3[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 
     <!--  <div class="form-group">
         <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <label class="control-label" for="email">Grading System</label>
          <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
            <option value="">Select Grading System</option>
            <option value="Scale 10 Grading System">Scale 10 Grading System</option>
            <option value="Scale 4 Grading System">Scale 4 Grading System</option>
            <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
            <option value="Course Requires a Pass">Course Requires a Pass</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div> -->
    
      <!-- <div class="form-group" id="comp_name" style="display:none;"> -->
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Score<span class="required">*</span></label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Score" value="<?php if(!empty($education_data3)) echo $education_data3[0]->js_resut; ?>" onkeypress="javascript:return isNumber1(event)" required>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
        

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
                      <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal2">Edit</a></span>  

      </li>
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal3">12th</a>
      <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">12th</h4>
        </div>
          <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                        $seeker_edu_level_id = '4';
                         $education_data4 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                        // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                        // print_r($education_data);die;
                      ?>
        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
         <input type="hidden" name="js_education_id" value="<?php echo $education_data4[0]->js_education_id; ?>">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="5">12th</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
          
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                         <?php
              $currently_selected = date('Y'); 
              $earliest_year = 1940; 
              $latest_year = date('Y'); 
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
              ?>
              <option value="<?php echo $i; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 

      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Board<span class="required">*</span></label>
          <select name="board_id" id="board_id" class="form-control">
            <option value="">Select Board</option>
                          <!-- <option value="1">CBSE</option>
                          <option value="2">CISCE(ICSE/ISC)</option>
                          <option value="3">Diploma</option>
                          <option value="4">National Open School</option>
                          <option value="7">IB(International Baccalaureate)</option> -->
              <?php foreach($schoolboard as $boards){?>
              <option value="<?php echo $boards['schoolboard_id']; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->board_id==$boards['schoolboard_id']) echo "selected";?>><?php echo $boards['schoolboard_name']; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">School Medium<span class="required">*</span></label>
          <select name="schoolmedium_id" id="schoolmedium_id" class="form-control">
             <?php foreach($schoolmedium as $medium){?>
            <option value="<?php echo $medium['schoolmedium_id']; ?>"<?php if(!empty($education_data4)) if($education_data4[0]->schoolmedium_id==$medium['schoolmedium_id']) echo "selected";?>><?php echo $medium['school_medium']; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
    
    <div class="form-group">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <label class="control-label" for="email">Total Score<span class="required">*</span></label>
        <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control" value="<?php if(!empty($education_data4)) echo $education_data4[0]->totalmarks_id; ?>" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
      </div>
      <div class="col-sm-1"></div>
    </div>
      

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
                    <span style="float: right;font-size:12px;cursor: pointer;"><a  href="#" data-toggle="modal" data-target="#myModal3">Edit</a></span> 


      </li>
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal4">10th</a>
      <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">10th</h4>
        </div>
         <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                        $seeker_edu_level_id = '5';
                         $education_data4 = $this->Job_seeker_education_model->education_list_by_levelid($jobseeker_id,$seeker_edu_level_id); 
                        // $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                        // print_r($education_data);die;
                      ?>
        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
         <input type="hidden" name="js_education_id" value="<?php echo $education_data5[0]->js_education_id; ?>">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="6">10th</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
          
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                         <?php
              $currently_selected = date('Y'); 
              $earliest_year = 1940; 
              $latest_year = date('Y'); 
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
              ?>
              <option value="<?php echo $i; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->js_year_of_passing==$i) echo "selected";?>><?php echo $i; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 

      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Board<span class="required">*</span></label>
          <select name="board_id" id="board_id" class="form-control">
            <option value="">Select Board</option>
                          <?php foreach($schoolboard as $boards){?>
              <option value="<?php echo $boards['schoolboard_id']; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->board_id==$boards['schoolboard_id']) echo "selected";?>><?php echo $boards['schoolboard_name']; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">School Medium<span class="required">*</span></label>
          <select name="schoolmedium_id" id="schoolmedium_id" class="form-control">
            <option value="">Select Medium</option>
               <?php foreach($schoolmedium as $medium){?>
            <option value="<?php echo $medium['schoolmedium_id']; ?>"<?php if(!empty($education_data5)) if($education_data5[0]->schoolmedium_id==$medium['schoolmedium_id']) echo "selected";?>><?php echo $medium['school_medium']; ?></option>
            <?php } ?>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
    
    <div class="form-group">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <label class="control-label" for="email">Total Score<span class="required">*</span></label>
        <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control" value="<?php if(!empty($education_data5)) echo $education_data5[0]->totalmarks_id; ?>" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
      </div>
      <div class="col-sm-1"></div>
    </div>
      

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
  
  
  
                  <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal4">Edit</a></span>  

      </li>

      </ul>
      
    </div>
    <div id="menu3" class="tab-pane fade">
    <ul>
    <?php  $designation = $this->Master_model->getMaster('designation',$where=false);

            $department = $this->Master_model->getMaster('department',$where=false); ?>
     <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal5">Work Experience</a>
    
      <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Work Experience</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
         <!-- <input type="hidden" name="js_experience_id" value="286"> -->

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Company Name:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_company_profile_id" required name="company_profile_id" value="pp">

                </div>
              </div>

        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                  <select name="designation_id" class="form-control">
                    <?php foreach($designation as $keys){?>
                    <option value="<?php echo $keys['designation_id']; ?>"><?php echo $keys['designation_name']; ?></option>
                    <?php } ?>
                    </select>

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Department:</label>
                <div class="col-sm-9">
         <select name="dept_id" class="form-control">
          <option value="">Select Department</option>
                   <?php foreach($department as $dept){?>
          <option value="<?php echo $dept['dept_id']; ?>"<?php if($experinece->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
          <?php } ?>
                    </select>
                </div>
              </div>


   <div class="form-group">
                <label class="control-label col-sm-3" for="email">Start Date:</label>
                <div class="col-sm-9"><input class="datepicker form-control" required name="start_date" value="01-09-2019">
 <label><input type="checkbox" id="upChkDisable_1" onclick="disableUpperDP('1')" checked="checked">  Current Job</label>

                </div>
              </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="email">End Date:</label>
                <div class="col-sm-9"><input id="resDate_1" class="datepicker form-control" required name="end_date" value="" disabled="disabled">
                 
                </div>
              </div>

 
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Job Location</label>
                <div class="col-sm-9">
                 <input type="text" name="address" class="form-control" id="job_area" value="kalyani nagar,pune">
                </div>
              </div>
        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Salary" value="25,000">
                </div>
              </div>
        
         <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                <div class="col-sm-9">
                 <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities">kjkj</textarea>
                </div>
              </div>
        
        <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Achievement  </label>
                <div class="col-sm-9">
                 <textarea name="achievement" class="form-control" rows="5" id="achievement">kj</textarea>
                </div>
              </div>

                <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                <div class="col-sm-9">
                 <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
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
            <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal5">Add</a></span>  

      </li>

     </ul>
     <div class="col-md-12 bd-2">
                <?php 
        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
        // print_r($experinece_list);
                $sr_no=0;
            if (!empty($experinece_list)): foreach ($experinece_list as $v_experience) :

                // print_r($applicaiton);
                // for ($i=0; $i <sizeof($v_experience) ; $i++) { 
                    # code...
               
            ?>
            <div class="invi-div">
                            <!-- <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton[$i]->company_profile_id); ?>" class="invitation-img"/> -->
                            <div class="info-invitation">
                                <p class="head-invi">Compnay Name:<?php echo $v_experience->company_profile_id; ?></p>


                                 <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#EditExperience<?php echo $v_experience->js_experience_id; ?>" onclick="javascript:disableDP('<?php echo $key ?>')"class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>

                                <span class="salary-info">Designation: <?php echo $this->job_posting_model->job_salary_by_id($applicaiton[$i]->job_post_id); ?><span>

                                <p>Department: <?php echo $v_experience->department_name; ?></p>

                                <p>Duration: <?php $today=date("Y-m-d"); if($v_experience->end_date=="2017-08-30") {
                                    echo date_calculate($v_experience->start_date,$today);
                                  }else { echo date_calculate($v_experience->start_date,$v_experience->end_date); }?></p>

                                <p>My Responsibilities: <?php echo $v_experience->responsibilities ; ?></p>

                                <p>My Achievement: <?php echo $v_experience->achievement; ?></p>

                                
                                  
                            
                                <!-- <button class="apply-invi">Apply Now</button> -->
                            </div>
                            <div class="clear"></div>   
                        </div>
            <!--  -->
                 <?php
                  // $sr_no++;
                   // }
              endforeach;
            ?>
            <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
             </div>
    
    
    
    
    
    </div>
<?php $count=1; foreach ($experinece_list as $v_experience): ?>

<div id="EditExperience<?php echo $v_experience->js_experience_id; ?>" class="modal fade" role="dialog">
 <div class="modal-dialog modal-md">

   <?php
$experinece = $this->Job_seeker_experience_model->get($v_experience->js_experience_id);
           

?>
     <!--  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-md"> -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Work Experience</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
         <input type="hidden" name="js_experience_id" value="<?php echo $v_experience->js_experience_id; ?>">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Company Name:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_company_profile_id" required name="company_profile_id" value="<?php if (!empty($experinece->company_profile_id)) { echo $experinece->company_profile_id;} ?>">

                </div>
              </div>

        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                  <select name="designation_id" class="form-control">
         <?php foreach($designation as $keys){?>
          <option value="<?php echo $keys['designation_id']; ?>"<?php if($experinece->designation_id==$keys['designation_id']){ echo "selected"; }?>><?php echo $keys['designation_name']; ?></option>
          <?php } ?>
                    </select>

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Department:</label>
                <div class="col-sm-9">
                 <select name="dept_id" class="form-control">
                  <option value="">Select Department</option>
                  <?php foreach($department as $dept){?>
                  <option value="<?php echo $dept['dept_id']; ?>"<?php if($experinece->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
                  <?php } ?>
                    </select>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Start Date:</label>
                <div class="col-sm-9"><input class="datepicker form-control" required name="start_date" value="<?php if (!empty($experinece->start_date)) { echo date('d-m-Y',strtotime($experinece->start_date)); } ?>">
                <label><input type="checkbox" id="upChkDisable_1" onclick="disableUpperDP('1')" checked="checked">  Current Job</label>

                </div>
              </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="email">End Date:</label>
                <div class="col-sm-9"><input id="resDate_1" class="datepicker form-control" required name="end_date" value="<?php if (!empty($experinece->end_date)) { echo date('d/m/Y',strtotime($experinece->end_date)); }else{ echo "";} ?>" disabled="disabled">
                 
                </div>
              </div>

 
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Job Location</label>
                <div class="col-sm-9">
                 <input type="text" name="address" class="form-control" id="job_area" value="<?php 
                         if (!empty($experinece->address)) {
                           echo $experinece->address;
                           }
                       ?>">
                </div>
              </div>
        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Salary" value="<?php if (!empty($experinece->js_career_salary)) {
                           echo $experinece->js_career_salary;
                           }
                       ?>">
                </div>
              </div>
        
         <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                <div class="col-sm-9">
                 <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities"><?php 
                         if (!empty($experinece->responsibilities)) {
                           echo $experinece->responsibilities;
                           } ?></textarea>
                </div>
              </div>
        
        <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Achievement  </label>
                <div class="col-sm-9">
                 <textarea name="achievement" class="form-control" rows="5" id="achievement"><?php
                         if (!empty($experinece->achievement )) {
                           echo $experinece->achievement ;
                           }
                        ?></textarea>
                </div>
              </div>

                <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                <div class="col-sm-9">
                 <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
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
<?php  $count++; ?>
<?php endforeach;?>

    <div id="menu4" class="tab-pane fade">
    <ul>
            
            <?php $training_list = $this->Job_training_model->training_list_by_id($jobseeker_id);
      $passingyear = $this->Master_model->getMaster('passingyear',$where=false);
             ?>
    
    <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal7">My Trannings</a>
      <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Trabnnings</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateEducational-info" class="form-horizontal" action="http://www.consultnhire.com/job_seeker/update_training" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" value="155" name="job_training_id">
                <label class="control-label col-sm-3" for="email">Training Title</label>
                <div class="col-sm-9">
                   <select name="training_title" id="training_title" class="form-control" onchange="check_other(this.value)">
                    <option value="">Select Training title</option>

                                          <option value="CCNA">CCNA</option>
                                          <option value="CCNA1" selected="">CCNA1</option>
                                        <option value="other">Other</option>

                  </select>

                  <input type="hidden" name="training_title" class="form-control" id="training_title1" placeholder="Training Title" value="CCNA1"> 
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Training Topic:</label>
                <div class="col-sm-9">
                  <input type="text" name="training_topic" class="form-control" id="training_topic" placeholder="Training Topic" value="CCNA">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute:</label>
                <div class="col-sm-9">
                  <input type="text" name="institute" class="form-control" id="institute" placeholder="Institiute Name" value="CCNA">
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:</label>
                <div class="col-sm-9">
                  <select name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                    <option value="">Select Country</option>
                                         <?php foreach($country as $key){?>
                      <option value="<?php echo $key['country_id']; ?>"<?php if($training_list->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                    <?php } ?>
                  </select>
                </div> 
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">State:</label>
                <div class="col-sm-9">
                 <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                    <option value="">Select Country First</option>
                     <?php foreach($state as $val){?>
                      <option value="<?php echo $val['state_id']; ?>"<?php if($training_list->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">City:</label>
                <div class="col-sm-9">
                 <select name="city_id" id="city_id" class="form-control">
                   <option value="">Select State First</option>
                                       <?php foreach($city as $valu){?>
                    <option value="<?php echo $valu['id']; ?>"<?php if($training_list->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                    <?php } ?>
                                      </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Duration:</label>
                <div class="col-sm-9">
                  <input name="duration" type="text" class="form-control" id="duration" placeholder=" 1 years 2 month" value="">
                </div>
              </div>

                 <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Training Years:</label>
                <div class="col-sm-9">
              <select name="training_year" id="training_year" class="form-control">
                  <?php foreach($passingyear as $traning){?>
          <option value="<?php echo $traning['passing_id']; ?>"<?php if($training_list->training_year==$traning['passing_id']){ echo "selected"; }?>><?php echo $traning['passing_year']; ?></option>
          <?php } ?>
                   </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                    
            </form>
      </div>
        
      </div>
    </div>
  </div>
  
              <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal7">Edit</a></span>  

  
      </li>

    </ul>

    <div class="col-md-12 bd-2">
                <?php 
       
        // print_r($experinece_list);
                $sr_no=0;
            if (!empty($training_list)): foreach ($training_list as $v_training) : 

             
                    # code...
               
            ?>
            <div class="invi-div">
                            <!-- <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton[$i]->company_profile_id); ?>" class="invitation-img"/> -->
                            <div class="info-invitation">
                              <div class="row">
                                <div class="col-sm-6">
                                  <p></p>
                                 <h4 class="head-invi">Training Title:<?php echo $v_training->training_title; ?></h4>

                                   <h4>Training Institute: <?php echo $v_training->institute; ?></h4>

                                <h4>State: <?php echo $v_experience->achievement; ?></h4>
                                <h4>Duration:<?php echo $v_training->duration; ?></h4>

                                 


                              </div>
                               


                                

                              <div class="col-sm-6">
                                 <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#UdpateTraining<?php  echo $v_training->js_training_id; ?>" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a></span>
                              
                                  <span class="salary-info">Training Topic: <?php echo $v_training->training_topic; ?><span>
                                
                                <h4>Country: <?php echo $v_training->country_name; ?></h4>

                                <h4>City: <?php echo $v_training->city_name; ?></h4>
                                <h4>Year: <?php echo $v_training->passing_year; ?></h4>

                              </div>

                              </div>
                              
                            
                            
                                <!-- <button class="apply-invi">Apply Now</button> -->
                            </div>
                            <div class="clear"></div>   
                        </div>
            <!--  -->
                 <?php
                  // $sr_no++;
                   // }
              endforeach;
            ?>
            <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
             </div>
    
    
    </div>

      <?php foreach($training_list as $v_training): ?>
<div id="UdpateTraining<?php echo $v_training->js_training_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
   <?php
    $training_list=$this->Job_training_model->get($v_training->js_training_id); 
    
   ?>    
            
        <!-- <div class="modal fade" id="myModal7" role="dialog"> -->
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Trabnnings</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateEducational-info" class="form-horizontal" action="http://www.consultnhire.com/job_seeker/update_training" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" value="155" name="job_training_id">
                <label class="control-label col-sm-3" for="email">Training Title</label>
                <div class="col-sm-9">
                   <select name="training_title" id="training_title" class="form-control" onchange="check_other(this.value)">
                    <option value="">Select Training title</option>

                    <?php foreach($training as $key){?>
                      <option value="<?php echo $key['name']; ?>"<?php if($training_list->training_title==$key['name']){ echo "selected"; }?>><?php echo $key['name']; ?></option>
                    <?php } ?>
                    <option value="other">Other</option>
                  <input type="hidden" name="training_title" class="form-control" id="training_title1" placeholder="Training Title"
                   value="<?php
                         if (!empty($training_list->training_title)) {
                           echo $training_list->training_title;
                           }
                       ?>"> 
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Training Topic:</label>
                <div class="col-sm-9">
                  <input type="text" name="training_topic" class="form-control" id="training_topic" placeholder="Training Topic" value="<?php
                         if (!empty($training_list->training_topic)) {
                           echo $training_list->training_topic;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute:</label>
                <div class="col-sm-9">
                  <input type="text" name="institute" class="form-control" id="institute" placeholder="Institiute Name" value="<?php
                         if (!empty($training_list->institute)) {
                           echo $training_list->institute;
                           }
                       ?>">
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:</label>
                <div class="col-sm-9">
                  <select name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                    <option value="">Select Country</option>
                                         <?php foreach($country as $key){?>
                      <option value="<?php echo $key['country_id']; ?>"<?php if($training_list->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                    <?php } ?>
                  </select>
                </div> 
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">State:</label>
                <div class="col-sm-9">
                 <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                    <option value="">Select Country First</option>
                     <?php foreach($state as $val){?>
                      <option value="<?php echo $val['state_id']; ?>"<?php if($training_list->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">City:</label>
                <div class="col-sm-9">
                 <select name="city_id" id="city_id" class="form-control">
                   <option value="">Select State First</option>
                                       <?php foreach($city as $valu){?>
                    <option value="<?php echo $valu['id']; ?>"<?php if($training_list->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                    <?php } ?>
                                      </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Duration:</label>
                <div class="col-sm-9">
                  <input name="duration" type="text" class="form-control" id="duration" placeholder=" 1 years 2 month" value="<?php
                         if (!empty($training_list->duration)) {
                           echo $training_list->duration;
                           }
                       ?>">
                </div>
              </div>

                 <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Training Years:</label>
                <div class="col-sm-9">
              <select name="training_year" id="training_year" class="form-control">
                  <?php foreach($passingyear as $traning){?>
          <option value="<?php echo $traning['passing_id']; ?>"<?php if($training_list->training_year==$traning['passing_id']){ echo "selected"; }?>><?php echo $traning['passing_year']; ?></option>
          <?php } ?>
                   </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                    
            </form>
      </div>
        
      </div>
    </div>
  </div> 

<?php  $count++; ?>
<?php endforeach;?>

  
  </div>
           
   
            
            
            
            </div><!--profile-section div -->




    
  </div>
    
    
    </div>
    <!-- Footer -->

  <!-- ./Footer -->

   <?php $this->load->view("fontend/layout/jobseeker_footer.php"); ?>

</div>

<script>
  
$( "#ed" ).on( "click", function( event ) {
   var value = document.getElementById('education_level_id');
  console.log(value);
})
  
</script>

<script type="text/javascript">


  

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
  function getlanguage_data(lan_id)
  {
   // alert(lan_id);

    $.ajax({
             url:'<?php echo base_url()?>job_seeker/edit_language',
             type: 'post',
            
             data: {language_id:lan_id},
              dataType: 'json',
             // content_type:'application/json',
             success: function(data){
               
               console.log(data);
               $.each(data, function(index, value) 
              {
                
                  $('#lang_id').val(value.id);

                  $('#language').val(value.language);
                  $('#proficiency').val(value.proficiency);

                  var read = value.lang_read;
                  var write = value.lang_write;
                  var speak = value.lang_speak;
                  if(read == 'Yes')
                  {
                    $('#lang_read').prop('checked', true);

                  }else{
                    $('#lang_read').prop('checked', false);

                  }
                  if(write == 'Yes')
                  {
                    $('#lang_write').prop('checked', true);

                  }else{
                    $('#lang_write').prop('checked', false);

                  } 
                  if(speak == 'Yes')
                  {
                    $('#lang_speak').prop('checked', true);

                  }else{
                    $('#lang_speak').prop('checked', false);

                  }
                
              });
              
                // $('#candiate_email').val(emails);
                     
              
             }
        });
  }
</script>
<style>
  ul.ui-autocomplete {
      z-index: 1100;
  }
  
</style>
